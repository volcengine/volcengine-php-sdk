<?php
namespace Volcengine\Common\Retryer;

class DefaultRetryCondition
{
    private $retryErrorCodes;

    private static $__retry_status_codes = ["429", "502", "503", "504", "500"];

    private static $__retry_exceptions = [
        // 这里应该是对应的PHP异常类
        'ConnectException',
        'ReadTimeoutException',
        'ConnectTimeoutException',
        'ProtocolException',
        // builtin / socket
        'SocketTimeoutException',
        'SocketGaiErrorException',
    ];

    public function __construct($retryErrorCodes = [])
    {
        $this->retryErrorCodes = $retryErrorCodes;
    }

    public function shouldRetry($response, $err)
    {
        $statusCode = $response->getStatusCode();
        if ($statusCode !== null && in_array(strval($statusCode), self::$__retry_status_codes)) {
            return true;
        }
        return false;
    }

}

?>
