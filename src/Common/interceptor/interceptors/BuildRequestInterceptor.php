<?php

namespace Volcengine\Common\Interceptor\Interceptors;

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
        $service = $paths[3];
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

        $request->service = $service;
        $request->query = $query ? $query : '';

        $request->headers = $headers;
        $request->httpBody = $httpBody;
        //没有配置realRequest和options
        return $context;
    }
}

?>
