<?php

namespace Volcengine\Common\Interceptor\Interceptors;

class GzipRequestInterceptor extends Interceptor
{
    public function name()
    {
        return 'volcengine-gzip-request-interceptor';
    }

    public function intercept(Context $context)
    {
        $request = $context->getRequest();
        if (empty($request->enableRequestGzip) || !function_exists('gzencode')) {
            return $context;
        }

        $body = $request->httpBody;
        if (!is_string($body) || $body === '') {
            return $context;
        }

        $minLength = isset($request->gzipMinLength) ? (int) $request->gzipMinLength : 1024;
        if (strlen($body) < $minLength) {
            return $context;
        }

        $method = strtoupper($request->method);
        if (!in_array($method, ['POST', 'PUT', 'PATCH'], true)) {
            return $context;
        }

        if (isset($request->headers['Content-Encoding'])) {
            return $context;
        }

        $request->httpBody = gzencode($body);
        $request->headers['Content-Encoding'] = 'gzip';
        $request->headers['Accept-Encoding'] = 'gzip';
        foreach (array_keys($request->headers) as $headerName) {
            if (strtolower($headerName) === 'content-length') {
                unset($request->headers[$headerName]);
            }
        }

        return $context;
    }
}
