<?php

namespace Volcengine\Common\Sign;

interface Signer
{
    public function sign($ak, $sk, $region, $service, $body, $query, $method, $path, $headers, $sessionToken = '');

    public function presign($ak, $sk, $region, $service, $method, $path, $queryParams, $sessionToken = '', $host = null);
}
