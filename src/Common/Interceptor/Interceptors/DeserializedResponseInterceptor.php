<?php

namespace Volcengine\Common\Interceptor\Interceptors;

use Volcengine\Common\ApiException;
use Volcengine\Common\Error\ApiExceptionFactory;
use Volcengine\Common\Error\SerializationException;
use Volcengine\Common\LogHelper;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\SdkLogger;

class DeserializedResponseInterceptor extends ResponseInterceptor
{
    public function name()
    {
        return 'volcengine-deserialized-response-interceptor';
    }

    public function intercept(Context $context)
    {
        $request = $context->getRequest();
        $response = $context->getResponse();

        if ($response === null || $response->httpResponse === null) {
            return $context;
        }

        $httpResponse = $response->httpResponse;
        $statusCode = $httpResponse->getStatusCode();
        $body = (string) $httpResponse->getBody();
        $headers = $httpResponse->getHeaders();

        $response->statusCode = $statusCode;
        $response->headers = $headers;
        $response->body = $body;

        if ($statusCode < 200 || $statusCode > 299) {
            $exception = ApiExceptionFactory::fromHttpResponse(
                $statusCode,
                $request->realRequest->getUri(),
                $headers,
                $body,
                null,
                !empty($request->simpleError)
            );
            if (is_callable($request->customUnmarshalError)) {
                $custom = call_user_func($request->customUnmarshalError, $exception, $context);
                if ($custom instanceof ApiException) {
                    throw $custom;
                }
            }
            throw $exception;
        }

        if (!empty($request->forceJsonNumberDecode) && defined('JSON_BIGINT_AS_STRING')) {
            $decoded = json_decode($body, false, 512, JSON_BIGINT_AS_STRING);
        } else {
            $decoded = json_decode($body);
        }
        if (is_object($decoded) && isset($decoded->{'ResponseMetadata'}->{'Error'})) {
            $exception = ApiExceptionFactory::fromServiceError(
                $statusCode,
                $request->realRequest->getUri(),
                $headers,
                $body,
                !empty($request->simpleError)
            );
            if (is_callable($request->customUnmarshalError)) {
                $custom = call_user_func($request->customUnmarshalError, $exception, $context);
                if ($custom instanceof ApiException) {
                    throw $custom;
                }
            }
            throw $exception;
        }

        $metadata = is_object($decoded) && isset($decoded->{'ResponseMetadata'}) ? $decoded->{'ResponseMetadata'} : null;
        $result = is_object($decoded) && isset($decoded->{'Result'}) ? $decoded->{'Result'} : '';
        try {
            $deserialized = ObjectSerializer::deserialize($result, $request->returnType, $headers);
        } catch (\Exception $e) {
            $exception = new SerializationException($e->getMessage(), 0, $headers, $body);
            if (method_exists($exception, 'setErrorCode')) {
                $exception->setErrorCode('SerializationError');
                $exception->setErrorMessage($e->getMessage());
                $exception->setOriginalError($e);
            }
            if (is_callable($request->customUnmarshalError)) {
                $custom = call_user_func($request->customUnmarshalError, $exception, $context);
                if ($custom instanceof ApiException) {
                    throw $custom;
                }
            }
            throw $exception;
        }

        if (is_object($deserialized) && method_exists($deserialized, 'offsetSet')) {
            $deserialized->offsetSet('ResponseMetadata', $metadata);
        }

        if (is_callable($request->customUnmarshalData)) {
            $custom = call_user_func($request->customUnmarshalData, $deserialized, $context);
            if ($custom !== null) {
                $deserialized = $custom;
            }
        }

        if (is_object($metadata) && isset($metadata->RequestId)) {
            LogHelper::debug($request->logger, SdkLogger::LOG_REQUEST_ID, 'Response', 'request_id: {request_id}', [
                'request_id' => $metadata->RequestId,
                '__log_account' => $request->logAccount,
                '__log_sensitives' => $request->logSensitives,
            ]);
        }

        $response->metadata = $metadata;
        $response->result = $deserialized;

        return $context;
    }
}
