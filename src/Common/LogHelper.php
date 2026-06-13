<?php

namespace Volcengine\Common;

class LogHelper
{
    private static $defaultSensitiveKeys = [
        'authorization',
        'x-security-token',
        'accesskeyid',
        'secretaccesskey',
        'sessiontoken',
        'password',
        'token',
        'secret',
        'credential',
        'signature',
    ];

    public static function isEnabled($logger, $mask = null)
    {
        if (!$logger instanceof LoggerInterface) {
            return false;
        }

        if ($mask === null) {
            return true;
        }

        if (method_exists($logger, 'isEnabled')) {
            return $logger->isEnabled($mask);
        }

        return true;
    }

    public static function debug($logger, $mask, $category, $message, array $context = [])
    {
        if (self::isEnabled($logger, $mask)) {
            $logger->debug($category, $message, self::normalizeContext($context));
        }
    }

    public static function info($logger, $mask, $category, $message, array $context = [])
    {
        if (self::isEnabled($logger, $mask)) {
            $logger->info($category, $message, self::normalizeContext($context));
        }
    }

    public static function warning($logger, $mask, $category, $message, array $context = [])
    {
        if (self::isEnabled($logger, $mask)) {
            $logger->warning($category, $message, self::normalizeContext($context));
        }
    }

    public static function error($logger, $mask, $category, $message, array $context = [])
    {
        if (self::isEnabled($logger, $mask)) {
            $logger->error($category, $message, self::normalizeContext($context));
        }
    }

    private static function normalizeContext(array $context)
    {
        $sensitiveKeys = [];
        if (isset($context['__log_sensitives']) && is_array($context['__log_sensitives'])) {
            $sensitiveKeys = $context['__log_sensitives'];
        }
        unset($context['__log_sensitives']);

        if (isset($context['__log_account'])) {
            $account = self::resolveLogAccount($context['__log_account']);
            unset($context['__log_account']);
            if ($account !== null && $account !== '') {
                $context['account_id'] = $account;
            }
        }

        return self::sanitizeValue($context, self::buildSensitiveLookup($sensitiveKeys));
    }

    private static function resolveLogAccount($logAccount)
    {
        if (is_callable($logAccount)) {
            $logAccount = call_user_func($logAccount);
        }

        if (is_scalar($logAccount) || $logAccount === null) {
            return $logAccount;
        }

        return json_encode($logAccount);
    }

    private static function buildSensitiveLookup(array $sensitiveKeys)
    {
        $lookup = [];
        foreach (array_merge(self::$defaultSensitiveKeys, $sensitiveKeys) as $key) {
            $lookup[strtolower((string) $key)] = true;
        }
        return $lookup;
    }

    private static function sanitizeValue($value, array $sensitiveLookup, $parentKey = null)
    {
        if ($parentKey !== null && isset($sensitiveLookup[strtolower((string) $parentKey)])) {
            return '***';
        }

        if (is_array($value)) {
            $sanitized = [];
            foreach ($value as $key => $item) {
                $sanitized[$key] = self::sanitizeValue($item, $sensitiveLookup, $key);
            }
            return $sanitized;
        }

        if (is_object($value)) {
            if ($value instanceof \stdClass) {
                $sanitized = new \stdClass();
                foreach (get_object_vars($value) as $key => $item) {
                    $sanitized->$key = self::sanitizeValue($item, $sensitiveLookup, $key);
                }
                return $sanitized;
            }

            if (method_exists($value, 'getHeaders')) {
                return self::sanitizeValue($value->getHeaders(), $sensitiveLookup, $parentKey);
            }
        }

        if (is_string($value)) {
            return self::sanitizeString($value, $sensitiveLookup);
        }

        return $value;
    }

    private static function sanitizeString($value, array $sensitiveLookup)
    {
        foreach (array_keys($sensitiveLookup) as $key) {
            $quoted = preg_quote($key, '/');
            $value = preg_replace('/(["\']?' . $quoted . '["\']?\s*:\s*)(["\'][^"\']*["\']|[^,}\]\s]+)/i', '$1"***"', $value);
            $value = preg_replace('/(' . $quoted . '=)[^&\s]+/i', '$1***', $value);
        }

        return $value;
    }
}
