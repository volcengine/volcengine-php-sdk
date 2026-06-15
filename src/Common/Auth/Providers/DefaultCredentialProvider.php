<?php

namespace Volcengine\Common\Auth\Providers;

use Volcengine\Common\ApiException;

/**
 * 4-step default credential chain:
 *
 * 1. EnvironmentVariableCredentialProvider  (env AK/SK/STS)
 * 2. OidcCredentialProvider                 (env OIDC)
 * 3. CLIConfigCredentialProvider            (CLI config.json)
 * 4. EcsRoleCredentialProvider              (IMDS)
 */
class DefaultCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'DefaultCredentialProvider';

    private $providers;

    public function __construct($roleName = null, $providers = null)
    {
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
        $errors = [];
        foreach ($this->providers as $provider) {
            try {
                $creds = $provider->getCredentials();
                if ($creds !== null) {
                    return $creds;
                }
            } catch (\Exception $e) {
                $errors[] = get_class($provider) . ': ' . $e->getMessage();
            }
        }

        $errorDetails = empty($errors) ? 'no providers configured' : implode("\n  ", $errors);
        throw new ApiException(
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
            return OidcCredentialProvider::fromEnvironment();
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
            } catch (\Exception $e) {
                $this->initError = $e->getMessage();
            }
            $this->initialized = true;
        }

        if ($this->delegate === null) {
            throw new ApiException($this->initError ?: 'Provider initialization failed');
        }

        return $this->delegate->getCredentials();
    }
}
