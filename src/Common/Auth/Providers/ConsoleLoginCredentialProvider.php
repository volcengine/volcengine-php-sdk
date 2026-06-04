<?php

namespace Volcengine\Common\Auth\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;
use Volcengine\Common\ApiException;

/**
 * @internal
 *
 * Internal delegate for CLI config profile mode `console-login`.
 *
 * Contract (matches the cross-SDK plan, adapted to PHP's process model):
 *   - PHP processes are short-lived; tokens must survive across requests via the
 *     disk cache file. SDK and `ve login` are co-writers of that file. Both use
 *     atomic rename writes to avoid torn reads.
 *   - On expiry, the SDK silently refreshes by POSTing
 *     {endpoint_url}/authorize/oauth/token with grant_type=refresh_token, then
 *     writes the refreshed cache back via atomic rename.
 *   - If the signin service rejects the in-memory refresh_token with HTTP 400
 *     invalid_grant, the SDK reloads the cache file once. If a concurrent
 *     `ve login` (or another SDK process) refreshed the file under us, retry
 *     with the disk state. Otherwise surface an actionable "please run
 *     've login'" error.
 *   - Per-object {@code $cachedCredentials + $expirationTime} fields avoid
 *     re-doing the work within a single request; cross-request sharing is the
 *     disk file's job.
 */
class ConsoleLoginCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'ConsoleLoginCredentialProvider';
    const EXPIRE_BUFFER_SECONDS = 60;
    const DEFAULT_ENDPOINT = 'https://signin.volcengine.com';
    const TOKEN_PATH = '/authorize/oauth/token';
    const DEFAULT_HTTP_TIMEOUT = 30;

    private $profileData;
    private $profileName;
    private $cacheDir;
    private $cachedCredentials;
    private $expirationTime = 0;

    public function __construct($profileData, $profileName, $cacheDir)
    {
        $this->profileData = $profileData;
        $this->profileName = $profileName;
        $this->cacheDir = $cacheDir;
    }

    public function getCredentials()
    {
        if ($this->cachedCredentials !== null && time() < $this->expirationTime) {
            return $this->cachedCredentials;
        }

        $this->cachedCredentials = $this->retrieve();
        return $this->cachedCredentials;
    }

    private function retrieve()
    {
        $loginSession = isset($this->profileData['login-session']) ? trim($this->profileData['login-session']) : '';
        if ($loginSession === '') {
            throw new ApiException(
                self::PROVIDER_NAME . ": profile '{$this->profileName}' did not contain login-session; please run 've login' to re-authenticate"
            );
        }

        $tokenPath = $this->resolveTokenCachePath($loginSession);
        $tokenCache = $this->loadTokenCache($tokenPath);

        // Fast path: cached access_token still within TTL.
        $applied = $this->tryApplyCache($tokenCache, $tokenPath);
        if ($applied !== null) {
            return $applied;
        }

        // Slow path: refresh via OAuth.
        try {
            $refreshed = $this->refreshAccessToken($tokenCache, $tokenPath);
        } catch (InvalidGrantApiException $e) {
            // Fallback: another process (typically `ve login` or a sibling
            // SDK request) may have rotated the cache under us. Reload disk
            // once; if disk RT differs, retry the OAuth call exactly once
            // with the disk state.
            $diskCache = $this->loadTokenCache($tokenPath);
            $diskRT = isset($diskCache['refresh_token']) && is_string($diskCache['refresh_token'])
                ? trim($diskCache['refresh_token']) : '';
            $memRT = isset($tokenCache['refresh_token']) && is_string($tokenCache['refresh_token'])
                ? trim($tokenCache['refresh_token']) : '';
            if ($diskRT === '' || $diskRT === $memRT) {
                throw new ApiException(
                    self::PROVIDER_NAME . ": console-login refresh token was rejected and the disk cache holds no fresher token; please run 've login' to re-authenticate. underlying error: "
                        . $e->getMessage()
                );
            }
            $applied = $this->tryApplyCache($diskCache, $tokenPath);
            if ($applied !== null) {
                return $applied;
            }
            try {
                $refreshed = $this->refreshAccessToken($diskCache, $tokenPath);
            } catch (InvalidGrantApiException $e2) {
                throw new ApiException(
                    self::PROVIDER_NAME . ": console-login refresh token rejected; reloaded disk cache but the new refresh token was also rejected; please run 've login' to re-authenticate. underlying error: "
                        . $e2->getMessage()
                );
            }
        }

        return $refreshed;
    }

    /**
     * tryApplyCache returns the credential array if the cached access_token is
     * still within TTL and parseable as STS; otherwise null. This lets both the
     * fast path and the disk-reload fallback share a single check.
     */
    private function tryApplyCache($tokenCache, $tokenPath)
    {
        $expiration = $this->consoleLoginExpiration($tokenCache, $tokenPath);
        if (time() >= $expiration - self::EXPIRE_BUFFER_SECONDS) {
            return null;
        }
        $stsCreds = $this->parseAccessToken($tokenCache, $tokenPath);
        $this->expirationTime = $expiration - self::EXPIRE_BUFFER_SECONDS;
        return [
            'AccessKeyId' => $stsCreds['access_key_id'],
            'SecretAccessKey' => $stsCreds['secret_access_key'],
            'SessionToken' => $stsCreds['session_token'],
            'ProviderName' => self::PROVIDER_NAME,
        ];
    }

    /**
     * refreshAccessToken POSTs the refresh_token grant to the signin OAuth
     * endpoint, persists the refreshed cache (atomic rename) so other PHP
     * processes can reuse it, and returns the new credential array.
     *
     * Throws {@see InvalidGrantApiException} on HTTP 400 invalid_grant so the
     * caller can run the disk-reload fallback. All other failures throw
     * {@see ApiException} with an actionable hint.
     */
    private function refreshAccessToken(&$tokenCache, $tokenPath)
    {
        $refreshToken = isset($tokenCache['refresh_token']) && is_string($tokenCache['refresh_token'])
            ? trim($tokenCache['refresh_token']) : '';
        if ($refreshToken === '') {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login cache {$tokenPath} did not contain refresh_token; please run 've login' to re-authenticate"
            );
        }
        $clientId = isset($tokenCache['client_id']) && is_string($tokenCache['client_id'])
            ? trim($tokenCache['client_id']) : '';
        if ($clientId === '') {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login cache {$tokenPath} did not contain client_id; please run 've login' to re-authenticate"
            );
        }
        $endpoint = isset($tokenCache['endpoint_url']) && is_string($tokenCache['endpoint_url'])
            ? trim($tokenCache['endpoint_url']) : '';
        if ($endpoint === '') {
            $endpoint = self::DEFAULT_ENDPOINT;
        }
        $scope = isset($tokenCache['scope']) && is_string($tokenCache['scope'])
            ? trim($tokenCache['scope']) : '';

        $url = rtrim($endpoint, '/') . self::TOKEN_PATH;
        $form = [
            'grant_type' => 'refresh_token',
            'client_id' => $clientId,
            'refresh_token' => $refreshToken,
        ];
        if ($scope !== '') {
            $form['scope'] = $scope;
        }

        $client = new Client([
            'timeout' => self::DEFAULT_HTTP_TIMEOUT,
            'connect_timeout' => 5,
            'verify' => true,
            'http_errors' => false,
        ]);
        try {
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Accept' => 'application/json',
                ],
                'form_params' => $form,
            ]);
        } catch (TransferException $e) {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login refresh HTTP POST to {$url} failed - "
                    . $e->getMessage() . "; please run 've login' to re-authenticate"
            );
        }

        $statusCode = $response->getStatusCode();
        $responseBody = (string) $response->getBody();

        if ($statusCode === 400) {
            $decoded = json_decode($responseBody, true);
            $err = is_array($decoded) && isset($decoded['error']) && is_string($decoded['error'])
                ? $decoded['error'] : '';
            if ($err === 'invalid_grant') {
                throw new InvalidGrantApiException(
                    'console-login refresh_token rejected (invalid_grant): ' . $responseBody
                );
            }
        }
        if ($statusCode < 200 || $statusCode >= 300) {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login refresh failed with HTTP {$statusCode}: {$responseBody}; please run 've login' to re-authenticate"
            );
        }

        $payload = json_decode($responseBody, true);
        if (!is_array($payload)) {
            throw new ApiException(
                self::PROVIDER_NAME . ": failed to parse console-login refresh response as JSON object; please run 've login' to re-authenticate"
            );
        }
        $newAccess = isset($payload['access_token']) && is_string($payload['access_token'])
            ? trim($payload['access_token']) : '';
        $newExpiresIn = isset($payload['expires_in']) ? (int) $payload['expires_in'] : 0;
        if ($newAccess === '' || $newExpiresIn <= 0) {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login refresh response missing access_token or expires_in; please run 've login' to re-authenticate"
            );
        }

        // Mutate the cache in place: access_token is always replaced;
        // refresh_token / id_token / token_type only when the server returned
        // a non-empty value (mirrors ve cli's EnsureValidLoginToken).
        $tokenCache['access_token'] = $newAccess;
        if (isset($payload['refresh_token']) && is_string($payload['refresh_token']) && trim($payload['refresh_token']) !== '') {
            $tokenCache['refresh_token'] = $payload['refresh_token'];
        }
        if (isset($payload['id_token']) && is_string($payload['id_token']) && trim($payload['id_token']) !== '') {
            $tokenCache['id_token'] = $payload['id_token'];
        }
        if (isset($payload['token_type']) && is_string($payload['token_type']) && trim($payload['token_type']) !== '') {
            $tokenCache['token_type'] = $payload['token_type'];
        }
        $tokenCache['issued_at'] = gmdate('Y-m-d\TH:i:s\Z');
        $tokenCache['expires_in'] = $newExpiresIn;

        // Persist atomically so other PHP processes can reuse this refresh.
        $this->saveTokenCache($tokenPath, $tokenCache);

        $applied = $this->tryApplyCache($tokenCache, $tokenPath);
        if ($applied === null) {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login refresh succeeded but the new access_token could not be parsed into STS credentials; please run 've login' to re-authenticate"
            );
        }
        return $applied;
    }

    private function resolveTokenCachePath($loginSession)
    {
        if ($this->cacheDir === '') {
            throw new ApiException(
                self::PROVIDER_NAME . ': could not resolve console-login cache directory'
            );
        }

        $tokenPath = $this->cacheDir . DIRECTORY_SEPARATOR . sha1($loginSession) . '.json';
        if (!file_exists($tokenPath)) {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login token cache file {$tokenPath} does not exist; please run 've login' to re-authenticate"
            );
        }

        return $tokenPath;
    }

    private function loadTokenCache($tokenPath)
    {
        $content = @file_get_contents($tokenPath);
        if ($content === false) {
            throw new ApiException(
                self::PROVIDER_NAME . ": failed to read console-login token cache file {$tokenPath}; please run 've login' to re-authenticate"
            );
        }

        if (trim($content) === '') {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login token cache file {$tokenPath} was empty; please run 've login' to re-authenticate"
            );
        }

        $data = json_decode($content, true);
        if (!is_array($data)) {
            throw new ApiException(
                self::PROVIDER_NAME . ": failed to parse console-login token cache file {$tokenPath}; please run 've login' to re-authenticate"
            );
        }

        return $data;
    }

    private function consoleLoginExpiration($tokenCache, $tokenPath)
    {
        $issuedAt = isset($tokenCache['issued_at']) && is_string($tokenCache['issued_at'])
            ? trim($tokenCache['issued_at']) : '';
        if ($issuedAt === '') {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login token cache {$tokenPath} did not contain issued_at; please run 've login' to re-authenticate"
            );
        }

        $expiresIn = isset($tokenCache['expires_in']) ? (int) $tokenCache['expires_in'] : 0;
        if ($expiresIn <= 0) {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login token cache {$tokenPath} did not contain valid expires_in; please run 've login' to re-authenticate"
            );
        }

        $issuedAtTs = strtotime($issuedAt);
        if ($issuedAtTs === false) {
            throw new ApiException(
                self::PROVIDER_NAME . ": failed to parse console-login issued_at in {$tokenPath}: {$issuedAt}; please run 've login' to re-authenticate"
            );
        }

        return $issuedAtTs + $expiresIn;
    }

    private function parseAccessToken($tokenCache, $tokenPath)
    {
        if (!array_key_exists('access_token', $tokenCache)) {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login token cache {$tokenPath} did not contain access_token; please run 've login' to re-authenticate"
            );
        }

        $accessToken = $tokenCache['access_token'];
        if (is_array($accessToken)) {
            $stsCreds = $accessToken;
        } elseif (is_string($accessToken)) {
            $stsCreds = json_decode($accessToken, true);
            if (!is_array($stsCreds)) {
                throw new ApiException(
                    self::PROVIDER_NAME . ": failed to parse console-login access_token in {$tokenPath}; please run 've login' to re-authenticate"
                );
            }
        } else {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login access_token in {$tokenPath} must be an object or JSON string; please run 've login' to re-authenticate"
            );
        }

        $ak = isset($stsCreds['access_key_id']) && is_string($stsCreds['access_key_id'])
            ? trim($stsCreds['access_key_id']) : '';
        $sk = isset($stsCreds['secret_access_key']) && is_string($stsCreds['secret_access_key'])
            ? trim($stsCreds['secret_access_key']) : '';
        $sessionToken = isset($stsCreds['session_token']) && is_string($stsCreds['session_token'])
            ? trim($stsCreds['session_token']) : '';
        if ($ak === '' || $sk === '' || $sessionToken === '') {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login access_token in {$tokenPath} is missing STS credential fields; please run 've login' to re-authenticate"
            );
        }

        return [
            'access_key_id' => $ak,
            'secret_access_key' => $sk,
            'session_token' => $sessionToken,
        ];
    }

    /**
     * saveTokenCache writes the refreshed cache atomically (tmp file + rename)
     * so concurrent readers always see a valid file. Failures are non-fatal
     * (in-memory credentials are already valid); the next process will fall
     * back to refreshing again.
     */
    private function saveTokenCache($tokenPath, $tokenCache)
    {
        $dir = dirname($tokenPath);
        if (!is_dir($dir)) {
            @mkdir($dir, 0700, true);
        }
        $json = json_encode($tokenCache, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        if ($json === false) {
            // Sharpen the no-corrupt-write guarantee: never call file_put_contents
            // with a false payload. Refresh is still applied in-memory; the next
            // process will fall back to refreshing again.
            return;
        }
        $tmpFile = $tokenPath . '.tmp.' . getmypid();
        if (@file_put_contents($tmpFile, $json) === false) {
            return;
        }
        @chmod($tmpFile, 0600);
        if (!@rename($tmpFile, $tokenPath)) {
            @unlink($tmpFile);
        }
    }
}
