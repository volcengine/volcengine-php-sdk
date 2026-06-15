<?php

namespace Volcengine\Common\Sign;

use Volcengine\Common\Utils;

class V4Signer implements Signer
{
    public function sign($ak, $sk, $region, $service, $body, $query, $method, $path, $headers, $sessionToken = '')
    {
        return Utils::signv4($ak, $sk, $region, $service, $body, $query, $method, $path, $headers, $sessionToken);
    }

    public function presign($ak, $sk, $region, $service, $method, $path, $queryParams, $sessionToken = '', $host = null)
    {
        return Utils::signRequestToUrl($ak, $sk, $region, $service, $method, $path, $queryParams, $sessionToken, $host);
    }
}
