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
        return empty($this->proxyUrl) && empty($this->caFile) && !$this->insecureSkipVerify;
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
        if ($this->insecureSkipVerify) {
            $options['verify'] = false;
        } elseif (!empty($this->caFile)) {
            $this->assertCaFileReadable();
            $options['verify'] = $this->caFile;
        } else {
            $options['verify'] = true;
        }

        if (!empty($this->proxyUrl)) {
            $this->assertValidProxyUrl();
            $options['proxy'] = $this->proxyUrl;
        }

        return $options;
    }

    /**
     * @throws \InvalidArgumentException when the proxy URL has no scheme/host
     */
    private function assertValidProxyUrl()
    {
        $parts = parse_url($this->proxyUrl);
        if ($parts === false || empty($parts['scheme']) || empty($parts['host'])) {
            throw new \InvalidArgumentException(
                sprintf('invalid proxy url %s', var_export($this->proxyUrl, true))
            );
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
