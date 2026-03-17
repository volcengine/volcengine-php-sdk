<?php

namespace Volcengine\Common\Auth\Providers;

class SharedCredentialsProvider extends Provider
{
    const PROVIDER_NAME = 'SharedCredentialsProvider';

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

        $this->cachedCredentials = $this->loadFromFile();
        return $this->cachedCredentials;
    }

    private function loadFromFile()
    {
        $credentialsPath = $this->resolveCredentialsPath();

        if (!file_exists($credentialsPath)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': credentials file not found: ' . $credentialsPath
            );
        }

        $profile = $this->resolveProfile();
        $section = $this->parseIniSection($credentialsPath, $profile);

        if ($section === null) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": profile '{$profile}' not found in " . $credentialsPath
            );
        }

        $ak = isset($section['volcstack_access_key_id']) ? trim($section['volcstack_access_key_id']) : '';
        $sk = isset($section['volcstack_secret_access_key']) ? trim($section['volcstack_secret_access_key']) : '';
        $sessionToken = isset($section['volcstack_session_token']) ? trim($section['volcstack_session_token']) : '';

        if (empty($ak) || empty($sk)) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ": volcstack_access_key_id and volcstack_secret_access_key "
                . "not found in profile '{$profile}'"
            );
        }

        return [
            'AccessKeyId' => $ak,
            'SecretAccessKey' => $sk,
            'SessionToken' => $sessionToken,
            'ProviderName' => self::PROVIDER_NAME,
        ];
    }

    private function resolveCredentialsPath()
    {
        $envPath = getenv('VOLCSTACK_SHARED_CREDENTIALS_FILE');
        if ($envPath !== false && $envPath !== '') {
            return $envPath;
        }

        $home = $this->getHomeDir();
        return $home . DIRECTORY_SEPARATOR . '.volcengine' . DIRECTORY_SEPARATOR . 'credentials';
    }

    private function resolveProfile()
    {
        // Priority: constructor param > env var > "default"
        if (!empty($this->profileName)) {
            return $this->profileName;
        }

        $envProfile = getenv('VOLCSTACK_PROFILE');
        if ($envProfile !== false && $envProfile !== '') {
            return $envProfile;
        }

        return 'default';
    }

    /**
     * Simple INI parser that reads a specific section from a file.
     */
    private function parseIniSection($filePath, $targetSection)
    {
        $lines = @file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            throw new \RuntimeException(
                self::PROVIDER_NAME . ': failed to read credentials file: ' . $filePath
            );
        }

        $result = null;
        $currentSection = null;

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || $line[0] === '#' || $line[0] === ';') {
                continue;
            }
            if ($line[0] === '[' && substr($line, -1) === ']') {
                $currentSection = trim(substr($line, 1, -1));
                if ($currentSection === $targetSection && $result === null) {
                    $result = [];
                }
                continue;
            }
            if ($currentSection === $targetSection && $result !== null) {
                $eqPos = strpos($line, '=');
                if ($eqPos !== false) {
                    $key = trim(substr($line, 0, $eqPos));
                    $value = trim(substr($line, $eqPos + 1));
                    $result[$key] = $value;
                }
            }
        }

        return $result;
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
