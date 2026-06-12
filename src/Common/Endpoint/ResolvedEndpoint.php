<?php

namespace Volcengine\Common\Endpoint;

class ResolvedEndpoint
{
    public $host;

    public function __construct($host)
    {
        $this->host = $host;
    }

    public function urlFor($schema = 'https')
    {
        return $schema . '://' . $this->host;
    }
}
