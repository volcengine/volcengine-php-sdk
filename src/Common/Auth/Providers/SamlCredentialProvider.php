<?php

namespace Volcengine\Common\Auth\Providers;

use Volcengine\Common\ApiException;

class SamlCredentialProvider extends Provider implements StsProxyConfigurableProvider
{
    use StsCredentialTrait;

    const PROVIDER_NAME = 'SamlCredentialProvider';
    const DEFAULT_DURATION_SECONDS = 3600;
    const DEFAULT_EXPIRE_BUFFER_SECONDS = 60;
    const MAX_EXPIRE_BUFFER_SECONDS = 600;

    private $roleName;
    private $accountId;
    private $samlProviderName;
    private $samlAssertion;
    private $rolePolicy;
    private $stsEndpoint;
    private $durationSeconds;
    private $expireBufferSeconds;

    private $cachedCredentials;
    private $expirationTime = 0;

    public function __construct(
        $roleName,
        $accountId,
        $samlProviderName,
        $samlAssertion,
        $rolePolicy = null,
        $stsEndpoint = null,
        $durationSeconds = self::DEFAULT_DURATION_SECONDS,
        $expireBufferSeconds = self::DEFAULT_EXPIRE_BUFFER_SECONDS
    )
    {
        if (empty($roleName) || empty($accountId) || empty($samlProviderName) || empty($samlAssertion)) {
            throw new \InvalidArgumentException(
                self::PROVIDER_NAME . ': roleName, accountId, samlProviderName and samlAssertion are required'
            );
        }
        if ($expireBufferSeconds > self::MAX_EXPIRE_BUFFER_SECONDS) {
            throw new \InvalidArgumentException(
                self::PROVIDER_NAME . ': expireBufferSeconds must be less than or equal to '
                . self::MAX_EXPIRE_BUFFER_SECONDS
            );
        }
        $this->roleName = $roleName;
        $this->accountId = $accountId;
        $this->samlProviderName = $samlProviderName;
        $this->samlAssertion = $samlAssertion;
        $this->rolePolicy = $rolePolicy;
        $this->stsEndpoint = $stsEndpoint ?: StsFormRequest::DEFAULT_STS_ENDPOINT;
        $this->durationSeconds = $durationSeconds;
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

    private function refresh()
    {
        $queryParams = [
            'Action' => 'AssumeRoleWithSAML',
            'Version' => '2018-01-01',
        ];

        $bodyParams = [
            'DurationSeconds' => $this->durationSeconds,
            'RoleTrn' => 'trn:iam::' . $this->accountId . ':role/' . $this->roleName,
            'SAMLProviderTrn' => 'trn:iam::' . $this->accountId . ':saml-provider/' . $this->samlProviderName,
            'SAMLResp' => $this->samlAssertion,
        ];

        // SAML puts Policy in form body
        if (!empty($this->rolePolicy)) {
            $bodyParams['Policy'] = $this->rolePolicy;
        }

        $formBody = http_build_query($bodyParams);

        $details = StsFormRequest::doPostWithRetryDetails(
            $this->stsEndpoint, $this->schema, $queryParams,
            $formBody, $this->maxRetries, $this->retryInterval,
            self::PROVIDER_NAME, $this->httpConfig
        );

        $creds = StsResponse::credentials($details);
        $expiration = StsResponse::expiration($details, $creds, time() + $this->durationSeconds);
        $this->cachedCredentials = [
            'AccessKeyId' => $creds['AccessKeyId'],
            'SecretAccessKey' => $creds['SecretAccessKey'],
            'SessionToken' => $creds['SessionToken'],
            'ProviderName' => self::PROVIDER_NAME,
        ];
        $this->expirationTime = $expiration - $this->expireBufferSeconds;
    }

    public function invalidateCredentials()
    {
        $this->cachedCredentials = null;
        $this->expirationTime = 0;
    }
}
