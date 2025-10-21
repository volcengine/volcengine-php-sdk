<?php

namespace Volcengine\Common\Retryer;

class Retryer
{
    public $numMaxRetries;
    public $backoffStrategy;
    public $retryCondition;

    private static $DEFAULT_BACKOFF_STRATEGY;
    private static $DEFAULT_RETRY_CONDITION;

    public static function initDefaults()
    {
        if (self::$DEFAULT_BACKOFF_STRATEGY === null) {
            self::$DEFAULT_BACKOFF_STRATEGY = new ExponentialWithRandomJitterBackoffStrategy(
                300,           // min_retry_delay_ms
                300 * 1000     // max_retry_delay_ms
            );
        }

        if (self::$DEFAULT_RETRY_CONDITION === null) {
            self::$DEFAULT_RETRY_CONDITION = new DefaultRetryCondition([]);
        }
    }

    public function __construct(
        $numMaxRetries = 3,
        $backoffStrategy = null,
        $retryCondition = null
    )
    {
        self::initDefaults();

        $this->numMaxRetries = $numMaxRetries;
        $this->backoffStrategy = $backoffStrategy ?: self::$DEFAULT_BACKOFF_STRATEGY;
        $this->retryCondition = $retryCondition ?: self::$DEFAULT_RETRY_CONDITION;
    }

    public function shouldRetry($response, $retryCount, $err)
    {
        if ($retryCount < $this->numMaxRetries && $this->retryCondition !== null) {
            return $this->retryCondition->shouldRetry($response, $err);
        }
        return false;
    }

    public function getBackoffDelay($retryCount)
    {

        if ($this->backoffStrategy !== null) {
            return $this->backoffStrategy->computeDelay($retryCount);
        }

        return 0.0;
    }
}


