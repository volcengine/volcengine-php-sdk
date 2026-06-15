<?php

namespace Volcengine\Common;

class RuntimeOptions
{
    public $ak;
    public $sk;
    public $sessionToken;
    public $region;
    public $schema;
    public $connectTimeout;
    public $readTimeout;
    public $endpointProvider;
    public $autoRetry;
    public $numMaxRetries;
    public $backoffStrategy;
    public $retryCondition;
    public $retryErrorCodes;
    public $minRetryDelayMs;
    public $maxRetryDelayMs;
    public $extraQueryParameters;
    public $extraJsonBody;

    public function setAk($ak)
    {
        $this->ak = $ak;
        return $this;
    }

    public function setSk($sk)
    {
        $this->sk = $sk;
        return $this;
    }

    public function setSessionToken($sessionToken)
    {
        $this->sessionToken = $sessionToken;
        return $this;
    }

    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    public function setSchema($schema)
    {
        $this->schema = $schema;
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

    public function setEndpointProvider($endpointProvider)
    {
        $this->endpointProvider = $endpointProvider;
        return $this;
    }

    public function setAutoRetry($autoRetry)
    {
        $this->autoRetry = $autoRetry;
        return $this;
    }

    public function setNumMaxRetries($numMaxRetries)
    {
        $this->numMaxRetries = $numMaxRetries;
        return $this;
    }

    public function setBackoffStrategy($backoffStrategy)
    {
        $this->backoffStrategy = $backoffStrategy;
        return $this;
    }

    public function setRetryCondition($retryCondition)
    {
        $this->retryCondition = $retryCondition;
        return $this;
    }

    public function setRetryErrorCodes($retryErrorCodes)
    {
        $this->retryErrorCodes = $retryErrorCodes;
        return $this;
    }

    public function setMinRetryDelayMs($minRetryDelayMs)
    {
        $this->minRetryDelayMs = $minRetryDelayMs;
        return $this;
    }

    public function setMaxRetryDelayMs($maxRetryDelayMs)
    {
        $this->maxRetryDelayMs = $maxRetryDelayMs;
        return $this;
    }

    public function setExtraQueryParameters(array $extraQueryParameters)
    {
        $this->extraQueryParameters = $extraQueryParameters;
        return $this;
    }

    public function setExtraJsonBody(array $extraJsonBody)
    {
        $this->extraJsonBody = $extraJsonBody;
        return $this;
    }

}
