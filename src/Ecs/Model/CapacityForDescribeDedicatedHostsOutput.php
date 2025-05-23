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

class CapacityForDescribeDedicatedHostsOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CapacityForDescribeDedicatedHostsOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'available_memory' => 'int',
        'available_vcpus' => 'int',
        'local_volume_capacities' => '\Volcengine\Ecs\Model\LocalVolumeCapacityForDescribeDedicatedHostsOutput[]',
        'total_memory' => 'int',
        'total_vcpus' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'available_memory' => 'int32',
        'available_vcpus' => 'int32',
        'local_volume_capacities' => null,
        'total_memory' => 'int32',
        'total_vcpus' => 'int32'
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
        'available_memory' => 'AvailableMemory',
        'available_vcpus' => 'AvailableVcpus',
        'local_volume_capacities' => 'LocalVolumeCapacities',
        'total_memory' => 'TotalMemory',
        'total_vcpus' => 'TotalVcpus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'available_memory' => 'setAvailableMemory',
        'available_vcpus' => 'setAvailableVcpus',
        'local_volume_capacities' => 'setLocalVolumeCapacities',
        'total_memory' => 'setTotalMemory',
        'total_vcpus' => 'setTotalVcpus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'available_memory' => 'getAvailableMemory',
        'available_vcpus' => 'getAvailableVcpus',
        'local_volume_capacities' => 'getLocalVolumeCapacities',
        'total_memory' => 'getTotalMemory',
        'total_vcpus' => 'getTotalVcpus'
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
        $this->container['available_memory'] = isset($data['available_memory']) ? $data['available_memory'] : null;
        $this->container['available_vcpus'] = isset($data['available_vcpus']) ? $data['available_vcpus'] : null;
        $this->container['local_volume_capacities'] = isset($data['local_volume_capacities']) ? $data['local_volume_capacities'] : null;
        $this->container['total_memory'] = isset($data['total_memory']) ? $data['total_memory'] : null;
        $this->container['total_vcpus'] = isset($data['total_vcpus']) ? $data['total_vcpus'] : null;
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
     * Gets available_memory
     *
     * @return int
     */
    public function getAvailableMemory()
    {
        return $this->container['available_memory'];
    }

    /**
     * Sets available_memory
     *
     * @param int $available_memory available_memory
     *
     * @return $this
     */
    public function setAvailableMemory($available_memory)
    {
        $this->container['available_memory'] = $available_memory;

        return $this;
    }

    /**
     * Gets available_vcpus
     *
     * @return int
     */
    public function getAvailableVcpus()
    {
        return $this->container['available_vcpus'];
    }

    /**
     * Sets available_vcpus
     *
     * @param int $available_vcpus available_vcpus
     *
     * @return $this
     */
    public function setAvailableVcpus($available_vcpus)
    {
        $this->container['available_vcpus'] = $available_vcpus;

        return $this;
    }

    /**
     * Gets local_volume_capacities
     *
     * @return \Volcengine\Ecs\Model\LocalVolumeCapacityForDescribeDedicatedHostsOutput[]
     */
    public function getLocalVolumeCapacities()
    {
        return $this->container['local_volume_capacities'];
    }

    /**
     * Sets local_volume_capacities
     *
     * @param \Volcengine\Ecs\Model\LocalVolumeCapacityForDescribeDedicatedHostsOutput[] $local_volume_capacities local_volume_capacities
     *
     * @return $this
     */
    public function setLocalVolumeCapacities($local_volume_capacities)
    {
        $this->container['local_volume_capacities'] = $local_volume_capacities;

        return $this;
    }

    /**
     * Gets total_memory
     *
     * @return int
     */
    public function getTotalMemory()
    {
        return $this->container['total_memory'];
    }

    /**
     * Sets total_memory
     *
     * @param int $total_memory total_memory
     *
     * @return $this
     */
    public function setTotalMemory($total_memory)
    {
        $this->container['total_memory'] = $total_memory;

        return $this;
    }

    /**
     * Gets total_vcpus
     *
     * @return int
     */
    public function getTotalVcpus()
    {
        return $this->container['total_vcpus'];
    }

    /**
     * Sets total_vcpus
     *
     * @param int $total_vcpus total_vcpus
     *
     * @return $this
     */
    public function setTotalVcpus($total_vcpus)
    {
        $this->container['total_vcpus'] = $total_vcpus;

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

