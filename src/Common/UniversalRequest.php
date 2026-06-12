<?php

namespace Volcengine\Common;

class UniversalRequest extends UniversalInfo
{
    public $body;

    public function __construct($method = null, $service = null, $version = null, $action = null, $contentType = null, array $body = [])
    {
        parent::__construct($method, $service, $version, $action, $contentType);
        $this->body = $body;
    }

    public function setBody(array $body)
    {
        $this->body = $body;
        return $this;
    }
}
