<?php

namespace Volcengine\Common\Interceptor\Interceptors;

use Volcengine\Common\ApiException;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\Utils;

class BuildRequestInterceptor extends Interceptor
{
    public function intercept(Context $context)
    {
        // 构建请求逻辑
        /**
         * Request 对象
         * @var \Volcengine\Common\Interceptor\Interceptors\Request $request
         */
        $request = $context->getRequest();
        $method = strtoupper($request->getMethod());
        $headers = $request->getHeaders();
        $body = $request->body;
        $httpBody = $body;
        $resourcePath = $request->resourcePath;
        $paths = explode("/", $resourcePath);
        if (count($paths) < 5) {
            throw new ApiException('Invalid resourcePath: ' . $resourcePath);
        }
        $service = $paths[3];
        $queryParams = [];
        // format request body
        $ct = isset($headers['Content-Type']) ? $headers['Content-Type'] : 'application/json';
        if ($method == 'GET' && $ct === 'text/plain') {
            $queryParams = Utils::transRequest($httpBody);
            $httpBody = '';
        } elseif ($method == 'POST' && $ct === 'application/x-www-form-urlencoded') {
            $httpBody = Utils::transRequest($httpBody);
            $httpBody = http_build_query($httpBody);
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

        $request->service = $service;
        $request->query = $query ? $query : '';

        $request->headers = $headers;
        $request->httpBody = $httpBody;
        //没有配置realRequest和options
        return $context;
    }
}

?>
