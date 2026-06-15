<?php

namespace Volcengine\Common;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use Volcengine\Common\Auth\Providers\DefaultCredentialProvider;
use Volcengine\Common\Error\ApiExceptionFactory;
use Volcengine\Common\Interceptor\InterceptorChain;
use Volcengine\Common\Interceptor\Interceptors\BuildRequestInterceptor;
use Volcengine\Common\Interceptor\Interceptors\Context;
use Volcengine\Common\Interceptor\Interceptors\DeserializedResponseInterceptor;
use Volcengine\Common\Interceptor\Interceptors\GzipRequestInterceptor;
use Volcengine\Common\Interceptor\Interceptors\HttpLoggingInterceptor;
use Volcengine\Common\Interceptor\Interceptors\Request;
use Volcengine\Common\Interceptor\Interceptors\Response;
use Volcengine\Common\Interceptor\Interceptors\ResolveEndpointInterceptor;
use Volcengine\Common\Interceptor\Interceptors\RuntimeOptionsInterceptor;
use Volcengine\Common\Interceptor\Interceptors\SignRequestInterceptor;
use Volcengine\Common\Retry\DefaultRetryCondition;
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
    private $signRequestInterceptor;

    public function __construct($config = null, $client = null)
    {
        $config = $config ?: new Configuration();
        $this->usesCustomClient = $client !== null;
        $client = $client ?: new Client($this->buildClientConfig($config));

        $this->configuration = $config;
        $this->client = $client;
        $this->clientConfig = $client->getConfig();
        $this->setUserAgent($config->getUserAgent());
        $this->tempFolderPath = $config->getTempFolderPath();

        $this->interceptorChain = new InterceptorChain();
        $this->signRequestInterceptor = new SignRequestInterceptor(null);
        $this->interceptorChain->appendRequestInterceptor(new RuntimeOptionsInterceptor());
        $this->interceptorChain->appendRequestInterceptor(new BuildRequestInterceptor());
        $this->interceptorChain->appendRequestInterceptor(new GzipRequestInterceptor());
        $this->interceptorChain->appendRequestInterceptor(new ResolveEndpointInterceptor(null));
        $this->interceptorChain->appendRequestInterceptor($this->signRequestInterceptor);
        $this->interceptorChain->appendResponseInterceptor(new HttpLoggingInterceptor());
        $this->interceptorChain->appendResponseInterceptor(new DeserializedResponseInterceptor());
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
        $async = false,
        $runtimeOptions = null,
        $apiName = null
    ) {
        $context = $this->createContextAndRequest(
            $body,
            $resourcePath,
            $method,
            $headerParams,
            $responseType,
            $runtimeOptions,
            $apiName
        );
        $this->interceptorChain->executeRequest($context);

        if ($async) {
            return $this->sendAsync($context);
        }

        return $this->sendSync($context);
    }

    private function createContextAndRequest($body, $resourcePath, $method, $headerParams, $responseType, $runtimeOptions = null, $apiName = null)
    {
        $context = new Context();
        $request = new Request();
        $headerParams = $headerParams ?: [];
        $headerParams = array_merge($this->defaultHeaders, $headerParams);
        $context->setRequest($request);

        $request->resourcePath = $resourcePath;
        $request->method = $method;
        $request->apiName = $apiName;
        $request->headers = $headerParams;
        $request->body = $body;
        $request->returnType = $responseType ?: 'object';
        $request->runtimeOptions = $runtimeOptions ?: $this->configuration->getRuntimeOptions();

        $request->host = $this->configuration->getHost();
        $request->truePath = '/';
        $request->service = '';
        $request->ak = $this->configuration->getAk();
        $request->sk = $this->configuration->getSk();
        $request->sessionToken = $this->configuration->getSessionToken();
        $request->credentialProvider = $this->configuration->getCredentialProvider();
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
        $request->enableRequestGzip = $this->configuration->getEnableRequestGzip();
        $request->gzipMinLength = $this->configuration->getGzipMinLength();
        $request->progressListener = $this->configuration->getProgressListener();

        $request->getDebug = $this->configuration->getDebug();
        $request->getDebugFile = $this->configuration->getDebugFile();

        return $context;
    }

    private function sendSync(Context $context)
    {
        $request = $context->getRequest();
        $retryer = $request->retryer instanceof Retryer ? $request->retryer : null;
        $retryCount = 0;
        $lastError = null;
        $retryError = null;
        $lastResponse = null;

        while (true) {
            if ($retryCount > 0) {
                $this->prepareRetryAttempt($context, $lastError);
            } else {
                $this->logConfig($request);
            }

            try {
                $start = microtime(true);
                $response = $this->client->send($request->realRequest, $this->buildRequestOptions($request));
                $lastResponse = $response;
                $responseContext = $this->buildResponseContext($context, $response);
                $responseContext->setAttribute('elapsed_ms', (int) ((microtime(true) - $start) * 1000));
                $this->interceptorChain->executeResponse($responseContext);

                return [
                    $responseContext->getResponse()->result,
                    $responseContext->getResponse()->statusCode,
                    $responseContext->getResponse()->headers,
                ];
            } catch (RequestException $e) {
                $retryError = $e;
                $lastResponse = $e->getResponse();
                $lastError = ApiExceptionFactory::fromRequestException($e);
            } catch (TransferException $e) {
                $retryError = $e;
                $lastError = ApiExceptionFactory::fromTransferException($e);
            } catch (ApiException $e) {
                $retryError = $e;
                $lastError = $e;
            }

            $this->logError($request, $lastError);
            $retryCandidate = $retryError ?: $lastError;
            if (!$request->autoRetry || $retryer === null || !$retryer->shouldRetry($lastResponse, $retryCount, $retryCandidate)) {
                throw $lastError;
            }

            $delayMs = $retryer->getRetryDelay($retryCount, $lastResponse);
            $this->logRetry($request, $retryCount, $delayMs, $lastError);
            if ($delayMs > 0) {
                usleep((int) ($delayMs * 1000));
            }
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
        $runtimeOptions = $request->runtimeOptions;
        $this->setClientOption(
            $options,
            'timeout',
            $request->readTimeout,
            $runtimeOptions && $runtimeOptions->readTimeout !== null
        );
        $this->setClientOption(
            $options,
            'connect_timeout',
            $request->connectTimeout,
            $runtimeOptions && $runtimeOptions->connectTimeout !== null
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
        if ($request->progressListener !== null) {
            $options['progress'] = $request->progressListener;
        }

        return $options;
    }

    private function setClientOption(array &$options, $name, $value, $runtimeOverride)
    {
        if ($this->usesCustomClient
            && !$runtimeOverride) {
            if (isset($this->clientConfig[$name]) && $this->clientConfig[$name] !== null) {
                $options[$name] = $this->clientConfig[$name];
            }
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

    private function buildClientConfig(Configuration $config)
    {
        return $config->toHttpClientConfig();
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
    }

    private function logRetry(Request $request, $retryCount, $delayMs, $error)
    {
        LogHelper::debug($request->logger, SdkLogger::LOG_RETRY, 'Retry', 'retry #{count} in {delay}ms: {message}', [
            'count' => $retryCount + 1,
            'delay' => $delayMs,
            'message' => $error instanceof \Exception ? $error->getMessage() : 'unknown error',
        ]);
    }

    private function sendAsyncAttempt(Context $context, $retryCount, $previousError = null)
    {
        $request = $context->getRequest();
        $retryer = $request->retryer instanceof Retryer ? $request->retryer : null;
        if ($retryCount > 0) {
            $this->prepareRetryAttempt($context, $previousError);
        } else {
            $this->logConfig($request);
        }

        $context->setAttribute('attempt_start_time', microtime(true));
        return $this->client
            ->sendAsync($request->realRequest, $this->buildRequestOptions($request))
            ->then(function ($httpResponse) use ($context, $request, $retryer, $retryCount) {
                try {
                    $responseContext = $this->buildResponseContext($context, $httpResponse);
                    $start = $context->getAttribute('attempt_start_time');
                    if ($start !== null) {
                        $responseContext->setAttribute('elapsed_ms', (int) ((microtime(true) - $start) * 1000));
                    }
                    $this->interceptorChain->executeResponse($responseContext);
                    return [
                        $responseContext->getResponse()->result,
                        $responseContext->getResponse()->statusCode,
                        $responseContext->getResponse()->headers,
                    ];
                } catch (ApiException $e) {
                    if (!$request->autoRetry || $retryer === null || !$retryer->shouldRetry($httpResponse, $retryCount, $e)) {
                        throw $e;
                    }

                    $delayMs = $retryer->getRetryDelay($retryCount, $httpResponse);
                    $this->logRetry($request, $retryCount, $delayMs, $e);
                    if ($delayMs > 0) {
                        usleep((int) ($delayMs * 1000));
                    }

                    return $this->sendAsyncAttempt($context, $retryCount + 1, $e);
                }
            }, function ($exception) use ($context, $request, $retryer, $retryCount) {
                $response = null;
                if ($exception instanceof RequestException) {
                    $response = $exception->getResponse();
                    $apiException = ApiExceptionFactory::fromRequestException($exception);
                } elseif ($exception instanceof TransferException) {
                    $apiException = ApiExceptionFactory::fromTransferException($exception);
                } elseif ($exception instanceof ApiException) {
                    $apiException = $exception;
                } else {
                    throw $exception;
                }

                $this->logError($request, $apiException);
                if (!$request->autoRetry || $retryer === null || !$retryer->shouldRetry($response, $retryCount, $apiException)) {
                    throw $apiException;
                }

                $delayMs = $retryer->getRetryDelay($retryCount, $response);
                $this->logRetry($request, $retryCount, $delayMs, $apiException);
                if ($delayMs > 0) {
                    usleep((int) ($delayMs * 1000));
                }

                return $this->sendAsyncAttempt($context, $retryCount + 1, $apiException);
            });
    }

    private function logConfig(Request $request)
    {
        LogHelper::debug($request->logger, SdkLogger::LOG_CONFIG, 'Config',
            'region={region} schema={schema} connect_timeout={connect_timeout} read_timeout={read_timeout} auto_retry={auto_retry} gzip={gzip}',
            [
                'region' => $request->region,
                'schema' => $request->schema,
                'connect_timeout' => $request->connectTimeout,
                'read_timeout' => $request->readTimeout,
                'auto_retry' => $request->autoRetry ? 'true' : 'false',
                'gzip' => $request->enableRequestGzip ? 'true' : 'false',
            ]
        );
    }

    private function logError(Request $request, $error)
    {
        if (!$error instanceof \Exception) {
            return;
        }

        LogHelper::error($request->logger, SdkLogger::LOG_ERROR, 'Error', '{class}: {message}', [
            'class' => get_class($error),
            'message' => $error->getMessage(),
        ]);
    }

    private function prepareRetryAttempt(Context $context, $error)
    {
        $request = $context->getRequest();

        if ($this->shouldRefreshCredentials($error)) {
            $this->refreshRequestCredentials($request);
        }

        $this->resignRequest($context);
    }

    private function refreshRequestCredentials(Request $request)
    {
        if ($request->credentialProvider === null) {
            return;
        }

        $creds = $request->credentialProvider->getCredentials();
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

    private function resignRequest(Context $context)
    {
        $request = $context->getRequest();
        unset(
            $request->headers['Authorization'],
            $request->headers['X-Date'],
            $request->headers['X-Content-Sha256'],
            $request->headers['X-Security-Token']
        );
        $request->realRequest = null;
        $request->options = [];
        $this->signRequestInterceptor->intercept($context);
    }

    private function shouldRefreshCredentials($error)
    {
        if (!$error instanceof ApiException) {
            return false;
        }

        $code = DefaultRetryCondition::extractErrorCode($error->getResponseBody());
        if ($code === null) {
            return false;
        }

        return DefaultRetryCondition::isCredentialExpiryError($code);
    }

}
