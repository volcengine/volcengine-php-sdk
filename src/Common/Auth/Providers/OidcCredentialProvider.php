<?php

namespace Volcengine\Common\Auth\Providers;

class OidcCredentialProvider extends Provider
{
    use StsCredentialTrait;

    const PROVIDER_NAME = 'OidcCredentialProvider';
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
        $this->stsEndpoint = $stsEndpoint ?: StsFormRequest::DEFAULT_STS_ENDPOINT;
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
        $raw = @file_get_contents($this->oidcTokenFile);
        if ($raw === false || trim($raw) === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': failed to read OIDC token file: ' . $this->oidcTokenFile
            );
        }
        $oidcToken = trim($raw);

        $queryParams = [
            'Action' => 'AssumeRoleWithOIDC',
            'Version' => '2018-01-01',
        ];

        $bodyParams = [
            'DurationSeconds' => $this->durationSeconds,
            'RoleSessionName' => $this->roleSessionName,
            'RoleTrn' => $this->roleTrn,
            'OIDCToken' => $oidcToken,
        ];

        // OIDC puts Policy in query string
        if (!empty($this->rolePolicy)) {
            $queryParams['Policy'] = $this->rolePolicy;
        }

        $formBody = http_build_query($bodyParams);

        $responseBody = StsFormRequest::doPostWithRetry(
            $this->stsEndpoint, $this->schema, $queryParams,
            $formBody, $this->maxRetries, $this->retryInterval,
            self::PROVIDER_NAME
        );

        $content = json_decode($responseBody, true);
        if (!is_array($content)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': AssumeRoleWithOIDC returned empty response'
            );
        }

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
