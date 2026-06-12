<?php

namespace Volcengine\Common\Retry;

class ExponentialWithRandomJitterBackoffStrategy extends ExponentialBackoffStrategy
{
    public function computeDelay($retryCount)
    {
        $base = parent::computeDelay($retryCount);
        if ($base <= 0) {
            return 0.0;
        }

        $jitter = $base + mt_rand(0, (int) $base);
        return min($this->maxRetryDelayMs, $jitter);
    }
}
