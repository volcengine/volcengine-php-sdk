<?php

namespace Volcengine\Common\Interceptor\Interceptors;

abstract class ResponseInterceptor
{
    public function name()
    {
        return get_class($this);
    }

    abstract public function intercept(Context $context);
}
