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

class QuerySubscriptionForListRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'QuerySubscriptionForListRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'limit' => 'int',
        'number_pool_no' => 'string',
        'offset' => 'int',
        'out_id' => 'string',
        'phone_no_a' => 'string',
        'phone_no_b' => 'string',
        'phone_no_x' => 'string',
        'phone_no_y' => 'string',
        'status' => 'int',
        'sub_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'limit' => 'int32',
        'number_pool_no' => null,
        'offset' => 'int32',
        'out_id' => null,
        'phone_no_a' => null,
        'phone_no_b' => null,
        'phone_no_x' => null,
        'phone_no_y' => null,
        'status' => 'int32',
        'sub_id' => null
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
        'number_pool_no' => 'NumberPoolNo',
        'offset' => 'Offset',
        'out_id' => 'OutId',
        'phone_no_a' => 'PhoneNoA',
        'phone_no_b' => 'PhoneNoB',
        'phone_no_x' => 'PhoneNoX',
        'phone_no_y' => 'PhoneNoY',
        'status' => 'Status',
        'sub_id' => 'SubId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'limit' => 'setLimit',
        'number_pool_no' => 'setNumberPoolNo',
        'offset' => 'setOffset',
        'out_id' => 'setOutId',
        'phone_no_a' => 'setPhoneNoA',
        'phone_no_b' => 'setPhoneNoB',
        'phone_no_x' => 'setPhoneNoX',
        'phone_no_y' => 'setPhoneNoY',
        'status' => 'setStatus',
        'sub_id' => 'setSubId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'limit' => 'getLimit',
        'number_pool_no' => 'getNumberPoolNo',
        'offset' => 'getOffset',
        'out_id' => 'getOutId',
        'phone_no_a' => 'getPhoneNoA',
        'phone_no_b' => 'getPhoneNoB',
        'phone_no_x' => 'getPhoneNoX',
        'phone_no_y' => 'getPhoneNoY',
        'status' => 'getStatus',
        'sub_id' => 'getSubId'
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
        $this->container['number_pool_no'] = isset($data['number_pool_no']) ? $data['number_pool_no'] : null;
        $this->container['offset'] = isset($data['offset']) ? $data['offset'] : null;
        $this->container['out_id'] = isset($data['out_id']) ? $data['out_id'] : null;
        $this->container['phone_no_a'] = isset($data['phone_no_a']) ? $data['phone_no_a'] : null;
        $this->container['phone_no_b'] = isset($data['phone_no_b']) ? $data['phone_no_b'] : null;
        $this->container['phone_no_x'] = isset($data['phone_no_x']) ? $data['phone_no_x'] : null;
        $this->container['phone_no_y'] = isset($data['phone_no_y']) ? $data['phone_no_y'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['sub_id'] = isset($data['sub_id']) ? $data['sub_id'] : null;
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
     * Gets out_id
     *
     * @return string
     */
    public function getOutId()
    {
        return $this->container['out_id'];
    }

    /**
     * Sets out_id
     *
     * @param string $out_id out_id
     *
     * @return $this
     */
    public function setOutId($out_id)
    {
        $this->container['out_id'] = $out_id;

        return $this;
    }

    /**
     * Gets phone_no_a
     *
     * @return string
     */
    public function getPhoneNoA()
    {
        return $this->container['phone_no_a'];
    }

    /**
     * Sets phone_no_a
     *
     * @param string $phone_no_a phone_no_a
     *
     * @return $this
     */
    public function setPhoneNoA($phone_no_a)
    {
        $this->container['phone_no_a'] = $phone_no_a;

        return $this;
    }

    /**
     * Gets phone_no_b
     *
     * @return string
     */
    public function getPhoneNoB()
    {
        return $this->container['phone_no_b'];
    }

    /**
     * Sets phone_no_b
     *
     * @param string $phone_no_b phone_no_b
     *
     * @return $this
     */
    public function setPhoneNoB($phone_no_b)
    {
        $this->container['phone_no_b'] = $phone_no_b;

        return $this;
    }

    /**
     * Gets phone_no_x
     *
     * @return string
     */
    public function getPhoneNoX()
    {
        return $this->container['phone_no_x'];
    }

    /**
     * Sets phone_no_x
     *
     * @param string $phone_no_x phone_no_x
     *
     * @return $this
     */
    public function setPhoneNoX($phone_no_x)
    {
        $this->container['phone_no_x'] = $phone_no_x;

        return $this;
    }

    /**
     * Gets phone_no_y
     *
     * @return string
     */
    public function getPhoneNoY()
    {
        return $this->container['phone_no_y'];
    }

    /**
     * Sets phone_no_y
     *
     * @param string $phone_no_y phone_no_y
     *
     * @return $this
     */
    public function setPhoneNoY($phone_no_y)
    {
        $this->container['phone_no_y'] = $phone_no_y;

        return $this;
    }

    /**
     * Gets status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param int $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets sub_id
     *
     * @return string
     */
    public function getSubId()
    {
        return $this->container['sub_id'];
    }

    /**
     * Sets sub_id
     *
     * @param string $sub_id sub_id
     *
     * @return $this
     */
    public function setSubId($sub_id)
    {
        $this->container['sub_id'] = $sub_id;

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

