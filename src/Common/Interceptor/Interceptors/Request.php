<?php

namespace Volcengine\Common\Interceptor\Interceptors;

class Request
{
    public $method;
    public $url;
    public $headers = [];
    public $body;
    public $queryParams = [];
    public $collectionFormats = [];
    public $pathParams;
    public $resourcePath;
    public $md;
    public $files;
    public $truePath;
    public $service;
    public $ak;
    public $sk;
    public $host;
    public $sessionToken;
    public $region;
    public $schema;
    public $endpointProvider;
    public $customBootstrapRegion;
    public $useDualStack;
    public $autoRetry = true;
    public $retryer;
    public $credentialProvider;
    public $runtimeOptions;
    public $connectTimeout;
    public $readTimeout;
    public $verifySsl;
    public $sslCaCert;
    public $certFile;
    public $keyFile;
    public $assertHostname;
    public $proxy;
    public $httpProxy;
    public $httpsProxy;
    public $logger;
    public $logLevel;
    public $model;
    public $realRequest;
    public $options;
    public $returnType;
    public $getDebug;
    public $getDebugFile;
    public $httpBody;
    public $query;
    public $isPresigned = false;
    public $presignedUrl;
    public $invocationId;
    public $retryCount = 0;

    public function __construct()
    {
        $this->invocationId = self::generateInvocationId();
    }

    private static function generateInvocationId()
    {
        $bytes = false;
        if (function_exists('random_bytes')) {
            try {
                $bytes = random_bytes(16);
            } catch (\Exception $e) {
                // No secure randomness source available; fall through to the
                // weaker sources below. The invocation id only correlates
                // retries, so cryptographic strength is not required.
                $bytes = false;
            }
        }
        if ($bytes === false && function_exists('openssl_random_pseudo_bytes')) {
            try {
                // Returns false on failure before PHP 8.0, throws from 8.0 on.
                $bytes = openssl_random_pseudo_bytes(16);
            } catch (\Exception $e) {
                $bytes = false;
            }
        }
        if ($bytes === false || strlen($bytes) !== 16) {
            $bytes = md5(uniqid(mt_rand(), true), true);
        }

        $bytes[6] = chr((ord($bytes[6]) & 0x0f) | 0x40);
        $bytes[8] = chr((ord($bytes[8]) & 0x3f) | 0x80);
        $hex = bin2hex($bytes);

        return substr($hex, 0, 8) . '-' . substr($hex, 8, 4) . '-' . substr($hex, 12, 4) . '-'
            . substr($hex, 16, 4) . '-' . substr($hex, 20, 12);
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function getCollectionFormats()
    {
        return $this->collectionFormats;
    }

    public function setCollectionFormats($collectionFormats)
    {
        $this->collectionFormats = $collectionFormats;
        return $this;
    }

    public function getPathParams()
    {
        return $this->pathParams;
    }

    public function setPathParams($pathParams)
    {
        $this->pathParams = $pathParams;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }

    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function getQueryParams()
    {
        return $this->queryParams;
    }

    public function setQueryParams($queryParams)
    {
        $this->queryParams = $queryParams;
        return $this;
    }

    public function addQueryParam($key, $value)
    {
        $this->queryParams[$key] = $value;
        return $this;
    }
}
