<?php

namespace Volcengine\Common\Interceptor;

use Volcengine\Common\Interceptor\Interceptors\Interceptor;
use Volcengine\Common\Interceptor\Interceptors\ResponseInterceptor;

class InterceptorChain
{
    private $requestInterceptors = [];
    private $responseInterceptors = [];

    public function appendRequestInterceptor($interceptor)
    {
        $this->checkRequestInterceptor($interceptor);
        $this->requestInterceptors[] = $interceptor;
        return $this;
    }

    public function insertRequestInterceptor($interceptor, $afterName = '')
    {
        $this->checkRequestInterceptor($interceptor);
        $this->requestInterceptors = $this->insertInterceptor($this->requestInterceptors, $interceptor, $afterName);
        return $this;
    }

    public function appendResponseInterceptor($interceptor)
    {
        $this->checkResponseInterceptor($interceptor);
        $this->responseInterceptors[] = $interceptor;
        return $this;
    }

    public function insertResponseInterceptor($interceptor, $afterName = '')
    {
        $this->checkResponseInterceptor($interceptor);
        $this->responseInterceptors = $this->insertInterceptor($this->responseInterceptors, $interceptor, $afterName);
        return $this;
    }

    public function executeRequest($context)
    {
        foreach ($this->requestInterceptors as $interceptor) {
            $context = $interceptor->intercept($context);
        }
        return $context;
    }

    public function executeResponse($context)
    {
        foreach ($this->responseInterceptors as $interceptor) {
            $context = $interceptor->intercept($context);
        }
        return $context;
    }

    private function checkRequestInterceptor($interceptor)
    {
        if (!($interceptor instanceof Interceptor)) {
            throw new \Exception("interceptor is not for request");
        }
    }

    private function checkResponseInterceptor($interceptor)
    {
        if (!($interceptor instanceof ResponseInterceptor)) {
            throw new \Exception("interceptor is not for response");
        }
    }

    private function insertInterceptor($chain, $interceptor, $afterName = '')
    {
        if ($afterName == '') {
            array_unshift($chain, $interceptor);
            return $chain;
        }

        for ($i = 0; $i < count($chain); $i++) {
            if ($chain[$i]->name() == $afterName) {
                array_splice($chain, $i + 1, 0, [$interceptor]);
                return $chain;
            }
        }

        throw new \Exception("interceptor insert after name not found");
    }
}

?>
