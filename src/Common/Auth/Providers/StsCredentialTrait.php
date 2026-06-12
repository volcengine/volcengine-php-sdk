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
    private $maxRetries = 3;
    private $retryInterval = 1;

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
}
