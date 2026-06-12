<?php

namespace Volcengine\Common\Retry;

class NoBackoffStrategy extends BackoffStrategy
{
    public function computeDelay($retryCount)
    {
        return 0.0;
    }
}
