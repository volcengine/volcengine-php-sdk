<?php

namespace Volcengine\Common;

/**
 * Copies known HTTP response fields. Diagnostics never retain a live stream.
 */
class ResponseDetails
{
    public static function fromResponse($response, $body, $captured, $complete)
    {
        $details = self::fromFields($response->getStatusCode(), $response->getHeaders(), $body, $captured, $complete);
        $details['status'] = trim($response->getStatusCode() . ' ' . $response->getReasonPhrase());
        $details['proto'] = 'HTTP/' . $response->getProtocolVersion();
        return $details;
    }

    public static function fromFields($statusCode, $headers, $body, $captured, $complete)
    {
        if ((int) $statusCode < 100 || (int) $statusCode > 599) {
            return null;
        }
        $headers = is_array($headers) ? $headers : [];
        $requestId = null;
        $decoded = is_string($body) ? json_decode($body) : null;
        if (is_object($decoded) && isset($decoded->ResponseMetadata->RequestId)
            && is_string($decoded->ResponseMetadata->RequestId) && $decoded->ResponseMetadata->RequestId !== '') {
            $requestId = $decoded->ResponseMetadata->RequestId;
        }
        if ($requestId === null) {
            $normalized = array_change_key_case($headers, CASE_LOWER);
            foreach (['x-top-requestid', 'x-top-request-id', 'x-tt-logid'] as $name) {
                if (!isset($normalized[$name])) {
                    continue;
                }
                $value = $normalized[$name];
                $value = is_array($value) ? reset($value) : $value;
                if (is_string($value) && $value !== '') {
                    $requestId = $value;
                    break;
                }
            }
        }
        return [
            'status_code' => (int) $statusCode,
            'request_id' => $requestId,
            'headers' => $headers,
            'body' => $captured ? (string) $body : null,
            'body_captured' => (bool) $captured,
            'body_complete' => (bool) ($captured && $complete),
        ];
    }

    public static function forJson($details)
    {
        if ($details === null) {
            return null;
        }
        if (!empty($details['body_captured'])) {
            $body = isset($details['body']) ? $details['body'] : '';
            if (preg_match('//u', $body) === 1) {
                $details['body_encoding'] = 'utf-8';
            } else {
                $details['body'] = base64_encode($body);
                $details['body_encoding'] = 'base64';
            }
        }
        return $details;
    }
}
