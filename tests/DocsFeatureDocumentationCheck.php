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
    'docs/4-Proxy.md',
    'docs/4-Proxy-zh.md',
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

$proxy = read_file_or_fail($root . '/docs/4-Proxy.md');
assert_contains($proxy, 'setHttpProxy(', 'proxy docs http proxy');
assert_contains($proxy, 'setHttpsProxy(', 'proxy docs https proxy');
assert_contains($proxy, 'setProxy(', 'proxy docs unified proxy');

$timeout = read_file_or_fail($root . '/docs/5-Timeout.md');
assert_contains($timeout, 'setConnectTimeout(', 'timeout docs connect timeout');
assert_contains($timeout, 'setReadTimeout(', 'timeout docs read timeout');

$retry = read_file_or_fail($root . '/docs/6-Retry.md');
assert_contains($retry, 'setAutoRetry(true)', 'retry docs auto retry');
assert_contains($retry, 'setAutoRetry(false)', 'retry docs disable retry');
assert_contains($retry, 'setNumMaxRetries(3)', 'retry docs max retries');
assert_contains($retry, 'setMinRetryDelayMs(300)', 'retry docs min retry delay');
assert_contains($retry, 'setMaxRetryDelayMs(3000)', 'retry docs max retry delay');
assert_contains($retry, 'setRetryErrorCodes(', 'retry docs retry error codes');
assert_not_contains($retry, 'NoOpRetryer', 'retry docs no-op retryer');
assert_contains($retry, 'Retry-After', 'retry docs retry-after');
assert_contains($retry, 'ExpiredToken', 'retry docs credential expiry retry');

$errorHandling = read_file_or_fail($root . '/docs/7-ErrorHandling.md');
assert_contains($errorHandling, 'Volcengine\\Common\\ApiException', 'error docs api exception');
assert_contains($errorHandling, 'getStatusCode()', 'error docs status helper');
assert_contains($errorHandling, 'getErrorCode()', 'error docs code helper');
assert_contains($errorHandling, 'getErrorMessage()', 'error docs message helper');
assert_contains($errorHandling, 'getOriginalError()', 'error docs original error helper');
assert_not_contains($errorHandling, 'ClientException', 'error docs client exception');
assert_not_contains($errorHandling, 'ServerException', 'error docs server exception');
assert_not_contains($errorHandling, 'ReadException', 'error docs read exception');
assert_not_contains($errorHandling, 'SerializationException', 'error docs serialization exception');
assert_not_contains($errorHandling, 'setSimpleError(true)', 'error docs simple error');

$debugging = read_file_or_fail($root . '/docs/8-Debugging.md');
assert_contains($debugging, 'setUserAgent(', 'debug docs user agent');
assert_contains($debugging, 'Configuration::toDebugReport()', 'debug report docs');
assert_not_contains($debugging, 'setLogLevel(', 'debug docs log level');
assert_not_contains($debugging, 'setLogger(', 'debug docs custom logger');
assert_not_contains($debugging, 'LOG_REQUEST', 'debug docs request log level');
assert_not_contains($debugging, 'LOG_ENDPOINT', 'debug docs endpoint log level');
assert_not_contains($debugging, 'PSR-3', 'debug docs psr-3');
assert_not_contains($debugging, 'setSigner(', 'debug docs signer');
assert_not_contains($debugging, 'setDynamicCredentials()', 'debug docs dynamic credentials hook');
assert_not_contains($debugging, 'setExtendHttpRequest()', 'debug docs extend request hook');
assert_not_contains($debugging, 'setExtraHttpParameters()', 'debug docs extra http parameters hook');
assert_not_contains($debugging, 'setExtraHttpJsonBody()', 'debug docs extra json body hook');
assert_not_contains($debugging, 'setCustomUnmarshalError()', 'debug docs custom unmarshal error');
assert_not_contains($debugging, 'setCustomUnmarshalData()', 'debug docs custom unmarshal data');
assert_not_contains($debugging, 'setExtendContextWithMeta()', 'debug docs extend context hook');
assert_not_contains($debugging, 'setLogSensitives()', 'debug docs log sensitives');
assert_not_contains($debugging, 'setLogAccount()', 'debug docs log account');
assert_not_contains($debugging, 'setForceJsonNumberDecode()', 'debug docs force json number decode');

$transport = read_file_or_fail($root . '/docs/3-Transport.md');
assert_contains($transport, 'setSslCaCert(', 'transport docs ca cert');
assert_contains($transport, 'setCertFile(', 'transport docs client cert');
assert_contains($transport, 'setKeyFile(', 'transport docs client key');
assert_contains($transport, 'setAssertHostname(', 'transport docs assert hostname');
assert_not_contains($transport, 'setNumPools(', 'transport docs num pools');
assert_not_contains($transport, 'setConnectionPoolMaxsize(', 'transport docs connection pool maxsize');
assert_not_contains($transport, 'createHttpClient()', 'transport docs create http client');
assert_not_contains($transport, 'toHttpClientConfig()', 'transport docs export http config');
assert_not_contains($transport, 'setProgressListener(', 'transport docs progress listener');

$endpoint = read_file_or_fail($root . '/docs/2-Endpoint.md');
assert_contains($endpoint, 'setHost(', 'endpoint docs custom endpoint');
assert_contains($endpoint, 'setRegion(', 'endpoint docs custom region');
assert_contains($endpoint, 'setUseDualStack(true)', 'endpoint docs dual stack');

$credentials = read_file_or_fail($root . '/docs/1-Credentials.md');
assert_contains($credentials, 'Direct `Configuration`', 'credentials docs direct configuration');
assert_contains($credentials, 'EcsRoleCredentialProvider', 'credentials docs ecs role provider');

$overview = read_file_or_fail($root . '/docs/0-Overview.md');
assert_contains($overview, 'ECS Role', 'overview ecs role');
assert_contains($overview, 'Automatic Resolution', 'overview endpoint automatic resolution');

$configuration = read_file_or_fail($root . '/src/Common/Configuration.php');
assert_contains($configuration, 'function setAutoRetry', 'configuration auto retry setter');
assert_contains($configuration, 'function setProxy', 'configuration proxy setter');
assert_contains($configuration, 'function setHttpProxy', 'configuration http proxy setter');
assert_contains($configuration, 'function setHttpsProxy', 'configuration https proxy setter');
assert_contains($configuration, 'function setNumMaxRetries', 'configuration max retries setter');
assert_contains($configuration, 'function getDefaultConfiguration', 'configuration default config');
assert_not_contains($configuration, 'function setLogger', 'configuration logger setter');
assert_not_contains($configuration, 'function setLogLevel', 'configuration log level setter');
assert_not_contains($configuration, 'function setRuntimeOptions', 'configuration runtime options setter');
assert_not_contains($configuration, 'function setEnableRequestGzip', 'configuration gzip setter');
assert_not_contains($configuration, 'function setNumPools', 'configuration num pools setter');
assert_not_contains($configuration, 'function setConnectionPoolMaxsize', 'configuration connection pool maxsize setter');
assert_not_contains($configuration, 'function createHttpClient', 'configuration create http client');
assert_not_contains($configuration, 'function toHttpClientConfig', 'configuration http client config export');
assert_not_contains($configuration, 'function setSigner', 'configuration signer setter');
assert_not_contains($configuration, 'function addRequestInterceptor', 'configuration request interceptor hooks');
assert_not_contains($configuration, 'function addResponseInterceptor', 'configuration response interceptor hooks');
assert_not_contains($configuration, 'function setDynamicCredentials', 'configuration dynamic credentials setter');
assert_not_contains($configuration, 'function setExtendHttpRequest', 'configuration extend request setter');
assert_not_contains($configuration, 'function setCustomUnmarshalData', 'configuration custom unmarshal data setter');
assert_not_contains($configuration, 'function setLogSensitives', 'configuration log sensitives setter');
assert_not_contains($configuration, 'function setLogAccount', 'configuration log account setter');
assert_not_contains($configuration, 'function setForceJsonNumberDecode', 'configuration force json number decode setter');
assert_not_contains($configuration, 'function setSimpleError', 'configuration simple error setter');

$apiClient = read_file_or_fail($root . '/src/Common/ApiClient.php');
assert_contains($apiClient, 'DeserializedResponseInterceptor', 'api client deserialized response interceptor');
assert_contains($apiClient, 'sendAsyncAttempt', 'api client async retry');
assert_contains($apiClient, 'shouldRetry', 'api client retryer integration');
assert_not_contains($apiClient, 'RuntimeOptionsInterceptor', 'api client runtime options interceptor');
assert_not_contains($apiClient, 'GzipRequestInterceptor', 'api client gzip interceptor');
assert_not_contains($apiClient, 'HttpLoggingInterceptor', 'api client http logging interceptor');
assert_not_contains($apiClient, 'function getInterceptorChain', 'api client interceptor chain getter');
assert_not_contains($apiClient, 'function addRequestInterceptor', 'api client custom request interceptor API');
assert_not_contains($apiClient, 'function addResponseInterceptor', 'api client custom response interceptor API');
assert_not_contains($apiClient, 'applyDynamicCredentials', 'api client dynamic credentials');
assert_not_contains($apiClient, 'applyHttpExtensions', 'api client http extensions');
assert_not_contains($apiClient, 'buildRequestMeta', 'api client request meta');

$signInterceptor = read_file_or_fail($root . '/src/Common/Interceptor/Interceptors/SignRequestInterceptor.php');
assert_contains($signInterceptor, 'Utils::signv4', 'sign interceptor direct signer call');
assert_contains($signInterceptor, 'presign(', 'sign interceptor presign support');
assert_not_contains($signInterceptor, 'V4Signer', 'sign interceptor signer wrapper');

$retryer = read_file_or_fail($root . '/src/Common/Retry/Retryer.php');
assert_contains($retryer, 'class Retryer', 'retryer class');
assert_contains($retryer, 'function shouldRetry', 'retryer should retry');
assert_contains($retryer, 'function getBackoffDelay', 'retryer backoff delay');
assert_contains($retryer, 'function getRetryDelay', 'retryer retry delay');

assert_contains($retryer, 'function isCredentialExpiryError', 'retryer credential expiry');
assert_contains($retryer, 'function extractErrorCode', 'retryer extract error code');

$defaultProvider = read_file_or_fail($root . '/src/Common/Auth/Providers/DefaultCredentialProvider.php');

$stsProvider = read_file_or_fail($root . '/src/Common/Auth/Providers/StsProvider.php');
assert_not_contains($stsProvider, 'function setRetryer', 'sts provider retryer setter');
assert_contains($stsProvider, 'function setConnectTimeout', 'sts provider connect timeout setter');
assert_contains($stsProvider, 'function setReadTimeout', 'sts provider read timeout setter');

$endpointStandard = read_file_or_fail($root . '/src/Common/Endpoint/Providers/StandardEndpointProvider.php');
assert_contains($endpointStandard, 'class StandardEndpointProvider', 'standard endpoint provider');

$endpointProvidersAutoload = read_file_or_fail($root . '/src/Common/Endpoint/Providers/autoload.php');
assert_contains($endpointProvidersAutoload, 'StandardEndpointProvider.php', 'standard endpoint provider autoload');

$apiException = read_file_or_fail($root . '/src/Common/ApiException.php');
assert_contains($apiException, 'function getStatusCode', 'api exception status helper');
assert_contains($apiException, 'function getErrorCode', 'api exception code helper');
assert_contains($apiException, 'function getErrorMessage', 'api exception message helper');
assert_contains($apiException, 'function getOriginalError', 'api exception original error helper');
assert_contains($apiException, 'function fromHttpResponse', 'api exception http response factory');
assert_not_contains($apiException, 'function code', 'api exception code alias');
assert_not_contains($apiException, 'function message', 'api exception message alias');

$commonAutoload = read_file_or_fail($root . '/src/Common/autoload.php');
assert_not_contains($commonAutoload, 'Error/autoload.php', 'common autoload typed error classes');
assert_not_contains($commonAutoload, 'SdkErrorInterface.php', 'common autoload sdk error interface');
assert_not_contains($commonAutoload, 'RuntimeOptions.php', 'common autoload runtime options');
assert_not_contains($commonAutoload, 'Universal', 'common autoload universal helpers');
assert_not_contains($commonAutoload, 'Paginator.php', 'common autoload paginator');
assert_not_contains($commonAutoload, 'Waiter.php', 'common autoload waiter');
assert_not_contains($commonAutoload, 'Session.php', 'common autoload session helper');
assert_not_contains($commonAutoload, 'Sign/autoload.php', 'common autoload sign wrappers');
assert_not_contains($commonAutoload, 'LoggerInterface.php', 'common autoload logger interface');
assert_not_contains($commonAutoload, 'SdkLogger.php', 'common autoload sdk logger');
assert_not_contains($commonAutoload, 'LogHelper.php', 'common autoload log helper');
assert_not_contains($commonAutoload, 'PsrLoggerAdapter.php', 'common autoload psr logger adapter');

$retryAutoload = read_file_or_fail($root . '/src/Common/Retry/autoload.php');
assert_not_contains($retryAutoload, 'BackoffStrategy.php', 'retry autoload backoff strategy');
assert_not_contains($retryAutoload, 'RetryCondition.php', 'retry autoload retry condition');
assert_not_contains($retryAutoload, 'DefaultRetryCondition.php', 'retry autoload retry condition implementation');
assert_not_contains($retryAutoload, 'NoOpRetryer.php', 'retry autoload no-op retryer');

$version = read_file_or_fail($root . '/src/Common/Version.php');
assert_contains($version, 'SDK_VERSION', 'version constant');

echo "Docs feature documentation check passed.\n";
