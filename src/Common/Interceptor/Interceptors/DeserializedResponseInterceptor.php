<?php

namespace Volcengine\Common\Interceptor\Interceptors;

use Volcengine\Common\ApiException;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\Utils;
use Volcengine\Common\ErrorDetails;

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
        $details = Utils::captureResponse($httpResponse);
        $body = $details['body'];
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
            throw $exception->setResponseDetails($details);
        }

        $decoded = json_decode($body);
        $serviceError = ErrorDetails::serviceError($body);
        if ($serviceError !== null) {
            throw ApiException::fromServiceError($statusCode, $request->realRequest->getUri(), $headers, $body)->setResponseDetails($details);
        }
        if ($body !== '' && (json_last_error() !== JSON_ERROR_NONE
            || !is_object($decoded)
            || !isset($decoded->ResponseMetadata)
            || !is_object($decoded->ResponseMetadata))) {
            throw ApiException::fromDeserializationError(
                $statusCode, $headers, $body,
                new \UnexpectedValueException('Expected a JSON object with ResponseMetadata')
            )->setResponseDetails($details);
        }
        if (is_object($decoded) && isset($decoded->{'ResponseMetadata'}->{'Error'})) {
            $exception = ApiException::fromServiceError(
                $statusCode,
                $request->realRequest->getUri(),
                $headers,
                $body
            );
            throw $exception->setResponseDetails($details);
        }

        $metadata = is_object($decoded) && isset($decoded->{'ResponseMetadata'}) ? $decoded->{'ResponseMetadata'} : null;
        $result = is_object($decoded) && isset($decoded->{'Result'}) ? $decoded->{'Result'} : '';
        try {
            $deserialized = ObjectSerializer::deserialize($result, $request->returnType, $headers);
            if (is_object($deserialized) && method_exists($deserialized, 'offsetSet')) {
                $deserialized->offsetSet('ResponseMetadata', $metadata);
            }
        } catch (\Exception $e) {
            $exception = ApiException::fromDeserializationError($statusCode, $headers, $body, $e);
            throw $exception->setResponseDetails($details);
        } catch (\Throwable $e) {
            throw ApiException::fromDeserializationError($statusCode, $headers, $body, $e)->setResponseDetails($details);
        }

        $response->metadata = $metadata;
        $response->result = $deserialized;

        return $context;
    }
}
