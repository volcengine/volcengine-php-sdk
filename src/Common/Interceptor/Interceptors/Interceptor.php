<?php

namespace Volcengine\Common\Interceptor\Interceptors;

abstract class Interceptor
{
    public function name()
    {
        return get_class($this);
    }

    abstract public function intercept(Context $context);
}

?>
