<?php

namespace Volcengine\Common\Auth\Providers;

use Volcengine\Common\ApiException;

class CLIConfigCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'CLIConfigCredentialProvider';

    private $profileName;
    private $configPath;
    private $cachedCredentials;
    private $delegate = null;

    public function __construct($profileName = null, $configPath = null)
    {
        $this->profileName = $profileName;
        $this->configPath = $configPath;
    }

    public function getCredentials()
    {
        if ($this->delegate !== null) {
            return $this->delegate->getCredentials();
        }

        if ($this->cachedCredentials !== null) {
            return $this->cachedCredentials;
        }

        $loaded = $this->loadFromConfig();

        if ($this->delegate !== null) {
            return $this->delegate->getCredentials();
        }

        $this->cachedCredentials = $loaded;
        return $this->cachedCredentials;
    }

    private function loadFromConfig()
    {
        $configPath = $this->resolveConfigPath();

        if (!file_exists($configPath)) {
            throw new ApiException(
                self::PROVIDER_NAME . ': config file not found: ' . $configPath
            );
        }

        $content = @file_get_contents($configPath);
        if ($content === false) {
            throw new ApiException(
                self::PROVIDER_NAME . ': failed to read config file: ' . $configPath
            );
        }

        $config = json_decode($content, true);
        if (!is_array($config)) {
            throw new ApiException(
                self::PROVIDER_NAME . ': failed to parse config JSON: ' . $configPath
            );
        }

        $profile = $this->resolveProfile($config);

        if (!isset($config['profiles']) || !is_array($config['profiles'])) {
            throw new ApiException(
                self::PROVIDER_NAME . ": 'profiles' section not found in config"
            );
        }

        if (!isset($config['profiles'][$profile])) {
            throw new ApiException(
                self::PROVIDER_NAME . ": profile '{$profile}' not found in config"
            );
        }

        $profileData = $config['profiles'][$profile];
        $mode = isset($profileData['mode']) ? $profileData['mode'] : '';

        return $this->loadByMode($mode, $profileData, $profile, $config);
    }

    private function loadByMode($mode, $profileData, $profile, $config = [])
    {
        $mode = strtolower(trim($mode));
        switch ($mode) {
            case '':
            case 'ak':
                $ak = isset($profileData['access-key']) ? trim($profileData['access-key']) : '';
                $sk = isset($profileData['secret-key']) ? trim($profileData['secret-key']) : '';
                $sessionToken = isset($profileData['session-token']) ? trim($profileData['session-token']) : '';

                if (empty($ak) || empty($sk)) {
                    throw new ApiException(
                        self::PROVIDER_NAME . ": access-key and secret-key not found in profile '{$profile}'"
                    );
                }

                return [
                    'AccessKeyId' => $ak,
                    'SecretAccessKey' => $sk,
                    'SessionToken' => $sessionToken,
                    'ProviderName' => self::PROVIDER_NAME,
                ];

            case 'ramrolearn':
                $ak = isset($profileData['access-key']) ? trim($profileData['access-key']) : '';
                $sk = isset($profileData['secret-key']) ? trim($profileData['secret-key']) : '';
                $roleName = isset($profileData['role-name']) ? trim($profileData['role-name']) : '';
                $accountId = isset($profileData['account-id']) ? trim($profileData['account-id']) : '';
                $region = isset($profileData['region']) ? trim($profileData['region']) : '';
                if (empty($region)) {
                    $region = 'cn-beijing';
                }

                if (empty($ak) || empty($sk) || empty($roleName) || empty($accountId)) {
                    throw new ApiException(
                        self::PROVIDER_NAME . ": access-key, secret-key, role-name, and account-id are all required for RamRoleArn mode in profile '{$profile}'"
                    );
                }

                $this->delegate = new StsProvider($ak, $sk, $roleName, $accountId, $region);
                return null;

            case 'oidc':
                $oidcTokenFile = isset($profileData['oidc-token-file']) ? trim($profileData['oidc-token-file']) : '';
                $roleTrn = isset($profileData['role-trn']) ? trim($profileData['role-trn']) : '';

                if (empty($oidcTokenFile) || empty($roleTrn)) {
                    throw new ApiException(
                        self::PROVIDER_NAME . ": oidc-token-file and role-trn are required for OIDC mode in profile '{$profile}'"
                    );
                }

                $this->delegate = new OidcCredentialProvider($roleTrn, $oidcTokenFile);
                return null;

            case 'ecsrole':
                $roleName = isset($profileData['role-name']) ? trim($profileData['role-name']) : '';

                if (empty($roleName)) {
                    throw new ApiException(
                        self::PROVIDER_NAME . ": role-name is required for EcsRole mode in profile '{$profile}'"
                    );
                }

                $this->delegate = EcsRoleCredentialProvider::create($roleName);
                return null;

            case 'sso':
                $cacheDir = $this->resolveSsoCacheDir();
                $this->delegate = new SsoCredentialProvider($profileData, $profile, $config, $cacheDir);
                return null;

            default:
                throw new ApiException(
                    self::PROVIDER_NAME . ': unsupported mode: ' . $mode
                );
        }
    }

    private function resolveConfigPath()
    {
        if (!empty($this->configPath)) {
            return $this->configPath;
        }
        $envPath = getenv('VOLCENGINE_CLI_CONFIG_FILE');
        if ($envPath !== false && $envPath !== '') {
            return $envPath;
        }

        $home = $this->getHomeDir();
        return $home . DIRECTORY_SEPARATOR . '.volcengine' . DIRECTORY_SEPARATOR . 'config.json';
    }

    private function resolveProfile($config)
    {
        // Priority: constructor param > env var > "current" field in config > "default"
        if (!empty($this->profileName)) {
            return $this->profileName;
        }

        $envProfile = getenv('VOLCENGINE_PROFILE');
        if ($envProfile !== false && $envProfile !== '') {
            return $envProfile;
        }

        $envProfile = getenv('VOLCSTACK_PROFILE');
        if ($envProfile !== false && $envProfile !== '') {
            return $envProfile;
        }

        if (isset($config['current']) && !empty($config['current'])) {
            return $config['current'];
        }

        return 'default';
    }

    private function resolveSsoCacheDir()
    {
        $configPath = $this->resolveConfigPath();
        $configDir = dirname($configPath);
        return $configDir . DIRECTORY_SEPARATOR . 'sso' . DIRECTORY_SEPARATOR . 'cache';
    }

    private function getHomeDir()
    {
        if (isset($_SERVER['HOME'])) {
            return $_SERVER['HOME'];
        }
        if (isset($_SERVER['HOMEDRIVE']) && isset($_SERVER['HOMEPATH'])) {
            return $_SERVER['HOMEDRIVE'] . $_SERVER['HOMEPATH'];
        }
        return getenv('HOME') ?: '';
    }
}
