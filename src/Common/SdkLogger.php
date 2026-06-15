<?php

namespace Volcengine\Common;

class SdkLogger
{
    const LOG_NONE = 0;
    const LOG_REQUEST = 1;
    const LOG_RESPONSE = 2;
    const LOG_RETRY = 4;
    const LOG_SIGNING = 8;
    const LOG_ENDPOINT = 16;
    const LOG_ALL = 31;

    private $stream;

    public function __construct($stream = null)
    {
        $this->stream = $stream ?: fopen('php://stderr', 'a');
    }

    public function setStream($stream)
    {
        $this->stream = $stream;
        return $this;
    }

    public function debug($message, array $context = [])
    {
        $this->write('DEBUG', $message, $context);
    }

    private function write($severity, $message, array $context)
    {
        if (!$this->stream) {
            return;
        }

        $line = '[' . date('c') . '] ' . $severity . ' ' . LogHelper::interpolate($message, $context) . PHP_EOL;
        fwrite($this->stream, $line);
    }
}
