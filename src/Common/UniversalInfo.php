<?php

namespace Volcengine\Common;

class UniversalInfo
{
    const CONTENT_TYPE_DEFAULT = '';
    const CONTENT_TYPE_JSON = 'application/json';
    const CONTENT_TYPE_FORM = 'x-www-form-urlencoded';

    public $method;
    public $service;
    public $version;
    public $action;
    public $contentType;

    public function __construct($method = 'GET', $service = null, $version = null, $action = null, $contentType = self::CONTENT_TYPE_DEFAULT)
    {
        $this->method = $method;
        $this->service = $service;
        $this->version = $version;
        $this->action = $action;
        $this->contentType = $contentType;
    }
}
