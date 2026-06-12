<?php

namespace Volcengine\Common\Retry;

class NoOpRetryer extends Retryer
{
    public function __construct()
    {
        parent::__construct(0, new NoBackoffStrategy(), null);
    }

    public function shouldRetry($response, $retryCount, $error)
    {
        return false;
    }

    public function getBackoffDelay($retryCount)
    {
        return 0.0;
    }

    public function getRetryDelay($retryCount, $response = null)
    {
        return 0.0;
    }
}
