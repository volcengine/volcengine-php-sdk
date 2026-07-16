<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Common/autoload.php';

use Volcengine\Common\Auth\Providers\StsProvider;
use Volcengine\Common\Endpoint\Providers\StandardEndpointProvider;

function assert_same($expected, $actual, $label)
{
    if ($expected !== $actual) {
        fwrite(STDERR, $label . " failed: expected " . var_export($expected, true) . ", got " . var_export($actual, true) . PHP_EOL);
        exit(1);
    }
}

function assert_throws($expectedMessagePart, callable $fn, $label)
{
    try {
        $fn();
    } catch (\Exception $e) {
        if (strpos($e->getMessage(), $expectedMessagePart) !== false) {
            return;
        }
        fwrite(STDERR, $label . " failed: exception message did not contain {$expectedMessagePart}: " . $e->getMessage() . PHP_EOL);
        exit(1);
    }

    fwrite(STDERR, $label . " failed: expected exception" . PHP_EOL);
    exit(1);
}

function set_private_property($object, $property, $value)
{
    $ref = new \ReflectionObject($object);
    $prop = $ref->getProperty($property);
    $prop->setAccessible(true);
    $prop->setValue($object, $value);
}

function find_free_port()
{
    $socket = stream_socket_server('tcp://127.0.0.1:0', $errno, $errstr);
    if ($socket === false) {
        throw new \RuntimeException("failed to allocate port: {$errstr}");
    }
    $name = stream_socket_get_name($socket, false);
    fclose($socket);
    $parts = explode(':', $name);
    return (int) end($parts);
}

function wait_for_server($url)
{
    $deadline = microtime(true) + 5;
    while (microtime(true) < $deadline) {
        $context = stream_context_create(['http' => ['timeout' => 0.2]]);
        @file_get_contents($url, false, $context);
        if (isset($http_response_header)) {
            return;
        }
        usleep(100000);
    }
    throw new \RuntimeException('mock server did not start');
}

function run_standard_endpoint_checks()
{
    $provider = new StandardEndpointProvider();

    assert_same(
        'rds-mysql.cn-beijing.volcengineapi.com',
        $provider->endpointFor('rds_mysql', 'cn-beijing')->host,
        'standard regional endpoint'
    );

    assert_same(
        'iam.volcengineapi.com',
        $provider->endpointFor('iam', 'cn-beijing')->host,
        'standard global endpoint'
    );

    assert_same(
        'rds-mysql.ap-southeast-1.volcengine-api.com',
        $provider->endpointFor('rds_mysql', 'ap-southeast-1', null, true)->host,
        'standard dualstack regional endpoint'
    );

    assert_throws('ServiceNotFound', function () use ($provider) {
        $provider->endpointFor('unknown_service', 'cn-beijing');
    }, 'standard unknown service');

    assert_throws('InvalidRegion', function () use ($provider) {
        $provider->endpointFor('ecs', 'not_a_region');
    }, 'standard invalid region');
}

function run_sts_retry_check()
{
    $port = find_free_port();
    $stateFile = tempnam(sys_get_temp_dir(), 'sts_retry_state_');
    $router = __DIR__ . '/fixtures/sts_retry_server.php';
    $serverLog = tempnam(sys_get_temp_dir(), 'sts_retry_server_log_');
    $cmd = sprintf(
        '%s -S 127.0.0.1:%d -t %s %s',
        escapeshellarg(PHP_BINARY),
        $port,
        escapeshellarg(__DIR__ . '/fixtures'),
        escapeshellarg($router)
    );

    $descriptorSpec = [
        0 => ['pipe', 'r'],
        1 => ['file', '/dev/null', 'w'],
        2 => ['file', $serverLog, 'w'],
    ];
    $env = array_merge($_ENV, [
        'PATH' => getenv('PATH'),
        'STS_RETRY_STATE_FILE' => $stateFile,
    ]);
    $process = proc_open($cmd, $descriptorSpec, $pipes, __DIR__, $env);
    if (!is_resource($process)) {
        throw new \RuntimeException('failed to start mock server');
    }

    try {
        try {
            wait_for_server('http://127.0.0.1:' . $port . '/health');
        } catch (\RuntimeException $e) {
            $log = file_exists($serverLog) ? file_get_contents($serverLog) : '';
            throw new \RuntimeException($e->getMessage() . ($log !== '' ? ': ' . $log : ''));
        }

        $provider = new StsProvider('ak', 'sk', 'role', '123456', 'cn-beijing');
        set_private_property($provider, 'schema', 'http');
        set_private_property($provider, 'host', '127.0.0.1:' . $port);

        if (!method_exists($provider, 'setMaxRetries')) {
            throw new \RuntimeException('StsProvider missing setMaxRetries');
        }
        if (!method_exists($provider, 'setRetryInterval')) {
            throw new \RuntimeException('StsProvider missing setRetryInterval');
        }

        $provider->setConnectTimeout(1)
            ->setReadTimeout(2)
            ->setMaxRetries(1)
            ->setRetryInterval(0);

        $creds = $provider->getCredentials();
        assert_same('sts-ak', isset($creds['AccessKeyId']) ? $creds['AccessKeyId'] : null, 'sts retry access key');
        assert_same('sts-sk', isset($creds['SecretAccessKey']) ? $creds['SecretAccessKey'] : null, 'sts retry secret key');
        assert_same('sts-token', isset($creds['SessionToken']) ? $creds['SessionToken'] : null, 'sts retry token');
        assert_same('2', trim(file_get_contents($stateFile)), 'sts retry attempt count');
    } finally {
        proc_terminate($process);
        proc_close($process);
        @unlink($stateFile);
        @unlink($serverLog);
    }
}

run_standard_endpoint_checks();
run_sts_retry_check();

echo "Endpoint and STS behavior check passed." . PHP_EOL;
