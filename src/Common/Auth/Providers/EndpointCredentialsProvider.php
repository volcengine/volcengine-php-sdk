<?php

namespace Volcengine\Common\Auth\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;
use Volcengine\Common\ApiException;

class EndpointCredentialsProvider extends Provider
{
    const PROVIDER_NAME = 'EndpointCredentialsProvider';

    private $endpoint;
    private $authorizationToken;
    private $headers;
    private $connectTimeout;
    private $readTimeout;
    private $expireBufferSeconds;
    private $cachedCredentials;
    private $expirationTime = 0;

    public function __construct(
        $endpoint,
        $authorizationToken = null,
        array $headers = [],
        $connectTimeout = 5,
        $readTimeout = 30,
        $expireBufferSeconds = 300
    ) {
        $this->endpoint = $endpoint;
        $this->authorizationToken = $authorizationToken;
        $this->headers = $headers;
        $this->connectTimeout = $connectTimeout;
        $this->readTimeout = $readTimeout;
        $this->expireBufferSeconds = $expireBufferSeconds;
    }

    public function getCredentials()
    {
        if ($this->cachedCredentials !== null && time() < $this->expirationTime) {
            return $this->cachedCredentials;
        }

        $this->refresh();
        return $this->cachedCredentials;
    }

    public function setAuthorizationToken($authorizationToken)
    {
        $this->authorizationToken = $authorizationToken;
        return $this;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    private function refresh()
    {
        $headers = $this->headers;
        if ($this->authorizationToken !== null && $this->authorizationToken !== '') {
            $headers['Authorization'] = $this->authorizationToken;
        }

        $client = new Client([
            'timeout' => $this->readTimeout,
            'connect_timeout' => $this->connectTimeout,
            'http_errors' => false,
        ]);

        try {
            $response = $client->get($this->endpoint, ['headers' => $headers]);
        } catch (TransferException $e) {
            throw new ApiException(self::PROVIDER_NAME . ': endpoint credential request failed - ' . $e->getMessage());
        }

        if ($response->getStatusCode() < 200 || $response->getStatusCode() > 299) {
            throw new ApiException(
                self::PROVIDER_NAME . ': endpoint credential request failed with status ' . $response->getStatusCode(),
                $response->getStatusCode(),
                $response->getHeaders(),
                (string) $response->getBody()
            );
        }

        $data = json_decode((string) $response->getBody(), true);
        if (!is_array($data)) {
            throw new ApiException(self::PROVIDER_NAME . ': failed to parse endpoint credential JSON');
        }

        if (isset($data['Credentials']) && is_array($data['Credentials'])) {
            $data = $data['Credentials'];
        }

        $ak = isset($data['AccessKeyId']) ? $data['AccessKeyId'] : '';
        $sk = isset($data['SecretAccessKey']) ? $data['SecretAccessKey'] : '';
        $token = isset($data['SessionToken']) ? $data['SessionToken'] : '';
        $expiration = isset($data['Expiration']) ? strtotime($data['Expiration']) : false;

        if (empty($ak) || empty($sk)) {
            throw new ApiException(self::PROVIDER_NAME . ': endpoint credentials missing AccessKeyId or SecretAccessKey');
        }

        $this->cachedCredentials = [
            'AccessKeyId' => $ak,
            'SecretAccessKey' => $sk,
            'SessionToken' => $token,
            'ProviderName' => self::PROVIDER_NAME,
        ];
        $this->expirationTime = ($expiration !== false ? $expiration : (time() + 3600)) - $this->expireBufferSeconds;
    }
}
