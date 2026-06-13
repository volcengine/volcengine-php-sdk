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

    public function intercept(Context $context)
    {
        $request = $context->getRequest();
        $response = $context->getResponse();
        $logger = $request->logger;

        if (!LogHelper::isEnabled($logger)) {
            return $context;
        }

        LogHelper::debug($logger, SdkLogger::LOG_REQUEST, 'Request', '{method} {url}', [
            'method' => $request->method,
            'url' => $request->realRequest ? (string) $request->realRequest->getUri() : $request->url,
            '__log_account' => $request->logAccount,
            '__log_sensitives' => $request->logSensitives,
        ]);
        LogHelper::debug($logger, SdkLogger::LOG_REQUEST, 'Request', 'headers: {headers}', [
            'headers' => $request->headers,
            '__log_account' => $request->logAccount,
            '__log_sensitives' => $request->logSensitives,
        ]);

        if ($request->httpBody !== null && $request->httpBody !== '') {
            LogHelper::debug($logger, SdkLogger::LOG_REQUEST_BODY, 'Request', 'body: {body}', [
                'body' => $request->httpBody,
                '__log_account' => $request->logAccount,
                '__log_sensitives' => $request->logSensitives,
            ]);
        }

        if ($response !== null && $response->httpResponse !== null) {
            $httpResponse = $response->httpResponse;
            LogHelper::debug($logger, SdkLogger::LOG_RESPONSE, 'Response', 'status: {status} elapsed_ms: {elapsed_ms}', [
                'status' => $httpResponse->getStatusCode(),
                'elapsed_ms' => $context->getAttribute('elapsed_ms'),
                '__log_account' => $request->logAccount,
                '__log_sensitives' => $request->logSensitives,
            ]);
            LogHelper::debug($logger, SdkLogger::LOG_RESPONSE, 'Response', 'headers: {headers}', [
                'headers' => $httpResponse->getHeaders(),
                '__log_account' => $request->logAccount,
                '__log_sensitives' => $request->logSensitives,
            ]);
            LogHelper::debug($logger, SdkLogger::LOG_RESPONSE_BODY, 'Response', 'body: {body}', [
                'body' => (string) $httpResponse->getBody(),
                '__log_account' => $request->logAccount,
                '__log_sensitives' => $request->logSensitives,
            ]);
            $bodyStream = $httpResponse->getBody();
            if (method_exists($bodyStream, 'isSeekable') && $bodyStream->isSeekable()) {
                $bodyStream->seek(0);
            }
        }

        return $context;
    }
}
