<?php
namespace Volcengine\Common\Endpoint;

use Volcengine\Common\ApiException;

abstract class EndpointProvider
{
    const ERR_CODE_INVALID_REGION = 'InvalidRegion';
    const ERR_CODE_INVALID_SERVICE = 'InvalidService';
    const ENDPOINT_LABEL_RULE = "must start with a letter, end with a letter or digit, and contain only letters, digits, '-' and '_'";

    abstract public function endpointFor($service, $region);

    /**
     * Rejects a region that could change the host it is concatenated into.
     * Empty and null values are accepted and left to the caller.
     *
     * @throws ApiException with error code InvalidRegion and status code 400
     */
    public static function validateRegion($region)
    {
        self::validateEndpointLabel('region', self::ERR_CODE_INVALID_REGION, $region);
    }

    /**
     * Rejects a service that could change the host it is concatenated into.
     * Empty and null values are accepted and left to the caller.
     *
     * @throws ApiException with error code InvalidService and status code 400
     */
    public static function validateService($service)
    {
        self::validateEndpointLabel('service', self::ERR_CODE_INVALID_SERVICE, $service);
    }

    /**
     * @throws ApiException with error code InvalidService or InvalidRegion and status code 400
     */
    public static function validateServiceAndRegion($service, $region)
    {
        self::validateService($service);
        self::validateRegion($region);
    }

    private static function validateEndpointLabel($name, $code, $value)
    {
        $label = self::endpointLabelString($value);
        $reason = self::endpointLabelError($label);
        if ($reason === '') {
            return;
        }
        $message = sprintf('invalid %s %s: %s, %s %s', $name, self::quote($label), $reason, $name, self::ENDPOINT_LABEL_RULE);
        $exception = new ApiException($code . ': ' . $message, 400);
        $exception->setErrorCode($code);
        $exception->setErrorMessage($message);
        throw $exception;
    }

    // Uses the value PHP would concatenate; other types become an always-invalid marker.
    private static function endpointLabelString($value)
    {
        if ($value === null || is_string($value)) {
            return (string) $value;
        }
        if (is_scalar($value) || (is_object($value) && method_exists($value, '__toString'))) {
            return (string) $value;
        }
        return '[' . gettype($value) . ']';
    }

    // Byte-wise equivalent of /^[A-Za-z]([A-Za-z0-9_-]*[A-Za-z0-9])?$/, checking the character set first.
    private static function endpointLabelError($label)
    {
        $bytes = $label === '' ? [] : array_values(unpack('C*', $label));
        $count = count($bytes);
        if ($count === 0) {
            return '';
        }
        for ($i = 0; $i < $count; $i++) {
            $c = $bytes[$i];
            if (!self::isAsciiLetter($c) && !($c >= 0x30 && $c <= 0x39) && $c !== 0x2D && $c !== 0x5F) {
                return 'illegal character at index ' . $i;
            }
        }
        if (!self::isAsciiLetter($bytes[0])) {
            return 'must start with a letter';
        }
        $last = $bytes[$count - 1];
        if ($last === 0x2D || $last === 0x5F) {
            return "must not end with '-' or '_'";
        }
        return '';
    }

    private static function isAsciiLetter($c)
    {
        return ($c >= 0x41 && $c <= 0x5A) || ($c >= 0x61 && $c <= 0x7A);
    }

    // Double-quoted; '"', '\' and bytes outside printable ASCII are escaped.
    private static function quote($s)
    {
        return '"' . preg_replace_callback('/[^\x20-\x7E]|["\\\\]/', function ($m) {
            $c = ord($m[0]);
            return $c < 0x20 || $c > 0x7E ? sprintf('\x%02x', $c) : '\\' . $m[0];
        }, $s) . '"';
    }
}

class ResolvedEndpoint
{
    public $host;

    public function __construct($host)
    {
        $this->host = $host;
    }

    public function urlFor($schema = 'https')
    {
        return $schema . '://' . $this->host;
    }
}

?>
