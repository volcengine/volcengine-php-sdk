<?php

namespace Volcengine\Common;

class Waiter
{
    private $maxAttempts;
    private $delayStrategy;
    private $logger;

    public function __construct($maxAttempts = 20, $delayStrategy = null, $logger = null)
    {
        $this->maxAttempts = $maxAttempts;
        $this->delayStrategy = $delayStrategy ?: function ($attempt) {
            return 1;
        };
        $this->setLogger($logger);
    }

    public function setMaxAttempts($maxAttempts)
    {
        $this->maxAttempts = $maxAttempts;
        return $this;
    }

    public function setDelayStrategy(callable $delayStrategy)
    {
        $this->delayStrategy = $delayStrategy;
        return $this;
    }

    public function setLogger($logger)
    {
        if ($logger !== null && !$logger instanceof LoggerInterface) {
            if (PsrLoggerAdapter::supports($logger)) {
                $logger = new PsrLoggerAdapter($logger, true, SdkLogger::LOG_ALL);
            } else {
                throw new \InvalidArgumentException('Logger must implement Volcengine\\Common\\LoggerInterface or expose a PSR-3 compatible API');
            }
        }

        $this->logger = $logger;
        return $this;
    }

    public function wait(callable $poller, callable $acceptor)
    {
        $lastResult = null;
        for ($attempt = 1; $attempt <= $this->maxAttempts; $attempt++) {
            $lastResult = $poller($attempt);
            if ($acceptor($lastResult, $attempt)) {
                return $lastResult;
            }

            if ($attempt < $this->maxAttempts) {
                $delay = (float) call_user_func($this->delayStrategy, $attempt);
                LogHelper::debug($this->logger, SdkLogger::LOG_RETRY, 'Waiter', 'attempt {attempt} not ready, sleeping {delay}s', [
                    'attempt' => $attempt,
                    'delay' => $delay,
                ]);
                if ($delay > 0) {
                    usleep((int) ($delay * 1000000));
                }
            }
        }

        throw new \RuntimeException('ResourceNotReady: exceeded wait attempts');
    }

    public static function constantDelay($delaySeconds)
    {
        return function ($attempt) use ($delaySeconds) {
            return $delaySeconds;
        };
    }
}
