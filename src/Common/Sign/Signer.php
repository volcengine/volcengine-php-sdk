<?php

namespace Volcengine\Common\Sign;

interface Signer
{
    public function sign($ak, $sk, $region, $service, $body, $query, $method, $path, $headers, $token = null);

    public function presign($ak, $sk, $region, $service, $method, $path, array $query = [], $token = null, $host = null);
}
