<?php

namespace Volcengine\Common\Auth\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7\Request;
use Volcengine\Common\ApiException;
use Volcengine\Common\HeaderSelector;
use Volcengine\Common\Utils;
use Volcengine\Common\Retry\Retryer;

class StsProvider extends Provider implements StsProxyConfigurableProvider
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

    /** @var StsHttpConfig proxy / TLS configuration for reaching the STS endpoint */
    private $httpConfig;

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
        $this->httpConfig = new StsHttpConfig();
    }

    /**
     * @internal Create a client-local proxy/TLS snapshot.
     * @param string|array|null $proxy
     * @return static
     */
    public function bindToProxy($proxy)
    {
        $bound = clone $this;
        $bound->httpConfig = clone $this->httpConfig;
        $bound->httpConfig->setProxyFallback($proxy);
        // Only User-Agent is read from this Configuration during STS requests.
        $bound->config = clone $this->config;
        return $bound;
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

        $request = new Request('GET',
            $this->schema . '://' . $this->host . '/' . ($query ? "?{$query}" : ''),
            $headers, '');

        return StsResponse::credentials($this->sendWithRetry($request));
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

    /**
     * Set the forward proxy used to reach the STS endpoint.
     *
     * Format: scheme://[user:password@]host:port. Proxy credentials are sent
     * with Basic auth. Leave unset to use the Configuration proxy fallback
     * when supplied, then standard proxy environment variables.
     *
     * @param string|null $proxyUrl
     * @return $this
     */
    public function setProxyUrl($proxyUrl)
    {
        $this->httpConfig->setProxyUrl($proxyUrl);
        return $this;
    }

    /**
     * @internal
     * @param string|array|null $proxy Guzzle proxy option inherited from Configuration
     * @return $this
     */
    public function setProxyFallback($proxy)
    {
        $this->httpConfig->setProxyFallback($proxy);
        return $this;
    }

    /**
     * Set a custom CA bundle (PEM) used to verify the STS server certificate.
     * Useful when a corporate proxy performs TLS interception with a private CA
     * that is not installed in the system trust store.
     *
     * @param string|null $caFile
     * @return $this
     */
    public function setCaFile($caFile)
    {
        $this->httpConfig->setCaFile($caFile);
        return $this;
    }

    /**
     * Skip STS TLS certificate and hostname verification.
     *
     * WARNING: only for debugging (self-signed certs / proxy interception).
     * Never enable in production; use setCaFile() instead.
     *
     * @param bool $insecureSkipVerify
     * @return $this
     */
    public function setInsecureSkipVerify($insecureSkipVerify)
    {
        $this->httpConfig->setInsecureSkipVerify($insecureSkipVerify);
        return $this;
    }

    private function sendWithRetry(Request $request)
    {
        $clientOptions = $this->httpConfig->applyTo([
            'timeout' => $this->readTimeout,
            'connect_timeout' => $this->connectTimeout,
            'http_errors' => false,
        ]);
        $client = new Client($clientOptions);
        $lastException = null;
        $retryer = new Retryer($this->maxRetries, 0, 0);

        $sendOptions = [
            'timeout' => $this->readTimeout,
            'connect_timeout' => $this->connectTimeout,
            'http_errors' => false,
        ];

        for ($attempt = 0; $attempt <= $this->maxRetries; $attempt++) {
            try {
                $headers = Utils::signv4($this->ak, $this->sk, $this->region, 'sts',
                    '', $request->getUri()->getQuery(), 'GET', '/', $request->getHeaders());
                $signedRequest = new Request('GET', $request->getUri(), $headers, '');
                $response = $client->send($signedRequest, $sendOptions);
                return StsResponse::read($response, $request->getUri());
            } catch (RequestException $e) {
                $lastException = ApiException::fromRequestException($e);
            } catch (TransferException $e) {
                $lastException = ApiException::fromTransferError("[{$e->getCode()}] {$e->getMessage()}", $e->getCode(), null, null, $e);
            } catch (ApiException $e) {
                $lastException = $e;
            }
            if (!$retryer->shouldRetry(null, $attempt, $lastException)) {
                throw $lastException;
            }

            if ($attempt < $this->maxRetries && $this->retryInterval > 0) {
                sleep($this->retryInterval);
            }
        }

        throw $lastException;
    }

}
