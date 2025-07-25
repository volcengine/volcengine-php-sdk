<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Secagent\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class DescribeAlarmStatOverviewV2Request implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DescribeAlarmStatOverviewV2Request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'stat_scope_type' => 'string',
        'trend_range_end_sec' => 'int',
        'trend_range_start_sec' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'stat_scope_type' => null,
        'trend_range_end_sec' => 'int64',
        'trend_range_start_sec' => 'int64'
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
        'stat_scope_type' => 'StatScopeType',
        'trend_range_end_sec' => 'TrendRangeEndSec',
        'trend_range_start_sec' => 'TrendRangeStartSec'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'stat_scope_type' => 'setStatScopeType',
        'trend_range_end_sec' => 'setTrendRangeEndSec',
        'trend_range_start_sec' => 'setTrendRangeStartSec'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'stat_scope_type' => 'getStatScopeType',
        'trend_range_end_sec' => 'getTrendRangeEndSec',
        'trend_range_start_sec' => 'getTrendRangeStartSec'
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
        $this->container['stat_scope_type'] = isset($data['stat_scope_type']) ? $data['stat_scope_type'] : null;
        $this->container['trend_range_end_sec'] = isset($data['trend_range_end_sec']) ? $data['trend_range_end_sec'] : null;
        $this->container['trend_range_start_sec'] = isset($data['trend_range_start_sec']) ? $data['trend_range_start_sec'] : null;
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
     * Gets stat_scope_type
     *
     * @return string
     */
    public function getStatScopeType()
    {
        return $this->container['stat_scope_type'];
    }

    /**
     * Sets stat_scope_type
     *
     * @param string $stat_scope_type stat_scope_type
     *
     * @return $this
     */
    public function setStatScopeType($stat_scope_type)
    {
        $this->container['stat_scope_type'] = $stat_scope_type;

        return $this;
    }

    /**
     * Gets trend_range_end_sec
     *
     * @return int
     */
    public function getTrendRangeEndSec()
    {
        return $this->container['trend_range_end_sec'];
    }

    /**
     * Sets trend_range_end_sec
     *
     * @param int $trend_range_end_sec trend_range_end_sec
     *
     * @return $this
     */
    public function setTrendRangeEndSec($trend_range_end_sec)
    {
        $this->container['trend_range_end_sec'] = $trend_range_end_sec;

        return $this;
    }

    /**
     * Gets trend_range_start_sec
     *
     * @return int
     */
    public function getTrendRangeStartSec()
    {
        return $this->container['trend_range_start_sec'];
    }

    /**
     * Sets trend_range_start_sec
     *
     * @param int $trend_range_start_sec trend_range_start_sec
     *
     * @return $this
     */
    public function setTrendRangeStartSec($trend_range_start_sec)
    {
        $this->container['trend_range_start_sec'] = $trend_range_start_sec;

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

