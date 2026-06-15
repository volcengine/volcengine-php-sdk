<?php

namespace Volcengine\Common;

class PsrLoggerAdapter implements LoggerInterface
{
    private $logger;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public static function supports($logger)
    {
        return is_object($logger)
            && (method_exists($logger, 'debug') || method_exists($logger, 'log'));
    }

    public function debug($message, array $context = [])
    {
        $this->call('debug', $message, $context);
    }

    private function call($level, $message, array $context)
    {
        if (method_exists($this->logger, $level)) {
            $this->logger->{$level}($message, $context);
            return;
        }

        if (method_exists($this->logger, 'log')) {
            $this->logger->log($level, $message, $context);
        }
    }
}
