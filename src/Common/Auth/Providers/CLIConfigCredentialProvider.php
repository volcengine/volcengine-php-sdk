<?php

namespace Volcengine\Common\Auth\Providers;

class CLIConfigCredentialProvider extends Provider
{
    const PROVIDER_NAME = 'CLIConfigCredentialProvider';

    private $profileName;
    private $cachedCredentials;

    public function __construct($profileName = null)
    {
        $this->profileName = $profileName;
    }

    public function getCredentials()
    {
        if ($this->cachedCredentials !== null) {
            return $this->cachedCredentials;
        }

        $this->cachedCredentials = $this->loadFromConfig();
        return $this->cachedCredentials;
    }

    private function loadFromConfig()
    {
        $configPath = $this->resolveConfigPath();

        if (!file_exists($configPath)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': config file not found: ' . $configPath
            );
        }

        $content = @file_get_contents($configPath);
        if ($content === false) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': failed to read config file: ' . $configPath
            );
        }

        $config = json_decode($content, true);
        if (!is_array($config)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': failed to parse config JSON: ' . $configPath
            );
        }

        $profile = $this->resolveProfile($config);

        if (!isset($config['profiles']) || !is_array($config['profiles'])) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": 'profiles' section not found in config"
            );
        }

        if (!isset($config['profiles'][$profile])) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": profile '{$profile}' not found in config"
            );
        }

        $profileData = $config['profiles'][$profile];
        $ak = isset($profileData['access-key']) ? trim($profileData['access-key']) : '';
        $sk = isset($profileData['secret-key']) ? trim($profileData['secret-key']) : '';
        $sessionToken = isset($profileData['session-token']) ? trim($profileData['session-token']) : '';

        if (empty($ak) || empty($sk)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": access-key and secret-key not found in profile '{$profile}'"
            );
        }

        return [
            'AccessKeyId' => $ak,
            'SecretAccessKey' => $sk,
            'SessionToken' => $sessionToken,
            'ProviderName' => self::PROVIDER_NAME,
        ];
    }

    private function resolveConfigPath()
    {
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

        $envProfile = getenv('VOLCENGINE_CLI_PROFILE');
        if ($envProfile !== false && $envProfile !== '') {
            return $envProfile;
        }

        if (isset($config['current']) && !empty($config['current'])) {
            return $config['current'];
        }

        return 'default';
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
