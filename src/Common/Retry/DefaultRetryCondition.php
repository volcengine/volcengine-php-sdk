<?php

namespace Volcengine\Common\Retry;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use Volcengine\Common\ApiException;

class DefaultRetryCondition extends RetryCondition
{
    private static $retryStatusCodes = [429, 500, 502, 503, 504];
    private static $defaultRetryErrorCodes = [
        'Throttling',
        'TooManyRequests',
        'TooManyRequestsException',
        'RequestLimitExceeded',
        'RequestThrottled',
        'ServiceUnavailable',
    ];
    private static $credentialExpiryErrorCodes = [
        'ExpiredToken',
        'ExpiredTokenException',
        'RequestExpired',
        'InvalidAccessKey',
        'InvalidAccessKeyId',
    ];

    public function shouldRetry($response, $error)
    {
        if ($error !== null) {
            if ($error instanceof ConnectException) {
                return true;
            }

            if ($error instanceof RequestException && $error->getResponse() === null) {
                return true;
            }

            if ($error instanceof TransferException && !$error instanceof RequestException) {
                return true;
            }

            if ($error instanceof ApiException) {
                $statusCode = (int) $error->getCode();
                if (in_array($statusCode, self::$retryStatusCodes, true)) {
                    return true;
                }

                $errorCode = self::extractErrorCode($error->getResponseBody());
                if ($errorCode !== null && (
                    in_array($errorCode, $this->getEffectiveRetryErrorCodes(), true)
                    || self::isCredentialExpiryError($errorCode)
                )) {
                    return true;
                }
            }
        }

        if ($response !== null) {
            $statusCode = method_exists($response, 'getStatusCode') ? (int) $response->getStatusCode() : null;
            if ($statusCode !== null && in_array($statusCode, self::$retryStatusCodes, true)) {
                return true;
            }

            $body = method_exists($response, 'getBody') ? (string) $response->getBody() : null;
            $errorCode = self::extractErrorCode($body);
            if ($errorCode !== null && (
                in_array($errorCode, $this->getEffectiveRetryErrorCodes(), true)
                || self::isCredentialExpiryError($errorCode)
            )) {
                return true;
            }
        }

        return false;
    }

    public static function extractErrorCode($body)
    {
        if (empty($body)) {
            return null;
        }

        if (is_object($body)) {
            $body = json_encode($body);
        }

        if (!is_string($body) || $body === '') {
            return null;
        }

        $decoded = json_decode($body, true);
        if (!is_array($decoded)) {
            return null;
        }

        if (isset($decoded['ResponseMetadata']['Error']['Code'])) {
            return $decoded['ResponseMetadata']['Error']['Code'];
        }

        return null;
    }

    public static function isCredentialExpiryError($errorCode)
    {
        return in_array($errorCode, self::$credentialExpiryErrorCodes, true);
    }

    private function getEffectiveRetryErrorCodes()
    {
        return array_values(array_unique(array_merge(self::$defaultRetryErrorCodes, $this->retryErrorCodes)));
    }
}
