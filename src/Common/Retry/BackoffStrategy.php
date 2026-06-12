<?php

namespace Volcengine\Common\Retry;

abstract class BackoffStrategy
{
    protected $minRetryDelayMs;
    protected $maxRetryDelayMs;

    public function __construct($minRetryDelayMs = 300, $maxRetryDelayMs = 300000)
    {
        $this->minRetryDelayMs = $minRetryDelayMs;
        $this->maxRetryDelayMs = $maxRetryDelayMs;
    }

    public function getMinRetryDelayMs()
    {
        return $this->minRetryDelayMs;
    }

    public function setMinRetryDelayMs($minRetryDelayMs)
    {
        $this->minRetryDelayMs = $minRetryDelayMs;
        return $this;
    }

    public function getMaxRetryDelayMs()
    {
        return $this->maxRetryDelayMs;
    }

    public function setMaxRetryDelayMs($maxRetryDelayMs)
    {
        $this->maxRetryDelayMs = $maxRetryDelayMs;
        return $this;
    }

    abstract public function computeDelay($retryCount);
}
