<?php

namespace Volcengine\Common;

use Volcengine\Common\Auth\Endpoint\Providers\DefaultEndpointProvider;
use Volcengine\Common\Retryer\Retryer;

class Configuration
{
    /**
     * 重试次数 (默认3次)
     * @var int
     */
    protected $retryTimes = 0;

    private static $defaultConfiguration;

    protected $region = '';

    protected $scheme = 'https';
    protected $endpointProvider;
    protected $customBootstrapRegion = '';
    protected $useDualStack = '';
    protected $autoRetry = false;
    protected $retryer;
    protected $credentialProvider;
    protected $runtimeOptions = '';

    protected $sessionToken = '';

    protected $ak = '';

    protected $sk = '';

    protected $host = '';

    protected $verifySsl = true;

    protected $connectTimeout = 30;
    protected $readTimeout = 30;

    protected $userAgent = 'volcstack-php-sdk/1.0.72';

    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected $debug = false;

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected $debugFile = 'php://output';

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected $tempFolderPath;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tempFolderPath = sys_get_temp_dir();
        $this->endpointProvider = new DefaultEndpointProvider();
        $this->retryer = new Retryer();
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
     * @param string $scheme
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheme()
    {
        return $this->scheme;
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

    public function setRetryer($retryer)
    {
        $this->retryer = $retryer;
        return $this;
    }

    public function getRetryer()
    {
        return $this->retryer;
    }

    public function getCustomBootstrapRegion()
    {
        return $this->customBootstrapRegion;
    }

    public function getUseDualStack()
    {
        return $this->useDualStack;
    }

    public function getAutoRetry()
    {
        return $this->autoRetry;
    }

    public function getCredentialProvider()
    {
        return $this->credentialProvider;
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

    /**
     * Gets the user agent of the api client
     *
     * @return string user agent
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Sets debug flag
     *
     * @param bool $debug Debug flag
     *
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
        return $this;
    }

    /**
     * 设置重试次数
     *
     * @param int $times 重试次数
     * @return $this
     */
    public function setRetryTimes($times)
    {
        $this->retryer->numMaxRetries = $times;
        return $this;
    }

    /**
     * 获取重试次数
     *
     * @return int
     */
    public function getRetryTimes()
    {
        return $this->retryTimes;
    }

    /**
     * Gets the debug flag
     *
     * @return bool
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * Sets the debug file
     *
     * @param string $debugFile Debug file
     *
     * @return $this
     */
    public function setDebugFile($debugFile)
    {
        $this->debugFile = $debugFile;
        return $this;
    }

    /**
     * Gets the debug file
     *
     * @return string
     */
    public function getDebugFile()
    {
        return $this->debugFile;
    }

    /**
     * Sets the temp folder path
     *
     * @param string $tempFolderPath Temp folder path
     *
     * @return $this
     */
    public function setTempFolderPath($tempFolderPath)
    {
        $this->tempFolderPath = $tempFolderPath;
        return $this;
    }

    /**
     * Gets the temp folder path
     *
     * @return string Temp folder path
     */
    public function getTempFolderPath()
    {
        return $this->tempFolderPath;
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
        $report .= '    OpenAPI Spec Version: common-version' . PHP_EOL;
        $report .= '    Temp Folder Path: ' . self::getDefaultConfiguration()->getTempFolderPath() . PHP_EOL;

        return $report;
    }
}