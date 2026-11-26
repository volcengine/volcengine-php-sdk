<?php

namespace Volcengine\Common;

use Exception;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;

class ApiException extends Exception
{

    /**
     * The HTTP body of the server response either as Json or string.
     *
     * @var mixed
     */
    protected $responseBody;

    /**
     * The HTTP header of the server response.
     *
     * @var string[]|null
     */
    protected $responseHeaders;

    /**
     * The deserialized response object
     *
     * @var $responseObject ;
     */
    protected $responseObject;
    protected $statusCode;
    protected $errorCode;
    protected $errorMessage;
    protected $originalError;
    protected $previousAttemptError;
    protected $responseDetails;
    protected $diagnosticCode;
    protected $diagnosticMessage;

    /**
     * The TOP gateway request id resolved from the response body or headers.
     *
     * @var string|null
     */
    protected $requestId;

    public static function fromRequestException(RequestException $e)
    {
        $response = $e->getResponse();
        $request = $e->getRequest();
        if ($response !== null) {
            $statusCode = $response->getStatusCode();
            try {
                $details = Utils::captureResponse($response);
                $body = $details['body'];
            } catch (ApiException $readError) {
                // Native previous retains the read failure; also keep transport context.
                return $readError->setOriginalError($e);
            }

            $exception = self::fromHttpResponse(
                $statusCode,
                $request !== null ? $request->getUri() : null,
                $response->getHeaders(),
                $body,
                sprintf('[%d] %s%s', $statusCode, $e->getMessage(), $body),
                $e
            );
            $context = $e->getHandlerContext();
            $errno = isset($context['errno']) ? (int) $context['errno'] : 0;
            if ($errno !== 0) {
                $exception->diagnosticCode = in_array($errno, [18, 61], true) ? 'ReadError' : ErrorDetails::transportCode($e);
                $exception->diagnosticMessage = $e->getMessage();
                // EOF of Guzzle's buffered stream does not prove that cURL
                // finished receiving/decoding the response.
                $details['body_complete'] = false;
            }
            return $exception->setResponseDetails($details);
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
        $exception = self::build($message, $statusCode, $headers, $body, null, $message, $originalError);
        $exception->diagnosticCode = $originalError !== null ? ErrorDetails::transportCode($originalError) : 'RequestError';
        return $exception;
    }

    public static function fromHttpResponse($statusCode, $uri, $headers, $body, $message = null, $originalError = null)
    {
        $statusCode = (int) $statusCode;
        $headers = $headers === null ? [] : $headers;
        $bodyString = self::normalizeBody($body);
        $uriString = $uri ? (string) $uri : '';
        $serviceError = self::extractServiceError($bodyString);
        if ($message === null) {
            $message = sprintf('[%d] Error connecting to the API (%s)(%s)', $statusCode, $uriString, $bodyString);
        }

        return self::build(
            $message,
            $statusCode,
            $headers,
            $bodyString,
            $serviceError ? $serviceError['code'] : null,
            $serviceError ? $serviceError['message'] : $message,
            $originalError
        );
    }

    public static function fromServiceError($statusCode, $uri, $headers, $body)
    {
        $statusCode = (int) $statusCode;
        $bodyString = self::normalizeBody($body);
        $serviceError = self::extractServiceError($bodyString);
        $message = sprintf('[%d] Return Error From the API (%s)(%s)', $statusCode, (string) $uri, $bodyString);

        return self::build(
            $message,
            $statusCode,
            $headers,
            $bodyString,
            $serviceError ? $serviceError['code'] : null,
            $serviceError ? $serviceError['message'] : $message
        );
    }

    /**
     * Builds an exception for a response that could not be deserialized into the
     * expected business model. Keeps the real HTTP status code, original body and
     * headers (and therefore the resolved RequestId), so the caller still gets the
     * fixed diagnostic structure instead of a status-less SerializationError.
     *
     * @param int $statusCode HTTP status code
     * @param string[]|null $headers HTTP response headers
     * @param mixed $body HTTP body of the server response
     * @param \Exception|\Throwable $originalError The underlying deserialization error
     *
     * @return ApiException
     */
    public static function fromDeserializationError($statusCode, $headers, $body, $originalError = null)
    {
        $statusCode = (int) $statusCode;
        $bodyString = self::normalizeBody($body);
        $message = $originalError !== null ? $originalError->getMessage() : 'Failed to deserialize response body';

        $exception = self::build(
            $message,
            $statusCode,
            $headers,
            $bodyString,
            'SerializationError',
            $message,
            $originalError
        );
        return $exception;
    }

    public static function fromReadError($statusCode, $headers, $body, $originalError)
    {
        $message = 'Failed to read response body: ' . $originalError->getMessage();
        $exception = self::build($message, (int) $statusCode, $headers, $body, 'ReadError', $message, $originalError);
        $exception->setResponseDetails(ResponseDetails::fromFields($statusCode, $headers, $body, $body !== null, false));
        return $exception;
    }

    /**
     * Keep the last attempt's response and the current retry failure separately.
     */
    public static function fromRetryError($originalError, $previousAttemptError)
    {
        $message = 'Failed to retry request: ' . $originalError->getMessage();
        if (!$previousAttemptError instanceof self) {
            $exception = self::fromTransferError($message, 0, null, null, $originalError);
            $exception->previousAttemptError = $previousAttemptError;
            return $exception;
        }
        $exception = self::build(
            $message,
            $previousAttemptError->getStatusCode(),
            $previousAttemptError->getResponseHeaders(),
            $previousAttemptError->getResponseBody(),
            $previousAttemptError->getErrorCode(),
            $previousAttemptError->getErrorMessage(),
            $originalError
        );
        $exception->setRequestId($previousAttemptError->getRequestId());
        $exception->previousAttemptError = $previousAttemptError;
        // A failure before sending the new attempt has no current HTTP response.
        $exception->responseDetails = null;
        $exception->diagnosticCode = 'RequestError';
        $exception->diagnosticMessage = $message;
        return $exception;
    }

    /**
     * Constructor
     *
     * @param string $message Error message
     * @param int $code HTTP status code
     * @param string[]|null $responseHeaders HTTP response header
     * @param mixed $responseBody HTTP decoded body of the server response either as \stdClass or string
     */
    public function __construct($message = "", $code = 0, $responseHeaders = [], $responseBody = null, $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->statusCode = (int) $code;
        $this->errorMessage = $message;
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
        $body = $responseBody === null ? null : self::normalizeBody($responseBody);
        $this->responseDetails = ResponseDetails::fromFields($code, $responseHeaders, $body, $body !== null, $body !== null);
    }

    /**
     * Gets the HTTP response header
     *
     * @return string[]|null HTTP response header
     */
    public function getResponseHeaders()
    {
        return $this->responseHeaders;
    }

    /**
     * Gets the HTTP body of the server response either as Json or string
     *
     * @return mixed HTTP body of the server response either as \stdClass or string
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * Sets the deseralized response object (during deserialization)
     *
     * @param mixed $obj Deserialized response object
     *
     * @return void
     */
    public function setResponseObject($obj)
    {
        $this->responseObject = $obj;
    }

    /**
     * Gets the deseralized response object (during deserialization)
     *
     * @return mixed the deserialized response object
     */
    public function getResponseObject()
    {
        return $this->responseObject;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = (int) $statusCode;
        return $this;
    }

    /**
     * Gets the TOP gateway request id resolved from the response body or headers.
     *
     * @return string|null RequestId
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
        return $this;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage !== null ? $this->errorMessage : $this->getMessage();
    }

    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
        return $this;
    }

    public function getOriginalError()
    {
        return $this->originalError;
    }

    public function getPreviousAttemptError()
    {
        return $this->previousAttemptError;
    }

    public function getResponseDetails()
    {
        return $this->responseDetails;
    }

    public function setResponseDetails($details)
    {
        $this->responseDetails = $details;
        return $this;
    }

    public function getDiagnosticCode()
    {
        if ($this->diagnosticCode !== null) {
            return $this->diagnosticCode;
        }
        if ($this->errorCode !== null && $this->errorCode !== '') {
            return $this->errorCode;
        }
        $service = ErrorDetails::serviceError($this->responseBody);
        return $service !== null && $service['code'] !== null && $service['code'] !== '' ? $service['code'] : 'UnknownError';
    }

    public function getDiagnosticMessage()
    {
        if ($this->diagnosticMessage !== null) {
            return $this->diagnosticMessage;
        }
        $service = ErrorDetails::serviceError($this->responseBody);
        return $service !== null && $service['message'] !== null ? $service['message'] : $this->getErrorMessage();
    }

    public function setOriginalError($originalError)
    {
        $this->originalError = $originalError;
        return $this;
    }

    private static function extractServiceError($body)
    {
        $bodyString = self::normalizeBody($body);
        if ($bodyString === '') {
            return null;
        }

        $decoded = json_decode($bodyString);
        if (!is_object($decoded) || !isset($decoded->ResponseMetadata)
            || !is_object($decoded->ResponseMetadata)
            || !isset($decoded->ResponseMetadata->Error)
            || !is_object($decoded->ResponseMetadata->Error)) {
            return null;
        }

        $error = $decoded->ResponseMetadata->Error;
        return [
            'code' => isset($error->Code) && is_string($error->Code) ? $error->Code : null,
            'message' => isset($error->Message) && is_string($error->Message) ? $error->Message : null,
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

    private static function build($message, $statusCode, $headers, $body, $errorCode = null, $errorMessage = null, $originalError = null)
    {
        $exception = new self($message, $statusCode, $headers, $body, $originalError);
        $exception->setErrorCode($errorCode);
        $exception->setErrorMessage($errorMessage);
        $exception->setOriginalError($originalError);
        $exception->setRequestId(self::resolveRequestId($body, $headers));
        return $exception;
    }

    /**
     * Resolves the TOP gateway request id. The response body
     * (ResponseMetadata.RequestId) takes precedence; when it is missing or the
     * body is not standard TOP JSON, the gateway response headers are used as a
     * fallback (X-Top-Requestid / X-Top-Request-Id / X-Tt-Logid).
     *
     * @param mixed $body HTTP body of the server response
     * @param string[]|null $headers HTTP response headers
     *
     * @return string|null RequestId or null when neither source carries it
     */
    private static function resolveRequestId($body, $headers)
    {
        $bodyString = self::normalizeBody($body);
        if ($bodyString !== '') {
            $decoded = json_decode($bodyString);
            if (is_object($decoded)
                && isset($decoded->ResponseMetadata) && is_object($decoded->ResponseMetadata)
                && isset($decoded->ResponseMetadata->RequestId)
                && is_string($decoded->ResponseMetadata->RequestId)
                && $decoded->ResponseMetadata->RequestId !== ''
            ) {
                return $decoded->ResponseMetadata->RequestId;
            }
        }

        return self::resolveRequestIdFromHeaders($headers);
    }

    /**
     * Extracts the request id from the gateway response headers, matching the
     * well-known header names case-insensitively. Header values may be a plain
     * string or an array (Guzzle PSR-7 style).
     *
     * @param string[]|null $headers HTTP response headers
     *
     * @return string|null RequestId or null when no known header is present
     */
    private static function resolveRequestIdFromHeaders($headers)
    {
        if (!is_array($headers) || empty($headers)) {
            return null;
        }

        $candidates = array('x-top-requestid', 'x-top-request-id', 'x-tt-logid');
        $normalized = array();
        foreach ($headers as $name => $value) {
            $normalized[strtolower((string) $name)] = $value;
        }

        foreach ($candidates as $candidate) {
            if (!isset($normalized[$candidate])) {
                continue;
            }

            $value = $normalized[$candidate];
            if (is_array($value)) {
                $value = isset($value[0]) ? $value[0] : null;
            }

            if (is_string($value) && $value !== '') {
                return $value;
            }
        }

        return null;
    }
}
