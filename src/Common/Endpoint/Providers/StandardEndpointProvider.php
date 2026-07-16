<?php

namespace Volcengine\Common\Endpoint\Providers;

use Volcengine\Common\Endpoint\EndpointProvider;
use Volcengine\Common\Endpoint\ResolvedEndpoint;

class StandardEndpointProvider extends EndpointProvider
{
    const DEFAULT_FORMAT = '{Service}{Region}.{SiteStack}.com';
    const SITE_STACK_VOLC_IPV4 = 'volcengineapi';
    const SITE_STACK_VOLC_DUAL_STACK = 'volcengine-api';

    private static $serviceInfos = [
        'vpc' => false,
        'ecs' => false,
        'billing' => true,
        'ark' => false,
        'iam' => true,
        'mcs' => false,
        'rocketmq' => false,
        'bytehouse' => false,
        'dns' => true,
        'autoscaling' => false,
        'spark' => false,
        'cloud_detect' => false,
        'filenas' => false,
        'escloud' => false,
        'flink' => false,
        'cp' => false,
        'vefaas' => false,
        'ml_platform' => false,
        'edx' => true,
        'dcdn' => true,
        'cdn' => true,
        'kafka' => false,
        'certificate_service' => true,
        'waf' => true,
        'rds_mssql' => false,
        'cloudtrail' => false,
        'vei_api' => true,
        'cen' => true,
        'rabbitmq' => false,
        'vmp' => false,
        'volc_observe' => false,
        'dataleap' => false,
        'fw_center' => true,
        'redis' => false,
        'mcdn' => true,
        'cloudidentity' => false,
        'vedbm' => false,
        'cv' => true,
        'translate' => true,
        'cloud_trail' => false,
        'bio' => false,
        'nta' => true,
        'elasticmapreduce' => false,
        'vepfs' => false,
        'seccenter' => true,
        'advdefence' => true,
        'tis' => true,
        'organization' => true,
        'vke' => false,
        'Redis' => false,
        'privatelink' => false,
        'RocketMQ' => false,
        'Kafka' => false,
        'rds_mysql' => false,
        'rds_postgresql' => false,
        'storage_ebs' => false,
        'clb' => false,
        'alb' => false,
        'FileNAS' => false,
        'configcenter' => false,
        'cr' => false,
        'sts' => false,
        'mongodb' => false,
        'transitrouter' => false,
        'Volc_Observe' => false,
        'dms' => false,
        'auto_scaling' => false,
        'directconnect' => false,
        'kms' => false,
        'dbw' => false,
        'dts' => false,
        'natgateway' => false,
        'tos' => false,
        'TLS' => false,
        'vpn' => false,
        'vod' => false,
        'quota' => true,
        'ecs_ops' => true,
        'as_ops' => true,
        'account_management' => true,
        'account_management_byteplus' => true,
        'bandwidthquota' => true,
        'psa_manager' => true,
        'dc_controller' => false,
        'eps_platform_trade' => false,
        'eps_platform_fund' => false,
        'commercialization' => true,
        'veecp_openapi' => false,
        'orgnization' => true,
        'coze' => true,
        'sec_agent' => true,
        'sec_intelligent_dev' => true,
        'vegame' => false,
        'acep' => true,
        'private_zone' => true,
        'sqs' => false,
        'resourcecenter' => true,
        'aiotvideo' => true,
        'apig' => false,
        'bmq' => false,
        'bytehouse_ce' => false,
        'cloudmonitor' => false,
        'emr' => false,
        'ga' => true,
        'graph' => false,
        'gtm' => true,
        'hbase' => false,
        'metakms' => false,
        'na' => true,
        'resource_share' => true,
        'speech_saas_prod' => true,
        'tag' => true,
        'vefaas_dev' => false,
        'vms' => false,
        'eco_partner' => true,
        'smc' => true,
        'livesaas' => true,
        'insight' => true,
        'aidap' => false,
        'cbr' => false,
        'veenedge' => true,
        'arkclaw' => false,
        'i18n_openapi' => true,
        'config' => true,
        'milvus' => false,
    ];

    private static $whiteRegions = [
        'ap-singapore-1' => true,
        'ap-southeast-1' => true,
        'ap-southeast-2' => true,
        'ap-southeast-3' => true,
        'byteplus-global' => true,
        'cn-beijing' => true,
        'cn-beijing-autodriving' => true,
        'cn-beijing-selfdrive' => true,
        'cn-beijing2' => true,
        'cn-beijing300' => true,
        'cn-changsha-sdv' => true,
        'cn-chengdu' => true,
        'cn-chengdu-sdv' => true,
        'cn-chongqing-sdv' => true,
        'cn-datong' => true,
        'cn-east-1-dedicated' => true,
        'cn-gaofang-bj' => true,
        'cn-gaofang-gz1' => true,
        'cn-gaofang-nt1' => true,
        'cn-gaofang-nt2' => true,
        'cn-gaofang-nt3' => true,
        'cn-gaofang-nt4' => true,
        'cn-gaofang-nt5' => true,
        'cn-guangzhou' => true,
        'cn-guilin-boe' => true,
        'cn-hangzhou' => true,
        'cn-hjxj' => true,
        'cn-hjzg' => true,
        'cn-hlbx' => true,
        'cn-hlxj' => true,
        'cn-hlzg' => true,
        'cn-hongkong' => true,
        'cn-hongkong-pop' => true,
        'cn-lfbx' => true,
        'cn-lfxj' => true,
        'cn-lfzg' => true,
        'cn-macau-pop-sdv' => true,
        'cn-mainland' => true,
        'cn-nanjing-bbit' => true,
        'cn-ningbo-sdv' => true,
        'cn-north-1' => true,
        'cn-north-1-dedicated' => true,
        'cn-north-boe' => true,
        'cn-shanghai' => true,
        'cn-shanghai-autodriving' => true,
        'cn-taiwan-boe' => true,
        'cn-wuhan' => true,
        'cn-wulanchabu' => true,
        'cn-xian-boe-sdv' => true,
        'overseas-1' => true,
        'rec-cn' => true,
        'rec-sg' => true,
    ];

    private $format;
    private $siteStack;
    private $extension;
    private $customServices;

    public function __construct($format = null, $siteStack = null, $extension = [], $customServices = [])
    {
        $this->format = $format ?: self::DEFAULT_FORMAT;
        $this->siteStack = $siteStack ?: self::SITE_STACK_VOLC_IPV4;
        $this->extension = is_array($extension) ? $extension : [];
        $this->customServices = is_array($customServices) ? $customServices : [];
    }

    public function endpointFor($service, $region, $customBootstrapRegion = null, $useDualStack = null)
    {
        $this->checkNonEmpty('service', $service);
        $this->checkNonEmpty('region', $region);

        if (!self::isValidRegion($region)) {
            throw new \InvalidArgumentException(
                'InvalidRegion: invalid region ' . $region . ' for standard endpoint resolver, please upgrade the sdk endpoint resolver to the latest version'
            );
        }

        $isGlobal = $this->resolveServiceIsGlobal($service);
        $siteStack = self::hasEnabledDualstack($useDualStack) ? self::SITE_STACK_VOLC_DUAL_STACK : $this->siteStack;
        $variables = array_merge($this->extension, [
            'Service' => self::standardizeDomainServiceCode($service),
            'Region' => $isGlobal ? '' : '.' . $region,
            'SiteStack' => $siteStack ?: self::SITE_STACK_VOLC_IPV4,
        ]);

        return new ResolvedEndpoint($this->render($this->format, $variables));
    }

    private static function hasEnabledDualstack($useDualStack)
    {
        if ($useDualStack === null) {
            return getenv("VOLC_ENABLE_DUALSTACK") == 'true';
        }
        return $useDualStack;
    }

    private static function standardizeDomainServiceCode($serviceCode)
    {
        return strtolower(str_replace('_', '-', $serviceCode));
    }

    private static function isValidRegion($region)
    {
        if (!is_string($region) || trim($region) === '') {
            return false;
        }
        if (isset(self::$whiteRegions[$region])) {
            return true;
        }
        return preg_match('/^(?:[a-z]{2}-[a-z]+(?:-[a-z]+)?|(?:cn|ap|eu|na|sa|me|af)-[a-z]+-\d+(?:-(?:finance|exclusive|local|inner))?)$/', $region) === 1;
    }

    private function resolveServiceIsGlobal($service)
    {
        if (array_key_exists($service, self::$serviceInfos)) {
            return self::$serviceInfos[$service];
        }
        if (array_key_exists($service, $this->customServices)) {
            return $this->normalizeCustomService($this->customServices[$service]);
        }

        throw new \InvalidArgumentException(
            'ServiceNotFound: service ' . $service . ' not found in ServiceInfos or CustomServices, please upgrade the sdk endpoint resolver to the latest version'
        );
    }

    private function normalizeCustomService($serviceInfo)
    {
        if (is_bool($serviceInfo)) {
            return $serviceInfo;
        }
        if (is_array($serviceInfo) && isset($serviceInfo['isGlobal'])) {
            return (bool) $serviceInfo['isGlobal'];
        }
        if (is_array($serviceInfo) && isset($serviceInfo['IsGlobal'])) {
            return (bool) $serviceInfo['IsGlobal'];
        }
        if (is_object($serviceInfo) && isset($serviceInfo->isGlobal)) {
            return (bool) $serviceInfo->isGlobal;
        }
        if (is_object($serviceInfo) && isset($serviceInfo->IsGlobal)) {
            return (bool) $serviceInfo->IsGlobal;
        }
        throw new \InvalidArgumentException('custom service must define isGlobal');
    }

    private function checkNonEmpty($name, $value)
    {
        if (!is_string($value) || trim($value) === '') {
            throw new \InvalidArgumentException($name . ' must not be empty');
        }
    }

    private function render($format, array $variables)
    {
        $result = $format ?: self::DEFAULT_FORMAT;
        foreach ($variables as $key => $value) {
            $result = str_replace('{' . $key . '}', $value, $result);
            $result = str_replace('${' . $key . '}', $value, $result);
            $result = str_replace('{{.' . $key . '}}', $value, $result);
        }
        return $result;
    }
}
