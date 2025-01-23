<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Kms\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class MultiRegionConfigurationForDescribeKeysOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'MultiRegionConfigurationForDescribeKeysOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'multi_region_key_type' => 'string',
        'primary_key' => '\Volcengine\Kms\Model\PrimaryKeyForDescribeKeysOutput',
        'replica_keys' => '\Volcengine\Kms\Model\ReplicaKeyForDescribeKeysOutput[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'multi_region_key_type' => null,
        'primary_key' => null,
        'replica_keys' => null
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
        'multi_region_key_type' => 'MultiRegionKeyType',
        'primary_key' => 'PrimaryKey',
        'replica_keys' => 'ReplicaKeys'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'multi_region_key_type' => 'setMultiRegionKeyType',
        'primary_key' => 'setPrimaryKey',
        'replica_keys' => 'setReplicaKeys'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'multi_region_key_type' => 'getMultiRegionKeyType',
        'primary_key' => 'getPrimaryKey',
        'replica_keys' => 'getReplicaKeys'
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

    const MULTI_REGION_KEY_TYPE_PRIMARY = 'PRIMARY';
    const MULTI_REGION_KEY_TYPE_REPLICA = 'REPLICA';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMultiRegionKeyTypeAllowableValues()
    {
        return [
            self::MULTI_REGION_KEY_TYPE_PRIMARY,
            self::MULTI_REGION_KEY_TYPE_REPLICA,
        ];
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
        $this->container['multi_region_key_type'] = isset($data['multi_region_key_type']) ? $data['multi_region_key_type'] : null;
        $this->container['primary_key'] = isset($data['primary_key']) ? $data['primary_key'] : null;
        $this->container['replica_keys'] = isset($data['replica_keys']) ? $data['replica_keys'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getMultiRegionKeyTypeAllowableValues();
        if (!is_null($this->container['multi_region_key_type']) && !in_array($this->container['multi_region_key_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'multi_region_key_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

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
     * Gets multi_region_key_type
     *
     * @return string
     */
    public function getMultiRegionKeyType()
    {
        return $this->container['multi_region_key_type'];
    }

    /**
     * Sets multi_region_key_type
     *
     * @param string $multi_region_key_type multi_region_key_type
     *
     * @return $this
     */
    public function setMultiRegionKeyType($multi_region_key_type)
    {
        $allowedValues = $this->getMultiRegionKeyTypeAllowableValues();
        if (!is_null($multi_region_key_type) && !in_array($multi_region_key_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'multi_region_key_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['multi_region_key_type'] = $multi_region_key_type;

        return $this;
    }

    /**
     * Gets primary_key
     *
     * @return \Volcengine\Kms\Model\PrimaryKeyForDescribeKeysOutput
     */
    public function getPrimaryKey()
    {
        return $this->container['primary_key'];
    }

    /**
     * Sets primary_key
     *
     * @param \Volcengine\Kms\Model\PrimaryKeyForDescribeKeysOutput $primary_key primary_key
     *
     * @return $this
     */
    public function setPrimaryKey($primary_key)
    {
        $this->container['primary_key'] = $primary_key;

        return $this;
    }

    /**
     * Gets replica_keys
     *
     * @return \Volcengine\Kms\Model\ReplicaKeyForDescribeKeysOutput[]
     */
    public function getReplicaKeys()
    {
        return $this->container['replica_keys'];
    }

    /**
     * Sets replica_keys
     *
     * @param \Volcengine\Kms\Model\ReplicaKeyForDescribeKeysOutput[] $replica_keys replica_keys
     *
     * @return $this
     */
    public function setReplicaKeys($replica_keys)
    {
        $this->container['replica_keys'] = $replica_keys;

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

