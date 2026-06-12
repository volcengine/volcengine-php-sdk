<?php

namespace Volcengine\Common\Retry;

abstract class RetryCondition
{
    protected $retryErrorCodes;

    public function __construct($retryErrorCodes = [])
    {
        $this->retryErrorCodes = array_values(array_unique($retryErrorCodes ?: []));
    }

    public function getRetryErrorCodes()
    {
        return $this->retryErrorCodes;
    }

    public function setRetryErrorCodes($retryErrorCodes)
    {
        $this->retryErrorCodes = array_values(array_unique($retryErrorCodes ?: []));
        return $this;
    }

    abstract public function shouldRetry($response, $error);
}
