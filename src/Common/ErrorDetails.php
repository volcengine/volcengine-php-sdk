<?php

namespace Volcengine\Common;

/**
 * Bounded traversal of PHP previous exceptions and SDK original failures.
 * Customer exceptions remain unchanged and may optionally expose a snapshot.
 */
class ErrorDetails
{
    public static function causes($error)
    {
        $causes = [];
        foreach (['getPrevious', 'getOriginalError', 'getPreviousAttemptError'] as $method) {
            if (is_callable([$error, $method])) {
                $cause = $error->$method();
                if (is_object($cause) && $cause !== $error && !in_array($cause, $causes, true)) {
                    $causes[] = $cause;
                }
            }
        }
        return $causes;
    }

    public static function walk($error)
    {
        $queue = is_object($error) ? [$error] : [];
        $seen = new \SplObjectStorage();
        $result = [];
        while ($queue && count($result) < 64) {
            $node = array_shift($queue);
            if ($seen->contains($node)) {
                continue;
            }
            $seen->attach($node);
            $result[] = $node;
            foreach (self::causes($node) as $cause) {
                $queue[] = $cause;
            }
        }
        return $result;
    }

    public static function serviceError($body)
    {
        $decoded = is_string($body) ? json_decode($body) : $body;
        if (!is_object($decoded)) {
            return null;
        }
        $error = isset($decoded->ResponseMetadata->Error) && is_object($decoded->ResponseMetadata->Error)
            ? $decoded->ResponseMetadata->Error : null;
        $code = $error !== null && isset($error->Code) && is_string($error->Code) ? $error->Code : null;
        $message = $error !== null && isset($error->Message) && is_string($error->Message) ? $error->Message : null;
        if ($code === null || $code === '') {
            foreach (['errorcode', 'error_code', 'ErrorCode'] as $key) {
                if (isset($decoded->$key) && is_string($decoded->$key) && $decoded->$key !== '') {
                    $code = $decoded->$key;
                    break;
                }
            }
            foreach (['message', 'Message'] as $key) {
                if (isset($decoded->$key) && is_string($decoded->$key)) {
                    $message = $decoded->$key;
                    break;
                }
            }
        }
        return $error !== null || $code !== null ? ['code' => $code, 'message' => $message] : null;
    }

    public static function transportCode($error)
    {
        $context = is_callable([$error, 'getHandlerContext']) ? $error->getHandlerContext() : [];
        $errno = isset($context['errno']) ? (int) $context['errno'] : 0;
        if ($errno === 42) {
            return 'RequestCanceled';
        }
        if (in_array($errno, [35, 51, 58, 60, 77, 80, 82, 83, 90, 91], true)) {
            return 'TLSError';
        }
        if ($errno === 28) {
            return 'RequestTimeout';
        }
        if ($errno !== 0) {
            return 'RequestError';
        }
        // HTTP exception text includes server bodies; customer wrappers include domain text.
        // Only a transport failure without a response can use message classification.
        if (!$error instanceof \GuzzleHttp\Exception\TransferException
            || ($error instanceof \GuzzleHttp\Exception\RequestException && $error->getResponse() !== null)) {
            return 'RequestError';
        }
        // cURL messages append request URLs; action names are not failure kinds.
        $message = strtolower(preg_replace('~https?://\S+~i', '', $error->getMessage()));
        if (preg_match('/\b(cancel(?:led|ed|lation)?|aborted by callback)\b/', $message)) {
            return 'RequestCanceled';
        }
        if (preg_match('/\b(certificate|ssl connect error|tls handshake)\b/', $message)) {
            return 'TLSError';
        }
        if (preg_match('/\b(timed out|timeout)\b/', $message)) {
            return 'RequestTimeout';
        }
        return 'RequestError';
    }

    public static function get($error)
    {
        $seen = new \SplObjectStorage();
        $remaining = 64;
        return self::build($error, $seen, $remaining, 0);
    }

    private static function build($error, $seen, &$remaining, $depth)
    {
        if ($error === null || !is_object($error) || $seen->contains($error) || $remaining <= 0 || $depth >= 32) {
            return null;
        }
        $seen->attach($error);
        $remaining--;
        $details = [
            'type' => get_class($error),
            'error' => $error->getMessage(),
            'response' => null,
        ];
        if (is_callable([$error, 'getResponseDetails'])) {
            $details['response'] = ResponseDetails::forJson($error->getResponseDetails());
        }
        if ($error instanceof ApiException) {
            $details['code'] = $error->getDiagnosticCode();
            $details['message'] = $error->getDiagnosticMessage();
        } elseif (is_callable([$error, 'getErrorCode'])) {
            $details['code'] = $error->getErrorCode();
            $details['message'] = is_callable([$error, 'getErrorMessage']) ? $error->getErrorMessage() : $error->getMessage();
        }
        $causes = [];
        foreach (self::causes($error) as $cause) {
            $child = self::build($cause, $seen, $remaining, $depth + 1);
            if ($child !== null) {
                $causes[] = $child;
            }
        }
        if ($causes) {
            $details['causes'] = $causes;
        }
        return $details;
    }
}
