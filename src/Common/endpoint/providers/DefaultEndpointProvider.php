<?php

namespace Volcengine\Common\endpoint\providers;

use Volcengine\Common\endpoint\EndpointProvider;
use Volcengine\Common\endpoint\ResolvedEndpoint;


class DefaultEndpointProvider extends EndpointProvider
{
    // 默认端点配置
    public static $defaultEndpoint;

    private $customEndpoints;

    public function __construct($customEndpoints = [])
    {
        $this->customEndpoints = $customEndpoints ?: [];
    }

    public function getDefaultEndpoint($service, $region, $suffix = ENDPOINT_SUFFIX)
    {
        if (self::$defaultEndpoint == null) {
            self::$defaultEndpoint = [
                'ecs' => new ServiceEndpointInfo(
                    'ecs',
                    false,
                    '',
                    []
                ),
                'billing' => new ServiceEndpointInfo(
                    'billing',
                    true,
                    '',
                    []
                ),
                'advdefence' => new ServiceEndpointInfo(
                    'advdefence',
                    true,
                    '',
                    []
                ),
                'alb' => new ServiceEndpointInfo(
                    'alb',
                    false,
                    '',
                    []
                ),
                'auto_scaling' => new ServiceEndpointInfo(
                    'auto_scaling',
                    false,
                    '',
                    []
                ),
                'bio' => new ServiceEndpointInfo(
                    'bio',
                    false,
                    '',
                    []
                ),
                'vedbm' => new ServiceEndpointInfo(
                    'vedbm',
                    false,
                    '',
                    []
                ),
                'pca' => new ServiceEndpointInfo(
                    'pca',
                    true,
                    '',
                    []
                ),
                'cloud_trail' => new ServiceEndpointInfo(
                    'cloud_trail',
                    false,
                    '',
                    []
                ),
                'nta' => new ServiceEndpointInfo(
                    'nta',
                    true,
                    '',
                    []
                ),
                'kms' => new ServiceEndpointInfo(
                    'kms',
                    false,
                    '',
                    []
                ),
                'tis' => new ServiceEndpointInfo(
                    'tis',
                    true,
                    '',
                    []
                ),
                'vei_api' => new ServiceEndpointInfo(
                    'vei_api',
                    true,
                    '',
                    []
                ),
                'rocketmq' => new ServiceEndpointInfo(
                    'rocketmq',
                    false,
                    '',
                    []
                ),
                'emr' => new ServiceEndpointInfo(
                    'emr',
                    false,
                    '',
                    []
                ),
                'iam' => new ServiceEndpointInfo(
                    'iam',
                    true,
                    '',
                    []
                ),
                'volc_observe' => new ServiceEndpointInfo(
                    'volc_observe',
                    false,
                    '',
                    []
                ),
                'vmp' => new ServiceEndpointInfo(
                    'vmp',
                    false,
                    '',
                    []
                ),
                'cen' => new ServiceEndpointInfo(
                    'cen',
                    true,
                    '',
                    []
                ),
                'escloud' => new ServiceEndpointInfo(
                    'escloud',
                    false,
                    '',
                    []
                ),
                'ml_platform' => new ServiceEndpointInfo(
                    'ml_platform',
                    false,
                    '',
                    []
                ),
                'vepfs' => new ServiceEndpointInfo(
                    'vepfs',
                    false,
                    '',
                    []
                ),
                'redis' => new ServiceEndpointInfo(
                    'redis',
                    false,
                    '',
                    []
                ),
                'filenas' => new ServiceEndpointInfo(
                    'filenas',
                    false,
                    '',
                    []
                ),
                'vefaas' => new ServiceEndpointInfo(
                    'vefaas',
                    false,
                    '',
                    []
                ),
                'vpn' => new ServiceEndpointInfo(
                    'vpn',
                    false,
                    '',
                    []
                ),
                'vod' => new ServiceEndpointInfo(
                    'vod',
                    false,
                    '',
                    []
                ),
                'fw_center' => new ServiceEndpointInfo(
                    'fw_center',
                    true,
                    '',
                    []
                ),
                'privatelink' => new ServiceEndpointInfo(
                    'privatelink',
                    false,
                    '',
                    []
                ),
                'rds_mssql' => new ServiceEndpointInfo(
                    'rds_mssql',
                    false,
                    '',
                    []
                ),
                'waf' => new ServiceEndpointInfo(
                    'waf',
                    true,
                    '',
                    []
                ),
                'mongodb' => new ServiceEndpointInfo(
                    'mongodb',
                    false,
                    '',
                    []
                ),
                'smc' => new ServiceEndpointInfo(
                    'smc',
                    true,
                    '',
                    []
                ),
                'rds_mysql' => new ServiceEndpointInfo(
                    'rds_mysql',
                    false,
                    '',
                    []
                ),
                'seccenter' => new ServiceEndpointInfo(
                    'seccenter',
                    true,
                    '',
                    []
                ),
                'mcdn' => new ServiceEndpointInfo(
                    'mcdn',
                    true,
                    '',
                    []
                ),
                'dataleap' => new ServiceEndpointInfo(
                    'dataleap',
                    false,
                    '',
                    []
                ),
                'edx' => new ServiceEndpointInfo(
                    'edx',
                    true,
                    '',
                    []
                ),
                'natgateway' => new ServiceEndpointInfo(
                    'natgateway',
                    false,
                    '',
                    []
                ),
                'rabbitmq' => new ServiceEndpointInfo(
                    'rabbitmq',
                    false,
                    '',
                    []
                ),
                'httpdns' => new ServiceEndpointInfo(
                    'httpdns',
                    true,
                    '',
                    []
                ),
                'translate' => new ServiceEndpointInfo(
                    'translate',
                    true,
                    '',
                    []
                ),
                'cr' => new ServiceEndpointInfo(
                    'cr',
                    false,
                    '',
                    []
                ),
                'spark' => new ServiceEndpointInfo(
                    'spark',
                    true,
                    '',
                    []
                ),
                'cdn' => new ServiceEndpointInfo(
                    'cdn',
                    true,
                    '',
                    []
                ),
                'clb' => new ServiceEndpointInfo(
                    'clb',
                    false,
                    '',
                    []
                ),
                'cv' => new ServiceEndpointInfo(
                    'cv',
                    true,
                    '',
                    []
                ),
                'tag' => new ServiceEndpointInfo(
                    'tag',
                    true,
                    '',
                    []
                ),
                'vke' => new ServiceEndpointInfo(
                    'vke',
                    false,
                    '',
                    []
                ),
                'mcs' => new ServiceEndpointInfo(
                    'mcs',
                    false,
                    '',
                    []
                ),
                'flink' => new ServiceEndpointInfo(
                    'flink',
                    false,
                    '',
                    []
                ),
                'kafka' => new ServiceEndpointInfo(
                    'kafka',
                    false,
                    '',
                    []
                ),
                'rds_postgresql' => new ServiceEndpointInfo(
                    'rds_postgresql',
                    false,
                    '',
                    []
                ),
                'sts' => new ServiceEndpointInfo(
                    'sts',
                    false,
                    '',
                    []
                ),
                'ark' => new ServiceEndpointInfo(
                    'ark',
                    false,
                    '',
                    []
                ),
                'transitrouter' => new ServiceEndpointInfo(
                    'transitrouter',
                    false,
                    '',
                    []
                ),
                'cloud_detect' => new ServiceEndpointInfo(
                    'cloud_detect',
                    true,
                    '',
                    []
                ),
                'vpc' => new ServiceEndpointInfo(
                    'vpc',
                    false,
                    '',
                    []
                ),
                'certificate_service' => new ServiceEndpointInfo(
                    'certificate_service',
                    true,
                    '',
                    []
                ),
                'dms' => new ServiceEndpointInfo(
                    'dms',
                    false,
                    '',
                    []
                ),
                'dns' => new ServiceEndpointInfo(
                    'dns',
                    true,
                    '',
                    []
                ),
                'directconnect' => new ServiceEndpointInfo(
                    'directconnect',
                    false,
                    '',
                    []
                ),
                'storage_ebs' => new ServiceEndpointInfo(
                    'storage_ebs',
                    false,
                    '',
                    []
                ),
                'quota' => new ServiceEndpointInfo(
                    'quota',
                    true,
                    '',
                    []
                ),
                'fasttrack' => new ServiceEndpointInfo(
                    'fasttrack',
                    false,
                    '',
                    []
                ),
                'acep' => new ServiceEndpointInfo(
                    'acep',
                    true,
                    '',
                    []
                ),
                'private_zone' => new ServiceEndpointInfo(
                    'private_zone',
                    true,
                    '',
                    []
                ),
                'sqs' => new ServiceEndpointInfo(
                    'sqs',
                    false,
                    '',
                    []
                ),
                'resourcecenter' => new ServiceEndpointInfo(
                    'resourcecenter',
                    true,
                    '',
                    []
                ),
                'cfs' => new ServiceEndpointInfo(
                    'cfs',
                    false,
                    '',
                    []
                ),
                'cloudidentity' => new ServiceEndpointInfo(
                    'cloudidentity',
                    false,
                    '',
                    []
                ),
            ];
        }
        $defaultEndpoint = self::$defaultEndpoint;
        if (isset($defaultEndpoint[$service])) {
            $e = $defaultEndpoint[$service];
            return $e->getEndpointFor($region, $suffix);
        }
        return FALLBACK_ENDPOINT;
    }

    private function inBootstrapRegionList($region, $customBootstrapRegion)
    {
        $regionCode = trim($region);

        $bsRegionListPath = getenv('VOLC_BOOTSTRAP_REGION_LIST_CONF');
        if ($bsRegionListPath) {
            try {
                $content = file_get_contents($bsRegionListPath);
                $lines = explode("\n", $content);
                foreach ($lines as $line) {
                    $line = trim($line);
                    if (!$line) {
                        continue;
                    }
                    if ($line == $regionCode) {
                        return true;
                    }
                }
            } catch (Exception $e) {
                trigger_error(
                    'failed to read bootstrap region list from file ' . $bsRegionListPath . ': ' . $e->getMessage(),
                    E_USER_WARNING
                );
            }
        }

        $bootstrapRegion = [
            REGION_CODE_CN_BEIJING_AUTO_DRIVING => [],
            REGION_CODE_AP_SOUTHEAST2 => [],
            REGION_CODE_AP_SOUTHEAST3 => [],
            REGION_CODE_CN_SHANGHAI_AUTO_DRIVING => [],
            REGION_CODE_CN_BEIJING_SELFDRIVE => [],
        ];
        if ($bootstrapRegion) {
            if (isset($bootstrapRegion[$regionCode])) {
                return true;
            }
        }
        if ($customBootstrapRegion) {
            return isset($customBootstrapRegion[$regionCode]);
        }

        return false;
    }

    private static function hasEnabledDualstack($useDualStack)
    {
        if ($useDualStack === null) {
            return getenv("VOLC_ENABLE_DUALSTACK") == 'true';
        }
        return $useDualStack;
    }

    public function endpointFor($service, $region, $customBootstrapRegion = null, $useDualStack = null)
    {
        if (isset($this->customEndpoints[$service])) {
            $conf = $this->customEndpoints[$service];
            $host = $conf->getEndpointFor($region);
            return new ResolvedEndpoint($host);
        }

        if ($customBootstrapRegion === null) {
            $customBootstrapRegion = [];
        }

        if (!$this->inBootstrapRegionList($region, $customBootstrapRegion)) {
            return new ResolvedEndpoint(FALLBACK_ENDPOINT);
        }
        $suffix = self::hasEnabledDualstack($useDualStack) ? DUALSTACK_ENDPOINT_SUFFIX : ENDPOINT_SUFFIX;
        $host = $this->getDefaultEndpoint($service, $region, $suffix);

        return new ResolvedEndpoint($host);
    }
}


class ServiceEndpointInfo
{
    public $service;
    public $isGlobal;
    public $globalEndpoint;
    public $regionEndpointMap;
    public $fallbackEndpoint;

    public function __construct($service, $isGlobal, $globalEndpoint, $regionEndpointMap, $fallbackEndpoint = 'open.volcengineapi.com')
    {
        $this->service = $service;
        $this->isGlobal = $isGlobal;
        $this->globalEndpoint = $globalEndpoint;
        $this->regionEndpointMap = $regionEndpointMap;
        $this->fallbackEndpoint = $fallbackEndpoint;
    }

    private function getStandardizeDomainServiceCode()
    {
        return strtolower(str_replace('_', '-', $this->service));
    }

    public function getEndpointFor($region, $suffix = '.volcengineapi.com')
    {
        if ($this->isGlobal) {
            if ($this->globalEndpoint) {
                return $this->globalEndpoint;
            }
            return $this->getStandardizeDomainServiceCode() . $suffix;
        }

        if (isset($this->regionEndpointMap[$region])) {
            return $this->regionEndpointMap[$region];
        }

        return $this->getStandardizeDomainServiceCode() . '.' . $region . $suffix;
    }
}

// 定义常量
define('OPEN_PREFIX', 'open');
define('ENDPOINT_SUFFIX', '.volcengineapi.com');
define('DUALSTACK_ENDPOINT_SUFFIX', '.volcengine-api.com');
define('FALLBACK_ENDPOINT', OPEN_PREFIX . ENDPOINT_SUFFIX);

// 区域代码常量
define('REGION_CODE_CN_BEIJING_AUTO_DRIVING', 'cn-beijing-autodriving');
define('REGION_CODE_CN_SHANGHAI_AUTO_DRIVING', 'cn-shanghai-autodriving');
define('REGION_CODE_CN_BEIJING_SELFDRIVE', 'cn-beijing-selfdrive');
define('REGION_CODE_AP_SOUTHEAST2', 'ap-southeast-2');
define('REGION_CODE_AP_SOUTHEAST3', 'ap-southeast-3');

class HostEndpointProvider extends EndpointProvider
{
    private $host;

    public function __construct($host)
    {
        $this->host = $host;
    }

    public function endpointFor($service, $region)
    {
        return new ResolvedEndpoint($this->host);
    }
}

?>
