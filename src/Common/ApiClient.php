<?php

namespace Volcengine\Common;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use Volcengine\Common\Auth\Providers\DefaultCredentialProvider;
use Volcengine\Common\Auth\Providers\LazyProvider;
use Volcengine\Common\Auth\Providers\OidcCredentialProvider;
use Volcengine\Common\Auth\Providers\SamlCredentialProvider;
use Volcengine\Common\Auth\Providers\StsProvider;
use Volcengine\Common\Auth\Providers\StsProxyConfigurableProvider;
use Volcengine\Common\Interceptor\InterceptorChain;
use Volcengine\Common\Interceptor\Interceptors\BuildRequestInterceptor;
use Volcengine\Common\Interceptor\Interceptors\Context;
use Volcengine\Common\Interceptor\Interceptors\DeserializedResponseInterceptor;
use Volcengine\Common\Interceptor\Interceptors\HttpLoggingInterceptor;
use Volcengine\Common\Interceptor\Interceptors\Request;
use Volcengine\Common\Interceptor\Interceptors\Response;
use Volcengine\Common\Interceptor\Interceptors\ResolveEndpointInterceptor;
use Volcengine\Common\Interceptor\Interceptors\SignRequestInterceptor;
use Volcengine\Common\Retry\Retryer;

class ApiClient
{
    private $configuration;
    private $userAgent;
    private $defaultHeaders = [];
    private $tempFolderPath;
    private $interceptorChain;
    private $client;
    private $usesCustomClient = false;
    private $clientConfig = [];
    private $credentialProviderSource;
    private $credentialProxyFallback;
    private $credentialProviderBinding;

    public function __construct($config = null, $client = null)
    {
        if ($config === null) {
            $config = new Configuration();
        }
        $this->usesCustomClient = $client !== null;
        if ($client === null) {
            $client = new Client();
        }

        $this->configuration = $config;
        $this->client = $client;
        $this->clientConfig = $client->getConfig();
        $this->setUserAgent($config->getUserAgent());
        $this->tempFolderPath = $config->getTempFolderPath();

        $this->interceptorChain = new InterceptorChain();
        $this->interceptorChain->appendRequestInterceptor(new BuildRequestInterceptor());
        $this->interceptorChain->appendRequestInterceptor(new ResolveEndpointInterceptor(null));
        $this->interceptorChain->appendRequestInterceptor(new SignRequestInterceptor());
        $this->interceptorChain->appendResponseInterceptor(new HttpLoggingInterceptor());
        $this->interceptorChain->appendResponseInterceptor(new DeserializedResponseInterceptor());
    }

    public function __clone()
    {
        $this->credentialProviderBinding = null;
    }

    public function getConfig()
    {
        return $this->configuration;
    }

    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        $this->defaultHeaders['User-Agent'] = $userAgent;
        return $this;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function getTempFolderPath()
    {
        return $this->tempFolderPath;
    }

    public function setTempFolderPath($tempFolderPath)
    {
        $this->tempFolderPath = $tempFolderPath;
        return $this;
    }

    public function callApi(
        $body,
        $resourcePath,
        $method,
        $headerParams = null,
        $responseType = null,
        $async = false
    ) {
        $context = $this->createContextAndRequest(
            $body,
            $resourcePath,
            $method,
            $headerParams,
            $responseType
        );
        $context = $this->interceptorChain->executeRequest($context);

        if ($async) {
            return $this->sendAsync($context);
        }

        return $this->sendSync($context);
    }

    private function createContextAndRequest($body, $resourcePath, $method, $headerParams, $responseType)
    {
        $context = new Context();
        $request = new Request();
        $headerParams = $headerParams ?: [];
        $headerParams = array_merge($this->defaultHeaders, $headerParams);
        $context->setRequest($request);

        $request->resourcePath = $resourcePath;
        $request->method = $method;
        $request->headers = $headerParams;
        $request->body = $body;
        $request->returnType = $responseType ?: 'object';

        $request->host = $this->configuration->getHost();
        $request->truePath = '/';
        $request->service = '';
        $request->ak = $this->configuration->getAk();
        $request->sk = $this->configuration->getSk();
        $request->sessionToken = $this->configuration->getSessionToken();
        // Keep the binding on the Request so pending retries retain its route.
        $request->credentialProvider = $this->getRequestCredentialProvider();
        $request->region = $this->configuration->getRegion();
        $request->schema = $this->configuration->getSchema();
        if (empty($request->ak) && empty($request->sk)) {
            $credentialProvider = $request->credentialProvider;
            if ($credentialProvider === null) {
                $credentialProvider = new DefaultCredentialProvider();
                $this->configuration->setCredentialProvider($credentialProvider);
                $request->credentialProvider = $credentialProvider;
            }
            $creds = $credentialProvider->getCredentials();
            if ($credentialProvider instanceof DefaultCredentialProvider || $credentialProvider instanceof LazyProvider) {
                $request->credentialSourceBinding = $credentialProvider->bindCredentialSource();
            }
            $request->ak = $creds['AccessKeyId'];
            $request->sk = $creds['SecretAccessKey'];
            $request->sessionToken = isset($creds['SessionToken']) ? $creds['SessionToken'] : '';
        }

        $request->endpointProvider = $this->configuration->getEndpointProvider();
        $request->customBootstrapRegion = $this->configuration->getCustomBootstrapRegion();
        $request->useDualStack = $this->configuration->getUseDualStack();
        $request->autoRetry = $this->configuration->getAutoRetry();
        $request->retryer = clone $this->configuration->getRetryer();
        $request->connectTimeout = $this->configuration->getConnectTimeout();
        $request->readTimeout = $this->configuration->getReadTimeout();
        $request->verifySsl = $this->configuration->getVerifySsl();
        $request->sslCaCert = $this->configuration->getSslCaCert();
        $request->certFile = $this->configuration->getCertFile();
        $request->keyFile = $this->configuration->getKeyFile();
        $request->assertHostname = $this->configuration->getAssertHostname();
        $request->proxy = $this->configuration->getProxy();
        $request->httpProxy = $this->configuration->getHttpProxy();
        $request->httpsProxy = $this->configuration->getHttpsProxy();
        $request->logger = $this->configuration->getLogger();
        $request->logLevel = $this->configuration->getLogLevel();
        $request->getDebug = $this->configuration->getDebug();
        $request->getDebugFile = $this->configuration->getDebugFile();

        return $context;
    }

    private function getRequestCredentialProvider()
    {
        $provider = $this->configuration->getCredentialProvider();
        $proxy = $this->getCredentialProxyFallback();
        $providerClass = is_object($provider) ? get_class($provider) : null;
        // Custom providers and subclasses retain their existing calling contract.
        if (!in_array($providerClass, [
            StsProvider::class,
            OidcCredentialProvider::class,
            SamlCredentialProvider::class,
        ], true)) {
            $this->credentialProviderBinding = null;
            $this->credentialProviderSource = null;
            if ($provider instanceof StsProxyConfigurableProvider) {
                $provider->setProxyFallback($proxy);
            }
            return $provider;
        }

        if ($this->credentialProviderBinding === null
            || $this->credentialProviderSource !== $provider
            || $this->credentialProxyFallback !== $proxy) {
            $binding = $provider->bindToProxy($proxy);
            $this->credentialProviderSource = $provider;
            $this->credentialProxyFallback = $proxy;
            $this->credentialProviderBinding = $binding;
        }
        return $this->credentialProviderBinding;
    }

    /**
     * Resolve the existing business proxy settings as a Guzzle proxy option.
     * The provider-specific proxy URL remains higher priority.
     *
     * @return string|array|null
     */
    private function getCredentialProxyFallback()
    {
        $proxy = $this->configuration->getProxy();
        if ($proxy !== null) {
            return $proxy;
        }

        $proxy = [];
        if ($this->configuration->getHttpProxy() !== null) {
            $proxy['http'] = $this->configuration->getHttpProxy();
        }
        if ($this->configuration->getHttpsProxy() !== null) {
            $proxy['https'] = $this->configuration->getHttpsProxy();
        }

        return empty($proxy) ? null : $proxy;
    }

    private function sendSync(Context $context)
    {
        $request = $context->getRequest();
        $retryer = $request->retryer instanceof Retryer ? $request->retryer : null;
        $retryCount = 0;
        $lastError = null;
        $lastResponse = null;

        while (true) {
            if ($retryCount > 0) {
                $context = $this->prepareRetryAttempt($context, $lastError, $retryCount);
                $request = $context->getRequest();
                $retryer = $request->retryer instanceof Retryer ? $request->retryer : null;
            }

            // A new attempt must not reuse a previous response or retry input.
            $lastResponse = null;
            $lastError = null;
            try {
                $start = microtime(true);
                HttpLoggingInterceptor::logRequest($request);
                $response = $this->client->send($request->realRequest, $this->buildRequestOptions($request));
                $lastResponse = $response;
                $responseContext = $this->buildResponseContext($context, $response);
                $responseContext->setAttribute('elapsed_ms', (int) ((microtime(true) - $start) * 1000));
                $responseContext = $this->interceptorChain->executeResponse($responseContext);

                return [
                    $responseContext->getResponse()->result,
                    $responseContext->getResponse()->statusCode,
                    $responseContext->getResponse()->headers,
                ];
            } catch (RequestException $e) {
                $lastResponse = $e->getResponse();
                $lastError = ApiException::fromRequestException($e);
            } catch (TransferException $e) {
                $lastError = ApiException::fromTransferException($e);
            } catch (ApiException $e) {
                $lastError = $e;
            } catch (\Exception $e) {
                $lastError = $e;
            } catch (\Throwable $e) {
                $lastError = $e;
            }

            $retryCandidate = $lastError;
            if (!$this->shouldRetryAttempt($request, $retryer, $lastResponse, $retryCount, $retryCandidate, $lastError)) {
                throw $lastError;
            }

            $this->waitForRetry($request, $retryer, $lastResponse, $retryCount, $lastError);
            $retryCount++;
        }
    }

    private function sendAsync(Context $context)
    {
        return $this->sendAsyncAttempt($context, 0);
    }

    private function buildResponseContext(Context $context, $httpResponse)
    {
        $response = new Response();
        $response->httpResponse = $httpResponse;

        $responseContext = new Context();
        $responseContext->setRequest($context->getRequest());
        $responseContext->setResponse($response);
        $responseContext->mergeAttributes($context->getAttributes());

        return $responseContext;
    }

    private function buildRequestOptions(Request $request)
    {
        $options = $request->options ?: [];
        $this->setClientOption(
            $options,
            'timeout',
            $request->readTimeout
        );
        $this->setClientOption(
            $options,
            'connect_timeout',
            $request->connectTimeout
        );
        $options['verify'] = $this->resolveVerifyOption($request);
        $options['http_errors'] = false;
        if ($request->assertHostname === false && defined('CURLOPT_SSL_VERIFYHOST')) {
            $options['curl'][CURLOPT_SSL_VERIFYHOST] = 0;
        }

        if ($request->certFile !== null) {
            $options['cert'] = $request->certFile;
        }
        if ($request->keyFile !== null) {
            $options['ssl_key'] = $request->keyFile;
        }
        if ($request->proxy !== null) {
            $options['proxy'] = $request->proxy;
        } elseif ($request->httpProxy !== null || $request->httpsProxy !== null) {
            $proxy = [];
            if ($request->httpProxy !== null) {
                $proxy['http'] = $request->httpProxy;
            }
            if ($request->httpsProxy !== null) {
                $proxy['https'] = $request->httpsProxy;
            }
            $options['proxy'] = $proxy;
        }
        return $options;
    }

    private function setClientOption(array &$options, $name, $value)
    {
        if ($this->usesCustomClient
            && array_key_exists($name, $this->clientConfig)
            && $this->clientConfig[$name] !== null) {
            $options[$name] = $this->clientConfig[$name];
            return;
        }

        $options[$name] = $value;
    }

    private function resolveVerifyOption(Request $request)
    {
        if ($request->sslCaCert) {
            return $request->sslCaCert;
        }

        if ($this->usesCustomClient
            && isset($this->clientConfig['verify'])
            && $this->clientConfig['verify'] !== true) {
            return $this->clientConfig['verify'];
        }

        return $request->verifySsl;
    }

    public function setNewClientConfig()
    {
        $config = [];
        $clientConfig = $this->client->getConfig();

        $clientVerify = isset($clientConfig['verify']) ? $clientConfig['verify'] : true;
        if ($this->configuration->getVerifySsl() != $clientVerify) {
            if ($clientVerify != true) {
                $config['verify'] = $clientVerify;
            } else {
                $config['verify'] = $this->configuration->getVerifySsl();
            }
        }

        if (isset($clientConfig['timeout']) && $this->configuration->getReadTimeout() != $clientConfig['timeout']) {
            if ($clientConfig['timeout'] != null) {
                $config['timeout'] = $clientConfig['timeout'];
            } else {
                $config['timeout'] = $this->configuration->getReadTimeout();
            }
        }

        if (isset($clientConfig['connect_timeout']) && $this->configuration->getConnectTimeout() != $clientConfig['connect_timeout']) {
            if ($clientConfig['connect_timeout'] != null) {
                $config['connect_timeout'] = $clientConfig['connect_timeout'];
            } else {
                $config['connect_timeout'] = $this->configuration->getConnectTimeout();
            }
        }

        $handler = isset($clientConfig['handler']) ? $clientConfig['handler'] : \GuzzleHttp\HandlerStack::create();
        $this->client = new Client(array_merge($clientConfig, $config, ['handler' => $handler]));
        $this->clientConfig = $this->client->getConfig();
        // New requests pick up provider changes; existing Requests keep their binding.
        $this->credentialProviderBinding = null;
    }

    private function sendAsyncAttempt(Context $context, $retryCount, $previousError = null)
    {
        $request = $context->getRequest();
        $retryer = $request->retryer instanceof Retryer ? $request->retryer : null;
        if ($retryCount > 0) {
            $context = $this->prepareRetryAttempt($context, $previousError, $retryCount);
            $request = $context->getRequest();
            $retryer = $request->retryer instanceof Retryer ? $request->retryer : null;
        }

        $context->setAttribute('attempt_start_time', microtime(true));
        HttpLoggingInterceptor::logRequest($request);
        return $this->client
            ->sendAsync($request->realRequest, $this->buildRequestOptions($request))
            ->then(function ($httpResponse) use ($context, $request, $retryer, $retryCount) {
                try {
                    $responseContext = $this->buildResponseContext($context, $httpResponse);
                    $start = $context->getAttribute('attempt_start_time');
                    if ($start !== null) {
                        $responseContext->setAttribute('elapsed_ms', (int) ((microtime(true) - $start) * 1000));
                    }
                    $responseContext = $this->interceptorChain->executeResponse($responseContext);
                    return [
                        $responseContext->getResponse()->result,
                        $responseContext->getResponse()->statusCode,
                        $responseContext->getResponse()->headers,
                    ];
                } catch (\Exception $e) {
                    if (!$this->shouldRetryAttempt($request, $retryer, $httpResponse, $retryCount, $e, $e)) {
                        throw $e;
                    }

                    $this->waitForRetry($request, $retryer, $httpResponse, $retryCount, $e);

                    return $this->sendAsyncAttempt($context, $retryCount + 1, $e);
                } catch (\Throwable $e) {
                    if (!$this->shouldRetryAttempt($request, $retryer, $httpResponse, $retryCount, $e, $e)) {
                        throw $e;
                    }
                    $this->waitForRetry($request, $retryer, $httpResponse, $retryCount, $e);
                    return $this->sendAsyncAttempt($context, $retryCount + 1, $e);
                }
            }, function ($exception) use ($context, $request, $retryer, $retryCount) {
                $response = null;
                if ($exception instanceof RequestException) {
                    $response = $exception->getResponse();
                    $apiException = ApiException::fromRequestException($exception);
                } elseif ($exception instanceof TransferException) {
                    $apiException = ApiException::fromTransferException($exception);
                } elseif ($exception instanceof ApiException) {
                    $apiException = $exception;
                } else {
                    $apiException = $exception;
                }

                $retryCandidate = $apiException;
                if (!$this->shouldRetryAttempt($request, $retryer, $response, $retryCount, $retryCandidate, $apiException)) {
                    throw $apiException;
                }

                $this->waitForRetry($request, $retryer, $response, $retryCount, $apiException);

                return $this->sendAsyncAttempt($context, $retryCount + 1, $apiException);
            });
    }

    private function prepareRetryAttempt(Context $context, $error, $retryCount)
    {
        try {
            $request = $context->getRequest();
            $request->retryCount = $retryCount;

            if ($this->shouldRefreshCredentials($error)) {
                $this->refreshRequestCredentials($request);
            }

            return $this->rebuildRequest($context);
        } catch (\Exception $e) {
            throw ApiException::fromRetryError($e, $error);
        } catch (\Throwable $e) {
            throw ApiException::fromRetryError($e, $error);
        }
    }

    private function shouldRetryAttempt($request, $retryer, $response, $retryCount, $candidate, $lastError)
    {
        try {
            return $request->autoRetry && $retryer !== null && $retryer->shouldRetry($response, $retryCount, $candidate);
        } catch (\Exception $e) {
            throw ApiException::fromRetryError($e, $lastError);
        } catch (\Throwable $e) {
            throw ApiException::fromRetryError($e, $lastError);
        }
    }

    private function waitForRetry($request, $retryer, $response, $retryCount, $lastError)
    {
        try {
            $delayMs = $retryer->getRetryDelay($retryCount, $response);
            LogHelper::debug($request->logger, $request->logLevel, SdkLogger::LOG_RETRY,
                'Retry attempt={attempt} delay_ms={delay_ms}', [
                    'attempt' => $retryCount + 1,
                    'delay_ms' => $delayMs,
                ]
            );
            if ($delayMs > 0) {
                usleep((int) ($delayMs * 1000));
            }
        } catch (\Exception $e) {
            throw ApiException::fromRetryError($e, $lastError);
        } catch (\Throwable $e) {
            throw ApiException::fromRetryError($e, $lastError);
        }
    }

    private function refreshRequestCredentials(Request $request)
    {
        if ($request->credentialProvider === null) {
            return;
        }

        $provider = $request->credentialSourceBinding ?: $request->credentialProvider;
        if (is_callable([$provider, 'invalidateCredentials'])) {
            $provider->invalidateCredentials();
        }
        $creds = $provider->getCredentials();
        if ($request->credentialSourceBinding === null
            && ($provider instanceof DefaultCredentialProvider || $provider instanceof LazyProvider)) {
            $request->credentialSourceBinding = $provider->bindCredentialSource();
        }
        if (!is_array($creds)) {
            return;
        }

        if (isset($creds['AccessKeyId'])) {
            $request->ak = $creds['AccessKeyId'];
        }
        if (isset($creds['SecretAccessKey'])) {
            $request->sk = $creds['SecretAccessKey'];
        }
        $request->sessionToken = isset($creds['SessionToken']) ? $creds['SessionToken'] : '';
    }

    private function rebuildRequest(Context $context)
    {
        $request = $context->getRequest();
        foreach (array_keys($request->headers) as $name) {
            if (in_array(strtolower($name), ['authorization', 'x-date', 'x-content-sha256', 'x-security-token'], true)) {
                unset($request->headers[$name]);
            }
        }
        $request->realRequest = null;
        $request->options = [];
        return $this->interceptorChain->executeRequest($context);
    }

    private function shouldRefreshCredentials($error)
    {
        return Retryer::hasCredentialExpiryError($error);
    }

}
