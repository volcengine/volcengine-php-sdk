<?php

namespace Volcengine\Common;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlMultiHandler;
use GuzzleHttp\HandlerStack;
use Volcengine\Common\Endpoint\Providers\DefaultEndpointProvider;
use Volcengine\Common\Retry\Retryer;
use Volcengine\Common\Sign\Signer;
use Volcengine\Common\Sign\V4Signer;

class Configuration
{
    private static $defaultConfiguration;

    protected $region = 'cn-beijing';
    protected $schema = 'https';
    protected $endpointProvider;
    protected $customBootstrapRegion = [];
    protected $useDualStack = false;
    protected $autoRetry = false;
    protected $credentialProvider;
    protected $runtimeOptions;

    protected $sessionToken = '';
    protected $ak = '';
    protected $sk = '';
    protected $host = '';

    protected $verifySsl = true;
    protected $sslCaCert;
    protected $certFile;
    protected $keyFile;
    protected $assertHostname;

    protected $connectTimeout = 30;
    protected $readTimeout = 30;

    protected $proxy;
    protected $httpProxy;
    protected $httpsProxy;

    protected $userAgent;
    protected $debug = false;
    protected $debugFile = 'php://stderr';
    protected $tempFolderPath;
    protected $logger;
    protected $logLevel = 0;
    protected $retryer;
    protected $signer;
    protected $enableRequestGzip = false;
    protected $gzipMinLength = 1024;
    protected $progressListener;
    protected $requestInterceptors = [];
    protected $responseInterceptors = [];
    protected $numPools = 4;
    protected $connectionPoolMaxsize = 20;
    protected $dynamicCredentials;
    protected $dynamicCredentialsWithMeta;
    protected $dynamicCredentialsIncludeError;
    protected $extendHttpRequest;
    protected $extendHttpRequestWithMeta;
    protected $extraHttpParameters;
    protected $extraHttpParametersWithMeta;
    protected $extraHttpJsonBody;
    protected $extraHttpJsonBodyWithMeta;
    protected $customUnmarshalError;
    protected $customUnmarshalData;
    protected $extendContextWithMeta;
    protected $logSensitives = [];
    protected $logAccount;
    protected $forceJsonNumberDecode = false;
    protected $simpleError = false;

    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
        $this->endpointProvider = new DefaultEndpointProvider();
        $this->retryer = new Retryer();
        $this->userAgent = Version::userAgent();
        $this->logger = new SdkLogger($this->debug, $this->logLevel);
        $this->signer = new V4Signer();
    }

    /**
     * Sets the host
     *
     * @param string $host Host
     *
     * @return $this
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Gets the host
     *
     * @return string Host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $ak
     */
    public function setAk($ak)
    {
        $this->ak = $ak;
        return $this;
    }

    /**
     * @return string
     */
    public function getAk()
    {
        return $this->ak;
    }

    /**
     * @param string $sk
     */
    public function setSk($sk)
    {
        $this->sk = $sk;
        return $this;
    }

    /**
     * @return string
     */
    public function getSk()
    {
        return $this->sk;
    }

    public function setSessionToken($sessionToken)
    {
        $this->sessionToken = $sessionToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionToken()
    {
        return $this->sessionToken;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $schema
     */
    public function setSchema($schema)
    {
        $this->schema = $schema;
        return $this;
    }

    /**
     * @return string
     */
    public function getSchema()
    {
        return $this->schema;
    }

    public function setEndpointProvider($endpointProvider)
    {
        $this->endpointProvider = $endpointProvider;
        return $this;
    }

    public function getEndpointProvider()
    {
        return $this->endpointProvider;
    }

    public function getCustomBootstrapRegion()
    {
        return $this->customBootstrapRegion;
    }

    public function setCustomBootstrapRegion($customBootstrapRegion)
    {
        $this->customBootstrapRegion = is_array($customBootstrapRegion) ? $customBootstrapRegion : [];
        return $this;
    }

    public function getUseDualStack()
    {
        return $this->useDualStack;
    }

    public function setUseDualStack($useDualStack)
    {
        $this->useDualStack = (bool) $useDualStack;
        return $this;
    }

    public function getAutoRetry()
    {
        return $this->autoRetry;
    }

    public function setAutoRetry($autoRetry)
    {
        $this->autoRetry = (bool) $autoRetry;
        return $this;
    }

    public function getCredentialProvider()
    {
        return $this->credentialProvider;
    }

    public function setCredentialProvider($credentialProvider)
    {
        $this->credentialProvider = $credentialProvider;
        return $this;
    }

    public function getRuntimeOptions()
    {
        return $this->runtimeOptions;
    }

    public function setRuntimeOptions($runtimeOptions)
    {
        $this->runtimeOptions = $runtimeOptions;
        return $this;
    }

    public function setVerifySsl($verifySsl)
    {
        $this->verifySsl = (bool) $verifySsl;
        return $this;
    }

    public function getVerifySsl()
    {
        return $this->verifySsl;
    }

    public function setSslCaCert($sslCaCert)
    {
        $this->sslCaCert = $sslCaCert;
        return $this;
    }

    public function getSslCaCert()
    {
        return $this->sslCaCert;
    }

    public function setCertFile($certFile)
    {
        $this->certFile = $certFile;
        return $this;
    }

    public function getCertFile()
    {
        return $this->certFile;
    }

    public function setKeyFile($keyFile)
    {
        $this->keyFile = $keyFile;
        return $this;
    }

    public function getKeyFile()
    {
        return $this->keyFile;
    }

    public function setAssertHostname($assertHostname)
    {
        $this->assertHostname = $assertHostname;
        return $this;
    }

    public function getAssertHostname()
    {
        return $this->assertHostname;
    }

    public function setReadTimeout($time)
    {
        $this->readTimeout = $time;
        return $this;
    }

    public function getReadTimeout()
    {
        return $this->readTimeout;
    }

    public function setConnectTimeout($time)
    {
        $this->connectTimeout = $time;
        return $this;
    }

    public function getConnectTimeout()
    {
        return $this->connectTimeout;
    }

    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
        return $this;
    }

    public function getProxy()
    {
        return $this->proxy;
    }

    public function setHttpProxy($httpProxy)
    {
        $this->httpProxy = $httpProxy;
        return $this;
    }

    public function getHttpProxy()
    {
        return $this->httpProxy;
    }

    public function setHttpsProxy($httpsProxy)
    {
        $this->httpsProxy = $httpsProxy;
        return $this;
    }

    public function getHttpsProxy()
    {
        return $this->httpsProxy;
    }

    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function setDebug($debug)
    {
        $this->debug = (bool) $debug;
        if ($this->logger !== null && method_exists($this->logger, 'setDebug')) {
            $this->logger->setDebug($this->debug);
        }
        return $this;
    }

    public function getDebug()
    {
        return $this->debug;
    }

    public function setDebugFile($debugFile)
    {
        $this->debugFile = $debugFile;
        if ($this->logger instanceof SdkLogger) {
            $stream = fopen($this->debugFile, 'a');
            if ($stream !== false) {
                $this->logger->setStream($stream);
            }
        }
        return $this;
    }

    public function getDebugFile()
    {
        return $this->debugFile;
    }

    public function setTempFolderPath($tempFolderPath)
    {
        $this->tempFolderPath = $tempFolderPath;
        return $this;
    }

    public function getTempFolderPath()
    {
        return $this->tempFolderPath;
    }

    public function setLogger($logger)
    {
        if ($logger !== null && !$logger instanceof LoggerInterface) {
            if (PsrLoggerAdapter::supports($logger)) {
                $logger = new PsrLoggerAdapter($logger, $this->debug, $this->logLevel);
            } else {
                throw new \InvalidArgumentException('Logger must implement Volcengine\\Common\\LoggerInterface or expose a PSR-3 compatible API');
            }
        }

        $this->logger = $logger;
        if ($this->logger !== null && method_exists($this->logger, 'setDebug')) {
            $this->logger->setDebug($this->debug);
        }
        if ($this->logger !== null && method_exists($this->logger, 'setLogLevel')) {
            $this->logger->setLogLevel($this->logLevel);
        }
        return $this;
    }

    public function getLogger()
    {
        return $this->logger;
    }

    public function setLogLevel($logLevel)
    {
        $this->logLevel = $logLevel;
        if ($this->logger !== null && method_exists($this->logger, 'setLogLevel')) {
            $this->logger->setLogLevel($logLevel);
        }
        return $this;
    }

    public function getLogLevel()
    {
        return $this->logLevel;
    }

    public function setEnableRequestGzip($enableRequestGzip)
    {
        $this->enableRequestGzip = (bool) $enableRequestGzip;
        return $this;
    }

    public function getEnableRequestGzip()
    {
        return $this->enableRequestGzip;
    }

    public function setGzipMinLength($gzipMinLength)
    {
        $this->gzipMinLength = $gzipMinLength;
        return $this;
    }

    public function getGzipMinLength()
    {
        return $this->gzipMinLength;
    }

    public function setProgressListener($progressListener)
    {
        $this->progressListener = $progressListener;
        return $this;
    }

    public function getProgressListener()
    {
        return $this->progressListener;
    }

    public function setNumPools($numPools)
    {
        $this->numPools = (int) $numPools;
        return $this;
    }

    public function getNumPools()
    {
        return $this->numPools;
    }

    public function setConnectionPoolMaxsize($connectionPoolMaxsize)
    {
        $this->connectionPoolMaxsize = (int) $connectionPoolMaxsize;
        return $this;
    }

    public function getConnectionPoolMaxsize()
    {
        return $this->connectionPoolMaxsize;
    }

    public function createHttpClient()
    {
        return new Client($this->toHttpClientConfig());
    }

    public function toHttpClientConfig()
    {
        $config = [
            'timeout' => $this->getReadTimeout(),
            'connect_timeout' => $this->getConnectTimeout(),
            'verify' => $this->getSslCaCert() ?: $this->getVerifySsl(),
            'http_errors' => false,
        ];

        if ($this->getAssertHostname() === false && defined('CURLOPT_SSL_VERIFYHOST')) {
            $config['curl'][CURLOPT_SSL_VERIFYHOST] = 0;
        }

        $maxConnects = max(1, (int) $this->getConnectionPoolMaxsize());
        if (defined('CURLOPT_MAXCONNECTS')) {
            $config['curl'][CURLOPT_MAXCONNECTS] = $maxConnects;
        }

        if (class_exists('GuzzleHttp\\Handler\\CurlMultiHandler') && class_exists('GuzzleHttp\\HandlerStack')) {
            $maxHandles = max(1, (int) $this->getNumPools()) * $maxConnects;
            $config['handler'] = HandlerStack::create(new CurlMultiHandler([
                'max_handles' => $maxHandles,
            ]));
        }

        if ($this->getCertFile() !== null) {
            $config['cert'] = $this->getCertFile();
        }
        if ($this->getKeyFile() !== null) {
            $config['ssl_key'] = $this->getKeyFile();
        }
        if ($this->getProxy() !== null) {
            $config['proxy'] = $this->getProxy();
        } elseif ($this->getHttpProxy() !== null || $this->getHttpsProxy() !== null) {
            $proxy = [];
            if ($this->getHttpProxy() !== null) {
                $proxy['http'] = $this->getHttpProxy();
            }
            if ($this->getHttpsProxy() !== null) {
                $proxy['https'] = $this->getHttpsProxy();
            }
            $config['proxy'] = $proxy;
        }
        if ($this->getProgressListener() !== null) {
            $config['progress'] = $this->getProgressListener();
        }

        return $config;
    }

    public function setDynamicCredentials($dynamicCredentials)
    {
        $this->dynamicCredentials = $dynamicCredentials;
        return $this;
    }

    public function getDynamicCredentials()
    {
        return $this->dynamicCredentials;
    }

    public function setDynamicCredentialsWithMeta($dynamicCredentialsWithMeta)
    {
        $this->dynamicCredentialsWithMeta = $dynamicCredentialsWithMeta;
        return $this;
    }

    public function getDynamicCredentialsWithMeta()
    {
        return $this->dynamicCredentialsWithMeta;
    }

    public function setDynamicCredentialsIncludeError($dynamicCredentialsIncludeError)
    {
        $this->dynamicCredentialsIncludeError = $dynamicCredentialsIncludeError;
        return $this;
    }

    public function getDynamicCredentialsIncludeError()
    {
        return $this->dynamicCredentialsIncludeError;
    }

    public function setExtendHttpRequest($extendHttpRequest)
    {
        $this->extendHttpRequest = $extendHttpRequest;
        return $this;
    }

    public function getExtendHttpRequest()
    {
        return $this->extendHttpRequest;
    }

    public function setExtendHttpRequestWithMeta($extendHttpRequestWithMeta)
    {
        $this->extendHttpRequestWithMeta = $extendHttpRequestWithMeta;
        return $this;
    }

    public function getExtendHttpRequestWithMeta()
    {
        return $this->extendHttpRequestWithMeta;
    }

    public function setExtraHttpParameters($extraHttpParameters)
    {
        $this->extraHttpParameters = $extraHttpParameters;
        return $this;
    }

    public function getExtraHttpParameters()
    {
        return $this->extraHttpParameters;
    }

    public function setExtraHttpParametersWithMeta($extraHttpParametersWithMeta)
    {
        $this->extraHttpParametersWithMeta = $extraHttpParametersWithMeta;
        return $this;
    }

    public function getExtraHttpParametersWithMeta()
    {
        return $this->extraHttpParametersWithMeta;
    }

    public function setExtraHttpJsonBody($extraHttpJsonBody)
    {
        $this->extraHttpJsonBody = $extraHttpJsonBody;
        return $this;
    }

    public function getExtraHttpJsonBody()
    {
        return $this->extraHttpJsonBody;
    }

    public function setExtraHttpJsonBodyWithMeta($extraHttpJsonBodyWithMeta)
    {
        $this->extraHttpJsonBodyWithMeta = $extraHttpJsonBodyWithMeta;
        return $this;
    }

    public function getExtraHttpJsonBodyWithMeta()
    {
        return $this->extraHttpJsonBodyWithMeta;
    }

    public function setCustomUnmarshalError($customUnmarshalError)
    {
        $this->customUnmarshalError = $customUnmarshalError;
        return $this;
    }

    public function getCustomUnmarshalError()
    {
        return $this->customUnmarshalError;
    }

    public function setCustomUnmarshalData($customUnmarshalData)
    {
        $this->customUnmarshalData = $customUnmarshalData;
        return $this;
    }

    public function getCustomUnmarshalData()
    {
        return $this->customUnmarshalData;
    }

    public function setExtendContextWithMeta($extendContextWithMeta)
    {
        $this->extendContextWithMeta = $extendContextWithMeta;
        return $this;
    }

    public function getExtendContextWithMeta()
    {
        return $this->extendContextWithMeta;
    }

    public function setLogSensitives(array $logSensitives)
    {
        $this->logSensitives = $logSensitives;
        return $this;
    }

    public function getLogSensitives()
    {
        return $this->logSensitives;
    }

    public function setLogAccount($logAccount)
    {
        $this->logAccount = $logAccount;
        return $this;
    }

    public function getLogAccount()
    {
        return $this->logAccount;
    }

    public function setForceJsonNumberDecode($forceJsonNumberDecode)
    {
        $this->forceJsonNumberDecode = (bool) $forceJsonNumberDecode;
        return $this;
    }

    public function getForceJsonNumberDecode()
    {
        return $this->forceJsonNumberDecode;
    }

    public function setSimpleError($simpleError)
    {
        $this->simpleError = (bool) $simpleError;
        return $this;
    }

    public function getSimpleError()
    {
        return $this->simpleError;
    }

    public function addRequestInterceptor($interceptor)
    {
        $this->requestInterceptors[] = $interceptor;
        return $this;
    }

    public function getRequestInterceptors()
    {
        return $this->requestInterceptors;
    }

    public function addResponseInterceptor($interceptor)
    {
        $this->responseInterceptors[] = $interceptor;
        return $this;
    }

    public function getResponseInterceptors()
    {
        return $this->responseInterceptors;
    }

    public function setRetryer(Retryer $retryer)
    {
        $this->retryer = $retryer;
        return $this;
    }

    public function getRetryer()
    {
        return $this->retryer;
    }

    public function setSigner($signer)
    {
        if (!$signer instanceof Signer) {
            throw new \InvalidArgumentException('Signer must implement Volcengine\\Common\\Sign\\Signer');
        }
        $this->signer = $signer;
        return $this;
    }

    public function getSigner()
    {
        return $this->signer;
    }

    public function setNumMaxRetries($numMaxRetries)
    {
        $this->retryer->setNumMaxRetries($numMaxRetries);
        return $this;
    }

    public function getNumMaxRetries()
    {
        return $this->retryer->getNumMaxRetries();
    }

    public function setBackoffStrategy($backoffStrategy)
    {
        $this->retryer->setBackoffStrategy($backoffStrategy);
        return $this;
    }

    public function getBackoffStrategy()
    {
        return $this->retryer->getBackoffStrategy();
    }

    public function setRetryCondition($retryCondition)
    {
        $this->retryer->setRetryCondition($retryCondition);
        return $this;
    }

    public function getRetryCondition()
    {
        return $this->retryer->getRetryCondition();
    }

    public function setRetryErrorCodes($retryErrorCodes)
    {
        $condition = $this->retryer->getRetryCondition();
        if ($condition !== null) {
            $condition->setRetryErrorCodes($retryErrorCodes);
        }
        return $this;
    }

    public function getRetryErrorCodes()
    {
        $condition = $this->retryer->getRetryCondition();
        return $condition !== null ? $condition->getRetryErrorCodes() : [];
    }

    public function setMinRetryDelayMs($minRetryDelayMs)
    {
        $backoff = $this->retryer->getBackoffStrategy();
        if ($backoff !== null) {
            $backoff->setMinRetryDelayMs($minRetryDelayMs);
        }
        return $this;
    }

    public function getMinRetryDelayMs()
    {
        $backoff = $this->retryer->getBackoffStrategy();
        return $backoff !== null ? $backoff->getMinRetryDelayMs() : null;
    }

    public function setMaxRetryDelayMs($maxRetryDelayMs)
    {
        $backoff = $this->retryer->getBackoffStrategy();
        if ($backoff !== null) {
            $backoff->setMaxRetryDelayMs($maxRetryDelayMs);
        }
        return $this;
    }

    public function getMaxRetryDelayMs()
    {
        $backoff = $this->retryer->getBackoffStrategy();
        return $backoff !== null ? $backoff->getMaxRetryDelayMs() : null;
    }

    /**
     * Gets the default configuration instance
     *
     * @return Configuration
     */
    public static function getDefaultConfiguration()
    {
        self::$defaultConfiguration = new Configuration();

        return self::$defaultConfiguration;
    }

    /**
     * Sets the detault configuration instance
     *
     * @param Configuration $config An instance of the Configuration Object
     *
     * @return void
     */
    public static function setDefaultConfiguration(Configuration $config)
    {
        self::$defaultConfiguration = $config;
    }

    /**
     * Gets the essential information for debugging
     *
     * @return string The report for debugging
     */
    public static function toDebugReport()
    {
        $report = 'PHP SDK (Volcengine\Common) Debug Report:' . PHP_EOL;
        $report .= '    OS: ' . php_uname() . PHP_EOL;
        $report .= '    PHP Version: ' . PHP_VERSION . PHP_EOL;
        $report .= '    OpenAPI Spec Version: ' . Version::SDK_VERSION . PHP_EOL;
        $report .= '    Temp Folder Path: ' . self::getDefaultConfiguration()->getTempFolderPath() . PHP_EOL;

        return $report;
    }
}
