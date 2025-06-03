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

    public static function signv4($ak, $sk, $region, $service, $body, $query, $method, $path, $headers)
    {
        if ($path === '') {
            $path = '/';
        }

        $ldt = gmdate('Ymd\THis\Z');
        $sdt = substr($ldt, 0, 8);
        $headers['X-Date'] = $ldt;

        $bodyHash = hash('sha256', $body);
        $headers['X-Content-Sha256'] = $bodyHash;

        $credentialScope = "$sdt/$region/$service/request";

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
        $toSign = implode("\n", array("HMAC-SHA256", $ldt, $credentialScope, $hash));
        $signingKey = self::getSigningKey($sdt, $region, $service, $sk);
        $signature = hash_hmac('sha256', $toSign, $signingKey);
        $credential = $ak . '/' . $credentialScope;
        $headers['Authorization'] = "HMAC-SHA256 Credential={$credential}, SignedHeaders={$signedHeadersString}, Signature={$signature}";
        return $headers;
    }

    public static function getSigningKey($date, $region, $service, $sk)
    {
        $dateKey = hash_hmac('sha256', $date, $sk, true);
        $regionKey = hash_hmac('sha256', $region, $dateKey, true);
        $serviceKey = hash_hmac('sha256', $service, $regionKey, true);
        return hash_hmac('sha256', 'request', $serviceKey, true);
    }
}