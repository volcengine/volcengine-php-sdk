<?php

namespace Volcengine\Common\Auth\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;

/**
 * @internal
 *
 * This class is only used as an internal delegate from {@see CLIConfigCredentialProvider}
 * when the CLI config profile `mode` is `sso`. It is not part of the public credential
 * provider API and its constructor signature, behavior, and stability are subject to
 * change without notice. Do not instantiate this class directly.
 */
class SsoCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'SsoCredentialProvider';
    const DEFAULT_REGION = 'cn-beijing';
    const DEFAULT_HTTP_TIMEOUT = 30;
    const OAUTH_BASE_URL_TEMPLATE = 'https://cloudidentity-oauth.%s.volces.com';
    const PORTAL_BASE_URL_TEMPLATE = 'https://cloudidentity-portal.%s.volces.com';
    const PORTAL_ACCESS_TOKEN_HEADER = 'x-bd-cloudidentity-bearer-token';

    private $profileData;
    private $profileName;
    private $config;
    private $cacheDir;
    private $cachedCredentials;
    private $expirationTime = 0;

    public function __construct($profileData, $profileName, $config, $cacheDir)
    {
        $this->profileData = $profileData;
        $this->profileName = $profileName;
        $this->config = $config;
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
        // Fast path: use cached STS credentials if still valid
        $fastResult = $this->useStsCredentialsIfValid();
        if ($fastResult !== null) {
            return $fastResult;
        }

        // Resolve SSO session configuration
        list($sessionName, $startURL, $region) = $this->resolveSsoSession();

        // Resolve token cache file path
        $tokenPath = $this->resolveTokenCachePath($startURL, $sessionName);

        // Load token cache
        $tokenCache = $this->loadTokenCache($tokenPath);

        $accessToken = isset($tokenCache['access_token']) ? trim($tokenCache['access_token']) : '';
        if ($accessToken === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": sso token cache file {$tokenPath} did not contain access_token"
            );
        }

        // Check if token is expired
        $expired = $this->isTokenExpired($tokenCache);
        if (!$expired) {
            return $this->getRoleCredentials($accessToken, $region);
        }

        // Refresh the access token
        $refreshedToken = $this->refreshAccessToken($tokenCache, $tokenPath, $region);

        return $this->getRoleCredentials($refreshedToken, $region);
    }

    private function useStsCredentialsIfValid()
    {
        $expTimestamp = isset($this->profileData['sts-expiration']) ? (int) $this->profileData['sts-expiration'] : 0;
        if ($expTimestamp <= 0) {
            return null;
        }

        $expTime = $this->unixTimestampToSeconds($expTimestamp);
        if (time() >= $expTime) {
            return null;
        }

        $ak = isset($this->profileData['access-key']) ? trim($this->profileData['access-key']) : '';
        $sk = isset($this->profileData['secret-key']) ? trim($this->profileData['secret-key']) : '';
        $sessionToken = isset($this->profileData['session-token']) ? trim($this->profileData['session-token']) : '';

        if ($ak === '' || $sk === '') {
            return null;
        }

        $this->expirationTime = $expTime - 60;

        return [
            'AccessKeyId' => $ak,
            'SecretAccessKey' => $sk,
            'SessionToken' => $sessionToken,
            'ProviderName' => self::PROVIDER_NAME,
        ];
    }

    private function resolveSsoSession()
    {
        $sessionName = isset($this->profileData['sso-session-name']) ? trim($this->profileData['sso-session-name']) : '';
        if ($sessionName === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": profile '{$this->profileName}' did not contain sso-session-name"
            );
        }

        $ssoSessions = isset($this->config['sso-session']) ? $this->config['sso-session'] : null;
        if (!is_array($ssoSessions) || empty($ssoSessions)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': config did not contain any sso-session sections'
            );
        }

        if (!isset($ssoSessions[$sessionName])) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": sso-session '{$sessionName}' not found in config"
            );
        }

        $session = $ssoSessions[$sessionName];
        $startURL = isset($session['start-url']) ? trim($session['start-url']) : '';
        if ($startURL === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": sso-session '{$sessionName}' did not contain start-url"
            );
        }

        $region = isset($session['region']) ? trim($session['region']) : '';
        if ($region === '') {
            $region = self::DEFAULT_REGION;
        }

        return [$sessionName, $startURL, $region];
    }

    private function resolveTokenCachePath($startURL, $sessionName)
    {
        if ($this->cacheDir === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': could not resolve SSO cache directory'
            );
        }

        $fileName = $this->tokenCacheFileName($startURL, $sessionName);
        $tokenPath = $this->cacheDir . DIRECTORY_SEPARATOR . $fileName;

        if (!file_exists($tokenPath)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": sso token cache file {$tokenPath} does not exist"
            );
        }

        return $tokenPath;
    }

    private function tokenCacheFileName($startURL, $sessionName)
    {
        $payload = json_encode([
            'start_url' => $startURL,
            'session_name' => $sessionName,
        ]);
        return sha1($payload) . '.json';
    }

    private function loadTokenCache($tokenPath)
    {
        $content = @file_get_contents($tokenPath);
        if ($content === false) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": failed to read sso token cache file {$tokenPath}"
            );
        }

        if (trim($content) === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": sso token cache file {$tokenPath} was empty"
            );
        }

        $data = json_decode($content, true);
        if (!is_array($data)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": failed to parse sso token cache file {$tokenPath}"
            );
        }

        return $data;
    }

    private function isTokenExpired($tokenCache)
    {
        $expiresAt = isset($tokenCache['expires_at']) ? trim($tokenCache['expires_at']) : '';
        if ($expiresAt === '') {
            return true;
        }

        $ts = strtotime($expiresAt);
        if ($ts === false) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": failed to parse expires_at: {$expiresAt}"
            );
        }

        return time() >= $ts;
    }

    private function refreshAccessToken($tokenCache, $tokenPath, $region)
    {
        $refreshToken = isset($tokenCache['refresh_token']) ? trim($tokenCache['refresh_token']) : '';
        if ($refreshToken === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": sso token cache file {$tokenPath} did not contain refresh_token"
            );
        }

        // Check if refresh token (client_secret) is expired
        $clientSecretExpiresAt = isset($tokenCache['client_secret_expires_at']) ? (int) $tokenCache['client_secret_expires_at'] : 0;
        if ($clientSecretExpiresAt <= 0) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": refresh token expiration is missing in {$tokenPath}"
            );
        }
        $refreshExpTime = $this->unixTimestampToSeconds($clientSecretExpiresAt);
        if (time() >= $refreshExpTime) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": refresh token in {$tokenPath} has expired"
            );
        }

        $clientId = isset($tokenCache['client_id']) ? trim($tokenCache['client_id']) : '';
        $clientSecret = isset($tokenCache['client_secret']) ? trim($tokenCache['client_secret']) : '';
        if ($clientId === '' || $clientSecret === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": sso token cache file {$tokenPath} did not contain client_id/client_secret"
            );
        }

        $oauthURL = sprintf(self::OAUTH_BASE_URL_TEMPLATE, $region) . '/token';
        $requestBody = json_encode([
            'grant_type' => 'refresh_token',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'refresh_token' => $refreshToken,
        ]);

        $responseBody = $this->doPost($oauthURL, $requestBody);
        $response = json_decode($responseBody, true);
        if (!is_array($response)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': failed to parse OAuth token refresh response'
            );
        }

        $newAccessToken = isset($response['access_token']) ? trim($response['access_token']) : '';
        if ($newAccessToken === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': OAuth token refresh response did not include access_token'
            );
        }

        $expiresIn = isset($response['expires_in']) ? (int) $response['expires_in'] : 0;
        if ($expiresIn <= 0) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': OAuth token refresh response did not include expires_in'
            );
        }

        // Update token cache
        $tokenCache['access_token'] = $newAccessToken;
        if (isset($response['refresh_token']) && trim($response['refresh_token']) !== '') {
            $tokenCache['refresh_token'] = $response['refresh_token'];
        }
        $tokenCache['expires_at'] = gmdate('Y-m-d\TH:i:s\Z', time() + $expiresIn);

        $this->saveTokenCache($tokenPath, $tokenCache);

        return $newAccessToken;
    }

    private function getRoleCredentials($accessToken, $region)
    {
        $accountId = isset($this->profileData['account-id']) ? trim($this->profileData['account-id']) : '';
        if ($accountId === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": profile '{$this->profileName}' did not contain account-id"
            );
        }

        $roleName = isset($this->profileData['role-name']) ? trim($this->profileData['role-name']) : '';
        if ($roleName === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": profile '{$this->profileName}' did not contain role-name"
            );
        }

        $portalURL = sprintf(self::PORTAL_BASE_URL_TEMPLATE, $region)
            . '/federation/credentials'
            . '?account_id=' . urlencode($accountId)
            . '&role_name=' . urlencode($roleName);

        $responseBody = $this->doGet($portalURL, $accessToken);
        $response = json_decode($responseBody, true);
        if (!is_array($response)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': failed to parse portal credentials response'
            );
        }

        $roleCreds = isset($response['Result']['RoleCredentials']) ? $response['Result']['RoleCredentials'] : null;
        if (!is_array($roleCreds)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': portal response did not contain Result.RoleCredentials'
            );
        }

        $ak = isset($roleCreds['AccessKeyId']) ? trim($roleCreds['AccessKeyId']) : '';
        $sk = isset($roleCreds['SecretAccessKey']) ? trim($roleCreds['SecretAccessKey']) : '';
        $sessionToken = isset($roleCreds['SessionToken']) ? trim($roleCreds['SessionToken']) : '';
        $expiration = isset($roleCreds['Expiration']) ? (int) $roleCreds['Expiration'] : 0;

        if ($ak === '' || $sk === '') {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': portal credentials response did not include AccessKeyId or SecretAccessKey'
            );
        }

        if ($expiration > 0) {
            $this->expirationTime = $this->unixTimestampToSeconds($expiration) - 60;
        }

        return [
            'AccessKeyId' => $ak,
            'SecretAccessKey' => $sk,
            'SessionToken' => $sessionToken,
            'ProviderName' => self::PROVIDER_NAME,
        ];
    }

    private function doPost($url, $body)
    {
        $client = new Client([
            'timeout' => self::DEFAULT_HTTP_TIMEOUT,
            'connect_timeout' => 5,
            'verify' => true,
            'http_errors' => false,
        ]);

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'body' => $body,
            ]);
        } catch (TransferException $e) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': HTTP POST request failed to ' . $url . ' - ' . $e->getMessage()
            );
        }

        $statusCode = $response->getStatusCode();
        $responseBody = (string) $response->getBody();

        if ($statusCode < 200 || $statusCode >= 300) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': HTTP POST request failed with status ' . $statusCode
                . ($responseBody !== '' ? ': ' . $responseBody : '')
            );
        }

        return $responseBody;
    }

    private function doGet($url, $accessToken)
    {
        $client = new Client([
            'timeout' => self::DEFAULT_HTTP_TIMEOUT,
            'connect_timeout' => 5,
            'verify' => true,
            'http_errors' => false,
        ]);

        try {
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    self::PORTAL_ACCESS_TOKEN_HEADER => $accessToken,
                ],
            ]);
        } catch (TransferException $e) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': HTTP GET request failed to ' . $url . ' - ' . $e->getMessage()
            );
        }

        $statusCode = $response->getStatusCode();
        $responseBody = (string) $response->getBody();

        if ($statusCode < 200 || $statusCode >= 300) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': HTTP GET request failed with status ' . $statusCode
                . ($responseBody !== '' ? ': ' . $responseBody : '')
            );
        }

        return $responseBody;
    }

    private function saveTokenCache($tokenPath, $tokenCache)
    {
        $dir = dirname($tokenPath);
        if (!is_dir($dir)) {
            @mkdir($dir, 0700, true);
        }

        $json = json_encode($tokenCache, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $tmpFile = $tokenPath . '.tmp.' . getmypid();

        if (@file_put_contents($tmpFile, $json) === false) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": failed to write sso token cache file {$tokenPath}"
            );
        }

        @chmod($tmpFile, 0600);

        if (!@rename($tmpFile, $tokenPath)) {
            @unlink($tmpFile);
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": failed to update sso token cache file {$tokenPath}"
            );
        }
    }

    /**
     * Convert a unix timestamp (seconds, milliseconds, microseconds, or nanoseconds) to seconds.
     */
    private function unixTimestampToSeconds($ts)
    {
        if ($ts >= 1e18) {
            return (int) ($ts / 1e9);
        }
        if ($ts >= 1e15) {
            return (int) ($ts / 1e6);
        }
        if ($ts >= 1e12) {
            return (int) ($ts / 1e3);
        }
        return (int) $ts;
    }
}
