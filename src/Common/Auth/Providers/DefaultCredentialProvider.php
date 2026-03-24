<?php

namespace Volcengine\Common\Auth\Providers;

/**
 * 4-step default credential chain:
 *
 * 1. EnvironmentVariableCredentialProvider  (env AK/SK/STS)
 * 2. OidcEnvCredentialProvider              (env OIDC)
 * 3. CLIConfigCredentialProvider            (CLI config.json)
 * 4. EcsRoleCredentialProvider              (IMDS)
 *
 * When reuseLastProviderEnabled is true (default), the chain caches the
 * last successful provider and tries it first on subsequent calls.
 */
class DefaultCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'DefaultCredentialProvider';

    private $providers;
    private $reuseLastProviderEnabled;
    private $lastProvider;

    public function __construct($roleName = null, $reuseLastProviderEnabled = true, $providers = null)
    {
        $this->reuseLastProviderEnabled = $reuseLastProviderEnabled;
        if ($providers !== null) {
            // Custom provider chain
            $this->providers = $providers;
        } else {
            // Default 4-step chain
            $this->providers = $this->buildProviderChain($roleName);
        }
    }

    public function getCredentials()
    {
        // Fast path: reuse last successful provider
        if ($this->reuseLastProviderEnabled && $this->lastProvider !== null) {
            try {
                $creds = $this->lastProvider->getCredentials();
                if ($creds !== null) {
                    return $creds;
                }
            } catch (\Throwable $e) {
                // Clear cached provider and fall through to full chain
                $this->lastProvider = null;
            }
        }

        // Full chain traversal
        $errors = [];
        foreach ($this->providers as $provider) {
            try {
                $creds = $provider->getCredentials();
                if ($creds !== null) {
                    if ($this->reuseLastProviderEnabled) {
                        $this->lastProvider = $provider;
                    }
                    return $creds;
                }
            } catch (\Throwable $e) {
                $errors[] = get_class($provider) . ': ' . $e->getMessage();
            }
        }

        $errorDetails = empty($errors) ? 'no providers configured' : implode("\n  ", $errors);
        throw new \RuntimeException(
            self::PROVIDER_NAME . ": unable to resolve credentials from any provider in the chain.\n"
            . "Attempted providers:\n  " . $errorDetails
        );
    }

    private function buildProviderChain($roleName)
    {
        $chain = [];

        // Step 1: Environment variables (AK/SK/STS)
        $chain[] = new EnvironmentVariableCredentialProvider();

        // Step 2: OIDC from environment variables (lazy - may throw if env not set)
        $chain[] = new LazyProvider(function () {
            return OidcEnvCredentialProvider::fromEnvironment();
        });

        // Step 3: CLI config.json
        $chain[] = new CLIConfigCredentialProvider();

        // Step 4: ECS Role (IMDS) (lazy - may throw if disabled)
        $chain[] = new LazyProvider(function () use ($roleName) {
            return EcsRoleCredentialProvider::create($roleName);
        });

        return $chain;
    }
}

/**
 * Lazy wrapper that defers provider construction to first getCredentials() call.
 * This avoids blocking at chain build time for providers that may need network
 * access or environment validation during construction.
 */
class LazyProvider extends Provider
{
    private $factory;
    private $delegate;
    private $initialized = false;
    private $initError;

    public function __construct(callable $factory)
    {
        $this->factory = $factory;
    }

    public function getCredentials()
    {
        if (!$this->initialized) {
            try {
                $this->delegate = call_user_func($this->factory);
            } catch (\Throwable $e) {
                $this->initError = $e->getMessage();
            }
            $this->initialized = true;
        }

        if ($this->delegate === null) {
            throw new \RuntimeException($this->initError ?: 'Provider initialization failed');
        }

        return $this->delegate->getCredentials();
    }
}
