<?php
namespace Volcengine\Common\Endpoint;

require_once __DIR__ . '/ResolvedEndpoint.php';

abstract class EndpointProvider
{
    abstract public function endpointFor($service, $region);
}


?>
