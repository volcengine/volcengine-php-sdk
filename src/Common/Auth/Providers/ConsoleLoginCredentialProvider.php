<?php

namespace Volcengine\Common\Auth\Providers;

use Volcengine\Common\ApiException;

/**
 * @internal
 *
 * Internal delegate for CLI config profile mode `console-login`.
 * This provider is read-only: it only reads the login cache written by `ve login`
 * and never refreshes tokens or writes cache files.
 */
class ConsoleLoginCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'ConsoleLoginCredentialProvider';
    const EXPIRE_BUFFER_SECONDS = 60;

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
                self::PROVIDER_NAME . ": profile '{$this->profileName}' did not contain login-session; run 've login' first"
            );
        }

        $tokenPath = $this->resolveTokenCachePath($loginSession);
        $tokenCache = $this->loadTokenCache($tokenPath);

        $expiration = $this->consoleLoginExpiration($tokenCache, $tokenPath);
        if (time() >= $expiration - self::EXPIRE_BUFFER_SECONDS) {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login token cache {$tokenPath} has expired or is about to expire; run 've login' to refresh it"
            );
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
                self::PROVIDER_NAME . ": console-login token cache file {$tokenPath} does not exist; run 've login' first"
            );
        }

        return $tokenPath;
    }

    private function loadTokenCache($tokenPath)
    {
        $content = @file_get_contents($tokenPath);
        if ($content === false) {
            throw new ApiException(
                self::PROVIDER_NAME . ": failed to read console-login token cache file {$tokenPath}"
            );
        }

        if (trim($content) === '') {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login token cache file {$tokenPath} was empty"
            );
        }

        $data = json_decode($content, true);
        if (!is_array($data)) {
            throw new ApiException(
                self::PROVIDER_NAME . ": failed to parse console-login token cache file {$tokenPath}"
            );
        }

        return $data;
    }

    private function consoleLoginExpiration($tokenCache, $tokenPath)
    {
        $issuedAt = isset($tokenCache['issued_at']) ? trim($tokenCache['issued_at']) : '';
        if ($issuedAt === '') {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login token cache {$tokenPath} did not contain issued_at"
            );
        }

        $expiresIn = isset($tokenCache['expires_in']) ? (int) $tokenCache['expires_in'] : 0;
        if ($expiresIn <= 0) {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login token cache {$tokenPath} did not contain valid expires_in"
            );
        }

        $issuedAtTs = strtotime($issuedAt);
        if ($issuedAtTs === false) {
            throw new ApiException(
                self::PROVIDER_NAME . ": failed to parse console-login issued_at in {$tokenPath}: {$issuedAt}"
            );
        }

        return $issuedAtTs + $expiresIn;
    }

    private function parseAccessToken($tokenCache, $tokenPath)
    {
        if (!array_key_exists('access_token', $tokenCache)) {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login token cache {$tokenPath} did not contain access_token"
            );
        }

        $accessToken = $tokenCache['access_token'];
        if (is_array($accessToken)) {
            $stsCreds = $accessToken;
        } elseif (is_string($accessToken)) {
            $stsCreds = json_decode($accessToken, true);
            if (!is_array($stsCreds)) {
                throw new ApiException(
                    self::PROVIDER_NAME . ": failed to parse console-login access_token in {$tokenPath}"
                );
            }
        } else {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login access_token in {$tokenPath} must be an object or JSON string"
            );
        }

        $ak = isset($stsCreds['access_key_id']) ? trim($stsCreds['access_key_id']) : '';
        $sk = isset($stsCreds['secret_access_key']) ? trim($stsCreds['secret_access_key']) : '';
        $sessionToken = isset($stsCreds['session_token']) ? trim($stsCreds['session_token']) : '';
        if ($ak === '' || $sk === '' || $sessionToken === '') {
            throw new ApiException(
                self::PROVIDER_NAME . ": console-login access_token in {$tokenPath} is missing STS credential fields"
            );
        }

        return [
            'access_key_id' => $ak,
            'secret_access_key' => $sk,
            'session_token' => $sessionToken,
        ];
    }
}

