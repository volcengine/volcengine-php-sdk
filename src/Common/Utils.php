<?php

namespace Volcengine\Common;

class Utils
{
    public static function transRequest($data, $prefix = "")
    {
        $result = array();

        foreach ($data::swaggerTypes() as $property => $swaggerType) {
            $getter = $data::getters()[$property];
            $value = $data->$getter();

            if ($value !== null) {
                // If the current field is already a boolean, convert it to a string first; this is to address the issue of rawurlencode handling booleans.
                if (is_bool($value)) {
                    $value = $value ? 'true' : 'false';
                }

                if (is_array($value)) {
                    foreach ($value as $key => $element) {
                        if (is_object($element)) {
                            $back = self::transRequest($element, $prefix . $data::attributeMap()[$property] . "." . ($key + 1) . ".");
                            $result = array_merge($result, $back);
                        } else {
                            $result[$prefix . $data::attributeMap()[$property] . "." . ($key + 1)] = $element;
                        }
                    }
                } elseif (is_object($value)) {
                    $back = self::transRequest($value, $prefix . $data::attributeMap()[$property] . ".");
                    $result = array_merge($result, $back);
                } else {
                    $result[$prefix . $data::attributeMap()[$property]] = $value;
                }
            }
        }

        return $result;
    }

    public static function signv4($ak, $sk, $region, $service, $body, $query, $method, $path, $headers, $token = null)
    {
        if ($path === '') {
            $path = '/';
        }

        if ($token != null) {
            $headers['X-Security-Token'] = $token;
        }
        $ldt = gmdate('Ymd\THis\Z');
        $sdt = substr($ldt, 0, 8);
        $headers['X-Date'] = $ldt;

        $bodyHash = hash('sha256', $body);
        $headers['X-Content-Sha256'] = $bodyHash;

        $credentialScope = self::createCredentialScope($sdt, $region, $service);

        $signedHeaders = [];
        foreach ($headers as $key => $value) {
            if ($key == "Host" || $key == "Content-Md5" || $key == "Content-Type" || substr($key, 0, 2) == "X-") {
                $key = strtolower($key);
                $signedHeaders[$key] = $value;
            }
        }
        ksort($signedHeaders);

        $signed_str = '';
        foreach ($signedHeaders as $k => $v) {
            $signed_str .= $k . ':' . $v . "\n";
        }

        $signedHeadersString = implode(';', array_keys($signedHeaders));
        $canon = implode("\n", array($method, $path, $query, $signed_str, $signedHeadersString, $bodyHash));
        $hash = hash('sha256', $canon);
        $toSign = self::createStringToSign($ldt, $credentialScope, $hash);
        $signingKey = self::getSigningKey($sdt, $region, $service, $sk);
        $signature = hash_hmac('sha256', $toSign, $signingKey);
        $credential = $ak . '/' . $credentialScope;
        $headers['Authorization'] = "HMAC-SHA256 Credential={$credential}, SignedHeaders={$signedHeadersString}, Signature={$signature}";
        return $headers;
    }

    /**
     * Generate pre-signed URL with signature as query parameters
     *
     * @param string $ak Access Key
     * @param string $sk Secret Key
     * @param string $region Region
     * @param string $service Service name
     * @param string $method HTTP method (GET, POST, etc.)
     * @param string $path Request path
     * @param array $query Query parameters
     * @param string|null $token Security token
     * @return string Complete URL with signature
     */
    public static function signRequestToUrl($ak, $sk, $region, $service, $method, $path, $query = [], $token = null, $host = null)
    {
        $ldt = gmdate('Ymd\\THis\\Z');
        $sdt = substr($ldt, 0, 8);

        $credentialScope = self::createCredentialScope($sdt, $region, $service);
        $credential = "$ak/$credentialScope";
        $signHost = $host !== null;

        // Add required query parameters for pre-signed URL
        $query['X-Date'] = $ldt;
        $query['X-NotSignBody'] = '';
        $query['X-Algorithm'] = 'HMAC-SHA256';
        $query['X-Credential'] = $credential;
        $query['X-SignedHeaders'] = $signHost ? 'host' : '';
        $query['X-SignedQueries'] = ''; // placeholder

        // Compute X-SignedQueries from all current keys (includes X-SignedQueries itself)
        $signedQueries = array_keys($query);
        sort($signedQueries);
        $query['X-SignedQueries'] = implode(';', $signedQueries);

        // X-Security-Token must be added AFTER X-SignedQueries computation
        if ($token != null) {
            $query['X-Security-Token'] = $token;
        }

        // Build canonical query from ALL params sorted
        $canonicalQuery = self::buildSortedQueryString($query);

        // Create canonical request
        $canonicalPath = self::createCanonicalizedPath($path);
        $bodyHash = hash('sha256', ''); // Pre-signed URL does not sign body

        if ($signHost) {
            $canon = implode("\n", [
                $method,
                $canonicalPath,
                $canonicalQuery,
                "host:$host\n",
                'host',
                $bodyHash
            ]);
        } else {
            $canon = implode("\n", [
                $method,
                $canonicalPath,
                $canonicalQuery,
                '',
                '',
                '',
                $bodyHash
            ]);
        }

        $hash = hash('sha256', $canon);
        $toSign = self::createStringToSign($ldt, $credentialScope, $hash);

        $signingKey = self::getSigningKey($sdt, $region, $service, $sk);
        $signature = hash_hmac('sha256', $toSign, $signingKey);

        $query['X-Signature'] = $signature;

        // Build complete URL
        $queryString = self::buildSortedQueryString($query);

        return $path . '?' . $queryString;
    }

    /**
     * Create credential scope string
     *
     * @param string $date Short date (YYYYMMDD)
     * @param string $region Region
     * @param string $service Service name
     * @return string Credential scope
     */
    private static function createCredentialScope($date, $region, $service)
    {
        return "$date/$region/$service/request";
    }

    /**
     * Create string to sign for signature v4
     *
     * @param string $longDate Long date (ISO8601 format)
     * @param string $credentialScope Credential scope
     * @param string $canonicalRequestHash Hash of canonical request
     * @return string String to sign
     */
    private static function createStringToSign($longDate, $credentialScope, $canonicalRequestHash)
    {
        return implode("\n", ["HMAC-SHA256", $longDate, $credentialScope, $canonicalRequestHash]);
    }

    /**
     * Get signing key for signature v4
     *
     * @param string $date Short date (YYYYMMDD)
     * @param string $region Region
     * @param string $service Service name
     * @param string $sk Secret Key
     * @return string Signing key
     */
    public static function getSigningKey($date, $region, $service, $sk)
    {
        $dateKey = hash_hmac('sha256', $date, $sk, true);
        $regionKey = hash_hmac('sha256', $region, $dateKey, true);
        $serviceKey = hash_hmac('sha256', $service, $regionKey, true);
        return hash_hmac('sha256', 'request', $serviceKey, true);
    }

    /**
     * Create canonicalized path according to signature v4 specification
     *
     * @param string $path Request path
     * @return string Canonicalized path
     */
    private static function createCanonicalizedPath($path)
    {
        $doubleEncoded = rawurlencode(ltrim($path, '/'));
        return '/' . str_replace('%2F', '/', $doubleEncoded);
    }

    /**
     * Build query string from parameters, sorted by key
     *
     * @param array $query Query parameters
     * @return string Query string
     */
    private static function buildSortedQueryString(array $query)
    {
        if (!$query) {
            return '';
        }

        ksort($query);
        $qs = '';
        foreach ($query as $k => $v) {
            if (!is_array($v)) {
                $qs .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
            } else {
                sort($v);
                foreach ($v as $value) {
                    $qs .= rawurlencode($k) . '=' . rawurlencode($value) . '&';
                }
            }
        }

        return substr($qs, 0, -1);
    }
}