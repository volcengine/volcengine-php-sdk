<?php

namespace Volcengine\Common;

class Version
{
    const SDK_VERSION = '1.0.123';

    public static function userAgent()
    {
        return 'volcstack-php-sdk/' . self::SDK_VERSION;
    }
}
