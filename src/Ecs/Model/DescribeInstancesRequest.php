<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Ecs\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class DescribeInstancesRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DescribeInstancesRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'affinity_group_ids' => 'string[]',
        'dedicated_host_cluster_id' => 'string',
        'dedicated_host_id' => 'string',
        'deployment_set_group_numbers' => 'int[]',
        'deployment_set_ids' => 'string[]',
        'eip_addresses' => 'string[]',
        'hpc_cluster_id' => 'string',
        'instance_charge_type' => 'string',
        'instance_ids' => 'string[]',
        'instance_name' => 'string',
        'instance_type_families' => 'string[]',
        'instance_type_ids' => 'string[]',
        'instance_types' => 'string[]',
        'ipv6_addresses' => 'string[]',
        'key_pair_name' => 'string',
        'max_results' => 'int',
        'next_token' => 'string',
        'primary_ip_address' => 'string',
        'project_name' => 'string',
        'scheduled_instance_id' => 'string',
        'status' => 'string',
        'tag_filters' => '\Volcengine\Ecs\Model\TagFilterForDescribeInstancesInput[]',
        'vpc_id' => 'string',
        'zone_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'affinity_group_ids' => null,
        'dedicated_host_cluster_id' => null,
        'dedicated_host_id' => null,
        'deployment_set_group_numbers' => 'int32',
        'deployment_set_ids' => null,
        'eip_addresses' => null,
        'hpc_cluster_id' => null,
        'instance_charge_type' => null,
        'instance_ids' => null,
        'instance_name' => null,
        'instance_type_families' => null,
        'instance_type_ids' => null,
        'instance_types' => null,
        'ipv6_addresses' => null,
        'key_pair_name' => null,
        'max_results' => 'int32',
        'next_token' => null,
        'primary_ip_address' => null,
        'project_name' => null,
        'scheduled_instance_id' => null,
        'status' => null,
        'tag_filters' => null,
        'vpc_id' => null,
        'zone_id' => null
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
        'affinity_group_ids' => 'AffinityGroupIds',
        'dedicated_host_cluster_id' => 'DedicatedHostClusterId',
        'dedicated_host_id' => 'DedicatedHostId',
        'deployment_set_group_numbers' => 'DeploymentSetGroupNumbers',
        'deployment_set_ids' => 'DeploymentSetIds',
        'eip_addresses' => 'EipAddresses',
        'hpc_cluster_id' => 'HpcClusterId',
        'instance_charge_type' => 'InstanceChargeType',
        'instance_ids' => 'InstanceIds',
        'instance_name' => 'InstanceName',
        'instance_type_families' => 'InstanceTypeFamilies',
        'instance_type_ids' => 'InstanceTypeIds',
        'instance_types' => 'InstanceTypes',
        'ipv6_addresses' => 'Ipv6Addresses',
        'key_pair_name' => 'KeyPairName',
        'max_results' => 'MaxResults',
        'next_token' => 'NextToken',
        'primary_ip_address' => 'PrimaryIpAddress',
        'project_name' => 'ProjectName',
        'scheduled_instance_id' => 'ScheduledInstanceId',
        'status' => 'Status',
        'tag_filters' => 'TagFilters',
        'vpc_id' => 'VpcId',
        'zone_id' => 'ZoneId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'affinity_group_ids' => 'setAffinityGroupIds',
        'dedicated_host_cluster_id' => 'setDedicatedHostClusterId',
        'dedicated_host_id' => 'setDedicatedHostId',
        'deployment_set_group_numbers' => 'setDeploymentSetGroupNumbers',
        'deployment_set_ids' => 'setDeploymentSetIds',
        'eip_addresses' => 'setEipAddresses',
        'hpc_cluster_id' => 'setHpcClusterId',
        'instance_charge_type' => 'setInstanceChargeType',
        'instance_ids' => 'setInstanceIds',
        'instance_name' => 'setInstanceName',
        'instance_type_families' => 'setInstanceTypeFamilies',
        'instance_type_ids' => 'setInstanceTypeIds',
        'instance_types' => 'setInstanceTypes',
        'ipv6_addresses' => 'setIpv6Addresses',
        'key_pair_name' => 'setKeyPairName',
        'max_results' => 'setMaxResults',
        'next_token' => 'setNextToken',
        'primary_ip_address' => 'setPrimaryIpAddress',
        'project_name' => 'setProjectName',
        'scheduled_instance_id' => 'setScheduledInstanceId',
        'status' => 'setStatus',
        'tag_filters' => 'setTagFilters',
        'vpc_id' => 'setVpcId',
        'zone_id' => 'setZoneId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'affinity_group_ids' => 'getAffinityGroupIds',
        'dedicated_host_cluster_id' => 'getDedicatedHostClusterId',
        'dedicated_host_id' => 'getDedicatedHostId',
        'deployment_set_group_numbers' => 'getDeploymentSetGroupNumbers',
        'deployment_set_ids' => 'getDeploymentSetIds',
        'eip_addresses' => 'getEipAddresses',
        'hpc_cluster_id' => 'getHpcClusterId',
        'instance_charge_type' => 'getInstanceChargeType',
        'instance_ids' => 'getInstanceIds',
        'instance_name' => 'getInstanceName',
        'instance_type_families' => 'getInstanceTypeFamilies',
        'instance_type_ids' => 'getInstanceTypeIds',
        'instance_types' => 'getInstanceTypes',
        'ipv6_addresses' => 'getIpv6Addresses',
        'key_pair_name' => 'getKeyPairName',
        'max_results' => 'getMaxResults',
        'next_token' => 'getNextToken',
        'primary_ip_address' => 'getPrimaryIpAddress',
        'project_name' => 'getProjectName',
        'scheduled_instance_id' => 'getScheduledInstanceId',
        'status' => 'getStatus',
        'tag_filters' => 'getTagFilters',
        'vpc_id' => 'getVpcId',
        'zone_id' => 'getZoneId'
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
        $this->container['affinity_group_ids'] = isset($data['affinity_group_ids']) ? $data['affinity_group_ids'] : null;
        $this->container['dedicated_host_cluster_id'] = isset($data['dedicated_host_cluster_id']) ? $data['dedicated_host_cluster_id'] : null;
        $this->container['dedicated_host_id'] = isset($data['dedicated_host_id']) ? $data['dedicated_host_id'] : null;
        $this->container['deployment_set_group_numbers'] = isset($data['deployment_set_group_numbers']) ? $data['deployment_set_group_numbers'] : null;
        $this->container['deployment_set_ids'] = isset($data['deployment_set_ids']) ? $data['deployment_set_ids'] : null;
        $this->container['eip_addresses'] = isset($data['eip_addresses']) ? $data['eip_addresses'] : null;
        $this->container['hpc_cluster_id'] = isset($data['hpc_cluster_id']) ? $data['hpc_cluster_id'] : null;
        $this->container['instance_charge_type'] = isset($data['instance_charge_type']) ? $data['instance_charge_type'] : null;
        $this->container['instance_ids'] = isset($data['instance_ids']) ? $data['instance_ids'] : null;
        $this->container['instance_name'] = isset($data['instance_name']) ? $data['instance_name'] : null;
        $this->container['instance_type_families'] = isset($data['instance_type_families']) ? $data['instance_type_families'] : null;
        $this->container['instance_type_ids'] = isset($data['instance_type_ids']) ? $data['instance_type_ids'] : null;
        $this->container['instance_types'] = isset($data['instance_types']) ? $data['instance_types'] : null;
        $this->container['ipv6_addresses'] = isset($data['ipv6_addresses']) ? $data['ipv6_addresses'] : null;
        $this->container['key_pair_name'] = isset($data['key_pair_name']) ? $data['key_pair_name'] : null;
        $this->container['max_results'] = isset($data['max_results']) ? $data['max_results'] : null;
        $this->container['next_token'] = isset($data['next_token']) ? $data['next_token'] : null;
        $this->container['primary_ip_address'] = isset($data['primary_ip_address']) ? $data['primary_ip_address'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['scheduled_instance_id'] = isset($data['scheduled_instance_id']) ? $data['scheduled_instance_id'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['tag_filters'] = isset($data['tag_filters']) ? $data['tag_filters'] : null;
        $this->container['vpc_id'] = isset($data['vpc_id']) ? $data['vpc_id'] : null;
        $this->container['zone_id'] = isset($data['zone_id']) ? $data['zone_id'] : null;
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
     * Gets affinity_group_ids
     *
     * @return string[]
     */
    public function getAffinityGroupIds()
    {
        return $this->container['affinity_group_ids'];
    }

    /**
     * Sets affinity_group_ids
     *
     * @param string[] $affinity_group_ids affinity_group_ids
     *
     * @return $this
     */
    public function setAffinityGroupIds($affinity_group_ids)
    {
        $this->container['affinity_group_ids'] = $affinity_group_ids;

        return $this;
    }

    /**
     * Gets dedicated_host_cluster_id
     *
     * @return string
     */
    public function getDedicatedHostClusterId()
    {
        return $this->container['dedicated_host_cluster_id'];
    }

    /**
     * Sets dedicated_host_cluster_id
     *
     * @param string $dedicated_host_cluster_id dedicated_host_cluster_id
     *
     * @return $this
     */
    public function setDedicatedHostClusterId($dedicated_host_cluster_id)
    {
        $this->container['dedicated_host_cluster_id'] = $dedicated_host_cluster_id;

        return $this;
    }

    /**
     * Gets dedicated_host_id
     *
     * @return string
     */
    public function getDedicatedHostId()
    {
        return $this->container['dedicated_host_id'];
    }

    /**
     * Sets dedicated_host_id
     *
     * @param string $dedicated_host_id dedicated_host_id
     *
     * @return $this
     */
    public function setDedicatedHostId($dedicated_host_id)
    {
        $this->container['dedicated_host_id'] = $dedicated_host_id;

        return $this;
    }

    /**
     * Gets deployment_set_group_numbers
     *
     * @return int[]
     */
    public function getDeploymentSetGroupNumbers()
    {
        return $this->container['deployment_set_group_numbers'];
    }

    /**
     * Sets deployment_set_group_numbers
     *
     * @param int[] $deployment_set_group_numbers deployment_set_group_numbers
     *
     * @return $this
     */
    public function setDeploymentSetGroupNumbers($deployment_set_group_numbers)
    {
        $this->container['deployment_set_group_numbers'] = $deployment_set_group_numbers;

        return $this;
    }

    /**
     * Gets deployment_set_ids
     *
     * @return string[]
     */
    public function getDeploymentSetIds()
    {
        return $this->container['deployment_set_ids'];
    }

    /**
     * Sets deployment_set_ids
     *
     * @param string[] $deployment_set_ids deployment_set_ids
     *
     * @return $this
     */
    public function setDeploymentSetIds($deployment_set_ids)
    {
        $this->container['deployment_set_ids'] = $deployment_set_ids;

        return $this;
    }

    /**
     * Gets eip_addresses
     *
     * @return string[]
     */
    public function getEipAddresses()
    {
        return $this->container['eip_addresses'];
    }

    /**
     * Sets eip_addresses
     *
     * @param string[] $eip_addresses eip_addresses
     *
     * @return $this
     */
    public function setEipAddresses($eip_addresses)
    {
        $this->container['eip_addresses'] = $eip_addresses;

        return $this;
    }

    /**
     * Gets hpc_cluster_id
     *
     * @return string
     */
    public function getHpcClusterId()
    {
        return $this->container['hpc_cluster_id'];
    }

    /**
     * Sets hpc_cluster_id
     *
     * @param string $hpc_cluster_id hpc_cluster_id
     *
     * @return $this
     */
    public function setHpcClusterId($hpc_cluster_id)
    {
        $this->container['hpc_cluster_id'] = $hpc_cluster_id;

        return $this;
    }

    /**
     * Gets instance_charge_type
     *
     * @return string
     */
    public function getInstanceChargeType()
    {
        return $this->container['instance_charge_type'];
    }

    /**
     * Sets instance_charge_type
     *
     * @param string $instance_charge_type instance_charge_type
     *
     * @return $this
     */
    public function setInstanceChargeType($instance_charge_type)
    {
        $this->container['instance_charge_type'] = $instance_charge_type;

        return $this;
    }

    /**
     * Gets instance_ids
     *
     * @return string[]
     */
    public function getInstanceIds()
    {
        return $this->container['instance_ids'];
    }

    /**
     * Sets instance_ids
     *
     * @param string[] $instance_ids instance_ids
     *
     * @return $this
     */
    public function setInstanceIds($instance_ids)
    {
        $this->container['instance_ids'] = $instance_ids;

        return $this;
    }

    /**
     * Gets instance_name
     *
     * @return string
     */
    public function getInstanceName()
    {
        return $this->container['instance_name'];
    }

    /**
     * Sets instance_name
     *
     * @param string $instance_name instance_name
     *
     * @return $this
     */
    public function setInstanceName($instance_name)
    {
        $this->container['instance_name'] = $instance_name;

        return $this;
    }

    /**
     * Gets instance_type_families
     *
     * @return string[]
     */
    public function getInstanceTypeFamilies()
    {
        return $this->container['instance_type_families'];
    }

    /**
     * Sets instance_type_families
     *
     * @param string[] $instance_type_families instance_type_families
     *
     * @return $this
     */
    public function setInstanceTypeFamilies($instance_type_families)
    {
        $this->container['instance_type_families'] = $instance_type_families;

        return $this;
    }

    /**
     * Gets instance_type_ids
     *
     * @return string[]
     */
    public function getInstanceTypeIds()
    {
        return $this->container['instance_type_ids'];
    }

    /**
     * Sets instance_type_ids
     *
     * @param string[] $instance_type_ids instance_type_ids
     *
     * @return $this
     */
    public function setInstanceTypeIds($instance_type_ids)
    {
        $this->container['instance_type_ids'] = $instance_type_ids;

        return $this;
    }

    /**
     * Gets instance_types
     *
     * @return string[]
     */
    public function getInstanceTypes()
    {
        return $this->container['instance_types'];
    }

    /**
     * Sets instance_types
     *
     * @param string[] $instance_types instance_types
     *
     * @return $this
     */
    public function setInstanceTypes($instance_types)
    {
        $this->container['instance_types'] = $instance_types;

        return $this;
    }

    /**
     * Gets ipv6_addresses
     *
     * @return string[]
     */
    public function getIpv6Addresses()
    {
        return $this->container['ipv6_addresses'];
    }

    /**
     * Sets ipv6_addresses
     *
     * @param string[] $ipv6_addresses ipv6_addresses
     *
     * @return $this
     */
    public function setIpv6Addresses($ipv6_addresses)
    {
        $this->container['ipv6_addresses'] = $ipv6_addresses;

        return $this;
    }

    /**
     * Gets key_pair_name
     *
     * @return string
     */
    public function getKeyPairName()
    {
        return $this->container['key_pair_name'];
    }

    /**
     * Sets key_pair_name
     *
     * @param string $key_pair_name key_pair_name
     *
     * @return $this
     */
    public function setKeyPairName($key_pair_name)
    {
        $this->container['key_pair_name'] = $key_pair_name;

        return $this;
    }

    /**
     * Gets max_results
     *
     * @return int
     */
    public function getMaxResults()
    {
        return $this->container['max_results'];
    }

    /**
     * Sets max_results
     *
     * @param int $max_results max_results
     *
     * @return $this
     */
    public function setMaxResults($max_results)
    {
        $this->container['max_results'] = $max_results;

        return $this;
    }

    /**
     * Gets next_token
     *
     * @return string
     */
    public function getNextToken()
    {
        return $this->container['next_token'];
    }

    /**
     * Sets next_token
     *
     * @param string $next_token next_token
     *
     * @return $this
     */
    public function setNextToken($next_token)
    {
        $this->container['next_token'] = $next_token;

        return $this;
    }

    /**
     * Gets primary_ip_address
     *
     * @return string
     */
    public function getPrimaryIpAddress()
    {
        return $this->container['primary_ip_address'];
    }

    /**
     * Sets primary_ip_address
     *
     * @param string $primary_ip_address primary_ip_address
     *
     * @return $this
     */
    public function setPrimaryIpAddress($primary_ip_address)
    {
        $this->container['primary_ip_address'] = $primary_ip_address;

        return $this;
    }

    /**
     * Gets project_name
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->container['project_name'];
    }

    /**
     * Sets project_name
     *
     * @param string $project_name project_name
     *
     * @return $this
     */
    public function setProjectName($project_name)
    {
        $this->container['project_name'] = $project_name;

        return $this;
    }

    /**
     * Gets scheduled_instance_id
     *
     * @return string
     */
    public function getScheduledInstanceId()
    {
        return $this->container['scheduled_instance_id'];
    }

    /**
     * Sets scheduled_instance_id
     *
     * @param string $scheduled_instance_id scheduled_instance_id
     *
     * @return $this
     */
    public function setScheduledInstanceId($scheduled_instance_id)
    {
        $this->container['scheduled_instance_id'] = $scheduled_instance_id;

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
     * Gets tag_filters
     *
     * @return \Volcengine\Ecs\Model\TagFilterForDescribeInstancesInput[]
     */
    public function getTagFilters()
    {
        return $this->container['tag_filters'];
    }

    /**
     * Sets tag_filters
     *
     * @param \Volcengine\Ecs\Model\TagFilterForDescribeInstancesInput[] $tag_filters tag_filters
     *
     * @return $this
     */
    public function setTagFilters($tag_filters)
    {
        $this->container['tag_filters'] = $tag_filters;

        return $this;
    }

    /**
     * Gets vpc_id
     *
     * @return string
     */
    public function getVpcId()
    {
        return $this->container['vpc_id'];
    }

    /**
     * Sets vpc_id
     *
     * @param string $vpc_id vpc_id
     *
     * @return $this
     */
    public function setVpcId($vpc_id)
    {
        $this->container['vpc_id'] = $vpc_id;

        return $this;
    }

    /**
     * Gets zone_id
     *
     * @return string
     */
    public function getZoneId()
    {
        return $this->container['zone_id'];
    }

    /**
     * Sets zone_id
     *
     * @param string $zone_id zone_id
     *
     * @return $this
     */
    public function setZoneId($zone_id)
    {
        $this->container['zone_id'] = $zone_id;

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

