<?php

namespace Volcengine\Common\Retry;

class ExponentialBackoffStrategy extends BackoffStrategy
{
    public function computeDelay($retryCount)
    {
        return min(
            $this->minRetryDelayMs * pow(2, $retryCount),
            $this->maxRetryDelayMs
        );
    }
}
