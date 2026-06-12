<?php

namespace Volcengine\Common;

interface LoggerInterface
{
    public function debug($category, $message, array $context = []);

    public function info($category, $message, array $context = []);

    public function warning($category, $message, array $context = []);

    public function error($category, $message, array $context = []);
}
