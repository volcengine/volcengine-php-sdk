<?php

namespace Volcengine\Common;

class UniversalRequest extends UniversalInfo
{
    public function __construct($method = 'GET', $service = null, $version = null, $action = null, $contentType = self::CONTENT_TYPE_DEFAULT)
    {
        parent::__construct($method, $service, $version, $action, $contentType);
    }
}
