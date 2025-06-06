<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Seccenter20240508\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class GetIntrusionRiskTrendsResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetIntrusionRiskTrendsResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'critical_trends' => '\Volcengine\Seccenter20240508\Model\CriticalTrendForGetIntrusionRiskTrendsOutput[]',
        'high_trends' => '\Volcengine\Seccenter20240508\Model\HighTrendForGetIntrusionRiskTrendsOutput[]',
        'low_trends' => '\Volcengine\Seccenter20240508\Model\LowTrendForGetIntrusionRiskTrendsOutput[]',
        'medium_trends' => '\Volcengine\Seccenter20240508\Model\MediumTrendForGetIntrusionRiskTrendsOutput[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'critical_trends' => null,
        'high_trends' => null,
        'low_trends' => null,
        'medium_trends' => null
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
        'critical_trends' => 'CriticalTrends',
        'high_trends' => 'HighTrends',
        'low_trends' => 'LowTrends',
        'medium_trends' => 'MediumTrends'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'critical_trends' => 'setCriticalTrends',
        'high_trends' => 'setHighTrends',
        'low_trends' => 'setLowTrends',
        'medium_trends' => 'setMediumTrends'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'critical_trends' => 'getCriticalTrends',
        'high_trends' => 'getHighTrends',
        'low_trends' => 'getLowTrends',
        'medium_trends' => 'getMediumTrends'
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
        $this->container['critical_trends'] = isset($data['critical_trends']) ? $data['critical_trends'] : null;
        $this->container['high_trends'] = isset($data['high_trends']) ? $data['high_trends'] : null;
        $this->container['low_trends'] = isset($data['low_trends']) ? $data['low_trends'] : null;
        $this->container['medium_trends'] = isset($data['medium_trends']) ? $data['medium_trends'] : null;
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
     * Gets critical_trends
     *
     * @return \Volcengine\Seccenter20240508\Model\CriticalTrendForGetIntrusionRiskTrendsOutput[]
     */
    public function getCriticalTrends()
    {
        return $this->container['critical_trends'];
    }

    /**
     * Sets critical_trends
     *
     * @param \Volcengine\Seccenter20240508\Model\CriticalTrendForGetIntrusionRiskTrendsOutput[] $critical_trends critical_trends
     *
     * @return $this
     */
    public function setCriticalTrends($critical_trends)
    {
        $this->container['critical_trends'] = $critical_trends;

        return $this;
    }

    /**
     * Gets high_trends
     *
     * @return \Volcengine\Seccenter20240508\Model\HighTrendForGetIntrusionRiskTrendsOutput[]
     */
    public function getHighTrends()
    {
        return $this->container['high_trends'];
    }

    /**
     * Sets high_trends
     *
     * @param \Volcengine\Seccenter20240508\Model\HighTrendForGetIntrusionRiskTrendsOutput[] $high_trends high_trends
     *
     * @return $this
     */
    public function setHighTrends($high_trends)
    {
        $this->container['high_trends'] = $high_trends;

        return $this;
    }

    /**
     * Gets low_trends
     *
     * @return \Volcengine\Seccenter20240508\Model\LowTrendForGetIntrusionRiskTrendsOutput[]
     */
    public function getLowTrends()
    {
        return $this->container['low_trends'];
    }

    /**
     * Sets low_trends
     *
     * @param \Volcengine\Seccenter20240508\Model\LowTrendForGetIntrusionRiskTrendsOutput[] $low_trends low_trends
     *
     * @return $this
     */
    public function setLowTrends($low_trends)
    {
        $this->container['low_trends'] = $low_trends;

        return $this;
    }

    /**
     * Gets medium_trends
     *
     * @return \Volcengine\Seccenter20240508\Model\MediumTrendForGetIntrusionRiskTrendsOutput[]
     */
    public function getMediumTrends()
    {
        return $this->container['medium_trends'];
    }

    /**
     * Sets medium_trends
     *
     * @param \Volcengine\Seccenter20240508\Model\MediumTrendForGetIntrusionRiskTrendsOutput[] $medium_trends medium_trends
     *
     * @return $this
     */
    public function setMediumTrends($medium_trends)
    {
        $this->container['medium_trends'] = $medium_trends;

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

