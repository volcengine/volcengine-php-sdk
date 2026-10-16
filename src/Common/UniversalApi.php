<?php

namespace Volcengine\Common;

use Volcengine\Common\Endpoint\EndpointProvider;

class UniversalApi
{
    private $apiClient;

    public function __construct(ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }
        $this->apiClient = $apiClient;
    }

    public function doCall(UniversalInfo $info, array $body = [])
    {
        list($data) = $this->doCallWithHttpInfo($info, $body);
        return $data;
    }

    public function doCallWithHttpInfo(UniversalInfo $info, array $body = [])
    {
        // Validate before encoding service into resourcePath, where '/' would split it.
        if (!$this->apiClient->getConfig()->getHost()) {
            EndpointProvider::validateServiceAndRegion($info->service, $this->apiClient->getConfig()->getRegion());
        }

        $method = strtoupper($info->method ? $info->method : 'GET');
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => $this->resolveContentType($info, $method),
        ];

        $path = '/' . $info->action . '/' . $info->version . '/' . $info->service . '/' . strtolower($method) . '/';

        return $this->apiClient->callApi(
            $body,
            $path,
            $method,
            $headers,
            'object'
        );
    }

    private function resolveContentType(UniversalInfo $info, $method)
    {
        if ($info->contentType !== null && $info->contentType !== UniversalInfo::CONTENT_TYPE_DEFAULT) {
            return $info->contentType;
        }

        return $method === 'GET' ? 'text/plain' : 'application/json';
    }
}
