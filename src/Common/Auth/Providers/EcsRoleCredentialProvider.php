<?php

namespace Volcengine\Common\Auth\Providers;

class EcsRoleCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'EcsRoleCredentialProvider';

    // TODO: IMDS endpoint to be confirmed by ECS team
    const IMDS_ENDPOINT = 'http://100.96.0.96';
    // TODO: IMDS paths to be confirmed
    const IMDS_ROLE_LIST_PATH = '/volcstack/latest/iam/security_credentials/';
    const IMDS_CREDENTIALS_PATH = '/volcstack/latest/iam/security_credentials/';
    // TODO: IMDSv2 token support to be confirmed
    // const IMDS_TOKEN_PATH = '/volcstack/latest/api/token';
    // const IMDS_TOKEN_TTL_HEADER = 'X-volcengine-ecs-metadata-token-ttl-seconds';
    // const IMDS_TOKEN_HEADER = 'X-volcengine-ecs-metadata-token';

    // TODO: Response field names to be confirmed
    const FIELD_ACCESS_KEY_ID = 'AccessKeyId';
    const FIELD_SECRET_ACCESS_KEY = 'SecretAccessKey';
    const FIELD_SESSION_TOKEN = 'SessionToken';
    const FIELD_EXPIRATION = 'Expiration';

    const DEFAULT_CONNECT_TIMEOUT = 1;
    const DEFAULT_READ_TIMEOUT = 1;
    const DEFAULT_MAX_RETRIES = 3;
    const DEFAULT_RETRY_INTERVAL = 1;
    const DEFAULT_EXPIRE_BUFFER_SECONDS = 300;

    private $roleName;
    private $connectTimeout;
    private $readTimeout;
    private $maxRetries;
    private $retryInterval;
    private $expireBufferSeconds;

    private $cachedCredentials;
    private $expirationTime = 0;

    public function __construct(
        $roleName = null,
        $connectTimeout = self::DEFAULT_CONNECT_TIMEOUT,
        $readTimeout = self::DEFAULT_READ_TIMEOUT,
        $maxRetries = self::DEFAULT_MAX_RETRIES,
        $retryInterval = self::DEFAULT_RETRY_INTERVAL,
        $expireBufferSeconds = self::DEFAULT_EXPIRE_BUFFER_SECONDS
    ) {
        $this->roleName = $roleName;
        $this->connectTimeout = $connectTimeout;
        $this->readTimeout = $readTimeout;
        $this->maxRetries = $maxRetries;
        $this->retryInterval = $retryInterval;
        $this->expireBufferSeconds = $expireBufferSeconds;
    }

    public static function create($roleName = null)
    {
        $disabled = getenv('VOLCENGINE_ECS_METADATA_DISABLED');
        if (strtolower($disabled) === 'true') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': IMDS is disabled via VOLCENGINE_ECS_METADATA_DISABLED=true'
            );
        }

        $resolvedRoleName = $roleName;
        if (empty($resolvedRoleName)) {
            $envRole = getenv('VOLCENGINE_ECS_METADATA');
            if ($envRole !== false && $envRole !== '') {
                $resolvedRoleName = $envRole;
            }
        }

        return new self($resolvedRoleName);
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
        $roleName = $this->resolveRoleName();
        $url = self::IMDS_ENDPOINT . self::IMDS_CREDENTIALS_PATH . $roleName;
        $body = $this->doGetWithRetry($url);

        $data = json_decode($body, true);
        if (!is_array($data)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': failed to parse IMDS response'
            );
        }

        $ak = isset($data[self::FIELD_ACCESS_KEY_ID]) ? $data[self::FIELD_ACCESS_KEY_ID] : '';
        $sk = isset($data[self::FIELD_SECRET_ACCESS_KEY]) ? $data[self::FIELD_SECRET_ACCESS_KEY] : '';
        $token = isset($data[self::FIELD_SESSION_TOKEN]) ? $data[self::FIELD_SESSION_TOKEN] : '';
        $expirationStr = isset($data[self::FIELD_EXPIRATION]) ? $data[self::FIELD_EXPIRATION] : null;

        if (empty($ak) || empty($sk)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': IMDS response missing AccessKeyId or SecretAccessKey'
            );
        }

        $expiration = time() + 3600; // default 1h
        if (!empty($expirationStr)) {
            $ts = strtotime($expirationStr);
            if ($ts !== false) {
                $expiration = $ts;
            }
        }

        $this->cachedCredentials = [
            'AccessKeyId' => $ak,
            'SecretAccessKey' => $sk,
            'SessionToken' => $token,
            'ProviderName' => self::PROVIDER_NAME,
        ];
        $this->expirationTime = $expiration - $this->expireBufferSeconds;
    }

    private function resolveRoleName()
    {
        if (!empty($this->roleName)) {
            return $this->roleName;
        }

        // Auto-detect: query IMDS role list
        $url = self::IMDS_ENDPOINT . self::IMDS_ROLE_LIST_PATH;
        $body = $this->doGetWithRetry($url);

        $roles = array_filter(array_map('trim', explode("\n", trim($body))));
        if (empty($roles)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': no IAM roles found via IMDS'
            );
        }

        $roles = array_values($roles);
        if (count($roles) > 1) {
            error_log(
                self::PROVIDER_NAME . ': multiple IAM roles found via IMDS: '
                . implode(', ', $roles) . ". Using the first one '{$roles[0]}'. "
                . 'Set VOLCENGINE_ECS_METADATA or pass role_name explicitly to avoid ambiguity.'
            );
        }

        return $roles[0];
    }

    private function doGetWithRetry($url)
    {
        $lastError = null;
        $timeout = $this->connectTimeout + $this->readTimeout;

        for ($attempt = 0; $attempt < $this->maxRetries; $attempt++) {
            try {
                return $this->doGet($url, $timeout);
            } catch (\RuntimeException $e) {
                $lastError = $e;
                if ($attempt < $this->maxRetries - 1) {
                    sleep($this->retryInterval);
                }
            }
        }

        throw $lastError;
    }

    private function doGet($url, $timeout)
    {
        $ctx = stream_context_create([
            'http' => [
                'method' => 'GET',
                'timeout' => $timeout,
                'ignore_errors' => true,
            ],
        ]);

        $body = @file_get_contents($url, false, $ctx);
        if ($body === false) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': IMDS request failed to ' . $url
            );
        }

        // Check HTTP status from response headers
        if (isset($http_response_header) && is_array($http_response_header)) {
            $statusLine = $http_response_header[0];
            if (preg_match('/HTTP\/\S+\s+(\d+)/', $statusLine, $matches)) {
                $statusCode = (int) $matches[1];
                if ($statusCode !== 200) {
                    throw new \RuntimeException(
                        self::PROVIDER_NAME . ': IMDS request failed with status ' . $statusCode
                    );
                }
            }
        }

        return $body;
    }
}
