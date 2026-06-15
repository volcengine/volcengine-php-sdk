<?php

namespace Volcengine\Common\Retry;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use Volcengine\Common\ApiException;

class Retryer
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

    private $numMaxRetries;
    private $minRetryDelayMs;
    private $maxRetryDelayMs;
    private $retryErrorCodes;

    public function __construct($numMaxRetries = 3, $minRetryDelayMs = 300, $maxRetryDelayMs = 300000, $retryErrorCodes = [])
    {
        $this->numMaxRetries = $numMaxRetries;
        $this->minRetryDelayMs = $minRetryDelayMs;
        $this->maxRetryDelayMs = $maxRetryDelayMs;
        $this->retryErrorCodes = array_values(array_unique($retryErrorCodes ?: []));
    }

    public function getNumMaxRetries()
    {
        return $this->numMaxRetries;
    }

    public function setNumMaxRetries($numMaxRetries)
    {
        $this->numMaxRetries = $numMaxRetries;
        return $this;
    }

    public function getMinRetryDelayMs()
    {
        return $this->minRetryDelayMs;
    }

    public function setMinRetryDelayMs($minRetryDelayMs)
    {
        $this->minRetryDelayMs = $minRetryDelayMs;
        return $this;
    }

    public function getMaxRetryDelayMs()
    {
        return $this->maxRetryDelayMs;
    }

    public function setMaxRetryDelayMs($maxRetryDelayMs)
    {
        $this->maxRetryDelayMs = $maxRetryDelayMs;
        return $this;
    }

    public function getRetryErrorCodes()
    {
        return $this->retryErrorCodes;
    }

    public function setRetryErrorCodes($retryErrorCodes)
    {
        $this->retryErrorCodes = array_values(array_unique($retryErrorCodes ?: []));
        return $this;
    }

    public function shouldRetry($response, $retryCount, $error)
    {
        if ($retryCount >= $this->numMaxRetries) {
            return false;
        }

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

    public function getBackoffDelay($retryCount)
    {
        if ($retryCount >= $this->numMaxRetries) {
            throw new \InvalidArgumentException('Retry count exceeds maximum limit');
        }

        $base = min($this->minRetryDelayMs * pow(2, $retryCount), $this->maxRetryDelayMs);
        if ($base <= 0) {
            return 0.0;
        }

        return min($this->maxRetryDelayMs, $base + mt_rand(0, (int) $base));
    }

    public function getRetryDelay($retryCount, $response = null)
    {
        $backoffDelay = $this->getBackoffDelay($retryCount);
        $retryAfterDelay = $this->getRetryAfterDelay($response);
        if ($retryAfterDelay === null) {
            return $backoffDelay;
        }

        return max($backoffDelay, $retryAfterDelay);
    }

    private function getRetryAfterDelay($response)
    {
        if ($response === null || !method_exists($response, 'getHeaderLine')) {
            return null;
        }

        $retryAfter = $response->getHeaderLine('Retry-After');
        if ($retryAfter === '') {
            return null;
        }

        if (ctype_digit($retryAfter)) {
            return (float) $retryAfter * 1000;
        }

        $timestamp = strtotime($retryAfter);
        if ($timestamp === false) {
            return null;
        }

        $delaySeconds = $timestamp - time();
        if ($delaySeconds <= 0) {
            return 0.0;
        }

        return (float) $delaySeconds * 1000;
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
