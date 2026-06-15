<?php

namespace Volcengine\Common\Auth\Providers;

use Volcengine\Common\ApiException;

class StaticCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'StaticCredentialProvider';

    private $ak;
    private $sk;
    private $sessionToken;

    public function __construct($ak, $sk, $sessionToken = '')
    {
        $this->ak = $ak;
        $this->sk = $sk;
        $this->sessionToken = $sessionToken;
    }

    public function getCredentials()
    {
        if ($this->ak === null || $this->ak === '' || $this->sk === null || $this->sk === '') {
            throw new ApiException(self::PROVIDER_NAME . ': access key and secret key are required');
        }

        return [
            'AccessKeyId' => $this->ak,
            'SecretAccessKey' => $this->sk,
            'SessionToken' => $this->sessionToken === null ? '' : $this->sessionToken,
            'ProviderName' => self::PROVIDER_NAME,
        ];
    }
}
