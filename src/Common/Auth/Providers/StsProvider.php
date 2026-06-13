<?php

namespace Volcengine\Common\Auth\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7\Request;
use Volcengine\Common\HeaderSelector;
use Volcengine\Common\Error\ApiExceptionFactory;
use Volcengine\Common\Retry\Retryer;
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
    private $retryer;
    private $connectTimeout;
    private $readTimeout;

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
        $this->retryer = clone $this->config->getRetryer();
        $this->connectTimeout = 5;
        $this->readTimeout = 30;
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

        $client = new Client([
            'timeout' => $this->readTimeout,
            'connect_timeout' => $this->connectTimeout,
            'verify' => $this->config->getSslCaCert() ?: $this->config->getVerifySsl(),
            'http_errors' => false,
        ]);

        $retryCount = 0;
        $lastError = null;
        $lastResponse = null;
        $responseContent = null;
        while (true) {
            $signedHeaders = $this->config->getSigner()->sign($this->ak, $this->sk, $this->region, 'sts',
                '', $query, 'GET', '/', $headers);

            $request = new Request('GET',
                $this->schema . '://' . $this->host . '/' . ($query ? "?{$query}" : ''),
                $signedHeaders, '');

            try {
                $response = $client->send($request, [
                    'timeout' => $this->readTimeout,
                    'connect_timeout' => $this->connectTimeout,
                    'http_errors' => false,
                ]);
                $lastResponse = $response;
                $responseContent = (string) $response->getBody();
                $statusCode = $response->getStatusCode();
                if ($statusCode < 200 || $statusCode > 299) {
                    $lastError = ApiExceptionFactory::fromHttpResponse(
                        $statusCode,
                        $request->getUri(),
                        $response->getHeaders(),
                        $responseContent
                    );
                    $retryCandidate = $lastError;
                } else {
                    $decoded = json_decode($responseContent);
                    if (isset($decoded->{'ResponseMetadata'}->{'Error'})) {
                        $lastError = ApiExceptionFactory::fromServiceError(
                            $statusCode,
                            $request->getUri(),
                            $response->getHeaders(),
                            $responseContent
                        );
                        $retryCandidate = $lastError;
                    } else {
                        break;
                    }
                }
            } catch (RequestException $e) {
                $lastResponse = $e->getResponse();
                $lastError = ApiExceptionFactory::fromRequestException($e);
                $retryCandidate = $e;
            } catch (TransferException $e) {
                $lastError = ApiExceptionFactory::fromTransferException($e);
                $retryCandidate = $e;
            }

            if ($this->retryer === null || !$this->retryer->shouldRetry($lastResponse, $retryCount, $retryCandidate)) {
                throw $lastError;
            }

            $delayMs = $this->retryer->getRetryDelay($retryCount, $lastResponse);
            if ($delayMs > 0) {
                usleep((int) ($delayMs * 1000));
            }
            $retryCount++;
        }

        $content = json_decode($responseContent);
        $content = $content->{'Result'};

        return (array)$content->Credentials;
    }

    public function setRetryer(Retryer $retryer)
    {
        $this->retryer = $retryer;
        return $this;
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
}

?>
