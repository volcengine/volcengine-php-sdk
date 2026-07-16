<?php

namespace Volcengine\Common\Auth\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7\Request;
use Volcengine\Common\ApiException;
use Volcengine\Common\HeaderSelector;
use Volcengine\Common\Utils;

class StsProvider extends Provider
{
    private $ak;
    private $sk;
    private $roleName;
    private $accountId;
    private $durationSeconds;
    private $host;
    private $region;
    private $schema;
    private $policy;
    private $headerSelector;
    private $config;
    private $connectTimeout = 5;
    private $readTimeout = 30;
    private $maxRetries = 3;
    private $retryInterval = 1;

    public function __construct(
        $ak,
        $sk,
        $roleName,
        $accountId,
        $region = 'cn-north-1',
        $durationSeconds = 3600,
        $schema = 'https',
        $host = 'sts.volcengineapi.com',
        $policy = null,
        $selector = null
    )
    {
        $this->ak = $ak;
        $this->sk = $sk;
        $this->roleName = $roleName;
        $this->accountId = $accountId;
        $this->durationSeconds = $durationSeconds;
        $this->host = $host;
        $this->region = $region;
        $this->schema = $schema;
        $this->policy = $policy;
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->config = \Volcengine\Common\Configuration::getDefaultConfiguration();
    }

    public function getCredentials()
    {
        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['text/plain']
        );
        $defaultHeaders = [];
        $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        $headers = array_merge(
            $defaultHeaders,
            $headers
        );
        $queryParams = [
            'Action' => "AssumeRole",
            'Version' => '2018-01-01',
            'DurationSeconds' => $this->durationSeconds,
            'RoleSessionName' => uniqid('', true),
            'RoleTrn' => 'trn:iam::' . $this->accountId . ':role/' . $this->roleName
        ];

        if ($this->policy !== null) {
            $queryParams['Policy'] = $this->policy;
        }

        $query = '';
        ksort($queryParams);  // sort query first
        foreach ($queryParams as $k => $v) {
            $query .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
        }
        $query = substr($query, 0, -1);

        $headers = Utils::signv4($this->ak, $this->sk, $this->region, 'sts',
            '', $query, 'GET', '/', $headers);

        $request = new Request('GET',
            $this->schema . '://' . $this->host . '/' . ($query ? "?{$query}" : ''),
            $headers, '');

        $response = $this->sendWithRetry($request);
        $statusCode = $response->getStatusCode();
        if ($statusCode < 200 || $statusCode > 299) {
            throw $this->apiExceptionFromResponse($request, $response);
        }
        $responseContent = $response->getBody()->getContents();
        $content = json_decode($responseContent);

        if (isset($content->{'ResponseMetadata'}->{'Error'})) {
            throw new ApiException(
                sprintf(
                    '[%d] Return Error From the API (%s)(%s)',
                    $statusCode,
                    $request->getUri(),
                    $response->getBody()
                ),
                $statusCode,
                $response->getHeaders(),
                $responseContent);
        }

        $content = $content->{'Result'};

        return (array)$content->Credentials;
    }

    public function setConnectTimeout($connectTimeout)
    {
        $this->connectTimeout = $connectTimeout;
        return $this;
    }

    public function setReadTimeout($readTimeout)
    {
        $this->readTimeout = $readTimeout;
        return $this;
    }

    public function setMaxRetries($maxRetries)
    {
        if ($maxRetries < 0) {
            throw new \InvalidArgumentException('maxRetries must be >= 0');
        }
        $this->maxRetries = $maxRetries;
        return $this;
    }

    public function setRetryInterval($retryInterval)
    {
        if ($retryInterval < 0) {
            throw new \InvalidArgumentException('retryInterval must be >= 0');
        }
        $this->retryInterval = $retryInterval;
        return $this;
    }

    private function sendWithRetry(Request $request)
    {
        $client = new Client([
            'timeout' => $this->readTimeout,
            'connect_timeout' => $this->connectTimeout,
            'verify' => true,
            'http_errors' => false,
        ]);
        $lastException = null;

        for ($attempt = 0; $attempt <= $this->maxRetries; $attempt++) {
            try {
                $response = $client->send($request, [
                    'timeout' => $this->readTimeout,
                    'connect_timeout' => $this->connectTimeout,
                    'http_errors' => false,
                ]);

                if (!$this->isRetryableStatusCode($response->getStatusCode()) || $attempt >= $this->maxRetries) {
                    return $response;
                }

                $lastException = $this->apiExceptionFromResponse($request, $response);
            } catch (RequestException $e) {
                $lastException = $this->apiExceptionFromRequestException($e);
                if (!$this->isRetryableRequestException($e) || $attempt >= $this->maxRetries) {
                    throw $lastException;
                }
            } catch (TransferException $e) {
                $lastException = new ApiException("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), null, null);
                if ($attempt >= $this->maxRetries) {
                    throw $lastException;
                }
            }

            if ($attempt < $this->maxRetries && $this->retryInterval > 0) {
                sleep($this->retryInterval);
            }
        }

        throw $lastException;
    }

    private function isRetryableStatusCode($statusCode)
    {
        $statusCode = (int) $statusCode;
        return $statusCode === 429 || ($statusCode >= 500 && $statusCode < 600);
    }

    private function isRetryableRequestException(RequestException $e)
    {
        $response = $e->getResponse();
        if ($response === null) {
            return true;
        }
        return $this->isRetryableStatusCode($response->getStatusCode());
    }

    private function apiExceptionFromRequestException(RequestException $e)
    {
        return new ApiException(
            "[{$e->getCode()}] {$e->getMessage()}",
            $e->getCode(),
            $e->getResponse() ? $e->getResponse()->getHeaders() : null,
            $e->getResponse() ? (string) $e->getResponse()->getBody() : null
        );
    }

    private function apiExceptionFromResponse(Request $request, $response)
    {
        $body = (string) $response->getBody();
        return new ApiException(
            sprintf(
                '[%d] Error connecting to the API (%s)(%s)',
                $response->getStatusCode(),
                $request->getUri(),
                $body
            ),
            $response->getStatusCode(),
            $response->getHeaders(),
            $body
        );
    }
}
