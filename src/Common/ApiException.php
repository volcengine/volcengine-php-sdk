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

    public static function fromRequestException(RequestException $e)
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
                sprintf('[%d] %s%s', $statusCode, $e->getMessage(), $body)
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
        return self::build($message, $statusCode, $headers, $body, null, $message, $originalError);
    }

    public static function fromHttpResponse($statusCode, $uri, $headers, $body, $message = null)
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
            $serviceError ? $serviceError['message'] : $message
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
     * Constructor
     *
     * @param string $message Error message
     * @param int $code HTTP status code
     * @param string[]|null $responseHeaders HTTP response header
     * @param mixed $responseBody HTTP decoded body of the server response either as \stdClass or string
     */
    public function __construct($message = "", $code = 0, $responseHeaders = [], $responseBody = null)
    {
        parent::__construct($message, $code);
        $this->statusCode = (int) $code;
        $this->errorMessage = $message;
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
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

    private static function build($message, $statusCode, $headers, $body, $errorCode = null, $errorMessage = null, $originalError = null)
    {
        $exception = new self($message, $statusCode, $headers, $body);
        $exception->setErrorCode($errorCode);
        $exception->setErrorMessage($errorMessage);
        $exception->setOriginalError($originalError);
        return $exception;
    }
}
