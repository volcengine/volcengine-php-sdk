<?php

namespace Volcengine\Common\Auth\Providers;

/**
 * Internal contract for STS providers that accept a Configuration proxy
 * fallback. A provider-specific proxy URL always takes precedence.
 *
 * @internal
 */
interface StsProxyConfigurableProvider
{
    /**
     * @param string|array|null $proxy Guzzle proxy option
     * @return $this
     */
    public function setProxyFallback($proxy);
}
