<?php

namespace Volcengine\Common;

class UniversalInfo
{
    public $method;
    public $service;
    public $version;
    public $action;
    public $contentType;

    public function __construct($method = null, $service = null, $version = null, $action = null, $contentType = null)
    {
        $this->method = $method;
        $this->service = $service;
        $this->version = $version;
        $this->action = $action;
        $this->contentType = $contentType;
    }
}
