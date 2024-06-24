<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vefaas\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Volcengine\Common\ApiException;
use Volcengine\Common\Configuration;
use Volcengine\Common\HeaderSelector;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\Utils;

class VEFAASApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    public function createFunction($body)
    {
        list($response) = $this->createFunctionWithHttpInfo($body);
        return $response;
    }

    public function createFunctionWithHttpInfo($body)
    {
        $returnType = '\Volcengine\Vefaas\Model\CreateFunctionResponse';
        $request = $this->createFunctionRequest($body);

        $options = $this->createHttpClientOption();
        try {
            $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                $e->getCode(),
                $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
            );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf(
                    '[%d] Error connecting to the API (%s)',
                    $statusCode,
                    $request->getUri()
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
                    '[%d] Return Error From the API (%s)',
                    $statusCode,
                    $request->getUri()
                ),
                $statusCode,
                $response->getHeaders(),
                $responseContent);
        }
        $content = $content->{'Result'};

        return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    public function createFunctionAsync($body)
    {
        return $this->createFunctionAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    public function createFunctionAsyncWithHttpInfo($body)
    {
        $returnType = '\Volcengine\Vefaas\Model\CreateFunctionResponse';
        $request = $this->createFunctionRequest($body);
        $uri = $request->getUri();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($uri, $returnType) {
                    $responseContent = $response->getBody()->getContents();
                    $content = json_decode($responseContent);
                    $statusCode = $response->getStatusCode();

                    if (isset($content->{'ResponseMetadata'}->{'Error'})) {
                        throw new ApiException(
                            sprintf(
                                '[%d] Return Error From the API (%s)',
                                $statusCode,
                                $uri
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $responseContent);
                    }
                    $content = $content->{'Result'};

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    protected function createFunctionRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling createFunction'
            );
        }

        $resourcePath = '/CreateFunction/2024-06-06/vefaas/post/application_json/';
        $queryParams = [];
        $httpBody = $body;

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }
        if ($this->config->getHost()) {
            $defaultHeaders['Host'] = $this->config->getHost();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headers
        );

        $paths = explode("/", $resourcePath);
        $service = $paths[3];
        $method = strtoupper($paths[4]);

        // format request body
        if ($method == 'GET' && $headers['Content-Type'] === 'text/plain') {
            $queryParams = Utils::transRequest($httpBody);
            $httpBody = '';
        } else {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($body));
        }

        $queryParams['Action'] = $paths[1];
        $queryParams['Version'] = $paths[2];
        $resourcePath = '/';

        $query = '';
        ksort($queryParams);  // sort query first
        foreach ($queryParams as $k => $v) {
            $query .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
        }
        $query = substr($query, 0, -1);

        $headers = Utils::signv4($this->config->getAk(), $this->config->getSk(), $this->config->getRegion(), $service,
            $httpBody, $query, $method, $resourcePath, $headers);

        return new Request($method,
            'https://' . $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers, $httpBody);
    }

    public function deleteFunction($body)
    {
        list($response) = $this->deleteFunctionWithHttpInfo($body);
        return $response;
    }

    public function deleteFunctionWithHttpInfo($body)
    {
        $returnType = '\Volcengine\Vefaas\Model\DeleteFunctionResponse';
        $request = $this->deleteFunctionRequest($body);

        $options = $this->createHttpClientOption();
        try {
            $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                $e->getCode(),
                $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
            );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf(
                    '[%d] Error connecting to the API (%s)',
                    $statusCode,
                    $request->getUri()
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
                    '[%d] Return Error From the API (%s)',
                    $statusCode,
                    $request->getUri()
                ),
                $statusCode,
                $response->getHeaders(),
                $responseContent);
        }
        $content = $content->{'Result'};

        return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    public function deleteFunctionAsync($body)
    {
        return $this->deleteFunctionAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    public function deleteFunctionAsyncWithHttpInfo($body)
    {
        $returnType = '\Volcengine\Vefaas\Model\DeleteFunctionResponse';
        $request = $this->deleteFunctionRequest($body);
        $uri = $request->getUri();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($uri, $returnType) {
                    $responseContent = $response->getBody()->getContents();
                    $content = json_decode($responseContent);
                    $statusCode = $response->getStatusCode();

                    if (isset($content->{'ResponseMetadata'}->{'Error'})) {
                        throw new ApiException(
                            sprintf(
                                '[%d] Return Error From the API (%s)',
                                $statusCode,
                                $uri
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $responseContent);
                    }
                    $content = $content->{'Result'};

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    protected function deleteFunctionRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling deleteFunction'
            );
        }

        $resourcePath = '/DeleteFunction/2024-06-06/vefaas/post/application_json/';
        $queryParams = [];
        $httpBody = $body;

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }
        if ($this->config->getHost()) {
            $defaultHeaders['Host'] = $this->config->getHost();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headers
        );

        $paths = explode("/", $resourcePath);
        $service = $paths[3];
        $method = strtoupper($paths[4]);

        // format request body
        if ($method == 'GET' && $headers['Content-Type'] === 'text/plain') {
            $queryParams = Utils::transRequest($httpBody);
            $httpBody = '';
        } else {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($body));
        }

        $queryParams['Action'] = $paths[1];
        $queryParams['Version'] = $paths[2];
        $resourcePath = '/';

        $query = '';
        ksort($queryParams);  // sort query first
        foreach ($queryParams as $k => $v) {
            $query .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
        }
        $query = substr($query, 0, -1);

        $headers = Utils::signv4($this->config->getAk(), $this->config->getSk(), $this->config->getRegion(), $service,
            $httpBody, $query, $method, $resourcePath, $headers);

        return new Request($method,
            'https://' . $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers, $httpBody);
    }

    public function getFunction($body)
    {
        list($response) = $this->getFunctionWithHttpInfo($body);
        return $response;
    }

    public function getFunctionWithHttpInfo($body)
    {
        $returnType = '\Volcengine\Vefaas\Model\GetFunctionResponse';
        $request = $this->getFunctionRequest($body);

        $options = $this->createHttpClientOption();
        try {
            $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                $e->getCode(),
                $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
            );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf(
                    '[%d] Error connecting to the API (%s)',
                    $statusCode,
                    $request->getUri()
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
                    '[%d] Return Error From the API (%s)',
                    $statusCode,
                    $request->getUri()
                ),
                $statusCode,
                $response->getHeaders(),
                $responseContent);
        }
        $content = $content->{'Result'};

        return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    public function getFunctionAsync($body)
    {
        return $this->getFunctionAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    public function getFunctionAsyncWithHttpInfo($body)
    {
        $returnType = '\Volcengine\Vefaas\Model\GetFunctionResponse';
        $request = $this->getFunctionRequest($body);
        $uri = $request->getUri();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($uri, $returnType) {
                    $responseContent = $response->getBody()->getContents();
                    $content = json_decode($responseContent);
                    $statusCode = $response->getStatusCode();

                    if (isset($content->{'ResponseMetadata'}->{'Error'})) {
                        throw new ApiException(
                            sprintf(
                                '[%d] Return Error From the API (%s)',
                                $statusCode,
                                $uri
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $responseContent);
                    }
                    $content = $content->{'Result'};

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    protected function getFunctionRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling getFunction'
            );
        }

        $resourcePath = '/GetFunction/2024-06-06/vefaas/post/application_json/';
        $queryParams = [];
        $httpBody = $body;

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }
        if ($this->config->getHost()) {
            $defaultHeaders['Host'] = $this->config->getHost();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headers
        );

        $paths = explode("/", $resourcePath);
        $service = $paths[3];
        $method = strtoupper($paths[4]);

        // format request body
        if ($method == 'GET' && $headers['Content-Type'] === 'text/plain') {
            $queryParams = Utils::transRequest($httpBody);
            $httpBody = '';
        } else {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($body));
        }

        $queryParams['Action'] = $paths[1];
        $queryParams['Version'] = $paths[2];
        $resourcePath = '/';

        $query = '';
        ksort($queryParams);  // sort query first
        foreach ($queryParams as $k => $v) {
            $query .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
        }
        $query = substr($query, 0, -1);

        $headers = Utils::signv4($this->config->getAk(), $this->config->getSk(), $this->config->getRegion(), $service,
            $httpBody, $query, $method, $resourcePath, $headers);

        return new Request($method,
            'https://' . $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers, $httpBody);
    }

    public function updateFunction($body)
    {
        list($response) = $this->updateFunctionWithHttpInfo($body);
        return $response;
    }

    public function updateFunctionWithHttpInfo($body)
    {
        $returnType = '\Volcengine\Vefaas\Model\UpdateFunctionResponse';
        $request = $this->updateFunctionRequest($body);

        $options = $this->createHttpClientOption();
        try {
            $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                $e->getCode(),
                $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
            );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf(
                    '[%d] Error connecting to the API (%s)',
                    $statusCode,
                    $request->getUri()
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
                    '[%d] Return Error From the API (%s)',
                    $statusCode,
                    $request->getUri()
                ),
                $statusCode,
                $response->getHeaders(),
                $responseContent);
        }
        $content = $content->{'Result'};

        return [
            ObjectSerializer::deserialize($content, $returnType, []),
            $response->getStatusCode(),
            $response->getHeaders()
        ];
    }

    public function updateFunctionAsync($body)
    {
        return $this->updateFunctionAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    public function updateFunctionAsyncWithHttpInfo($body)
    {
        $returnType = '\Volcengine\Vefaas\Model\UpdateFunctionResponse';
        $request = $this->updateFunctionRequest($body);
        $uri = $request->getUri();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($uri, $returnType) {
                    $responseContent = $response->getBody()->getContents();
                    $content = json_decode($responseContent);
                    $statusCode = $response->getStatusCode();

                    if (isset($content->{'ResponseMetadata'}->{'Error'})) {
                        throw new ApiException(
                            sprintf(
                                '[%d] Return Error From the API (%s)',
                                $statusCode,
                                $uri
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $responseContent);
                    }
                    $content = $content->{'Result'};

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    protected function updateFunctionRequest($body)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling updateFunction'
            );
        }

        $resourcePath = '/UpdateFunction/2024-06-06/vefaas/post/application_json/';
        $queryParams = [];
        $httpBody = $body;

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }
        if ($this->config->getHost()) {
            $defaultHeaders['Host'] = $this->config->getHost();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headers
        );

        $paths = explode("/", $resourcePath);
        $service = $paths[3];
        $method = strtoupper($paths[4]);

        // format request body
        if ($method == 'GET' && $headers['Content-Type'] === 'text/plain') {
            $queryParams = Utils::transRequest($httpBody);
            $httpBody = '';
        } else {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($body));
        }

        $queryParams['Action'] = $paths[1];
        $queryParams['Version'] = $paths[2];
        $resourcePath = '/';

        $query = '';
        ksort($queryParams);  // sort query first
        foreach ($queryParams as $k => $v) {
            $query .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
        }
        $query = substr($query, 0, -1);

        $headers = Utils::signv4($this->config->getAk(), $this->config->getSk(), $this->config->getRegion(), $service,
            $httpBody, $query, $method, $resourcePath, $headers);

        return new Request($method,
            'https://' . $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers, $httpBody);
    }


    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
