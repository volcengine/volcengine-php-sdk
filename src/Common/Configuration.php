<?php

namespace Volcengine\Common;

use Volcengine\Common\Endpoint\Providers\DefaultEndpointProvider;
use Volcengine\Common\Retry\Retryer;

class Configuration
{
    private static $defaultConfiguration;

    protected $region = 'cn-beijing';
    protected $schema = 'https';
    protected $endpointProvider;
    protected $customBootstrapRegion = '';
    protected $useDualStack = false;
    protected $autoRetry = false;
    protected $credentialProvider;
    protected $runtimeOptions = '';

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

    protected $userAgent = 'volcstack-php-sdk/1.0.123';
    protected $sdkUserAgent;
    protected $debug = false;
    protected $debugFile = 'php://output';
    protected $tempFolderPath;
    protected $retryer;
    protected $logger;
    protected $logLevel = 0;

    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
        $this->endpointProvider = new DefaultEndpointProvider();
        $this->retryer = new Retryer();
        $this->logger = new SdkLogger();
        $this->sdkUserAgent = $this->userAgent;
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
        $this->customBootstrapRegion = $customBootstrapRegion;
        return $this;
    }

    public function getUseDualStack()
    {
        return $this->useDualStack;
    }

    public function setUseDualStack($useDualStack)
    {
        $this->useDualStack = $useDualStack;
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

    public function setVerifySsl($verifySsl)
    {
        $this->verifySsl = $verifySsl;
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
        $userAgent = trim((string) $userAgent);
        if ($userAgent === '') {
            $this->userAgent = $this->sdkUserAgent;
            return $this;
        }
        if ($userAgent === $this->sdkUserAgent || strpos($userAgent, $this->sdkUserAgent . ' ') === 0) {
            $this->userAgent = $userAgent;
            return $this;
        }
        $this->userAgent = $this->sdkUserAgent . ' ' . $userAgent;
        return $this;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function setDebug($debug)
    {
        $this->debug = $debug;
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
            $stream = fopen($debugFile, 'a');
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

    public function getRetryer()
    {
        return $this->retryer;
    }

    public function getLogger()
    {
        return $this->logger;
    }

    public function getLogLevel()
    {
        return $this->logLevel;
    }

    public function setLogLevel($logLevel)
    {
        $this->logLevel = (int) $logLevel;
        return $this;
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

    public function setRetryErrorCodes($retryErrorCodes)
    {
        $this->retryer->setRetryErrorCodes($retryErrorCodes);
        return $this;
    }

    public function getRetryErrorCodes()
    {
        return $this->retryer->getRetryErrorCodes();
    }

    public function setMinRetryDelayMs($minRetryDelayMs)
    {
        $this->retryer->setMinRetryDelayMs($minRetryDelayMs);
        return $this;
    }

    public function getMinRetryDelayMs()
    {
        return $this->retryer->getMinRetryDelayMs();
    }

    public function setMaxRetryDelayMs($maxRetryDelayMs)
    {
        $this->retryer->setMaxRetryDelayMs($maxRetryDelayMs);
        return $this;
    }

    public function getMaxRetryDelayMs()
    {
        return $this->retryer->getMaxRetryDelayMs();
    }

    /**
     * Gets the default configuration instance
     *
     * @return Configuration
     */
    public static function getDefaultConfiguration()
    {
        if (self::$defaultConfiguration === null) {
            self::$defaultConfiguration = new Configuration();
        }

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
        $report .= '    Temp Folder Path: ' . self::getDefaultConfiguration()->getTempFolderPath() . PHP_EOL;

        return $report;
    }
}
