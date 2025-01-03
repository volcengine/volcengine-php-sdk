<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Advdefence\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class DescWebAtkOverviewResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DescWebAtkOverviewResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'attack_count' => 'int',
        'attack_ip_count' => 'int',
        'peak_attack_qps' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'attack_count' => 'int32',
        'attack_ip_count' => 'int32',
        'peak_attack_qps' => 'int32'
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
        'attack_count' => 'AttackCount',
        'attack_ip_count' => 'AttackIPCount',
        'peak_attack_qps' => 'PeakAttackQps'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'attack_count' => 'setAttackCount',
        'attack_ip_count' => 'setAttackIpCount',
        'peak_attack_qps' => 'setPeakAttackQps'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'attack_count' => 'getAttackCount',
        'attack_ip_count' => 'getAttackIpCount',
        'peak_attack_qps' => 'getPeakAttackQps'
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
        $this->container['attack_count'] = isset($data['attack_count']) ? $data['attack_count'] : null;
        $this->container['attack_ip_count'] = isset($data['attack_ip_count']) ? $data['attack_ip_count'] : null;
        $this->container['peak_attack_qps'] = isset($data['peak_attack_qps']) ? $data['peak_attack_qps'] : null;
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
     * Gets attack_count
     *
     * @return int
     */
    public function getAttackCount()
    {
        return $this->container['attack_count'];
    }

    /**
     * Sets attack_count
     *
     * @param int $attack_count attack_count
     *
     * @return $this
     */
    public function setAttackCount($attack_count)
    {
        $this->container['attack_count'] = $attack_count;

        return $this;
    }

    /**
     * Gets attack_ip_count
     *
     * @return int
     */
    public function getAttackIpCount()
    {
        return $this->container['attack_ip_count'];
    }

    /**
     * Sets attack_ip_count
     *
     * @param int $attack_ip_count attack_ip_count
     *
     * @return $this
     */
    public function setAttackIpCount($attack_ip_count)
    {
        $this->container['attack_ip_count'] = $attack_ip_count;

        return $this;
    }

    /**
     * Gets peak_attack_qps
     *
     * @return int
     */
    public function getPeakAttackQps()
    {
        return $this->container['peak_attack_qps'];
    }

    /**
     * Sets peak_attack_qps
     *
     * @param int $peak_attack_qps peak_attack_qps
     *
     * @return $this
     */
    public function setPeakAttackQps($peak_attack_qps)
    {
        $this->container['peak_attack_qps'] = $peak_attack_qps;

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

