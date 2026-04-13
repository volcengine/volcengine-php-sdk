<?php

namespace Volcengine\Common\Auth\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;
use Volcengine\Common\ApiException;

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
     * @param string $endpoint       bare host (e.g. sts.volcengineapi.com)
     * @param string $schema         'http' or 'https'
     * @param array  $queryParams    query string params (e.g. Action, Version, Policy for OIDC)
     * @param string $formBody       URL-encoded form body (http_build_query result)
     * @param int    $maxRetries     extra retry attempts; 0 = no retry (single attempt)
     * @param int    $retryInterval  seconds between retries
     * @param string $providerName   provider name for error messages
     * @return string response body
     * @throws ApiException on failure after all attempts exhausted
     */
    public static function doPostWithRetry(
        $endpoint,
        $schema,
        $queryParams,
        $formBody,
        $maxRetries,
        $retryInterval,
        $providerName
    ) {
        $url = self::buildRequestUrl($endpoint, $schema, $queryParams);

        $lastException = null;
        for ($attempt = 0; $attempt <= $maxRetries; $attempt++) {
            try {
                return self::doPost($url, $formBody, $providerName);
            } catch (ApiException $e) {
                if (!self::isRetryable($e)) {
                    throw $e;
                }
                $lastException = $e;
                if ($attempt < $maxRetries) {
                    sleep($retryInterval);
                }
            }
        }

        throw $lastException;
    }

    private static function doPost($url, $formBody, $providerName)
    {
        $client = new Client([
            'timeout' => self::DEFAULT_TIMEOUT,
            'connect_timeout' => self::DEFAULT_CONNECT_TIMEOUT,
            'verify' => true,
            'http_errors' => false,
        ]);

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Accept' => 'application/json',
                ],
                'body' => $formBody,
            ]);
        } catch (TransferException $e) {
            throw new ApiException(
                $providerName . ': STS request failed - ' . $e->getMessage(),
                self::RETRYABLE_CODE
            );
        }

        $statusCode = $response->getStatusCode();
        $responseBody = (string) $response->getBody();

        if ($statusCode !== 200) {
            throw new ApiException(
                $providerName . ': STS request failed with status ' . $statusCode
                . ($responseBody !== '' ? ' - ' . $responseBody : ''),
                $statusCode,
                $response->getHeaders(),
                $responseBody
            );
        }

        return $responseBody;
    }

    /**
     * Determines whether the exception is retryable.
     * Retries on: network errors (RETRYABLE_CODE), HTTP 5xx, HTTP 429.
     */
    private static function isRetryable(ApiException $e)
    {
        $code = $e->getCode();
        if ($code === self::RETRYABLE_CODE) {
            return true;
        }
        return $code === 429 || ($code >= 500 && $code < 600);
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

        return $base . ($query ? '/?' . $query : '');
    }
}
