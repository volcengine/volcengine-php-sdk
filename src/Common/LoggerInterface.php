<?php

namespace Volcengine\Common;

interface LoggerInterface
{
    public function debug($message, array $context = []);
}
