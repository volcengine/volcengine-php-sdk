<?php

namespace Volcengine\Common\Retry;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use Volcengine\Common\ApiException;
use Volcengine\Common\ErrorDetails;

class Retryer
{
    private static $retryStatusCodes = [429, 500, 502, 503, 504];
    private static $defaultRetryErrorCodes = [
        'RequestError',
        'RequestTimeout',
        'ResponseTimeout',
        'RequestTimeoutException',
        'ProvisionedThroughputExceededException',
        'Throttling',
        'ThrottlingException',
        'TooManyRequests',
        'TooManyRequestsException',
        'RequestLimitExceeded',
        'RequestThrottled',
        'RequestThrottledException',
        'PriorRequestNotComplete',
        'TransactionInProgressException',
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

        $nodes = ErrorDetails::walk($error);
        // Deterministic transport failures take precedence over status or code.
        foreach ($nodes as $node) {
            $code = $node instanceof ApiException ? $node->getDiagnosticCode() : ErrorDetails::transportCode($node);
            if (in_array($code, ['RequestCanceled', 'TLSError'], true)) {
                return false;
            }
        }
        foreach ($nodes as $node) {
            if ($node instanceof TransferException) {
                $httpResponse = $node instanceof RequestException ? $node->getResponse() : null;
                if ($httpResponse === null || in_array((int) $httpResponse->getStatusCode(), self::$retryStatusCodes, true)) {
                    return true;
                }
            }
            if ($node instanceof ApiException) {
                if (in_array((int) $node->getStatusCode(), self::$retryStatusCodes, true)) {
                    return true;
                }
            }
            $code = self::nodeErrorCode($node);
            if ($code !== null && (in_array($code, $this->getEffectiveRetryErrorCodes(), true) || self::isCredentialExpiryError($code))) {
                return true;
            }
        }

        if ($response !== null) {
            $statusCode = method_exists($response, 'getStatusCode') ? (int) $response->getStatusCode() : null;
            if ($statusCode !== null && in_array($statusCode, self::$retryStatusCodes, true)) {
                return true;
            }

            $errorCode = self::responseErrorCode($response);
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
        if (is_array($body)) {
            $body = json_encode($body);
        }
        $error = ErrorDetails::serviceError($body);
        return $error !== null ? $error['code'] : null;
    }

    public static function isCredentialExpiryError($errorCode)
    {
        return in_array($errorCode, self::$credentialExpiryErrorCodes, true);
    }

    public static function hasCredentialExpiryError($error)
    {
        foreach (ErrorDetails::walk($error) as $node) {
            if (self::isCredentialExpiryError(self::nodeErrorCode($node))) {
                return true;
            }
        }
        return false;
    }

    private static function nodeErrorCode($error)
    {
        if ($error instanceof ApiException) {
            return $error->getDiagnosticCode();
        }
        if (is_callable([$error, 'getErrorCode'])) {
            return $error->getErrorCode();
        }
        if ($error instanceof RequestException && $error->getResponse() !== null) {
            return self::responseErrorCode($error->getResponse());
        }
        return null;
    }

    private static function responseErrorCode($response)
    {
        if (!is_callable([$response, 'getBody'])) {
            return null;
        }
        $stream = $response->getBody();
        // Inspect customer response streams without consuming or replacing them.
        if (!$stream->isSeekable()) {
            return null;
        }
        $position = null;
        try {
            $position = $stream->tell();
            $stream->rewind();
            return self::extractErrorCode($stream->getContents());
        } catch (\Exception $e) {
            return null;
        } catch (\Throwable $e) {
            return null;
        } finally {
            if ($position !== null) {
                try {
                    $stream->seek($position);
                } catch (\Exception $e) {
                } catch (\Throwable $e) {
                }
            }
        }
    }

    private function getEffectiveRetryErrorCodes()
    {
        return array_values(array_unique(array_merge(self::$defaultRetryErrorCodes, $this->retryErrorCodes)));
    }
}
