<?php

namespace Volcengine\Common;

class LogHelper
{
    public static function debug($logger, $enabledLevel, $level, $message, array $context = [])
    {
        if (!self::shouldLog($logger, $enabledLevel, $level)) {
            return;
        }

        $logger->debug($message, $context);
    }

    public static function interpolate($message, array $context)
    {
        $replace = [];
        foreach ($context as $key => $value) {
            if (is_scalar($value) || $value === null) {
                $replace['{' . $key . '}'] = (string) $value;
            }
        }
        return strtr($message, $replace);
    }

    private static function shouldLog($logger, $enabledLevel, $level)
    {
        return $logger instanceof LoggerInterface && (((int) $enabledLevel & $level) !== 0);
    }
}
