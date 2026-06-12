<?php

namespace Volcengine\Common;

class PsrLoggerAdapter implements LoggerInterface
{
    private $logger;
    private $debug;
    private $logLevel;

    public function __construct($logger, $debug = false, $logLevel = SdkLogger::LOG_ALL)
    {
        $this->logger = $logger;
        $this->debug = (bool) $debug;
        $this->logLevel = $logLevel;
    }

    public static function supports($logger)
    {
        if (!is_object($logger)) {
            return false;
        }

        if (method_exists($logger, 'log')) {
            return true;
        }

        return method_exists($logger, 'debug')
            && method_exists($logger, 'info')
            && method_exists($logger, 'warning')
            && method_exists($logger, 'error');
    }

    public function setDebug($debug)
    {
        $this->debug = (bool) $debug;
        return $this;
    }

    public function setLogLevel($logLevel)
    {
        $this->logLevel = $logLevel;
        return $this;
    }

    public function isEnabled($mask)
    {
        return $this->debug && (($this->logLevel & $mask) === $mask || $this->logLevel === SdkLogger::LOG_ALL);
    }

    public function debug($category, $message, array $context = [])
    {
        $this->write('debug', $category, $message, $context);
    }

    public function info($category, $message, array $context = [])
    {
        $this->write('info', $category, $message, $context);
    }

    public function warning($category, $message, array $context = [])
    {
        $this->write('warning', $category, $message, $context);
    }

    public function error($category, $message, array $context = [])
    {
        $this->write('error', $category, $message, $context);
    }

    private function write($level, $category, $message, array $context)
    {
        if (!$this->debug) {
            return;
        }

        $context['sdk_category'] = $category;
        $formattedMessage = '[' . $category . '] ' . $message;

        if (method_exists($this->logger, $level)) {
            $this->logger->$level($formattedMessage, $context);
            return;
        }

        if (method_exists($this->logger, 'log')) {
            $this->logger->log($level, $formattedMessage, $context);
        }
    }
}
