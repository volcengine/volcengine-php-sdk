<?php

namespace Volcengine\Common\Sign;

use Volcengine\Common\Utils;

class V4Signer implements Signer
{
    public function sign($ak, $sk, $region, $service, $body, $query, $method, $path, $headers, $token = null)
    {
        return Utils::signv4($ak, $sk, $region, $service, $body, $query, $method, $path, $headers, $token);
    }

    public function presign($ak, $sk, $region, $service, $method, $path, array $query = [], $token = null, $host = null)
    {
        return Utils::signRequestToUrl($ak, $sk, $region, $service, $method, $path, $query, $token, $host);
    }
}
