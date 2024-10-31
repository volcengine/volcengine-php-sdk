<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Waf\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class AccurateRuleForCreateAclRuleInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'AccurateRuleForCreateAclRuleInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'http_obj' => 'string',
        'obj_type' => 'int',
        'opretar' => 'int',
        'property' => 'int',
        'value_string' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'http_obj' => null,
        'obj_type' => 'int32',
        'opretar' => 'int32',
        'property' => 'int32',
        'value_string' => null
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
        'http_obj' => 'HttpObj',
        'obj_type' => 'ObjType',
        'opretar' => 'Opretar',
        'property' => 'Property',
        'value_string' => 'ValueString'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'http_obj' => 'setHttpObj',
        'obj_type' => 'setObjType',
        'opretar' => 'setOpretar',
        'property' => 'setProperty',
        'value_string' => 'setValueString'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'http_obj' => 'getHttpObj',
        'obj_type' => 'getObjType',
        'opretar' => 'getOpretar',
        'property' => 'getProperty',
        'value_string' => 'getValueString'
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
        $this->container['http_obj'] = isset($data['http_obj']) ? $data['http_obj'] : null;
        $this->container['obj_type'] = isset($data['obj_type']) ? $data['obj_type'] : null;
        $this->container['opretar'] = isset($data['opretar']) ? $data['opretar'] : null;
        $this->container['property'] = isset($data['property']) ? $data['property'] : null;
        $this->container['value_string'] = isset($data['value_string']) ? $data['value_string'] : null;
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
     * Gets http_obj
     *
     * @return string
     */
    public function getHttpObj()
    {
        return $this->container['http_obj'];
    }

    /**
     * Sets http_obj
     *
     * @param string $http_obj http_obj
     *
     * @return $this
     */
    public function setHttpObj($http_obj)
    {
        $this->container['http_obj'] = $http_obj;

        return $this;
    }

    /**
     * Gets obj_type
     *
     * @return int
     */
    public function getObjType()
    {
        return $this->container['obj_type'];
    }

    /**
     * Sets obj_type
     *
     * @param int $obj_type obj_type
     *
     * @return $this
     */
    public function setObjType($obj_type)
    {
        $this->container['obj_type'] = $obj_type;

        return $this;
    }

    /**
     * Gets opretar
     *
     * @return int
     */
    public function getOpretar()
    {
        return $this->container['opretar'];
    }

    /**
     * Sets opretar
     *
     * @param int $opretar opretar
     *
     * @return $this
     */
    public function setOpretar($opretar)
    {
        $this->container['opretar'] = $opretar;

        return $this;
    }

    /**
     * Gets property
     *
     * @return int
     */
    public function getProperty()
    {
        return $this->container['property'];
    }

    /**
     * Sets property
     *
     * @param int $property property
     *
     * @return $this
     */
    public function setProperty($property)
    {
        $this->container['property'] = $property;

        return $this;
    }

    /**
     * Gets value_string
     *
     * @return string
     */
    public function getValueString()
    {
        return $this->container['value_string'];
    }

    /**
     * Sets value_string
     *
     * @param string $value_string value_string
     *
     * @return $this
     */
    public function setValueString($value_string)
    {
        $this->container['value_string'] = $value_string;

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
