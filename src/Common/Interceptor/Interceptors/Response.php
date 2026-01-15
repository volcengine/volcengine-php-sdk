<?php

namespace Volcengine\Common\Interceptor\Interceptors;
class Response {
    private $statusCode;
    private $headers = [];
    private $body;
    
    public function getStatusCode() {
        return $this->statusCode;
    }
    
    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
        return $this;
    }
    
    public function getHeaders() {
        return $this->headers;
    }
    
    public function setHeaders($headers) {
        $this->headers = $headers;
        return $this;
    }
    
    public function getBody() {
        return $this->body;
    }
    
    public function setBody($body) {
        $this->body = $body;
        return $this;
    }
}

?>
