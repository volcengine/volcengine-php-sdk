<?php
namespace Volcengine\Common\Auth\Endpoint;

abstract class EndpointProvider
{
    abstract public function endpointFor($service, $region);
}

class ResolvedEndpoint
{
    public $host;

    public function __construct($host)
    {
        $this->host = $host;
    }

    public function urlFor($scheme = 'https')
    {
        return $scheme . '://' . $this->host;
    }
}


?>
