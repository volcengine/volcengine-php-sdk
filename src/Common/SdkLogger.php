<?php

namespace Volcengine\Common;

class SdkLogger implements LoggerInterface
{
    const LOG_NONE = 0;
    const LOG_REQUEST = 1;
    const LOG_REQUEST_BODY = 2;
    const LOG_REQUEST_ID = 4;
    const LOG_ENDPOINT = 8;
    const LOG_CONFIG = 16;
    const LOG_SIGNING = 32;
    const LOG_RETRY = 64;
    const LOG_RESPONSE = 128;
    const LOG_RESPONSE_BODY = 256;
    const LOG_ERROR = 512;
    const LOG_ALL = 1023;

    private $debug;
    private $logLevel;
    private $stream;

    public function __construct($debug = false, $logLevel = self::LOG_NONE, $stream = null)
    {
        $this->debug = (bool) $debug;
        $this->logLevel = $logLevel;
        $this->stream = $stream ?: fopen('php://stderr', 'a');
    }

    public function setDebug($debug)
    {
        $this->debug = (bool) $debug;
        return $this;
    }

    public function isDebug()
    {
        return $this->debug;
    }

    public function setLogLevel($logLevel)
    {
        $this->logLevel = $logLevel;
        return $this;
    }

    public function getLogLevel()
    {
        return $this->logLevel;
    }

    public function setStream($stream)
    {
        $this->stream = $stream;
        return $this;
    }

    public function debug($category, $message, array $context = [])
    {
        $this->write('DEBUG', $category, $message, $context);
    }

    public function info($category, $message, array $context = [])
    {
        $this->write('INFO', $category, $message, $context);
    }

    public function warning($category, $message, array $context = [])
    {
        $this->write('WARN', $category, $message, $context);
    }

    public function error($category, $message, array $context = [])
    {
        $this->write('ERROR', $category, $message, $context);
    }

    public function isEnabled($mask)
    {
        return $this->debug && (($this->logLevel & $mask) === $mask || $this->logLevel === self::LOG_ALL);
    }

    private function write($level, $category, $message, array $context)
    {
        if (!$this->debug) {
            return;
        }

        $line = sprintf(
            "[%s] [%s] %s",
            $level,
            $category,
            $this->interpolate($message, $context)
        );

        if (is_resource($this->stream)) {
            fwrite($this->stream, $line . PHP_EOL);
            return;
        }

        error_log($line);
    }

    private function interpolate($message, array $context)
    {
        if (empty($context)) {
            return $message;
        }

        $replace = [];
        foreach ($context as $key => $value) {
            if (is_scalar($value) || $value === null) {
                $replace['{' . $key . '}'] = (string) $value;
            } else {
                $replace['{' . $key . '}'] = json_encode($value);
            }
        }

        return strtr($message, $replace);
    }
}
