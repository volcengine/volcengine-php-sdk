<?php

namespace Volcengine\Common\Auth\Providers;

use Volcengine\Common\ApiException;
use Volcengine\Common\ErrorDetails;
use Volcengine\Common\Utils;

/**
 * Shared response contract for AssumeRole, OIDC and SAML.
 * All fields are validated before a provider updates its credential cache.
 */
class StsResponse
{
    public static function read($response, $uri)
    {
        $details = Utils::captureResponse($response);
        $body = $details['body'];
        $status = $details['status_code'];
        if ($status < 200 || $status > 299) {
            throw ApiException::fromHttpResponse($status, $uri, $details['headers'], $body)->setResponseDetails($details);
        }
        if (ErrorDetails::serviceError($body) !== null) {
            throw ApiException::fromServiceError($status, $uri, $details['headers'], $body)->setResponseDetails($details);
        }
        return $details;
    }

    public static function credentials($details)
    {
        $content = json_decode($details['body']);
        if (!is_object($content) || !isset($content->ResponseMetadata) || !is_object($content->ResponseMetadata)
            || !isset($content->Result->Credentials) || !is_object($content->Result->Credentials)) {
            self::invalid($details, 'Expected STS JSON object with ResponseMetadata and Result.Credentials');
        }
        if (isset($content->ResponseMetadata->Error) && !is_object($content->ResponseMetadata->Error)) {
            self::invalid($details, 'STS ResponseMetadata.Error must be an object');
        }
        $creds = (array) $content->Result->Credentials;
        foreach (['AccessKeyId', 'SecretAccessKey', 'SessionToken'] as $field) {
            if (!isset($creds[$field]) || !is_string($creds[$field]) || trim($creds[$field]) === '') {
                self::invalid($details, 'STS credentials missing or invalid field: ' . $field);
            }
        }
        foreach (['CurrentTime', 'Expiration', 'ExpiredTime'] as $field) {
            if (array_key_exists($field, $creds) && self::timestamp($creds[$field]) === null) {
                self::invalid($details, 'STS credentials invalid timestamp: ' . $field);
            }
        }
        return $creds;
    }

    public static function expiration($details, $creds, $fallback = null)
    {
        foreach (['Expiration', 'ExpiredTime'] as $field) {
            if (array_key_exists($field, $creds)) {
                return self::timestamp($creds[$field]);
            }
        }
        if ($fallback === null) {
            self::invalid($details, 'STS credentials missing or invalid expiration');
        }
        return $fallback;
    }

    public static function timestamp($value)
    {
        if (!is_string($value) || !preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(?:\.\d+)?(?:Z|[+-](?:[01]\d|2[0-3]):[0-5]\d)$/D', $value)) {
            return null;
        }
        try {
            $date = new \DateTime($value, new \DateTimeZone('UTC'));
            $errors = \DateTime::getLastErrors();
            return $errors !== false && ($errors['warning_count'] || $errors['error_count']) ? null : $date->getTimestamp();
        } catch (\Exception $e) {
            return null;
        }
    }

    private static function invalid($details, $message)
    {
        throw ApiException::fromDeserializationError(
            $details['status_code'], $details['headers'], $details['body'], new \UnexpectedValueException($message)
        )->setResponseDetails($details);
    }
}
