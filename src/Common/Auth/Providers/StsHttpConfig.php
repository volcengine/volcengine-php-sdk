<?php

namespace Volcengine\Common\Auth\Providers;

/**
 * Shared proxy / TLS configuration for STS credential providers
 * (AssumeRole, AssumeRoleWithOIDC, AssumeRoleWithSAML).
 *
 * Mirrors the Go SDK `ProxyConfig` (ProxyURL / CAFile / InsecureSkipVerify)
 * and maps the three parameters onto Guzzle request options:
 *
 *   - ProxyURL           -> Guzzle `proxy`  (curl handles Basic auth from userinfo)
 *   - CAFile             -> Guzzle `verify` (path to a custom PEM CA bundle)
 *   - InsecureSkipVerify -> Guzzle `verify` = false
 *
 * `verify` precedence matches Go's tls.Config semantics: when
 * InsecureSkipVerify is true, certificate verification is skipped regardless of
 * CAFile; otherwise CAFile (if set) is used; otherwise the system trust store
 * is used (`verify` = true).
 *
 * Validation is intentionally deferred to {@see applyTo()} (request build time)
 * so that an invalid ProxyURL or unreadable CAFile surfaces when credentials are
 * fetched, aligning with the Go SDK where buildProxyTransport() returns the
 * error at transport construction.
 *
 * @internal This class is not part of the public API.
 */
class StsHttpConfig
{
    /** @var string|null forward proxy URL, scheme://[user:password@]host:port */
    private $proxyUrl;

    /** @var string|array|null fallback proxy inherited from Configuration */
    private $proxyFallback;

    /** @var bool whether Configuration supplied a non-null proxy value */
    private $proxyFallbackSet = false;

    /** @var string|null custom CA bundle path (PEM) used to verify the STS server certificate */
    private $caFile;

    /** @var bool skip TLS certificate/hostname verification (debugging only) */
    private $insecureSkipVerify = false;

    /**
     * @param string|null $proxyUrl
     * @return $this
     */
    public function setProxyUrl($proxyUrl)
    {
        $this->proxyUrl = $proxyUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProxyUrl()
    {
        return $this->proxyUrl;
    }

    /**
     * Set the lower-priority proxy inherited from the SDK Configuration.
     *
     * @param string|array|null $proxy Guzzle proxy option
     * @return $this
     */
    public function setProxyFallback($proxy)
    {
        $this->proxyFallback = $proxy;
        $this->proxyFallbackSet = $proxy !== null;
        return $this;
    }

    /**
     * @param string|null $caFile
     * @return $this
     */
    public function setCaFile($caFile)
    {
        $this->caFile = $caFile;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCaFile()
    {
        return $this->caFile;
    }

    /**
     * @param bool $insecureSkipVerify
     * @return $this
     */
    public function setInsecureSkipVerify($insecureSkipVerify)
    {
        $this->insecureSkipVerify = (bool) $insecureSkipVerify;
        return $this;
    }

    /**
     * @return bool
     */
    public function getInsecureSkipVerify()
    {
        return $this->insecureSkipVerify;
    }

    /**
     * Returns true when none of the three parameters is explicitly configured.
     * Mirrors Go's ProxyConfig.IsZero().
     *
     * @return bool
     */
    public function isZero()
    {
        return !$this->hasValue($this->proxyUrl)
            && !$this->proxyFallbackSet
            && !$this->hasValue($this->caFile)
            && !$this->insecureSkipVerify;
    }

    /**
     * Apply proxy / TLS settings onto a Guzzle client options array.
     *
     * @param array $options existing Guzzle options
     * @return array options with `verify` (always) and `proxy` (when set) populated
     * @throws \InvalidArgumentException on an invalid ProxyURL or unreadable CAFile
     */
    public function applyTo(array $options)
    {
        if ($this->hasValue($this->caFile)) {
            // Go validates CAFile while building the transport even when
            // certificate verification is subsequently disabled.
            $this->assertCaFileReadable();
        }

        if ($this->insecureSkipVerify) {
            $options['verify'] = false;
        } elseif ($this->hasValue($this->caFile)) {
            $options['verify'] = $this->caFile;
        } else {
            $options['verify'] = true;
        }

        if ($this->hasValue($this->proxyUrl)) {
            $this->assertValidProxyUrl();
            $options['proxy'] = $this->proxyUrl;
        } elseif ($this->proxyFallbackSet) {
            $options['proxy'] = $this->proxyFallback;
        }

        return $options;
    }

    /**
     * Treat only null and the empty string as unset. In particular, "0" is
     * configured input and must reach the existing validation.
     *
     * @param mixed $value
     * @return bool
     */
    private function hasValue($value)
    {
        return $value !== null && $value !== '';
    }

    /**
     * @throws \InvalidArgumentException when the proxy URL has no scheme/host
     */
    private function assertValidProxyUrl()
    {
        $parts = parse_url($this->proxyUrl);
        if ($parts === false || empty($parts['scheme']) || empty($parts['host'])) {
            throw new \InvalidArgumentException('invalid proxy url');
        }
    }

    /**
     * @throws \InvalidArgumentException when the CA file cannot be read
     */
    private function assertCaFileReadable()
    {
        if (!is_file($this->caFile) || !is_readable($this->caFile)) {
            throw new \InvalidArgumentException(
                sprintf('read CAFile %s failed', var_export($this->caFile, true))
            );
        }
    }
}
