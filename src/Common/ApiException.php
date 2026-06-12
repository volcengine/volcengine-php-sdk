<?php

namespace Volcengine\Common;

use Exception;
use Volcengine\Common\Error\SdkErrorInterface;

class ApiException extends Exception implements SdkErrorInterface
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

    public function origErr()
    {
        return $this->getOriginalError();
    }

    public function statusCode()
    {
        return $this->getStatusCode();
    }

    public function errorCode()
    {
        return $this->getErrorCode();
    }

    public function code()
    {
        return $this->getErrorCode();
    }

    public function message()
    {
        return $this->getErrorMessage();
    }
}
