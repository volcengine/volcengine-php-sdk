<?php

namespace Volcengine\Common\Endpoint\Providers;

use Volcengine\Common\Endpoint\EndpointProvider;
use Volcengine\Common\Endpoint\ResolvedEndpoint;

class StandardEndpointProvider extends EndpointProvider
{
    private static $serviceInfos = [
        'vpc' => ['is_global' => false],
        'ecs' => ['is_global' => false],
        'billing' => ['is_global' => true],
        'ark' => ['is_global' => false],
        'iam' => ['is_global' => true],
        'mcs' => ['is_global' => false],
        'rocketmq' => ['is_global' => false],
        'dns' => ['is_global' => true],
        'autoscaling' => ['is_global' => false],
        'spark' => ['is_global' => false],
        'cloud_detect' => ['is_global' => false],
        'filenas' => ['is_global' => false],
        'escloud' => ['is_global' => false],
        'flink' => ['is_global' => false],
        'vefaas' => ['is_global' => false],
        'ml_platform' => ['is_global' => false],
        'edx' => ['is_global' => true],
        'cdn' => ['is_global' => true],
        'certificate_service' => ['is_global' => true],
        'waf' => ['is_global' => true],
        'rds_mssql' => ['is_global' => false],
        'cloudtrail' => ['is_global' => false],
        'vei_api' => ['is_global' => true],
        'cen' => ['is_global' => true],
        'rabbitmq' => ['is_global' => false],
        'vmp' => ['is_global' => false],
        'volc_observe' => ['is_global' => false],
        'dataleap' => ['is_global' => false],
        'fw_center' => ['is_global' => true],
        'redis' => ['is_global' => false],
        'mcdn' => ['is_global' => true],
        'cloudidentity' => ['is_global' => false],
        'vedbm' => ['is_global' => false],
        'cv' => ['is_global' => true],
        'translate' => ['is_global' => true],
        'cloud_trail' => ['is_global' => false],
        'bio' => ['is_global' => false],
        'nta' => ['is_global' => true],
        'vepfs' => ['is_global' => false],
        'seccenter' => ['is_global' => true],
        'advdefence' => ['is_global' => true],
        'tis' => ['is_global' => true],
        'organization' => ['is_global' => true],
        'vke' => ['is_global' => false],
        'privatelink' => ['is_global' => false],
        'rds_mysql' => ['is_global' => false],
        'rds_postgresql' => ['is_global' => false],
        'storage_ebs' => ['is_global' => false],
        'clb' => ['is_global' => false],
        'alb' => ['is_global' => false],
        'cr' => ['is_global' => false],
        'sts' => ['is_global' => false],
        'mongodb' => ['is_global' => false],
        'transitrouter' => ['is_global' => false],
        'dms' => ['is_global' => false],
        'auto_scaling' => ['is_global' => false],
        'directconnect' => ['is_global' => false],
        'kms' => ['is_global' => false],
        'dbw' => ['is_global' => false],
        'dts' => ['is_global' => false],
        'natgateway' => ['is_global' => false],
        'vpn' => ['is_global' => false],
        'vod' => ['is_global' => false],
        'quota' => ['is_global' => true],
        'commercialization' => ['is_global' => true],
        'coze' => ['is_global' => true],
        'acep' => ['is_global' => true],
        'private_zone' => ['is_global' => true],
        'sqs' => ['is_global' => false],
        'resourcecenter' => ['is_global' => true],
        'apig' => ['is_global' => false],
        'bmq' => ['is_global' => false],
        'cloudmonitor' => ['is_global' => false],
        'emr' => ['is_global' => false],
        'ga' => ['is_global' => true],
        'graph' => ['is_global' => false],
        'gtm' => ['is_global' => true],
        'hbase' => ['is_global' => false],
        'metakms' => ['is_global' => false],
        'na' => ['is_global' => true],
        'tag' => ['is_global' => true],
        'vefaas_dev' => ['is_global' => false],
        'vms' => ['is_global' => false],
        'smc' => ['is_global' => true],
        'livesaas' => ['is_global' => true],
        'insight' => ['is_global' => true],
        'aidap' => ['is_global' => false],
        'cbr' => ['is_global' => false],
        'arkclaw' => ['is_global' => false],
        'i18n_openapi' => ['is_global' => true],
        'config' => ['is_global' => true],
        'milvus' => ['is_global' => false],
    ];

    private static $allowedRegions = [
        'ap-singapore-1',
        'ap-southeast-1',
        'ap-southeast-2',
        'ap-southeast-3',
        'byteplus-global',
        'cn-beijing',
        'cn-beijing-autodriving',
        'cn-beijing-selfdrive',
        'cn-beijing2',
        'cn-beijing300',
        'cn-changsha-sdv',
        'cn-chengdu',
        'cn-chengdu-sdv',
        'cn-chongqing-sdv',
        'cn-datong',
        'cn-east-1-dedicated',
        'cn-gaofang-bj',
        'cn-gaofang-gz1',
        'cn-gaofang-nt1',
        'cn-gaofang-nt2',
        'cn-gaofang-nt3',
        'cn-gaofang-nt4',
        'cn-gaofang-nt5',
        'cn-guangzhou',
        'cn-guilin-boe',
        'cn-hangzhou',
        'cn-hjxj',
        'cn-hjzg',
        'cn-hlbx',
        'cn-hlxj',
        'cn-hlzg',
        'cn-hongkong',
        'cn-hongkong-pop',
        'cn-lfbx',
        'cn-lfxj',
        'cn-lfzg',
        'cn-macau-pop-sdv',
        'cn-mainland',
        'cn-nanjing-bbit',
        'cn-ningbo-sdv',
        'cn-north-1',
        'cn-north-1-dedicated',
        'cn-north-boe',
        'cn-shanghai',
        'cn-shanghai-autodriving',
        'cn-taiwan-boe',
        'cn-wuhan',
        'cn-wulanchabu',
        'cn-xian-boe-sdv',
        'overseas-1',
        'rec-cn',
        'rec-sg',
    ];

    public function endpointFor($service, $region, $customBootstrapRegion = null, $useDualStack = null, array $options = [])
    {
        $strictMatching = !empty($options['strictMatching']);
        $resolveUnknownService = !empty($options['resolveUnknownService']);
        $site = isset($options['site']) && $options['site'] ? $options['site'] : null;
        $ipVersion = isset($options['ipVersion']) && $options['ipVersion'] ? $options['ipVersion'] : null;
        $endpointConfigState = !empty($options['endpointConfigState']);
        $endpointConfigPath = isset($options['endpointConfigPath']) ? $options['endpointConfigPath'] : null;

        if ($endpointConfigState && !empty($endpointConfigPath)) {
            $resolved = $this->resolveFromConfigFile($service, $region, $endpointConfigPath, $useDualStack, $site);
            if ($resolved !== null) {
                return new ResolvedEndpoint($resolved);
            }
        }

        if (!$this->matchesRegionPattern($region)) {
            throw new StandProviderError(
                'InvalidRegion',
                sprintf(
                    'invalid region %s for standard endpoint resolver, please upgrade the sdk endpoint resolver to the latest version',
                    $region
                )
            );
        }

        if ($strictMatching && !$this->isKnownRegion($region)) {
            throw new StandProviderError(
                'InvalidRegion',
                sprintf(
                    'region %s is not present in the built-in endpoint rules, disable strict matching or upgrade the sdk endpoint resolver',
                    $region
                )
            );
        }

        if (!isset(self::$serviceInfos[$service])) {
            if ($resolveUnknownService) {
                self::$serviceInfos[$service] = ['is_global' => false];
            }
        }

        if (!isset(self::$serviceInfos[$service])) {
            throw new StandProviderError(
                'ServiceNotFound',
                sprintf(
                    'service %s not found in ServiceInfos, please upgrade the sdk endpoint resolver to the latest version',
                    $service
                )
            );
        }

        if ($ipVersion === 'DualStack') {
            $useDualStack = true;
        } elseif ($ipVersion === 'IPv4') {
            $useDualStack = false;
        } elseif ($useDualStack === null) {
            $useDualStack = getenv('VOLC_ENABLE_DUALSTACK') === 'true';
        }

        $siteStack = $site ?: ($useDualStack ? 'volcengine-api' : 'volcengineapi');
        $serviceCode = strtolower(str_replace('_', '-', $service));
        $serviceInfo = self::$serviceInfos[$service];

        try {
            if (!empty($serviceInfo['is_global'])) {
                return new ResolvedEndpoint(sprintf('%s.%s.com', $serviceCode, $siteStack));
            }

            return new ResolvedEndpoint(sprintf('%s.%s.%s.com', $serviceCode, $region, $siteStack));
        } catch (\Exception $e) {
            throw new StandProviderError(
                'TemplateExecuteError',
                sprintf('failed to execute template for service %s region %s: %s', $service, $region, $e->getMessage())
            );
        }
    }

    private function resolveFromConfigFile($service, $region, $path, $useDualStack, $site)
    {
        if (!is_file($path)) {
            return null;
        }

        $content = file_get_contents($path);
        if ($content === false) {
            return null;
        }

        $data = json_decode($content, true);
        if (!is_array($data)) {
            return null;
        }

        $candidates = [];
        if (isset($data['services'][$service])) {
            $candidates[] = $data['services'][$service];
        }
        if (isset($data[$service])) {
            $candidates[] = $data[$service];
        }

        foreach ($candidates as $candidate) {
            if (!is_array($candidate)) {
                continue;
            }
            if (isset($candidate['regions'][$region])) {
                return $candidate['regions'][$region];
            }
            if (!empty($candidate['global'])) {
                return $candidate['global'];
            }
            if (!empty($candidate['template'])) {
                $siteStack = $site ?: ($useDualStack ? 'volcengine-api' : 'volcengineapi');
                return strtr($candidate['template'], [
                    '{service}' => strtolower(str_replace('_', '-', $service)),
                    '{region}' => $region,
                    '{site}' => $siteStack,
                ]);
            }
        }

        return null;
    }

    private function isKnownRegion($region)
    {
        return in_array($region, self::$allowedRegions, true);
    }

    private function matchesRegionPattern($region)
    {
        if ($this->isKnownRegion($region)) {
            return true;
        }

        return preg_match(
            '/^(?:[a-z]{2}-[a-z]+(?:-[a-z]+)?|(?:cn|ap|eu|na|sa|me|af)-[a-z]+-\d+(?:-(?:finance|exclusive|local|inner))?)$/',
            $region
        ) === 1;
    }
}
