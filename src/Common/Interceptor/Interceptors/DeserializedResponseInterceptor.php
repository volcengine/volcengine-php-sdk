<?php

namespace Volcengine\Common\Interceptor\Interceptors;

use Volcengine\Common\ApiException;
use Volcengine\Common\ObjectSerializer;

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
            $exception = ApiException::fromHttpResponse(
                $statusCode,
                $request->realRequest->getUri(),
                $headers,
                $body
            );
            throw $exception;
        }

        $decoded = json_decode($body);
        if (is_object($decoded) && isset($decoded->{'ResponseMetadata'}->{'Error'})) {
            $exception = ApiException::fromServiceError(
                $statusCode,
                $request->realRequest->getUri(),
                $headers,
                $body
            );
            throw $exception;
        }

        $metadata = is_object($decoded) && isset($decoded->{'ResponseMetadata'}) ? $decoded->{'ResponseMetadata'} : null;
        $result = is_object($decoded) && isset($decoded->{'Result'}) ? $decoded->{'Result'} : '';
        try {
            $deserialized = ObjectSerializer::deserialize($result, $request->returnType, $headers);
        } catch (\Exception $e) {
            $exception = new ApiException($e->getMessage(), 0, $headers, $body);
            $exception->setErrorCode('SerializationError');
            $exception->setErrorMessage($e->getMessage());
            $exception->setOriginalError($e);
            throw $exception;
        }

        if (is_object($deserialized) && method_exists($deserialized, 'offsetSet')) {
            $deserialized->offsetSet('ResponseMetadata', $metadata);
        }

        $response->metadata = $metadata;
        $response->result = $deserialized;

        return $context;
    }
}
