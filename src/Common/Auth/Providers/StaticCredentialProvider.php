<?php

namespace Volcengine\Common\Auth\Providers;

class StaticCredentialProvider extends Provider
{
    private $credentials;

    public function __construct($accessKeyId, $secretAccessKey, $sessionToken = null)
    {
        $this->credentials = [
            'AccessKeyId' => $accessKeyId,
            'SecretAccessKey' => $secretAccessKey,
            'SessionToken' => $sessionToken ?: '',
            'ProviderName' => 'StaticCredentialProvider',
        ];
    }

    public function getCredentials()
    {
        return $this->credentials;
    }
}
