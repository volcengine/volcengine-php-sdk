<?php
namespace Volcengine\Common;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Volcengine\Common\Interceptor\InterceptorChain;
use Volcengine\Common\Interceptor\Interceptors\BuildRequestInterceptor;
use Volcengine\Common\Interceptor\Interceptors\Context;
use Volcengine\Common\Interceptor\Interceptors\SignRequestInterceptor;
use Volcengine\Common\Interceptor\Interceptors\ResolveEndpointInterceptor;

class ApiClient
{
    private $configuration;
    private $userAgent;
    private $defaultHeaders = [];
    private $tempFolderPath;
    private $interceptorChain;
    private $client;

    public function __construct($config = null, $client = null)
    {
        if ($config == null) {
            $config = new Configuration();
        }
        if ($client == null) {
            $client = new Client();
        }
        $this->configuration = $config;
        $this->client = $client;
        $this->setUserAgent($config->getUserAgent());
        $this->tempFolderPath = $config->getTempFolderPath();

        // Initialize interceptor chain
        $this->interceptorChain = new InterceptorChain();

        // Add interceptors
        $this->interceptorChain->appendRequestInterceptor(new BuildRequestInterceptor());
        $this->interceptorChain->appendRequestInterceptor(new ResolveEndpointInterceptor(null));
        $this->interceptorChain->appendRequestInterceptor(new SignRequestInterceptor(null));
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

    private function createContextAndRequest($body, $resourcePath, $method, $headerParams, $responseType)
    {
        $context = new Context();
        $request = new \Volcengine\Common\Interceptor\Interceptors\Request();
        $headerParams = $headerParams ?: [];
        $headerParams = array_merge($this->defaultHeaders, $headerParams);

        $request->resourcePath = $resourcePath;
        $request->method = $method;
        $request->headers = $headerParams;
        $request->body = $body;
        $request->returnType = $responseType;

        $request->host = $this->configuration->getHost();
        $request->truePath = '/';
        $request->service = '';

        $request->ak = $this->configuration->getAk();
        $request->sk = $this->configuration->getSk();
        $request->sessionToken = $this->configuration->getSessionToken();

        $request->region = $this->configuration->getRegion();
        $request->schema = $this->configuration->getSchema();
        $request->endpointProvider = $this->configuration->getEndpointProvider();
        $request->customBootstrapRegion = $this->configuration->getCustomBootstrapRegion();
        $request->useDualStack = $this->configuration->getUseDualStack();

        $request->getDebug = $this->configuration->getDebug();
        $request->getDebugFile = $this->configuration->getDebugFile();

        $context->setRequest($request);
        return $context;
    }


    public function callApi(
        $body,
        $resourcePath,
        $method,
        $headerParams = null,
        $responseType = null,
        $async = false
    )
    {
        $context = $this->createContextAndRequest($body, $resourcePath, $method, $headerParams, $responseType);
        $this->interceptorChain->executeRequest($context);
        $realRequest = $context->getRequest()->realRequest;
        $options = $context->getRequest()->options;
        $returnType = $context->getRequest()->returnType;
        $this->setNewClientConfig();
        $request = $realRequest;

        //异步和同步处理方式不一样
        if ($async) {
            $uri = $request->getUri();
            return $this->client
                ->sendAsync($request, $options)
                ->then(
                    function ($response) use ($uri, $returnType) {
                        $responseContent = $response->getBody()->getContents();
                        $content = json_decode($responseContent);
                        $statusCode = $response->getStatusCode();

                        if (isset($content->{'ResponseMetadata'}->{'Error'})) {
                            throw new ApiException(
                                sprintf(
                                    '[%d] Return Error From the API (%s)(%s)',
                                    $statusCode,
                                    $uri,
                                    $response->getBody()
                                ),
                                $statusCode,
                                $response->getHeaders(),
                                $responseContent);
                        }
                        $metaData = $content->{'ResponseMetadata'};
                        $content = isset($content->{'Result'}) ? $content->{'Result'} : "";
                        $deserializedContent = ObjectSerializer::deserialize($content, $returnType, []);
                        if (is_object($deserializedContent)) {
                            $deserializedContent->offsetSet('ResponseMetadata', $metaData);
                        }
                        return [
                            $deserializedContent,
                            $response->getStatusCode(),
                            $response->getHeaders()
                        ];
                    },
                    function ($exception) {
                        $response = $exception->getResponse();
                        $statusCode = $response->getStatusCode();
                        throw new ApiException(
                            sprintf(
                                '[%d] Error connecting to the API (%s)(%s)',
                                $statusCode,
                                $exception->getRequest()->getUri(),
                                $response->getBody()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $response->getBody()
                        );
                    }
                );
        } else {
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                $resp = $e->getResponse();
                $respBody = $resp ? (string)$resp->getBody() : '';
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}{$respBody}",
                    $e->getCode(),
                    $resp ? $resp->getHeaders() : null,
                    $respBody
                );
            }
            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)(%s)',
                        $statusCode,
                        $request->getUri(),
                        $response->getBody()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseContent = $response->getBody()->getContents();
            $content = json_decode($responseContent);

            if (isset($content->{'ResponseMetadata'}->{'Error'})) {
                throw new ApiException(
                    sprintf(
                        '[%d] Return Error From the API (%s)(%s)',
                        $statusCode,
                        $request->getUri(),
                        $response->getBody()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $responseContent);
            }
            $metaData = $content->{'ResponseMetadata'};
            $content = isset($content->{'Result'}) ? $content->{'Result'} : "";
            $deserializedContent = ObjectSerializer::deserialize($content, $returnType, []);
            if (is_object($deserializedContent)) {
                $deserializedContent->offsetSet('ResponseMetadata', $metaData);
            }
            return [
                $deserializedContent,
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        }
    }

    public function setNewClientConfig()
    {
        $config = [];

        $clientConfig = $this->client->getConfig();

        //如果两者不一样,client的配置和全局configuration配置不同
        //配置verify
        $clientVerify = isset($clientConfig['verify']) ? $clientConfig['verify'] : true;
        if ($this->configuration->getVerifySsl() != $clientVerify) {
            if ($clientVerify != true) {
                $config['verify'] = $clientVerify;
            } else {
                $config['verify'] = $this->configuration->getVerifySsl();
            }
        }

        //配置readTimeout
        if (isset($clientConfig['timeout']) && $this->configuration->getReadTimeout() != $clientConfig['timeout']) {
            if ($clientConfig['timeout'] != null) {
                $config['timeout'] = $clientConfig['timeout'];
            } else {
                $config['timeout'] = $this->configuration->getReadTimeout();
            }
        }

        //配置connectTimeout
        if (isset($clientConfig['connect_timeout']) && $this->configuration->getConnectTimeout() != $clientConfig['connect_timeout']) {
            if ($clientConfig['connect_timeout'] != null) {
                $config['connect_timeout'] = $clientConfig['connect_timeout'];
            } else {
                $config['connect_timeout'] = $this->configuration->getConnectTimeout();
            }
        }
        $handler = isset($clientConfig['handler']) ? $clientConfig['handler'] : \GuzzleHttp\HandlerStack::create();
        $this->client = new Client(array_merge($clientConfig, $config, ['handler' => $handler]));
    }
}

?>
