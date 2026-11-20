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
            } catch (\Exception $e) {
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
                    // Remember the credential source even when fast reuse is off.
                    $this->lastProvider = $provider;
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

    /**
     * @internal Freeze the successful source for one request; leaf caches stay shared.
     */
    public function bindCredentialSource()
    {
        $binding = clone $this;
        if ($this->lastProvider !== null
            && in_array(get_class($this->lastProvider), [self::class, LazyProvider::class], true)) {
            $binding->lastProvider = $this->lastProvider->bindCredentialSource();
            foreach ($binding->providers as $key => $provider) {
                if ($provider === $this->lastProvider) {
                    $binding->providers[$key] = $binding->lastProvider;
                }
            }
        }
        return $binding;
    }

    /** @internal Capture request routing without cloning customer providers. */
    public function captureCredentialSource()
    {
        $lastProvider = $this->lastProvider;
        $providers = $this->providers;
        $this->captureSelectedSource($lastProvider, $providers);
        // Execute inherited and overridden methods on the customer's object.
        // Only routing state is request-local; counters and leaf caches stay shared.
        return new CredentialSourceBinding(function ($method) use (&$lastProvider, &$providers) {
            $sharedLastProvider = $this->lastProvider;
            $sharedProviders = $this->providers;
            $this->lastProvider = $lastProvider;
            $this->providers = $providers;
            try {
                return $this->$method();
            } finally {
                $lastProvider = $this->lastProvider;
                $providers = $this->providers;
                try {
                    // A refresh may select a previously unbound nested chain.
                    $this->captureSelectedSource($lastProvider, $providers);
                } finally {
                    $this->lastProvider = $sharedLastProvider;
                    $this->providers = $sharedProviders;
                }
            }
        });
    }

    private function captureSelectedSource(&$lastProvider, &$providers)
    {
        if ($lastProvider instanceof self || $lastProvider instanceof LazyProvider) {
            $source = $lastProvider;
            $lastProvider = $source->captureCredentialSource();
            foreach ($providers as $key => $provider) {
                if ($provider === $source) {
                    $providers[$key] = $lastProvider;
                }
            }
        }
    }

    public function invalidateCredentials()
    {
        if ($this->lastProvider !== null && is_callable([$this->lastProvider, 'invalidateCredentials'])) {
            $this->lastProvider->invalidateCredentials();
        }
        $this->lastProvider = null;
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

    /** @internal Preserve a nested chain's successful source for one request. */
    public function bindCredentialSource()
    {
        $binding = clone $this;
        if ($this->delegate !== null
            && in_array(get_class($this->delegate), [DefaultCredentialProvider::class, self::class], true)) {
            $binding->delegate = $this->delegate->bindCredentialSource();
        }
        return $binding;
    }

    /** @internal Capture request routing without cloning customer providers. */
    public function captureCredentialSource()
    {
        $delegate = $this->delegate;
        $initialized = $this->initialized;
        $initError = $this->initError;
        if ($delegate instanceof DefaultCredentialProvider || $delegate instanceof self) {
            $delegate = $delegate->captureCredentialSource();
        }
        return new CredentialSourceBinding(function ($method) use (&$delegate, &$initialized, &$initError) {
            $sharedDelegate = $this->delegate;
            $sharedInitialized = $this->initialized;
            $sharedInitError = $this->initError;
            $this->delegate = $delegate;
            $this->initialized = $initialized;
            $this->initError = $initError;
            try {
                return $this->$method();
            } finally {
                $delegate = $this->delegate;
                $initialized = $this->initialized;
                $initError = $this->initError;
                try {
                    if ($delegate instanceof DefaultCredentialProvider || $delegate instanceof self) {
                        $delegate = $delegate->captureCredentialSource();
                    }
                } finally {
                    $this->delegate = $sharedDelegate;
                    $this->initialized = $sharedInitialized;
                    $this->initError = $sharedInitError;
                }
            }
        });
    }

    public function invalidateCredentials()
    {
        if ($this->delegate !== null && is_callable([$this->delegate, 'invalidateCredentials'])) {
            $this->delegate->invalidateCredentials();
        }
        if ($this->delegate === null) {
            $this->initialized = false;
            $this->initError = null;
        }
    }
}

/** @internal Runs chain operations with the source captured for one request. */
class CredentialSourceBinding extends Provider
{
    private $operation;

    public function __construct(callable $operation)
    {
        $this->operation = $operation;
    }

    public function getCredentials()
    {
        return call_user_func($this->operation, 'getCredentials');
    }

    public function invalidateCredentials()
    {
        return call_user_func($this->operation, 'invalidateCredentials');
    }
}
