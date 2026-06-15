<?php

namespace Volcengine\Common\Interceptor\Interceptors;

use Volcengine\Common\LogHelper;
use Volcengine\Common\SdkLogger;

class HttpLoggingInterceptor extends ResponseInterceptor
{
    public function name()
    {
        return 'volcengine-http-logging-interceptor';
    }

    public static function logRequest(Request $request)
    {
        if ($request->realRequest === null) {
            return;
        }

        LogHelper::debug($request->logger, $request->logLevel, SdkLogger::LOG_REQUEST,
            'HTTP request {method} {url}', [
                'method' => $request->method,
                'url' => (string) $request->realRequest->getUri(),
            ]
        );
    }

    public function intercept(Context $context)
    {
        $request = $context->getRequest();
        $response = $context->getResponse();
        if ($request === null || $response === null || $response->httpResponse === null) {
            return $context;
        }

        $httpResponse = $response->httpResponse;
        LogHelper::debug($request->logger, $request->logLevel, SdkLogger::LOG_RESPONSE,
            'HTTP response status={status} request_id={request_id} elapsed_ms={elapsed_ms}', [
                'status' => $httpResponse->getStatusCode(),
                'request_id' => $this->getRequestId($httpResponse),
                'elapsed_ms' => $context->getAttribute('elapsed_ms'),
            ]
        );

        return $context;
    }

    private function getRequestId($httpResponse)
    {
        foreach (['X-Request-Id', 'X-Request-ID', 'X-Tt-Logid'] as $name) {
            if (method_exists($httpResponse, 'getHeaderLine')) {
                $value = $httpResponse->getHeaderLine($name);
                if ($value !== '') {
                    return $value;
                }
            }
        }
        return '';
    }
}
