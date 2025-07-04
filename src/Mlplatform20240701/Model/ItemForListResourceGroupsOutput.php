<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Mlplatform20240701\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class ItemForListResourceGroupsOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ItemForListResourceGroupsOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'charge_type' => 'string',
        'description' => 'string',
        'expire_time' => 'string',
        'id' => 'string',
        'name' => 'string',
        'period_unit' => 'string',
        'resource_allocated' => '\Volcengine\Mlplatform20240701\Model\ResourceAllocatedForListResourceGroupsOutput',
        'resource_capability' => '\Volcengine\Mlplatform20240701\Model\ResourceCapabilityForListResourceGroupsOutput',
        'status' => '\Volcengine\Mlplatform20240701\Model\StatusForListResourceGroupsOutput',
        'storage_config' => '\Volcengine\Mlplatform20240701\Model\StorageConfigForListResourceGroupsOutput',
        'workload_network_config' => '\Volcengine\Mlplatform20240701\Model\WorkloadNetworkConfigForListResourceGroupsOutput',
        'workload_network_mode' => 'string',
        'zone_ids' => 'string[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'charge_type' => null,
        'description' => null,
        'expire_time' => null,
        'id' => null,
        'name' => null,
        'period_unit' => null,
        'resource_allocated' => null,
        'resource_capability' => null,
        'status' => null,
        'storage_config' => null,
        'workload_network_config' => null,
        'workload_network_mode' => null,
        'zone_ids' => null
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
        'charge_type' => 'ChargeType',
        'description' => 'Description',
        'expire_time' => 'ExpireTime',
        'id' => 'Id',
        'name' => 'Name',
        'period_unit' => 'PeriodUnit',
        'resource_allocated' => 'ResourceAllocated',
        'resource_capability' => 'ResourceCapability',
        'status' => 'Status',
        'storage_config' => 'StorageConfig',
        'workload_network_config' => 'WorkloadNetworkConfig',
        'workload_network_mode' => 'WorkloadNetworkMode',
        'zone_ids' => 'ZoneIds'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'charge_type' => 'setChargeType',
        'description' => 'setDescription',
        'expire_time' => 'setExpireTime',
        'id' => 'setId',
        'name' => 'setName',
        'period_unit' => 'setPeriodUnit',
        'resource_allocated' => 'setResourceAllocated',
        'resource_capability' => 'setResourceCapability',
        'status' => 'setStatus',
        'storage_config' => 'setStorageConfig',
        'workload_network_config' => 'setWorkloadNetworkConfig',
        'workload_network_mode' => 'setWorkloadNetworkMode',
        'zone_ids' => 'setZoneIds'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'charge_type' => 'getChargeType',
        'description' => 'getDescription',
        'expire_time' => 'getExpireTime',
        'id' => 'getId',
        'name' => 'getName',
        'period_unit' => 'getPeriodUnit',
        'resource_allocated' => 'getResourceAllocated',
        'resource_capability' => 'getResourceCapability',
        'status' => 'getStatus',
        'storage_config' => 'getStorageConfig',
        'workload_network_config' => 'getWorkloadNetworkConfig',
        'workload_network_mode' => 'getWorkloadNetworkMode',
        'zone_ids' => 'getZoneIds'
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
        $this->container['charge_type'] = isset($data['charge_type']) ? $data['charge_type'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['expire_time'] = isset($data['expire_time']) ? $data['expire_time'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['period_unit'] = isset($data['period_unit']) ? $data['period_unit'] : null;
        $this->container['resource_allocated'] = isset($data['resource_allocated']) ? $data['resource_allocated'] : null;
        $this->container['resource_capability'] = isset($data['resource_capability']) ? $data['resource_capability'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['storage_config'] = isset($data['storage_config']) ? $data['storage_config'] : null;
        $this->container['workload_network_config'] = isset($data['workload_network_config']) ? $data['workload_network_config'] : null;
        $this->container['workload_network_mode'] = isset($data['workload_network_mode']) ? $data['workload_network_mode'] : null;
        $this->container['zone_ids'] = isset($data['zone_ids']) ? $data['zone_ids'] : null;
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
     * Gets charge_type
     *
     * @return string
     */
    public function getChargeType()
    {
        return $this->container['charge_type'];
    }

    /**
     * Sets charge_type
     *
     * @param string $charge_type charge_type
     *
     * @return $this
     */
    public function setChargeType($charge_type)
    {
        $this->container['charge_type'] = $charge_type;

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
     * Gets expire_time
     *
     * @return string
     */
    public function getExpireTime()
    {
        return $this->container['expire_time'];
    }

    /**
     * Sets expire_time
     *
     * @param string $expire_time expire_time
     *
     * @return $this
     */
    public function setExpireTime($expire_time)
    {
        $this->container['expire_time'] = $expire_time;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets period_unit
     *
     * @return string
     */
    public function getPeriodUnit()
    {
        return $this->container['period_unit'];
    }

    /**
     * Sets period_unit
     *
     * @param string $period_unit period_unit
     *
     * @return $this
     */
    public function setPeriodUnit($period_unit)
    {
        $this->container['period_unit'] = $period_unit;

        return $this;
    }

    /**
     * Gets resource_allocated
     *
     * @return \Volcengine\Mlplatform20240701\Model\ResourceAllocatedForListResourceGroupsOutput
     */
    public function getResourceAllocated()
    {
        return $this->container['resource_allocated'];
    }

    /**
     * Sets resource_allocated
     *
     * @param \Volcengine\Mlplatform20240701\Model\ResourceAllocatedForListResourceGroupsOutput $resource_allocated resource_allocated
     *
     * @return $this
     */
    public function setResourceAllocated($resource_allocated)
    {
        $this->container['resource_allocated'] = $resource_allocated;

        return $this;
    }

    /**
     * Gets resource_capability
     *
     * @return \Volcengine\Mlplatform20240701\Model\ResourceCapabilityForListResourceGroupsOutput
     */
    public function getResourceCapability()
    {
        return $this->container['resource_capability'];
    }

    /**
     * Sets resource_capability
     *
     * @param \Volcengine\Mlplatform20240701\Model\ResourceCapabilityForListResourceGroupsOutput $resource_capability resource_capability
     *
     * @return $this
     */
    public function setResourceCapability($resource_capability)
    {
        $this->container['resource_capability'] = $resource_capability;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \Volcengine\Mlplatform20240701\Model\StatusForListResourceGroupsOutput
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \Volcengine\Mlplatform20240701\Model\StatusForListResourceGroupsOutput $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets storage_config
     *
     * @return \Volcengine\Mlplatform20240701\Model\StorageConfigForListResourceGroupsOutput
     */
    public function getStorageConfig()
    {
        return $this->container['storage_config'];
    }

    /**
     * Sets storage_config
     *
     * @param \Volcengine\Mlplatform20240701\Model\StorageConfigForListResourceGroupsOutput $storage_config storage_config
     *
     * @return $this
     */
    public function setStorageConfig($storage_config)
    {
        $this->container['storage_config'] = $storage_config;

        return $this;
    }

    /**
     * Gets workload_network_config
     *
     * @return \Volcengine\Mlplatform20240701\Model\WorkloadNetworkConfigForListResourceGroupsOutput
     */
    public function getWorkloadNetworkConfig()
    {
        return $this->container['workload_network_config'];
    }

    /**
     * Sets workload_network_config
     *
     * @param \Volcengine\Mlplatform20240701\Model\WorkloadNetworkConfigForListResourceGroupsOutput $workload_network_config workload_network_config
     *
     * @return $this
     */
    public function setWorkloadNetworkConfig($workload_network_config)
    {
        $this->container['workload_network_config'] = $workload_network_config;

        return $this;
    }

    /**
     * Gets workload_network_mode
     *
     * @return string
     */
    public function getWorkloadNetworkMode()
    {
        return $this->container['workload_network_mode'];
    }

    /**
     * Sets workload_network_mode
     *
     * @param string $workload_network_mode workload_network_mode
     *
     * @return $this
     */
    public function setWorkloadNetworkMode($workload_network_mode)
    {
        $this->container['workload_network_mode'] = $workload_network_mode;

        return $this;
    }

    /**
     * Gets zone_ids
     *
     * @return string[]
     */
    public function getZoneIds()
    {
        return $this->container['zone_ids'];
    }

    /**
     * Sets zone_ids
     *
     * @param string[] $zone_ids zone_ids
     *
     * @return $this
     */
    public function setZoneIds($zone_ids)
    {
        $this->container['zone_ids'] = $zone_ids;

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

