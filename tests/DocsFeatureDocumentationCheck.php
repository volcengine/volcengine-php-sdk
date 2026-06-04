<?php

$root = dirname(__DIR__);

function read_file_or_fail($path)
{
    if (!is_file($path)) {
        throw new RuntimeException("Missing file: {$path}");
    }
    $content = file_get_contents($path);
    if ($content === false) {
        throw new RuntimeException("Failed to read file: {$path}");
    }
    return $content;
}

function assert_contains($content, $needle, $label)
{
    if (strpos($content, $needle) === false) {
        throw new RuntimeException("Missing {$label}: {$needle}");
    }
}

function assert_not_contains($content, $needle, $label)
{
    if (strpos($content, $needle) !== false) {
        throw new RuntimeException("Unexpected {$label}: {$needle}");
    }
}

$docs = [
    'docs/5-Timeout.md',
    'docs/5-Timeout-zh.md',
    'docs/6-Retry.md',
    'docs/6-Retry-zh.md',
    'docs/7-ErrorHandling.md',
    'docs/7-ErrorHandling-zh.md',
    'docs/8-Debugging.md',
    'docs/8-Debugging-zh.md',
];

foreach ($docs as $doc) {
    $content = read_file_or_fail($root . '/' . $doc);
    assert_not_contains($content, 'Not yet available for PHP SDK', $doc);
    assert_not_contains($content, '暂未适配 PHP SDK', $doc);
}

$timeout = read_file_or_fail($root . '/docs/5-Timeout.md');
assert_contains($timeout, 'GuzzleHttp\\Client', 'timeout docs custom client');
assert_contains($timeout, "'connect_timeout' => 3", 'timeout docs connect timeout');
assert_contains($timeout, "'timeout' => 30", 'timeout docs request timeout');

$retry = read_file_or_fail($root . '/docs/6-Retry.md');
assert_contains($retry, 'does not currently provide a global retry policy', 'retry scope');
assert_contains($retry, 'EcsRoleCredentialProvider', 'retry credential provider');
assert_contains($retry, 'setMaxRetries(3)', 'retry max retries example');
assert_contains($retry, 'setRetryInterval(1)', 'retry interval example');

$errorHandling = read_file_or_fail($root . '/docs/7-ErrorHandling.md');
assert_contains($errorHandling, 'Volcengine\\Common\\ApiException', 'error docs exception class');
assert_contains($errorHandling, 'Guzzle `RequestException`', 'error docs request exception scope');
assert_contains($errorHandling, 'Guzzle `TransferException`', 'error docs transfer exception caveat');
assert_contains($errorHandling, '\\GuzzleHttp\\Exception\\TransferException', 'error docs transfer exception catch');
assert_contains($errorHandling, 'getResponseHeaders()', 'error docs response headers');
assert_contains($errorHandling, 'getResponseBody()', 'error docs response body');

$credentials = read_file_or_fail($root . '/docs/1-Credentials.md');
assert_not_contains($credentials, '\\Volcengine\\Vpc\\API\\VPCApi', 'credentials docs VPC API namespace');
assert_contains($credentials, '\\Volcengine\\Vpc\\Api\\VPCApi', 'credentials docs VPC Api namespace');
assert_contains($credentials, 'The expiry prefers the `Expiration` returned by STS', 'credentials docs OIDC expiration source');

$credentialsZh = read_file_or_fail($root . '/docs/1-Credentials-zh.md');
assert_not_contains($credentialsZh, '\\Volcengine\\Vpc\\API\\VPCApi', 'credentials zh docs VPC API namespace');
assert_contains($credentialsZh, '\\Volcengine\\Vpc\\Api\\VPCApi', 'credentials zh docs VPC Api namespace');

$debugging = read_file_or_fail($root . '/docs/8-Debugging.md');
assert_contains($debugging, 'setDebug(true)', 'debug docs setDebug');
assert_contains($debugging, 'setDebugFile(', 'debug docs setDebugFile');
assert_contains($debugging, 'Configuration::toDebugReport()', 'debug report docs');

$configuration = read_file_or_fail($root . '/src/Common/Configuration.php');
assert_contains($configuration, 'protected $connectTimeout', 'configuration connect timeout');
assert_contains($configuration, 'function setReadTimeout', 'configuration read timeout setter');
assert_contains($configuration, 'function setDebug', 'configuration debug setter');
assert_contains($configuration, 'function setDebugFile', 'configuration debug file setter');
assert_contains($configuration, 'function toDebugReport', 'configuration debug report');

$apiClient = read_file_or_fail($root . '/src/Common/ApiClient.php');
assert_contains($apiClient, 'catch (RequestException $e)', 'api client request exception handling');
assert_contains($apiClient, 'throw new ApiException', 'api client api exception handling');
assert_contains($apiClient, "ResponseMetadata'}->{'Error", 'api client response metadata error handling');

$apiException = read_file_or_fail($root . '/src/Common/ApiException.php');
assert_contains($apiException, 'class ApiException extends Exception', 'api exception class');
assert_contains($apiException, 'function getResponseHeaders', 'api exception response headers');
assert_contains($apiException, 'function getResponseBody', 'api exception response body');

$signInterceptor = read_file_or_fail($root . '/src/Common/Interceptor/Interceptors/SignRequestInterceptor.php');
assert_contains($signInterceptor, 'RequestOptions::DEBUG', 'debug request option');
assert_contains($signInterceptor, 'getDebugFile', 'debug file usage');

$stsFormRequest = read_file_or_fail($root . '/src/Common/Auth/Providers/StsFormRequest.php');
assert_contains($stsFormRequest, 'doPostWithRetry', 'sts retry helper');
assert_contains($stsFormRequest, 'HTTP 5xx / 429', 'sts retryable status documentation');
assert_contains($stsFormRequest, 'sleep($retryInterval)', 'sts retry interval');

$ecsProvider = read_file_or_fail($root . '/src/Common/Auth/Providers/EcsRoleCredentialProvider.php');
assert_contains($ecsProvider, 'function setMaxRetries', 'ecs max retries setter');
assert_contains($ecsProvider, 'function setRetryInterval', 'ecs retry interval setter');
assert_contains($ecsProvider, 'function setConnectTimeout', 'ecs connect timeout setter');
assert_contains($ecsProvider, 'function setReadTimeout', 'ecs read timeout setter');
assert_contains($ecsProvider, 'doRequestWithRetry', 'ecs retry helper');

echo "Docs feature documentation check passed.\n";
