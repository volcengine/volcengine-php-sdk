<?php

namespace Volcengine\Common\Endpoint\Providers;

class StandProviderError extends \Exception
{
    private $errorCode;

    public function __construct($errorCode, $message)
    {
        parent::__construct($errorCode . ': ' . $message);
        $this->errorCode = $errorCode;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }
}
