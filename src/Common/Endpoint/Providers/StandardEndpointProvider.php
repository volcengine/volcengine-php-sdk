<?php

namespace Volcengine\Common\Endpoint\Providers;

use Volcengine\Common\Endpoint\EndpointProvider;
use Volcengine\Common\Endpoint\ResolvedEndpoint;

class StandardEndpointProvider extends EndpointProvider
{
    public function endpointFor($service, $region, $customBootstrapRegion = null, $useDualStack = null)
    {
        $suffix = self::hasEnabledDualstack($useDualStack) ? DUALSTACK_ENDPOINT_SUFFIX : ENDPOINT_SUFFIX;
        $defaultProvider = new DefaultEndpointProvider();
        $host = $defaultProvider->getDefaultEndpoint($service, $region, $suffix);
        return new ResolvedEndpoint($host);
    }

    private static function hasEnabledDualstack($useDualStack)
    {
        if ($useDualStack === null) {
            return getenv("VOLC_ENABLE_DUALSTACK") == 'true';
        }
        return $useDualStack;
    }
}
