<?php

namespace Volcengine\Common;

class ApiLogger
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
     * @var mixed
     */
    protected $responseObject;

    /**
     * Error message
     *
     * @var string
     */
    protected $message;

    /**
     * HTTP status code
     *
     * @var int
     */
    protected $code;

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
        $this->message = $message;
        $this->code = $code;
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;

        // 记录日志而不是抛出异常
        $this->logError();
    }

    /**
     * Logs the error instead of throwing an exception
     *
     * @return void
     */
    protected function logError()
    {
        error_log(sprintf(
            "API Error [%d]: %s\nHeaders: %s\nBody: %s",
            $this->code,
            $this->message,
            json_encode($this->responseHeaders),
            is_string($this->responseBody) ? $this->responseBody : json_encode($this->responseBody)
        ));
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
     * Sets the deserialized response object (during deserialization)
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
     * Gets the deserialized response object (during deserialization)
     *
     * @return mixed the deserialized response object
     */
    public function getResponseObject()
    {
        return $this->responseObject;
    }

    /**
     * Gets the error message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Gets the error code
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Returns string representation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            "API Log [%d]: %s",
            $this->code,
            $this->message
        );
    }
}
