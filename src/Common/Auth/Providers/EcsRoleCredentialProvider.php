<?php

namespace Volcengine\Common\Auth\Providers;

class EcsRoleCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'EcsRoleCredentialProvider';

    // IMDSv2 endpoint and paths
    const IMDS_ENDPOINT = 'http://100.96.0.96';
    const IMDS_CREDENTIALS_PATH = '/volcstack/latest/iam/security_credentials/'; // POST
    const IMDS_ROLE_NAME_PATH = '/volcstack/latest/iam/security_credentials?type=user'; // GET
    const IMDS_TOKEN_PATH = '/latest/api/token'; // GET

    // IMDSv2 headers
    const IMDS_TOKEN_TTL_HEADER = 'X-volc-ecs-metadata-token-ttl-seconds';
    const IMDS_TOKEN_HEADER = 'X-volc-ecs-metadata-token';
    const IMDS_TOKEN_TTL_SECONDS = '21600'; // 6 hours

    // Response field names
    const FIELD_ACCESS_KEY_ID = 'AccessKeyId';
    const FIELD_SECRET_ACCESS_KEY = 'SecretAccessKey';
    const FIELD_SESSION_TOKEN = 'SessionToken';
    const FIELD_EXPIRATION = 'ExpiredTime';

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
        if ($connectTimeout < 0) {
            throw new \InvalidArgumentException('connectTimeout must be >= 0');
        }
        if ($readTimeout < 0) {
            throw new \InvalidArgumentException('readTimeout must be >= 0');
        }
        if ($maxRetries < 0) {
            throw new \InvalidArgumentException('maxRetries must be >= 0');
        }
        if ($retryInterval < 0) {
            throw new \InvalidArgumentException('retryInterval must be >= 0');
        }
        if ($expireBufferSeconds < 0) {
            throw new \InvalidArgumentException('expireBufferSeconds must be >= 0');
        }
        $this->roleName = $roleName;
        $this->connectTimeout = $connectTimeout;
        $this->readTimeout = $readTimeout;
        $this->maxRetries = $maxRetries;
        $this->retryInterval = $retryInterval;
        $this->expireBufferSeconds = $expireBufferSeconds;
    }

    /**
     * @param int $maxRetries extra retry attempts; 0 = no retry
     * @return $this
     */
    public function setMaxRetries($maxRetries)
    {
        if ($maxRetries < 0) {
            throw new \InvalidArgumentException('maxRetries must be >= 0');
        }
        $this->maxRetries = $maxRetries;
        return $this;
    }

    /**
     * @param int $retryInterval seconds between retries
     * @return $this
     */
    public function setRetryInterval($retryInterval)
    {
        if ($retryInterval < 0) {
            throw new \InvalidArgumentException('retryInterval must be >= 0');
        }
        $this->retryInterval = $retryInterval;
        return $this;
    }

    /**
     * @param int $connectTimeout seconds
     * @return $this
     */
    public function setConnectTimeout($connectTimeout)
    {
        if ($connectTimeout < 0) {
            throw new \InvalidArgumentException('connectTimeout must be >= 0');
        }
        $this->connectTimeout = $connectTimeout;
        return $this;
    }

    /**
     * @param int $readTimeout seconds
     * @return $this
     */
    public function setReadTimeout($readTimeout)
    {
        if ($readTimeout < 0) {
            throw new \InvalidArgumentException('readTimeout must be >= 0');
        }
        $this->readTimeout = $readTimeout;
        return $this;
    }

    /**
     * @param int $expireBufferSeconds seconds
     * @return $this
     */
    public function setExpireBufferSeconds($expireBufferSeconds)
    {
        if ($expireBufferSeconds < 0) {
            throw new \InvalidArgumentException('expireBufferSeconds must be >= 0');
        }
        $this->expireBufferSeconds = $expireBufferSeconds;
        return $this;
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

        // roleName can be null — will be auto-detected on first refresh
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
        // Step 1: Get IMDSv2 token (fresh every time)
        $imdsToken = $this->getIMDSv2Token();

        // Step 2: Resolve role name
        $roleName = $this->resolveRoleName($imdsToken);

        // Step 3: POST to get credentials
        $url = self::IMDS_ENDPOINT . self::IMDS_CREDENTIALS_PATH . $roleName;
        $body = $this->doRequestWithRetry($url, 'POST', [self::IMDS_TOKEN_HEADER => $imdsToken]);

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

    // --- IMDSv2 token ---

    private function getIMDSv2Token()
    {
        $url = self::IMDS_ENDPOINT . self::IMDS_TOKEN_PATH;
        $body = $this->doRequestWithRetry($url, 'GET', [
            self::IMDS_TOKEN_TTL_HEADER => self::IMDS_TOKEN_TTL_SECONDS,
        ]);
        $token = trim($body);
        if (empty($token)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': IMDSv2 token endpoint returned empty response'
            );
        }
        return $token;
    }

    // --- roleName resolution ---

    private function resolveRoleName($imdsToken)
    {
        if (!empty($this->roleName)) {
            return $this->roleName;
        }

        $envRole = getenv('VOLCENGINE_ECS_METADATA');
        if ($envRole !== false && $envRole !== '') {
            return $envRole;
        }

        // Auto-detect from IMDS (not cached — roles can change dynamically)
        return $this->autoDetectRoleName($imdsToken);
    }

    private function autoDetectRoleName($imdsToken)
    {
        $url = self::IMDS_ENDPOINT . self::IMDS_ROLE_NAME_PATH;
        $body = $this->doRequestWithRetry($url, 'GET', [
            self::IMDS_TOKEN_HEADER => $imdsToken,
        ]);

        $roles = json_decode($body, true);
        if (!is_array($roles)) {
            // Fallback: split by newlines
            $roles = array_filter(array_map('trim', explode("\n", trim($body))));
        }

        $roles = array_values($roles);
        if (empty($roles)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': no IAM roles found via IMDS'
            );
        }

        if (count($roles) > 1) {
            error_log(
                self::PROVIDER_NAME . ': multiple IAM roles found: '
                . implode(', ', $roles) . ". Using '{$roles[0]}'. "
                . 'Set VOLCENGINE_ECS_METADATA to avoid ambiguity.'
            );
        }

        return $roles[0];
    }

    // --- HTTP helpers ---

    private function doRequestWithRetry($url, $method = 'GET', $headers = [])
    {
        $lastError = null;
        $timeout = $this->connectTimeout + $this->readTimeout;

        for ($attempt = 0; $attempt <= $this->maxRetries; $attempt++) {
            try {
                return $this->doRequest($url, $method, $headers, $timeout);
            } catch (\RuntimeException $e) {
                $lastError = $e;
                if ($attempt < $this->maxRetries) {
                    sleep($this->retryInterval);
                }
            }
        }

        throw $lastError;
    }

    private function doRequest($url, $method, $headers, $timeout)
    {
        $httpHeaders = [];
        foreach ($headers as $k => $v) {
            $httpHeaders[] = "{$k}: {$v}";
        }

        $ctx = stream_context_create([
            'http' => [
                'method' => $method,
                'timeout' => $timeout,
                'ignore_errors' => true,
                'header' => implode("\r\n", $httpHeaders),
                'content' => '', // empty body for POST
            ],
        ]);

        $body = @file_get_contents($url, false, $ctx);
        if ($body === false) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': IMDS request failed to ' . $url
            );
        }

        // Check HTTP status
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
