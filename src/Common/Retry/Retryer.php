<?php

namespace Volcengine\Common\Retry;

class Retryer
{
    private $numMaxRetries;
    private $backoffStrategy;
    private $retryCondition;

    public function __construct(
        $numMaxRetries = 3,
        BackoffStrategy $backoffStrategy = null,
        RetryCondition $retryCondition = null
    ) {
        $this->numMaxRetries = $numMaxRetries;
        $this->backoffStrategy = $backoffStrategy ?: new ExponentialWithRandomJitterBackoffStrategy();
        $this->retryCondition = $retryCondition ?: new DefaultRetryCondition();
    }

    public function getNumMaxRetries()
    {
        return $this->numMaxRetries;
    }

    public function setNumMaxRetries($numMaxRetries)
    {
        $this->numMaxRetries = $numMaxRetries;
        return $this;
    }

    public function getBackoffStrategy()
    {
        return $this->backoffStrategy;
    }

    public function setBackoffStrategy(BackoffStrategy $backoffStrategy = null)
    {
        $this->backoffStrategy = $backoffStrategy;
        return $this;
    }

    public function getRetryCondition()
    {
        return $this->retryCondition;
    }

    public function setRetryCondition(RetryCondition $retryCondition = null)
    {
        $this->retryCondition = $retryCondition;
        return $this;
    }

    public function shouldRetry($response, $retryCount, $error)
    {
        if ($retryCount < $this->numMaxRetries && $this->retryCondition !== null) {
            return $this->retryCondition->shouldRetry($response, $error);
        }
        return false;
    }

    public function getBackoffDelay($retryCount)
    {
        if ($retryCount >= $this->numMaxRetries) {
            throw new \InvalidArgumentException('Retry count exceeds maximum limit');
        }

        if ($this->backoffStrategy === null) {
            return 0.0;
        }

        return $this->backoffStrategy->computeDelay($retryCount);
    }

    public function getRetryDelay($retryCount, $response = null)
    {
        $backoffDelay = $this->getBackoffDelay($retryCount);
        $retryAfterDelay = $this->getRetryAfterDelay($response);
        if ($retryAfterDelay === null) {
            return $backoffDelay;
        }

        return max($backoffDelay, $retryAfterDelay);
    }

    private function getRetryAfterDelay($response)
    {
        if ($response === null || !method_exists($response, 'getHeaderLine')) {
            return null;
        }

        $retryAfter = $response->getHeaderLine('Retry-After');
        if ($retryAfter === '') {
            return null;
        }

        if (ctype_digit($retryAfter)) {
            return (float) $retryAfter * 1000;
        }

        $timestamp = strtotime($retryAfter);
        if ($timestamp === false) {
            return null;
        }

        $delaySeconds = $timestamp - time();
        if ($delaySeconds <= 0) {
            return 0.0;
        }

        return (float) $delaySeconds * 1000;
    }

    public function __clone()
    {
        if (is_object($this->backoffStrategy)) {
            $this->backoffStrategy = clone $this->backoffStrategy;
        }
        if (is_object($this->retryCondition)) {
            $this->retryCondition = clone $this->retryCondition;
        }
    }
}
