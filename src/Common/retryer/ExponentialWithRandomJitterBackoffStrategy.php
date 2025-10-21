<?php

namespace Volcengine\Common\Retryer;

class ExponentialWithRandomJitterBackoffStrategy
{
    public $minRetryDelayMs;
    public $maxRetryDelayMs;
    public $jitterRatio;

    public function __construct($minRetryDelayMs, $maxRetryDelayMs, $jitterRatio = 0.2)
    {
        $this->minRetryDelayMs = $minRetryDelayMs;
        $this->maxRetryDelayMs = $maxRetryDelayMs;
        $this->jitterRatio = $jitterRatio;
    }

    public function computeDelay($retryCount)
    {
        // 基础延迟时间 = min_retry_delay_ms * (2 ^ retry_count)
        $delay = $this->minRetryDelayMs * pow(2, $retryCount);

        // 应用最大延迟限制
        $delay = min($delay, $this->maxRetryDelayMs);

        // 添加随机抖动
        $jitter = $delay * $this->jitterRatio;
        $minDelay = $delay - $jitter;
        $maxDelay = $delay + $jitter;

        // 确保不小于最小延迟
        $minDelay = max($minDelay, $this->minRetryDelayMs);
        $maxDelay = min($maxDelay, $this->maxRetryDelayMs);

        // 生成随机延迟
        $randomDelay = mt_rand($minDelay * 1000, $maxDelay * 1000) / 1000;

        return $randomDelay;
    }

    public function getMinRetryDelayMs()
    {
        return $this->minRetryDelayMs;
    }

    public function getMaxRetryDelayMs()
    {
        return $this->maxRetryDelayMs;
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
}