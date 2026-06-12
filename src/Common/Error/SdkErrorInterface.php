<?php

namespace Volcengine\Common\Error;

interface SdkErrorInterface
{
    public function getErrorCode();

    public function getStatusCode();

    public function getOriginalError();
}
