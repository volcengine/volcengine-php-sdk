<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vms\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class NumberPoolListRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'NumberPoolListRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'limit' => 'int',
        'number_pool_name' => 'string',
        'number_pool_no' => 'string',
        'offset' => 'int',
        'service_type' => 'int',
        'sub_service_type' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'limit' => 'int32',
        'number_pool_name' => null,
        'number_pool_no' => null,
        'offset' => 'int32',
        'service_type' => 'int32',
        'sub_service_type' => 'int32'
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
        'limit' => 'Limit',
        'number_pool_name' => 'NumberPoolName',
        'number_pool_no' => 'NumberPoolNo',
        'offset' => 'Offset',
        'service_type' => 'ServiceType',
        'sub_service_type' => 'SubServiceType'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'limit' => 'setLimit',
        'number_pool_name' => 'setNumberPoolName',
        'number_pool_no' => 'setNumberPoolNo',
        'offset' => 'setOffset',
        'service_type' => 'setServiceType',
        'sub_service_type' => 'setSubServiceType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'limit' => 'getLimit',
        'number_pool_name' => 'getNumberPoolName',
        'number_pool_no' => 'getNumberPoolNo',
        'offset' => 'getOffset',
        'service_type' => 'getServiceType',
        'sub_service_type' => 'getSubServiceType'
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
        $this->container['limit'] = isset($data['limit']) ? $data['limit'] : null;
        $this->container['number_pool_name'] = isset($data['number_pool_name']) ? $data['number_pool_name'] : null;
        $this->container['number_pool_no'] = isset($data['number_pool_no']) ? $data['number_pool_no'] : null;
        $this->container['offset'] = isset($data['offset']) ? $data['offset'] : null;
        $this->container['service_type'] = isset($data['service_type']) ? $data['service_type'] : null;
        $this->container['sub_service_type'] = isset($data['sub_service_type']) ? $data['sub_service_type'] : null;
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
     * Gets limit
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->container['limit'];
    }

    /**
     * Sets limit
     *
     * @param int $limit limit
     *
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->container['limit'] = $limit;

        return $this;
    }

    /**
     * Gets number_pool_name
     *
     * @return string
     */
    public function getNumberPoolName()
    {
        return $this->container['number_pool_name'];
    }

    /**
     * Sets number_pool_name
     *
     * @param string $number_pool_name number_pool_name
     *
     * @return $this
     */
    public function setNumberPoolName($number_pool_name)
    {
        $this->container['number_pool_name'] = $number_pool_name;

        return $this;
    }

    /**
     * Gets number_pool_no
     *
     * @return string
     */
    public function getNumberPoolNo()
    {
        return $this->container['number_pool_no'];
    }

    /**
     * Sets number_pool_no
     *
     * @param string $number_pool_no number_pool_no
     *
     * @return $this
     */
    public function setNumberPoolNo($number_pool_no)
    {
        $this->container['number_pool_no'] = $number_pool_no;

        return $this;
    }

    /**
     * Gets offset
     *
     * @return int
     */
    public function getOffset()
    {
        return $this->container['offset'];
    }

    /**
     * Sets offset
     *
     * @param int $offset offset
     *
     * @return $this
     */
    public function setOffset($offset)
    {
        $this->container['offset'] = $offset;

        return $this;
    }

    /**
     * Gets service_type
     *
     * @return int
     */
    public function getServiceType()
    {
        return $this->container['service_type'];
    }

    /**
     * Sets service_type
     *
     * @param int $service_type service_type
     *
     * @return $this
     */
    public function setServiceType($service_type)
    {
        $this->container['service_type'] = $service_type;

        return $this;
    }

    /**
     * Gets sub_service_type
     *
     * @return int
     */
    public function getSubServiceType()
    {
        return $this->container['sub_service_type'];
    }

    /**
     * Sets sub_service_type
     *
     * @param int $sub_service_type sub_service_type
     *
     * @return $this
     */
    public function setSubServiceType($sub_service_type)
    {
        $this->container['sub_service_type'] = $sub_service_type;

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

