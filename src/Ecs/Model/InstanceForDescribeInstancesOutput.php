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

class InstanceForDescribeInstancesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'InstanceForDescribeInstancesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'cpu_options' => '\Volcengine\Ecs\Model\CpuOptionsForDescribeInstancesOutput',
        'cpus' => 'int',
        'created_at' => 'string',
        'deployment_set_id' => 'string',
        'description' => 'string',
        'eip_address' => '\Volcengine\Ecs\Model\EipAddressForDescribeInstancesOutput',
        'expired_at' => 'string',
        'hostname' => 'string',
        'image_id' => 'string',
        'instance_charge_type' => 'string',
        'instance_id' => 'string',
        'instance_name' => 'string',
        'instance_type_id' => 'string',
        'key_pair_id' => 'string',
        'key_pair_name' => 'string',
        'local_volumes' => '\Volcengine\Ecs\Model\LocalVolumeForDescribeInstancesOutput[]',
        'memory_size' => 'int',
        'network_interfaces' => '\Volcengine\Ecs\Model\NetworkInterfaceForDescribeInstancesOutput[]',
        'os_name' => 'string',
        'os_type' => 'string',
        'project_name' => 'string',
        'rdma_ip_addresses' => 'string[]',
        'spot_strategy' => 'string',
        'status' => 'string',
        'stopped_mode' => 'string',
        'tags' => '\Volcengine\Ecs\Model\TagForDescribeInstancesOutput[]',
        'updated_at' => 'string',
        'uuid' => 'string',
        'vpc_id' => 'string',
        'zone_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'cpu_options' => null,
        'cpus' => 'int32',
        'created_at' => null,
        'deployment_set_id' => null,
        'description' => null,
        'eip_address' => null,
        'expired_at' => null,
        'hostname' => null,
        'image_id' => null,
        'instance_charge_type' => null,
        'instance_id' => null,
        'instance_name' => null,
        'instance_type_id' => null,
        'key_pair_id' => null,
        'key_pair_name' => null,
        'local_volumes' => null,
        'memory_size' => 'int32',
        'network_interfaces' => null,
        'os_name' => null,
        'os_type' => null,
        'project_name' => null,
        'rdma_ip_addresses' => null,
        'spot_strategy' => null,
        'status' => null,
        'stopped_mode' => null,
        'tags' => null,
        'updated_at' => null,
        'uuid' => null,
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
        'cpu_options' => 'CpuOptions',
        'cpus' => 'Cpus',
        'created_at' => 'CreatedAt',
        'deployment_set_id' => 'DeploymentSetId',
        'description' => 'Description',
        'eip_address' => 'EipAddress',
        'expired_at' => 'ExpiredAt',
        'hostname' => 'Hostname',
        'image_id' => 'ImageId',
        'instance_charge_type' => 'InstanceChargeType',
        'instance_id' => 'InstanceId',
        'instance_name' => 'InstanceName',
        'instance_type_id' => 'InstanceTypeId',
        'key_pair_id' => 'KeyPairId',
        'key_pair_name' => 'KeyPairName',
        'local_volumes' => 'LocalVolumes',
        'memory_size' => 'MemorySize',
        'network_interfaces' => 'NetworkInterfaces',
        'os_name' => 'OsName',
        'os_type' => 'OsType',
        'project_name' => 'ProjectName',
        'rdma_ip_addresses' => 'RdmaIpAddresses',
        'spot_strategy' => 'SpotStrategy',
        'status' => 'Status',
        'stopped_mode' => 'StoppedMode',
        'tags' => 'Tags',
        'updated_at' => 'UpdatedAt',
        'uuid' => 'Uuid',
        'vpc_id' => 'VpcId',
        'zone_id' => 'ZoneId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cpu_options' => 'setCpuOptions',
        'cpus' => 'setCpus',
        'created_at' => 'setCreatedAt',
        'deployment_set_id' => 'setDeploymentSetId',
        'description' => 'setDescription',
        'eip_address' => 'setEipAddress',
        'expired_at' => 'setExpiredAt',
        'hostname' => 'setHostname',
        'image_id' => 'setImageId',
        'instance_charge_type' => 'setInstanceChargeType',
        'instance_id' => 'setInstanceId',
        'instance_name' => 'setInstanceName',
        'instance_type_id' => 'setInstanceTypeId',
        'key_pair_id' => 'setKeyPairId',
        'key_pair_name' => 'setKeyPairName',
        'local_volumes' => 'setLocalVolumes',
        'memory_size' => 'setMemorySize',
        'network_interfaces' => 'setNetworkInterfaces',
        'os_name' => 'setOsName',
        'os_type' => 'setOsType',
        'project_name' => 'setProjectName',
        'rdma_ip_addresses' => 'setRdmaIpAddresses',
        'spot_strategy' => 'setSpotStrategy',
        'status' => 'setStatus',
        'stopped_mode' => 'setStoppedMode',
        'tags' => 'setTags',
        'updated_at' => 'setUpdatedAt',
        'uuid' => 'setUuid',
        'vpc_id' => 'setVpcId',
        'zone_id' => 'setZoneId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cpu_options' => 'getCpuOptions',
        'cpus' => 'getCpus',
        'created_at' => 'getCreatedAt',
        'deployment_set_id' => 'getDeploymentSetId',
        'description' => 'getDescription',
        'eip_address' => 'getEipAddress',
        'expired_at' => 'getExpiredAt',
        'hostname' => 'getHostname',
        'image_id' => 'getImageId',
        'instance_charge_type' => 'getInstanceChargeType',
        'instance_id' => 'getInstanceId',
        'instance_name' => 'getInstanceName',
        'instance_type_id' => 'getInstanceTypeId',
        'key_pair_id' => 'getKeyPairId',
        'key_pair_name' => 'getKeyPairName',
        'local_volumes' => 'getLocalVolumes',
        'memory_size' => 'getMemorySize',
        'network_interfaces' => 'getNetworkInterfaces',
        'os_name' => 'getOsName',
        'os_type' => 'getOsType',
        'project_name' => 'getProjectName',
        'rdma_ip_addresses' => 'getRdmaIpAddresses',
        'spot_strategy' => 'getSpotStrategy',
        'status' => 'getStatus',
        'stopped_mode' => 'getStoppedMode',
        'tags' => 'getTags',
        'updated_at' => 'getUpdatedAt',
        'uuid' => 'getUuid',
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
        $this->container['cpu_options'] = isset($data['cpu_options']) ? $data['cpu_options'] : null;
        $this->container['cpus'] = isset($data['cpus']) ? $data['cpus'] : null;
        $this->container['created_at'] = isset($data['created_at']) ? $data['created_at'] : null;
        $this->container['deployment_set_id'] = isset($data['deployment_set_id']) ? $data['deployment_set_id'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['eip_address'] = isset($data['eip_address']) ? $data['eip_address'] : null;
        $this->container['expired_at'] = isset($data['expired_at']) ? $data['expired_at'] : null;
        $this->container['hostname'] = isset($data['hostname']) ? $data['hostname'] : null;
        $this->container['image_id'] = isset($data['image_id']) ? $data['image_id'] : null;
        $this->container['instance_charge_type'] = isset($data['instance_charge_type']) ? $data['instance_charge_type'] : null;
        $this->container['instance_id'] = isset($data['instance_id']) ? $data['instance_id'] : null;
        $this->container['instance_name'] = isset($data['instance_name']) ? $data['instance_name'] : null;
        $this->container['instance_type_id'] = isset($data['instance_type_id']) ? $data['instance_type_id'] : null;
        $this->container['key_pair_id'] = isset($data['key_pair_id']) ? $data['key_pair_id'] : null;
        $this->container['key_pair_name'] = isset($data['key_pair_name']) ? $data['key_pair_name'] : null;
        $this->container['local_volumes'] = isset($data['local_volumes']) ? $data['local_volumes'] : null;
        $this->container['memory_size'] = isset($data['memory_size']) ? $data['memory_size'] : null;
        $this->container['network_interfaces'] = isset($data['network_interfaces']) ? $data['network_interfaces'] : null;
        $this->container['os_name'] = isset($data['os_name']) ? $data['os_name'] : null;
        $this->container['os_type'] = isset($data['os_type']) ? $data['os_type'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['rdma_ip_addresses'] = isset($data['rdma_ip_addresses']) ? $data['rdma_ip_addresses'] : null;
        $this->container['spot_strategy'] = isset($data['spot_strategy']) ? $data['spot_strategy'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['stopped_mode'] = isset($data['stopped_mode']) ? $data['stopped_mode'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['updated_at'] = isset($data['updated_at']) ? $data['updated_at'] : null;
        $this->container['uuid'] = isset($data['uuid']) ? $data['uuid'] : null;
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
     * Gets cpu_options
     *
     * @return \Volcengine\Ecs\Model\CpuOptionsForDescribeInstancesOutput
     */
    public function getCpuOptions()
    {
        return $this->container['cpu_options'];
    }

    /**
     * Sets cpu_options
     *
     * @param \Volcengine\Ecs\Model\CpuOptionsForDescribeInstancesOutput $cpu_options cpu_options
     *
     * @return $this
     */
    public function setCpuOptions($cpu_options)
    {
        $this->container['cpu_options'] = $cpu_options;

        return $this;
    }

    /**
     * Gets cpus
     *
     * @return int
     */
    public function getCpus()
    {
        return $this->container['cpus'];
    }

    /**
     * Sets cpus
     *
     * @param int $cpus cpus
     *
     * @return $this
     */
    public function setCpus($cpus)
    {
        $this->container['cpus'] = $cpus;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string $created_at created_at
     *
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets deployment_set_id
     *
     * @return string
     */
    public function getDeploymentSetId()
    {
        return $this->container['deployment_set_id'];
    }

    /**
     * Sets deployment_set_id
     *
     * @param string $deployment_set_id deployment_set_id
     *
     * @return $this
     */
    public function setDeploymentSetId($deployment_set_id)
    {
        $this->container['deployment_set_id'] = $deployment_set_id;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets eip_address
     *
     * @return \Volcengine\Ecs\Model\EipAddressForDescribeInstancesOutput
     */
    public function getEipAddress()
    {
        return $this->container['eip_address'];
    }

    /**
     * Sets eip_address
     *
     * @param \Volcengine\Ecs\Model\EipAddressForDescribeInstancesOutput $eip_address eip_address
     *
     * @return $this
     */
    public function setEipAddress($eip_address)
    {
        $this->container['eip_address'] = $eip_address;

        return $this;
    }

    /**
     * Gets expired_at
     *
     * @return string
     */
    public function getExpiredAt()
    {
        return $this->container['expired_at'];
    }

    /**
     * Sets expired_at
     *
     * @param string $expired_at expired_at
     *
     * @return $this
     */
    public function setExpiredAt($expired_at)
    {
        $this->container['expired_at'] = $expired_at;

        return $this;
    }

    /**
     * Gets hostname
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->container['hostname'];
    }

    /**
     * Sets hostname
     *
     * @param string $hostname hostname
     *
     * @return $this
     */
    public function setHostname($hostname)
    {
        $this->container['hostname'] = $hostname;

        return $this;
    }

    /**
     * Gets image_id
     *
     * @return string
     */
    public function getImageId()
    {
        return $this->container['image_id'];
    }

    /**
     * Sets image_id
     *
     * @param string $image_id image_id
     *
     * @return $this
     */
    public function setImageId($image_id)
    {
        $this->container['image_id'] = $image_id;

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
     * Gets instance_id
     *
     * @return string
     */
    public function getInstanceId()
    {
        return $this->container['instance_id'];
    }

    /**
     * Sets instance_id
     *
     * @param string $instance_id instance_id
     *
     * @return $this
     */
    public function setInstanceId($instance_id)
    {
        $this->container['instance_id'] = $instance_id;

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
     * Gets instance_type_id
     *
     * @return string
     */
    public function getInstanceTypeId()
    {
        return $this->container['instance_type_id'];
    }

    /**
     * Sets instance_type_id
     *
     * @param string $instance_type_id instance_type_id
     *
     * @return $this
     */
    public function setInstanceTypeId($instance_type_id)
    {
        $this->container['instance_type_id'] = $instance_type_id;

        return $this;
    }

    /**
     * Gets key_pair_id
     *
     * @return string
     */
    public function getKeyPairId()
    {
        return $this->container['key_pair_id'];
    }

    /**
     * Sets key_pair_id
     *
     * @param string $key_pair_id key_pair_id
     *
     * @return $this
     */
    public function setKeyPairId($key_pair_id)
    {
        $this->container['key_pair_id'] = $key_pair_id;

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
     * Gets local_volumes
     *
     * @return \Volcengine\Ecs\Model\LocalVolumeForDescribeInstancesOutput[]
     */
    public function getLocalVolumes()
    {
        return $this->container['local_volumes'];
    }

    /**
     * Sets local_volumes
     *
     * @param \Volcengine\Ecs\Model\LocalVolumeForDescribeInstancesOutput[] $local_volumes local_volumes
     *
     * @return $this
     */
    public function setLocalVolumes($local_volumes)
    {
        $this->container['local_volumes'] = $local_volumes;

        return $this;
    }

    /**
     * Gets memory_size
     *
     * @return int
     */
    public function getMemorySize()
    {
        return $this->container['memory_size'];
    }

    /**
     * Sets memory_size
     *
     * @param int $memory_size memory_size
     *
     * @return $this
     */
    public function setMemorySize($memory_size)
    {
        $this->container['memory_size'] = $memory_size;

        return $this;
    }

    /**
     * Gets network_interfaces
     *
     * @return \Volcengine\Ecs\Model\NetworkInterfaceForDescribeInstancesOutput[]
     */
    public function getNetworkInterfaces()
    {
        return $this->container['network_interfaces'];
    }

    /**
     * Sets network_interfaces
     *
     * @param \Volcengine\Ecs\Model\NetworkInterfaceForDescribeInstancesOutput[] $network_interfaces network_interfaces
     *
     * @return $this
     */
    public function setNetworkInterfaces($network_interfaces)
    {
        $this->container['network_interfaces'] = $network_interfaces;

        return $this;
    }

    /**
     * Gets os_name
     *
     * @return string
     */
    public function getOsName()
    {
        return $this->container['os_name'];
    }

    /**
     * Sets os_name
     *
     * @param string $os_name os_name
     *
     * @return $this
     */
    public function setOsName($os_name)
    {
        $this->container['os_name'] = $os_name;

        return $this;
    }

    /**
     * Gets os_type
     *
     * @return string
     */
    public function getOsType()
    {
        return $this->container['os_type'];
    }

    /**
     * Sets os_type
     *
     * @param string $os_type os_type
     *
     * @return $this
     */
    public function setOsType($os_type)
    {
        $this->container['os_type'] = $os_type;

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
     * Gets rdma_ip_addresses
     *
     * @return string[]
     */
    public function getRdmaIpAddresses()
    {
        return $this->container['rdma_ip_addresses'];
    }

    /**
     * Sets rdma_ip_addresses
     *
     * @param string[] $rdma_ip_addresses rdma_ip_addresses
     *
     * @return $this
     */
    public function setRdmaIpAddresses($rdma_ip_addresses)
    {
        $this->container['rdma_ip_addresses'] = $rdma_ip_addresses;

        return $this;
    }

    /**
     * Gets spot_strategy
     *
     * @return string
     */
    public function getSpotStrategy()
    {
        return $this->container['spot_strategy'];
    }

    /**
     * Sets spot_strategy
     *
     * @param string $spot_strategy spot_strategy
     *
     * @return $this
     */
    public function setSpotStrategy($spot_strategy)
    {
        $this->container['spot_strategy'] = $spot_strategy;

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
     * Gets stopped_mode
     *
     * @return string
     */
    public function getStoppedMode()
    {
        return $this->container['stopped_mode'];
    }

    /**
     * Sets stopped_mode
     *
     * @param string $stopped_mode stopped_mode
     *
     * @return $this
     */
    public function setStoppedMode($stopped_mode)
    {
        $this->container['stopped_mode'] = $stopped_mode;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return \Volcengine\Ecs\Model\TagForDescribeInstancesOutput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Ecs\Model\TagForDescribeInstancesOutput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param string $updated_at updated_at
     *
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets uuid
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->container['uuid'];
    }

    /**
     * Sets uuid
     *
     * @param string $uuid uuid
     *
     * @return $this
     */
    public function setUuid($uuid)
    {
        $this->container['uuid'] = $uuid;

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
