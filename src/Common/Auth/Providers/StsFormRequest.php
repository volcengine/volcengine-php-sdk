<?php

namespace Volcengine\Common\Auth\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;
use Volcengine\Common\ApiException;
use Volcengine\Common\ErrorDetails;
use Volcengine\Common\Retry\Retryer;
use GuzzleHttp\Exception\RequestException;

/**
 * Shared HTTP helper for STS form-encoded POST requests (AssumeRoleWithOIDC,
 * AssumeRoleWithSAML). Provides retry with configurable attempts and interval.
 *
 * No signing is performed — OIDC/SAML STS calls are unsigned.
 *
 * Only retries on transient failures: Guzzle TransferException without a
 * response (network errors) and HTTP 5xx / 429 responses. Deterministic 4xx
 * errors are not retried.
 *
 * @internal This class is not part of the public API.
 */
class StsFormRequest
{
    const DEFAULT_STS_ENDPOINT = 'sts.volcengineapi.com';
    const DEFAULT_CONNECT_TIMEOUT = 5;
    const DEFAULT_TIMEOUT = 30;
    const DEFAULT_MAX_RETRIES = 3;
    const DEFAULT_RETRY_INTERVAL = 1;

    private function __construct()
    {
    }

    /**
     * Send a form-encoded POST to the STS endpoint with retry.
     *
     * @param string             $endpoint       bare host (e.g. sts.volcengineapi.com)
     * @param string             $schema         'http' or 'https'
     * @param array              $queryParams    query string params (e.g. Action, Version, Policy for OIDC)
     * @param string             $formBody       URL-encoded form body (http_build_query result)
     * @param int                $maxRetries     extra retry attempts; 0 = no retry (single attempt)
     * @param int                $retryInterval  seconds between retries
     * @param string             $providerName   provider name for error messages
     * @param StsHttpConfig|null $httpConfig     proxy / TLS configuration for reaching STS
     * @return string response body
     * @throws ApiException on failure after all attempts exhausted
     * @throws \InvalidArgumentException on invalid proxy URL / unreadable CA file
     */
    public static function doPostWithRetry(
        $endpoint,
        $schema,
        $queryParams,
        $formBody,
        $maxRetries,
        $retryInterval,
        $providerName,
        $httpConfig = null
    ) {
        $details = self::doPostWithRetryDetails($endpoint, $schema, $queryParams, $formBody, $maxRetries, $retryInterval, $providerName, $httpConfig);
        return $details['body'];
    }

    public static function doPostWithRetryDetails(
        $endpoint, $schema, $queryParams, $formBody, $maxRetries, $retryInterval, $providerName, $httpConfig = null
    ) {
        $url = self::buildRequestUrl($endpoint, $schema, $queryParams);
        $clientOptions = self::buildClientOptions($httpConfig);
        $retryer = new Retryer($maxRetries, 0, 0);

        $lastException = null;
        for ($attempt = 0; $attempt <= $maxRetries; $attempt++) {
            try {
                return self::doPost($url, $formBody, $providerName, $clientOptions);
            } catch (ApiException $e) {
                if (!self::shouldRetry($retryer, $attempt, $e)) {
                    throw $e;
                }
                $lastException = $e;
                if ($attempt < $maxRetries && $retryInterval > 0) {
                    sleep($retryInterval);
                }
            }
        }

        throw $lastException;
    }

    private static function shouldRetry($retryer, $attempt, $error)
    {
        if ($attempt >= $retryer->getNumMaxRetries()) {
            return false;
        }
        foreach (ErrorDetails::walk($error) as $node) {
            $code = $node instanceof ApiException ? $node->getDiagnosticCode() : ErrorDetails::transportCode($node);
            if (in_array($code, ['RequestCanceled', 'TLSError'], true)) {
                return false;
            }
        }
        // Form STS historically retries every 5xx, including proxy statuses.
        return $error->getStatusCode() >= 500 || $retryer->shouldRetrySts(null, $attempt, $error);
    }

    /**
     * Build Guzzle client options, applying proxy / TLS from $httpConfig.
     *
     * @param StsHttpConfig|null $httpConfig
     * @return array
     * @throws \InvalidArgumentException on invalid proxy URL / unreadable CA file
     */
    private static function buildClientOptions($httpConfig)
    {
        $options = [
            'timeout' => self::DEFAULT_TIMEOUT,
            'connect_timeout' => self::DEFAULT_CONNECT_TIMEOUT,
            'http_errors' => false,
        ];

        if ($httpConfig instanceof StsHttpConfig) {
            return $httpConfig->applyTo($options);
        }

        $options['verify'] = true;
        return $options;
    }

    private static function doPost($url, $formBody, $providerName, array $clientOptions)
    {
        $client = new Client($clientOptions);

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Accept' => 'application/json',
                ],
                'body' => $formBody,
            ]);
        } catch (RequestException $e) {
            throw ApiException::fromRequestException($e);
        } catch (TransferException $e) {
            throw ApiException::fromTransferError(
                $providerName . ': STS request failed - ' . $e->getMessage(),
                self::RETRYABLE_CODE, null, null, $e
            );
        }

        return StsResponse::read($response, $url);
    }

    /**
     * Internal marker code for network/transport errors (not an HTTP status).
     */
    const RETRYABLE_CODE = -1;

    private static function buildRequestUrl($endpoint, $schema, $queryParams)
    {
        $endpoint = !empty($endpoint) ? trim($endpoint) : self::DEFAULT_STS_ENDPOINT;
        $endpoint = rtrim($endpoint, '/');
        $schema = (!empty($schema) && in_array($schema, ['http', 'https'])) ? $schema : 'https';

        // If endpoint already has scheme, use it as-is
        if (strpos($endpoint, 'http://') === 0 || strpos($endpoint, 'https://') === 0) {
            $base = $endpoint;
        } else {
            $base = $schema . '://' . $endpoint;
        }

        ksort($queryParams);
        $query = '';
        foreach ($queryParams as $k => $v) {
            $query .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
        }
        $query = rtrim($query, '&');

        return $base . ($query ? '?' . $query : '');
    }
}
