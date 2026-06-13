<?php

namespace Volcengine\Common\Endpoint\Providers;

use Volcengine\Common\Endpoint\EndpointProvider;
use Volcengine\Common\Endpoint\ResolvedEndpoint;

class HostEndpointProvider extends EndpointProvider
{
    private $host;

    public function __construct($host)
    {
        $this->host = $host;
    }

    public function endpointFor($service, $region)
    {
        return new ResolvedEndpoint($this->host);
    }
}
