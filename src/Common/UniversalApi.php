<?php

namespace Volcengine\Common;

class UniversalApi
{
    private $apiClient;

    public function __construct(ApiClient $apiClient = null)
    {
        $this->apiClient = $apiClient ?: new ApiClient();
    }

    public function doCall(UniversalInfo $info, array $body = [], RuntimeOptions $runtimeOptions = null)
    {
        list($data) = $this->doCallWithHttpInfo($info, $body, $runtimeOptions);
        return $data;
    }

    public function doRequest(UniversalRequest $request, RuntimeOptions $runtimeOptions = null)
    {
        return $this->doCall($request, $request->body, $runtimeOptions);
    }

    public function doCallWithHttpInfo(UniversalInfo $info, array $body = [], RuntimeOptions $runtimeOptions = null)
    {
        $method = strtoupper($info->method);
        $headers = ['Accept' => 'application/json'];
        $headers['Content-Type'] = $info->contentType !== null
            ? $info->contentType
            : ($method === 'GET' ? 'text/plain' : 'application/json');

        $path = '/' . $info->action . '/' . $info->version . '/' . $info->service . '/' . strtolower($method) . '/';

        return $this->apiClient->callApi(
            $body,
            $path,
            $method,
            $headers,
            'object',
            false,
            $runtimeOptions,
            $info->action
        );
    }
}
