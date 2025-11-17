<?php

namespace Volcengine\Common\Interceptor\Interceptors;

class Request
{
    public $method;
    public $url;
    public $headers = [];
    public $body;
    public $queryParams = [];
    public $collectionFormats = [];
    public $pathParams;
    public $resourcePath;
    public $md;
    public $files;
    public $truePath;
    public $service;
    public $ak;
    public $sk;
    public $host;
    public $sessionToken;
    public $region;
    public $schema;
    public $endpointProvider;
    public $customBootstrapRegion;
    public $useDualStack;
    public $autoRetry = true;
    public $retryer;
    public $credentialProvider;
    public $runtimeOptions;
    public $model;
    public $realRequest;
    public $options;
    public $returnType;
    public $getDebug;
    public $getDebugFile;
    public $httpBody;
    public $query;


    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function getCollectionFormats()
    {
        return $this->collectionFormats;
    }

    public function setCollectionFormats($collectionFormats)
    {
        $this->collectionFormats = $collectionFormats;
        return $this;
    }

    public function getPathParams()
    {
        return $this->pathParams;
    }

    public function setPathParams($pathParams)
    {
        $this->pathParams = $pathParams;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }

    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function getQueryParams()
    {
        return $this->queryParams;
    }

    public function setQueryParams($queryParams)
    {
        $this->queryParams = $queryParams;
        return $this;
    }

    public function addQueryParam($key, $value)
    {
        $this->queryParams[$key] = $value;
        return $this;
    }
}

?>
