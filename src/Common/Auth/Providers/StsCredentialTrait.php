<?php

namespace Volcengine\Common\Auth\Providers;

/**
 * Shared properties and setters for STS-based credential providers (OIDC, SAML).
 *
 * @internal
 */
trait StsCredentialTrait
{
    private $schema = 'https';
    private $maxRetries = StsFormRequest::DEFAULT_MAX_RETRIES;
    private $retryInterval = StsFormRequest::DEFAULT_RETRY_INTERVAL;

    /** @var StsHttpConfig|null proxy / TLS configuration for reaching the STS endpoint */
    private $httpConfig;

    /**
     * @param string $schema 'http' or 'https'
     * @return $this
     */
    public function setSchema($schema)
    {
        if ($schema !== 'http' && $schema !== 'https') {
            throw new \InvalidArgumentException("schema must be 'http' or 'https'");
        }
        $this->schema = $schema;
        return $this;
    }

    /**
     * @param int $maxRetries extra retry attempts; 0 = no retry
     * @return $this
     */
    public function setMaxRetries($maxRetries)
    {
        if ($maxRetries < 0) {
            throw new \InvalidArgumentException('maxRetries must be >= 0');
        }
        $this->maxRetries = $maxRetries;
        return $this;
    }

    /**
     * @param int $retryInterval seconds between retries
     * @return $this
     */
    public function setRetryInterval($retryInterval)
    {
        if ($retryInterval < 0) {
            throw new \InvalidArgumentException('retryInterval must be >= 0');
        }
        $this->retryInterval = $retryInterval;
        return $this;
    }

    /**
     * Set the forward proxy used to reach the STS endpoint.
     *
     * Format: scheme://[user:password@]host:port. Proxy credentials are sent
     * with Basic auth. Leave unset to use the Configuration proxy fallback
     * when supplied, then standard proxy environment variables.
     *
     * @param string|null $proxyUrl
     * @return $this
     */
    public function setProxyUrl($proxyUrl)
    {
        $this->httpConfig()->setProxyUrl($proxyUrl);
        return $this;
    }

    /**
     * @internal
     * @param string|array|null $proxy Guzzle proxy option inherited from Configuration
     * @return $this
     */
    public function setProxyFallback($proxy)
    {
        $this->httpConfig()->setProxyFallback($proxy);
        return $this;
    }

    /**
     * Set a custom CA bundle (PEM) used to verify the STS server certificate.
     *
     * @param string|null $caFile
     * @return $this
     */
    public function setCaFile($caFile)
    {
        $this->httpConfig()->setCaFile($caFile);
        return $this;
    }

    /**
     * Skip STS TLS certificate and hostname verification.
     *
     * WARNING: only for debugging; never enable in production. Use setCaFile()
     * to trust a private CA instead.
     *
     * @param bool $insecureSkipVerify
     * @return $this
     */
    public function setInsecureSkipVerify($insecureSkipVerify)
    {
        $this->httpConfig()->setInsecureSkipVerify($insecureSkipVerify);
        return $this;
    }

    /**
     * Lazily create the shared proxy / TLS config holder.
     *
     * @return StsHttpConfig
     */
    private function httpConfig()
    {
        if ($this->httpConfig === null) {
            $this->httpConfig = new StsHttpConfig();
        }
        return $this->httpConfig;
    }
}
