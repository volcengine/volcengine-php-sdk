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

class StatusForGetServiceOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'StatusForGetServiceOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'available_replicas' => 'int',
        'expected_replicias' => 'int',
        'expected_updated_replicas' => 'int',
        'total_replicas' => 'int',
        'updated_available_replicas' => 'int',
        'updated_replicas' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'available_replicas' => 'int32',
        'expected_replicias' => 'int32',
        'expected_updated_replicas' => 'int32',
        'total_replicas' => 'int32',
        'updated_available_replicas' => 'int32',
        'updated_replicas' => 'int32'
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
        'available_replicas' => 'AvailableReplicas',
        'expected_replicias' => 'ExpectedReplicias',
        'expected_updated_replicas' => 'ExpectedUpdatedReplicas',
        'total_replicas' => 'TotalReplicas',
        'updated_available_replicas' => 'UpdatedAvailableReplicas',
        'updated_replicas' => 'UpdatedReplicas'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'available_replicas' => 'setAvailableReplicas',
        'expected_replicias' => 'setExpectedReplicias',
        'expected_updated_replicas' => 'setExpectedUpdatedReplicas',
        'total_replicas' => 'setTotalReplicas',
        'updated_available_replicas' => 'setUpdatedAvailableReplicas',
        'updated_replicas' => 'setUpdatedReplicas'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'available_replicas' => 'getAvailableReplicas',
        'expected_replicias' => 'getExpectedReplicias',
        'expected_updated_replicas' => 'getExpectedUpdatedReplicas',
        'total_replicas' => 'getTotalReplicas',
        'updated_available_replicas' => 'getUpdatedAvailableReplicas',
        'updated_replicas' => 'getUpdatedReplicas'
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
        $this->container['available_replicas'] = isset($data['available_replicas']) ? $data['available_replicas'] : null;
        $this->container['expected_replicias'] = isset($data['expected_replicias']) ? $data['expected_replicias'] : null;
        $this->container['expected_updated_replicas'] = isset($data['expected_updated_replicas']) ? $data['expected_updated_replicas'] : null;
        $this->container['total_replicas'] = isset($data['total_replicas']) ? $data['total_replicas'] : null;
        $this->container['updated_available_replicas'] = isset($data['updated_available_replicas']) ? $data['updated_available_replicas'] : null;
        $this->container['updated_replicas'] = isset($data['updated_replicas']) ? $data['updated_replicas'] : null;
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
     * Gets available_replicas
     *
     * @return int
     */
    public function getAvailableReplicas()
    {
        return $this->container['available_replicas'];
    }

    /**
     * Sets available_replicas
     *
     * @param int $available_replicas available_replicas
     *
     * @return $this
     */
    public function setAvailableReplicas($available_replicas)
    {
        $this->container['available_replicas'] = $available_replicas;

        return $this;
    }

    /**
     * Gets expected_replicias
     *
     * @return int
     */
    public function getExpectedReplicias()
    {
        return $this->container['expected_replicias'];
    }

    /**
     * Sets expected_replicias
     *
     * @param int $expected_replicias expected_replicias
     *
     * @return $this
     */
    public function setExpectedReplicias($expected_replicias)
    {
        $this->container['expected_replicias'] = $expected_replicias;

        return $this;
    }

    /**
     * Gets expected_updated_replicas
     *
     * @return int
     */
    public function getExpectedUpdatedReplicas()
    {
        return $this->container['expected_updated_replicas'];
    }

    /**
     * Sets expected_updated_replicas
     *
     * @param int $expected_updated_replicas expected_updated_replicas
     *
     * @return $this
     */
    public function setExpectedUpdatedReplicas($expected_updated_replicas)
    {
        $this->container['expected_updated_replicas'] = $expected_updated_replicas;

        return $this;
    }

    /**
     * Gets total_replicas
     *
     * @return int
     */
    public function getTotalReplicas()
    {
        return $this->container['total_replicas'];
    }

    /**
     * Sets total_replicas
     *
     * @param int $total_replicas total_replicas
     *
     * @return $this
     */
    public function setTotalReplicas($total_replicas)
    {
        $this->container['total_replicas'] = $total_replicas;

        return $this;
    }

    /**
     * Gets updated_available_replicas
     *
     * @return int
     */
    public function getUpdatedAvailableReplicas()
    {
        return $this->container['updated_available_replicas'];
    }

    /**
     * Sets updated_available_replicas
     *
     * @param int $updated_available_replicas updated_available_replicas
     *
     * @return $this
     */
    public function setUpdatedAvailableReplicas($updated_available_replicas)
    {
        $this->container['updated_available_replicas'] = $updated_available_replicas;

        return $this;
    }

    /**
     * Gets updated_replicas
     *
     * @return int
     */
    public function getUpdatedReplicas()
    {
        return $this->container['updated_replicas'];
    }

    /**
     * Sets updated_replicas
     *
     * @param int $updated_replicas updated_replicas
     *
     * @return $this
     */
    public function setUpdatedReplicas($updated_replicas)
    {
        $this->container['updated_replicas'] = $updated_replicas;

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

