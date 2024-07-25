<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Cdn\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class DataForListCdnDomainsOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DataForListCdnDomainsOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'backup_cname' => 'string',
        'backup_origin' => 'string[]',
        'cache_shared' => 'string',
        'cache_shared_target_host' => 'string',
        'cname' => 'string',
        'config_status' => 'string',
        'create_time' => 'int',
        'domain' => 'string',
        'domain_lock' => '\Volcengine\Cdn\Model\DomainLockForListCdnDomainsOutput',
        'feature_config' => '\Volcengine\Cdn\Model\FeatureConfigForListCdnDomainsOutput',
        'https' => 'bool',
        'ipv6' => 'bool',
        'is_conflict_domain' => 'bool',
        'origin_protocol' => 'string',
        'primary_origin' => 'string[]',
        'project' => 'string',
        'resource_tags' => '\Volcengine\Cdn\Model\ResourceTagForListCdnDomainsOutput[]',
        'service_region' => 'string',
        'service_type' => 'string',
        'status' => 'string',
        'update_time' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'backup_cname' => null,
        'backup_origin' => null,
        'cache_shared' => null,
        'cache_shared_target_host' => null,
        'cname' => null,
        'config_status' => null,
        'create_time' => 'int64',
        'domain' => null,
        'domain_lock' => null,
        'feature_config' => null,
        'https' => null,
        'ipv6' => null,
        'is_conflict_domain' => null,
        'origin_protocol' => null,
        'primary_origin' => null,
        'project' => null,
        'resource_tags' => null,
        'service_region' => null,
        'service_type' => null,
        'status' => null,
        'update_time' => 'int64'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'backup_cname' => 'BackupCname',
        'backup_origin' => 'BackupOrigin',
        'cache_shared' => 'CacheShared',
        'cache_shared_target_host' => 'CacheSharedTargetHost',
        'cname' => 'Cname',
        'config_status' => 'ConfigStatus',
        'create_time' => 'CreateTime',
        'domain' => 'Domain',
        'domain_lock' => 'DomainLock',
        'feature_config' => 'FeatureConfig',
        'https' => 'HTTPS',
        'ipv6' => 'IPv6',
        'is_conflict_domain' => 'IsConflictDomain',
        'origin_protocol' => 'OriginProtocol',
        'primary_origin' => 'PrimaryOrigin',
        'project' => 'Project',
        'resource_tags' => 'ResourceTags',
        'service_region' => 'ServiceRegion',
        'service_type' => 'ServiceType',
        'status' => 'Status',
        'update_time' => 'UpdateTime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'backup_cname' => 'setBackupCname',
        'backup_origin' => 'setBackupOrigin',
        'cache_shared' => 'setCacheShared',
        'cache_shared_target_host' => 'setCacheSharedTargetHost',
        'cname' => 'setCname',
        'config_status' => 'setConfigStatus',
        'create_time' => 'setCreateTime',
        'domain' => 'setDomain',
        'domain_lock' => 'setDomainLock',
        'feature_config' => 'setFeatureConfig',
        'https' => 'setHttps',
        'ipv6' => 'setIpv6',
        'is_conflict_domain' => 'setIsConflictDomain',
        'origin_protocol' => 'setOriginProtocol',
        'primary_origin' => 'setPrimaryOrigin',
        'project' => 'setProject',
        'resource_tags' => 'setResourceTags',
        'service_region' => 'setServiceRegion',
        'service_type' => 'setServiceType',
        'status' => 'setStatus',
        'update_time' => 'setUpdateTime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'backup_cname' => 'getBackupCname',
        'backup_origin' => 'getBackupOrigin',
        'cache_shared' => 'getCacheShared',
        'cache_shared_target_host' => 'getCacheSharedTargetHost',
        'cname' => 'getCname',
        'config_status' => 'getConfigStatus',
        'create_time' => 'getCreateTime',
        'domain' => 'getDomain',
        'domain_lock' => 'getDomainLock',
        'feature_config' => 'getFeatureConfig',
        'https' => 'getHttps',
        'ipv6' => 'getIpv6',
        'is_conflict_domain' => 'getIsConflictDomain',
        'origin_protocol' => 'getOriginProtocol',
        'primary_origin' => 'getPrimaryOrigin',
        'project' => 'getProject',
        'resource_tags' => 'getResourceTags',
        'service_region' => 'getServiceRegion',
        'service_type' => 'getServiceType',
        'status' => 'getStatus',
        'update_time' => 'getUpdateTime'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['backup_cname'] = isset($data['backup_cname']) ? $data['backup_cname'] : null;
        $this->container['backup_origin'] = isset($data['backup_origin']) ? $data['backup_origin'] : null;
        $this->container['cache_shared'] = isset($data['cache_shared']) ? $data['cache_shared'] : null;
        $this->container['cache_shared_target_host'] = isset($data['cache_shared_target_host']) ? $data['cache_shared_target_host'] : null;
        $this->container['cname'] = isset($data['cname']) ? $data['cname'] : null;
        $this->container['config_status'] = isset($data['config_status']) ? $data['config_status'] : null;
        $this->container['create_time'] = isset($data['create_time']) ? $data['create_time'] : null;
        $this->container['domain'] = isset($data['domain']) ? $data['domain'] : null;
        $this->container['domain_lock'] = isset($data['domain_lock']) ? $data['domain_lock'] : null;
        $this->container['feature_config'] = isset($data['feature_config']) ? $data['feature_config'] : null;
        $this->container['https'] = isset($data['https']) ? $data['https'] : null;
        $this->container['ipv6'] = isset($data['ipv6']) ? $data['ipv6'] : null;
        $this->container['is_conflict_domain'] = isset($data['is_conflict_domain']) ? $data['is_conflict_domain'] : null;
        $this->container['origin_protocol'] = isset($data['origin_protocol']) ? $data['origin_protocol'] : null;
        $this->container['primary_origin'] = isset($data['primary_origin']) ? $data['primary_origin'] : null;
        $this->container['project'] = isset($data['project']) ? $data['project'] : null;
        $this->container['resource_tags'] = isset($data['resource_tags']) ? $data['resource_tags'] : null;
        $this->container['service_region'] = isset($data['service_region']) ? $data['service_region'] : null;
        $this->container['service_type'] = isset($data['service_type']) ? $data['service_type'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['update_time'] = isset($data['update_time']) ? $data['update_time'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets backup_cname
     *
     * @return string
     */
    public function getBackupCname()
    {
        return $this->container['backup_cname'];
    }

    /**
     * Sets backup_cname
     *
     * @param string $backup_cname backup_cname
     *
     * @return $this
     */
    public function setBackupCname($backup_cname)
    {
        $this->container['backup_cname'] = $backup_cname;

        return $this;
    }

    /**
     * Gets backup_origin
     *
     * @return string[]
     */
    public function getBackupOrigin()
    {
        return $this->container['backup_origin'];
    }

    /**
     * Sets backup_origin
     *
     * @param string[] $backup_origin backup_origin
     *
     * @return $this
     */
    public function setBackupOrigin($backup_origin)
    {
        $this->container['backup_origin'] = $backup_origin;

        return $this;
    }

    /**
     * Gets cache_shared
     *
     * @return string
     */
    public function getCacheShared()
    {
        return $this->container['cache_shared'];
    }

    /**
     * Sets cache_shared
     *
     * @param string $cache_shared cache_shared
     *
     * @return $this
     */
    public function setCacheShared($cache_shared)
    {
        $this->container['cache_shared'] = $cache_shared;

        return $this;
    }

    /**
     * Gets cache_shared_target_host
     *
     * @return string
     */
    public function getCacheSharedTargetHost()
    {
        return $this->container['cache_shared_target_host'];
    }

    /**
     * Sets cache_shared_target_host
     *
     * @param string $cache_shared_target_host cache_shared_target_host
     *
     * @return $this
     */
    public function setCacheSharedTargetHost($cache_shared_target_host)
    {
        $this->container['cache_shared_target_host'] = $cache_shared_target_host;

        return $this;
    }

    /**
     * Gets cname
     *
     * @return string
     */
    public function getCname()
    {
        return $this->container['cname'];
    }

    /**
     * Sets cname
     *
     * @param string $cname cname
     *
     * @return $this
     */
    public function setCname($cname)
    {
        $this->container['cname'] = $cname;

        return $this;
    }

    /**
     * Gets config_status
     *
     * @return string
     */
    public function getConfigStatus()
    {
        return $this->container['config_status'];
    }

    /**
     * Sets config_status
     *
     * @param string $config_status config_status
     *
     * @return $this
     */
    public function setConfigStatus($config_status)
    {
        $this->container['config_status'] = $config_status;

        return $this;
    }

    /**
     * Gets create_time
     *
     * @return int
     */
    public function getCreateTime()
    {
        return $this->container['create_time'];
    }

    /**
     * Sets create_time
     *
     * @param int $create_time create_time
     *
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->container['create_time'] = $create_time;

        return $this;
    }

    /**
     * Gets domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->container['domain'];
    }

    /**
     * Sets domain
     *
     * @param string $domain domain
     *
     * @return $this
     */
    public function setDomain($domain)
    {
        $this->container['domain'] = $domain;

        return $this;
    }

    /**
     * Gets domain_lock
     *
     * @return \Volcengine\Cdn\Model\DomainLockForListCdnDomainsOutput
     */
    public function getDomainLock()
    {
        return $this->container['domain_lock'];
    }

    /**
     * Sets domain_lock
     *
     * @param \Volcengine\Cdn\Model\DomainLockForListCdnDomainsOutput $domain_lock domain_lock
     *
     * @return $this
     */
    public function setDomainLock($domain_lock)
    {
        $this->container['domain_lock'] = $domain_lock;

        return $this;
    }

    /**
     * Gets feature_config
     *
     * @return \Volcengine\Cdn\Model\FeatureConfigForListCdnDomainsOutput
     */
    public function getFeatureConfig()
    {
        return $this->container['feature_config'];
    }

    /**
     * Sets feature_config
     *
     * @param \Volcengine\Cdn\Model\FeatureConfigForListCdnDomainsOutput $feature_config feature_config
     *
     * @return $this
     */
    public function setFeatureConfig($feature_config)
    {
        $this->container['feature_config'] = $feature_config;

        return $this;
    }

    /**
     * Gets https
     *
     * @return bool
     */
    public function getHttps()
    {
        return $this->container['https'];
    }

    /**
     * Sets https
     *
     * @param bool $https https
     *
     * @return $this
     */
    public function setHttps($https)
    {
        $this->container['https'] = $https;

        return $this;
    }

    /**
     * Gets ipv6
     *
     * @return bool
     */
    public function getIpv6()
    {
        return $this->container['ipv6'];
    }

    /**
     * Sets ipv6
     *
     * @param bool $ipv6 ipv6
     *
     * @return $this
     */
    public function setIpv6($ipv6)
    {
        $this->container['ipv6'] = $ipv6;

        return $this;
    }

    /**
     * Gets is_conflict_domain
     *
     * @return bool
     */
    public function getIsConflictDomain()
    {
        return $this->container['is_conflict_domain'];
    }

    /**
     * Sets is_conflict_domain
     *
     * @param bool $is_conflict_domain is_conflict_domain
     *
     * @return $this
     */
    public function setIsConflictDomain($is_conflict_domain)
    {
        $this->container['is_conflict_domain'] = $is_conflict_domain;

        return $this;
    }

    /**
     * Gets origin_protocol
     *
     * @return string
     */
    public function getOriginProtocol()
    {
        return $this->container['origin_protocol'];
    }

    /**
     * Sets origin_protocol
     *
     * @param string $origin_protocol origin_protocol
     *
     * @return $this
     */
    public function setOriginProtocol($origin_protocol)
    {
        $this->container['origin_protocol'] = $origin_protocol;

        return $this;
    }

    /**
     * Gets primary_origin
     *
     * @return string[]
     */
    public function getPrimaryOrigin()
    {
        return $this->container['primary_origin'];
    }

    /**
     * Sets primary_origin
     *
     * @param string[] $primary_origin primary_origin
     *
     * @return $this
     */
    public function setPrimaryOrigin($primary_origin)
    {
        $this->container['primary_origin'] = $primary_origin;

        return $this;
    }

    /**
     * Gets project
     *
     * @return string
     */
    public function getProject()
    {
        return $this->container['project'];
    }

    /**
     * Sets project
     *
     * @param string $project project
     *
     * @return $this
     */
    public function setProject($project)
    {
        $this->container['project'] = $project;

        return $this;
    }

    /**
     * Gets resource_tags
     *
     * @return \Volcengine\Cdn\Model\ResourceTagForListCdnDomainsOutput[]
     */
    public function getResourceTags()
    {
        return $this->container['resource_tags'];
    }

    /**
     * Sets resource_tags
     *
     * @param \Volcengine\Cdn\Model\ResourceTagForListCdnDomainsOutput[] $resource_tags resource_tags
     *
     * @return $this
     */
    public function setResourceTags($resource_tags)
    {
        $this->container['resource_tags'] = $resource_tags;

        return $this;
    }

    /**
     * Gets service_region
     *
     * @return string
     */
    public function getServiceRegion()
    {
        return $this->container['service_region'];
    }

    /**
     * Sets service_region
     *
     * @param string $service_region service_region
     *
     * @return $this
     */
    public function setServiceRegion($service_region)
    {
        $this->container['service_region'] = $service_region;

        return $this;
    }

    /**
     * Gets service_type
     *
     * @return string
     */
    public function getServiceType()
    {
        return $this->container['service_type'];
    }

    /**
     * Sets service_type
     *
     * @param string $service_type service_type
     *
     * @return $this
     */
    public function setServiceType($service_type)
    {
        $this->container['service_type'] = $service_type;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets update_time
     *
     * @return int
     */
    public function getUpdateTime()
    {
        return $this->container['update_time'];
    }

    /**
     * Sets update_time
     *
     * @param int $update_time update_time
     *
     * @return $this
     */
    public function setUpdateTime($update_time)
    {
        $this->container['update_time'] = $update_time;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

