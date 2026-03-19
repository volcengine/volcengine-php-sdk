<?php

namespace Volcengine\Common\Auth\Providers;

class EnvironmentVariableCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'EnvironmentVariableCredentialProvider';

    public function getCredentials()
    {
        $ak = $this->getEnvWithFallback('VOLCENGINE_ACCESS_KEY', 'VOLCSTACK_ACCESS_KEY_ID', 'VOLCSTACK_ACCESS_KEY');
        $sk = $this->getEnvWithFallback('VOLCENGINE_SECRET_KEY', 'VOLCSTACK_SECRET_ACCESS_KEY', 'VOLCSTACK_SECRET_KEY');
        $token = $this->getEnvWithFallback('VOLCENGINE_SESSION_TOKEN', 'VOLCSTACK_SESSION_TOKEN');

        if (empty($ak) || empty($sk)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': required environment variables VOLCENGINE_ACCESS_KEY and '
                . 'VOLCENGINE_SECRET_KEY are not set'
            );
        }

        return [
            'AccessKeyId' => $ak,
            'SecretAccessKey' => $sk,
            'SessionToken' => $token ?: '',
            'ProviderName' => self::PROVIDER_NAME,
        ];
    }

    private function getEnvWithFallback()
    {
        foreach (func_get_args() as $name) {
            $value = getenv($name);
            if ($value !== false && $value !== '') {
                return $value;
            }
        }
        return null;
    }
}
