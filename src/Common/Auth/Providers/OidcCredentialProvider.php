<?php

namespace Volcengine\Common\Auth\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Volcengine\Common\ApiException;
use Volcengine\Common\Utils;

class OidcCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'OidcCredentialProvider';
    const DEFAULT_STS_ENDPOINT = 'sts.volcengineapi.com';
    const DEFAULT_REGION = 'cn-north-1';
    const DEFAULT_DURATION_SECONDS = 3600;
    const DEFAULT_EXPIRE_BUFFER_SECONDS = 300;

    private $roleTrn;
    private $roleSessionName;
    private $oidcTokenFile;
    private $rolePolicy;
    private $stsEndpoint;
    private $durationSeconds;
    private $expireBufferSeconds;

    private $cachedCredentials;
    private $expirationTime = 0;

    public function __construct(
        $roleTrn,
        $oidcTokenFile,
        $roleSessionName = null,
        $rolePolicy = null,
        $stsEndpoint = null,
        $durationSeconds = self::DEFAULT_DURATION_SECONDS,
        $expireBufferSeconds = self::DEFAULT_EXPIRE_BUFFER_SECONDS
    )
    {
        $this->roleTrn = $roleTrn;
        $this->roleSessionName = !empty($roleSessionName)
            ? $roleSessionName
            : 'credentials-php-' . ((int)(microtime(true) * 1000000));
        $this->oidcTokenFile = $oidcTokenFile;
        $this->rolePolicy = $rolePolicy;
        $this->stsEndpoint = $stsEndpoint ?: self::DEFAULT_STS_ENDPOINT;
        $this->durationSeconds = $durationSeconds;
        $this->expireBufferSeconds = $expireBufferSeconds;
    }

    public static function fromEnvironment()
    {
        $roleTrn = getenv('VOLCENGINE_OIDC_ROLE_TRN');
        $roleSessionName = getenv('VOLCENGINE_OIDC_ROLE_SESSION_NAME') ?: null;
        $oidcTokenFile = getenv('VOLCENGINE_OIDC_TOKEN_FILE');
        $rolePolicy = getenv('VOLCENGINE_OIDC_ROLE_POLICY') ?: null;
        $stsEndpoint = getenv('VOLCENGINE_OIDC_STS_ENDPOINT') ?: null;

        if (empty($roleTrn) || empty($oidcTokenFile)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': required environment variables '
                . 'VOLCENGINE_OIDC_ROLE_TRN and '
                . 'VOLCENGINE_OIDC_TOKEN_FILE are not all set'
            );
        }

        return new self($roleTrn, $oidcTokenFile, $roleSessionName, $rolePolicy, $stsEndpoint);
    }

    public function getCredentials()
    {
        if ($this->cachedCredentials !== null && time() < $this->expirationTime) {
            return $this->cachedCredentials;
        }

        $this->refresh();
        return $this->cachedCredentials;
    }

    private function refresh()
    {
        $oidcToken = trim(@file_get_contents($this->oidcTokenFile));
        if ($oidcToken === false || $oidcToken === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': failed to read OIDC token file: ' . $this->oidcTokenFile
            );
        }

        $queryParams = [
            'Action' => 'AssumeRoleWithOIDC',
            'Version' => '2018-01-01',
        ];

        $body = [
            'DurationSeconds' => $this->durationSeconds,
            'RoleSessionName' => $this->roleSessionName,
            'RoleTrn' => $this->roleTrn,
            'OIDCToken' => $oidcToken,
        ];

        if (!empty($this->rolePolicy)) {
            $queryParams['Policy'] = $this->rolePolicy;
        }

        ksort($queryParams);
        $query = '';
        foreach ($queryParams as $k => $v) {
            $query .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
        }
        $query = substr($query, 0, -1);
        $httpBody = http_build_query($body);
        // OIDC AssumeRole is effectively unsigned; use empty AK/SK for signing.
        $headers = ['Host' => $this->stsEndpoint, 'Content-Type' => 'application/x-www-form-urlencoded'];
        $headers = Utils::signv4('', '', self::DEFAULT_REGION, 'sts',
            $httpBody, $query, 'POST', '/', $headers);

        $request = new Request('POST',
            'https://' . $this->stsEndpoint . '/' . ($query ? "?{$query}" : ''),
            $headers, $httpBody);

        $client = new Client([
            'timeout' => 30,
            'connect_timeout' => 5,
            'verify' => true,
        ]);

        try {
            $response = $client->send($request);
        } catch (RequestException $e) {
            $resp = $e->getResponse();
            $respBody = $resp ? (string)$resp->getBody() : '';
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}{$respBody}",
                $e->getCode(),
                $resp ? $resp->getHeaders() : null,
                $respBody
            );
        }

        $statusCode = $response->getStatusCode();
        if ($statusCode < 200 || $statusCode > 299) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': AssumeRoleWithOIDC request failed with status ' . $statusCode
            );
        }

        $content = json_decode($response->getBody()->getContents(), true);

        if (isset($content['ResponseMetadata']['Error'])) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': AssumeRoleWithOIDC returned error: '
                . json_encode($content['ResponseMetadata']['Error'])
            );
        }

        if (!isset($content['Result']['Credentials'])) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': AssumeRoleWithOIDC returned no credentials'
            );
        }

        $creds = $content['Result']['Credentials'];
        $this->cachedCredentials = [
            'AccessKeyId' => $creds['AccessKeyId'],
            'SecretAccessKey' => $creds['SecretAccessKey'],
            'SessionToken' => isset($creds['SessionToken']) ? $creds['SessionToken'] : '',
            'ProviderName' => self::PROVIDER_NAME,
        ];
        // Prefer server-side Expiration; fallback to local duration estimate
        $expiration = time() + $this->durationSeconds;
        if (isset($creds['Expiration'])) {
            $ts = strtotime($creds['Expiration']);
            if ($ts !== false) {
                $expiration = $ts;
            }
        }
        $this->expirationTime = $expiration - $this->expireBufferSeconds;
    }
}
