<?php

namespace Volcengine\Common\Error;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;

class ApiExceptionFactory
{
    public static function fromRequestException(RequestException $e, $simpleError = false)
    {
        $response = $e->getResponse();
        $request = $e->getRequest();
        if ($response !== null) {
            $statusCode = $response->getStatusCode();
            $body = (string) $response->getBody();

            $exception = self::fromHttpResponse(
                $statusCode,
                $request !== null ? $request->getUri() : null,
                $response->getHeaders(),
                $body,
                sprintf('[%d] %s%s', $statusCode, $e->getMessage(), $body),
                $simpleError
            );
            $exception->setOriginalError($e);
            return $exception;
        }

        return self::fromTransferError($e->getMessage(), $e->getCode(), [], null, $e);
    }

    public static function fromTransferException(TransferException $e)
    {
        return self::fromTransferError($e->getMessage(), $e->getCode(), [], null, $e);
    }

    public static function fromTransferError($message, $code = 0, $headers = null, $body = null, $originalError = null)
    {
        $headers = $headers === null ? [] : $headers;
        $statusCode = is_numeric($code) ? (int) $code : 0;
        $normalized = strtolower((string) $message);

        if (strpos($normalized, 'timed out') !== false || strpos($normalized, 'timeout') !== false) {
            return self::hydrateException(new ResponseTimeoutException($message, $statusCode, $headers, $body), $statusCode, null, $message, $originalError);
        }

        if (strpos($normalized, 'canceled') !== false || strpos($normalized, 'cancelled') !== false) {
            return self::hydrateException(new RequestCanceledException($message, $statusCode, $headers, $body), $statusCode, null, $message, $originalError);
        }

        return self::hydrateException(new ReadException($message, $statusCode, $headers, $body), $statusCode, null, $message, $originalError);
    }

    public static function fromHttpResponse($statusCode, $uri, $headers, $body, $message = null, $simpleError = false)
    {
        $statusCode = (int) $statusCode;
        $headers = $headers === null ? [] : $headers;
        $bodyString = self::normalizeBody($body);
        $uriString = $uri ? (string) $uri : '';
        $serviceError = self::extractServiceError($bodyString);
        if ($message === null) {
            if ($simpleError && $serviceError !== null) {
                $message = self::formatSimpleMessage($statusCode, $serviceError);
            } else {
                $message = sprintf('[%d] Error connecting to the API (%s)(%s)', $statusCode, $uriString, $bodyString);
            }
        }

        if ($statusCode >= 500) {
            return self::hydrateException(new ServerException($message, $statusCode, $headers, $bodyString), $statusCode, $serviceError ? $serviceError['code'] : null, $serviceError ? $serviceError['message'] : $message);
        }

        if ($statusCode >= 400) {
            return self::hydrateException(new ClientException($message, $statusCode, $headers, $bodyString), $statusCode, $serviceError ? $serviceError['code'] : null, $serviceError ? $serviceError['message'] : $message);
        }

        return self::hydrateException(new ServiceException($message, $statusCode, $headers, $bodyString), $statusCode, $serviceError ? $serviceError['code'] : null, $serviceError ? $serviceError['message'] : $message);
    }

    public static function fromServiceError($statusCode, $uri, $headers, $body, $simpleError = false)
    {
        $statusCode = (int) $statusCode;
        $bodyString = self::normalizeBody($body);
        $serviceError = self::extractServiceError($bodyString);
        $message = $simpleError && $serviceError !== null
            ? self::formatSimpleMessage($statusCode, $serviceError)
            : sprintf('[%d] Return Error From the API (%s)(%s)', $statusCode, (string) $uri, $bodyString);

        if ($statusCode >= 500) {
            return self::hydrateException(new ServerException($message, $statusCode, $headers, $bodyString), $statusCode, $serviceError ? $serviceError['code'] : null, $serviceError ? $serviceError['message'] : $message);
        }

        if ($statusCode >= 400) {
            return self::hydrateException(new ClientException($message, $statusCode, $headers, $bodyString), $statusCode, $serviceError ? $serviceError['code'] : null, $serviceError ? $serviceError['message'] : $message);
        }

        return self::hydrateException(new ServiceException($message, $statusCode, $headers, $bodyString), $statusCode, $serviceError ? $serviceError['code'] : null, $serviceError ? $serviceError['message'] : $message);
    }

    public static function extractServiceError($body)
    {
        $bodyString = self::normalizeBody($body);
        if ($bodyString === '') {
            return null;
        }

        $decoded = json_decode($bodyString, true);
        if (!is_array($decoded) || !isset($decoded['ResponseMetadata']['Error'])) {
            return null;
        }

        $error = $decoded['ResponseMetadata']['Error'];
        return [
            'code' => isset($error['Code']) ? $error['Code'] : null,
            'message' => isset($error['Message']) ? $error['Message'] : null,
        ];
    }

    private static function normalizeBody($body)
    {
        if ($body === null) {
            return '';
        }

        if (is_string($body)) {
            return $body;
        }

        if (is_scalar($body)) {
            return (string) $body;
        }

        $encoded = json_encode($body);
        return $encoded === false ? '' : $encoded;
    }

    private static function hydrateException($exception, $statusCode, $errorCode = null, $errorMessage = null, $originalError = null)
    {
        if (method_exists($exception, 'setStatusCode')) {
            $exception->setStatusCode($statusCode);
        }
        if (method_exists($exception, 'setErrorCode')) {
            $exception->setErrorCode($errorCode);
        }
        if (method_exists($exception, 'setErrorMessage')) {
            $exception->setErrorMessage($errorMessage);
        }
        if (method_exists($exception, 'setOriginalError')) {
            $exception->setOriginalError($originalError);
        }
        return $exception;
    }

    private static function formatSimpleMessage($statusCode, array $serviceError)
    {
        $code = isset($serviceError['code']) && $serviceError['code'] ? $serviceError['code'] : 'ServiceError';
        $message = isset($serviceError['message']) && $serviceError['message'] ? $serviceError['message'] : 'request failed';
        return sprintf('[%d] %s: %s', $statusCode, $code, $message);
    }
}
