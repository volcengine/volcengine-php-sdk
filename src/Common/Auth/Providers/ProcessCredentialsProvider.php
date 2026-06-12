<?php

namespace Volcengine\Common\Auth\Providers;

use Volcengine\Common\ApiException;

class ProcessCredentialsProvider extends Provider
{
    const PROVIDER_NAME = 'ProcessCredentialsProvider';

    private $command;
    private $timeout;
    private $expireBufferSeconds;
    private $cachedCredentials;
    private $expirationTime = 0;

    public function __construct($command, $timeout = 60, $expireBufferSeconds = 300)
    {
        $this->command = $command;
        $this->timeout = $timeout;
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

    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    private function refresh()
    {
        $result = $this->executeCommand($this->command, $this->timeout);
        $data = json_decode($result, true);
        if (!is_array($data)) {
            throw new ApiException(self::PROVIDER_NAME . ': failed to parse process credential JSON');
        }

        $ak = isset($data['AccessKeyId']) ? $data['AccessKeyId'] : (isset($data['AccessKeyID']) ? $data['AccessKeyID'] : '');
        $sk = isset($data['SecretAccessKey']) ? $data['SecretAccessKey'] : '';
        $token = isset($data['SessionToken']) ? $data['SessionToken'] : '';
        $expiration = isset($data['Expiration']) ? strtotime($data['Expiration']) : false;

        if (empty($ak) || empty($sk)) {
            throw new ApiException(self::PROVIDER_NAME . ': process credentials missing AccessKeyId or SecretAccessKey');
        }

        $this->cachedCredentials = [
            'AccessKeyId' => $ak,
            'SecretAccessKey' => $sk,
            'SessionToken' => $token,
            'ProviderName' => self::PROVIDER_NAME,
        ];
        $this->expirationTime = ($expiration !== false ? $expiration : (time() + 3600)) - $this->expireBufferSeconds;
    }

    private function executeCommand($command, $timeout)
    {
        $descriptorSpec = [
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ];

        $process = proc_open('sh -c ' . escapeshellarg($command), $descriptorSpec, $pipes);
        if (!is_resource($process)) {
            throw new ApiException(self::PROVIDER_NAME . ': failed to start credential process');
        }

        stream_set_blocking($pipes[1], false);
        stream_set_blocking($pipes[2], false);

        $stdout = '';
        $stderr = '';
        $start = microtime(true);

        while (true) {
            $status = proc_get_status($process);
            $stdout .= stream_get_contents($pipes[1]);
            $stderr .= stream_get_contents($pipes[2]);

            if (!$status['running']) {
                break;
            }

            if ((microtime(true) - $start) >= $timeout) {
                proc_terminate($process);
                foreach ($pipes as $pipe) {
                    fclose($pipe);
                }
                proc_close($process);
                throw new ApiException(self::PROVIDER_NAME . ': credential process timed out');
            }
            usleep(100000);
        }

        foreach ($pipes as $pipe) {
            fclose($pipe);
        }
        $exitCode = proc_close($process);
        if ($exitCode !== 0) {
            throw new ApiException(self::PROVIDER_NAME . ': credential process exited with code ' . $exitCode . ($stderr !== '' ? ' - ' . trim($stderr) : ''));
        }

        return trim($stdout);
    }
}
