<?php
namespace Volcengine\Common\Endpoint;

abstract class EndpointProvider
{
    abstract public function endpointFor($service, $region, $customBootstrapRegion = null, $useDualStack = null, array $options = []);
}


?>
