<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Acep\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class ListCustomRouteRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ListCustomRouteRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'custom_route_id' => 'string',
        'custom_route_name' => 'string',
        'dst_ip' => 'string',
        'max_results' => 'int',
        'next_token' => 'string',
        'product_id' => 'string',
        'zone' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'custom_route_id' => null,
        'custom_route_name' => null,
        'dst_ip' => null,
        'max_results' => 'int32',
        'next_token' => null,
        'product_id' => null,
        'zone' => null
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
        'custom_route_id' => 'CustomRouteId',
        'custom_route_name' => 'CustomRouteName',
        'dst_ip' => 'DstIP',
        'max_results' => 'MaxResults',
        'next_token' => 'NextToken',
        'product_id' => 'ProductId',
        'zone' => 'Zone'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'custom_route_id' => 'setCustomRouteId',
        'custom_route_name' => 'setCustomRouteName',
        'dst_ip' => 'setDstIp',
        'max_results' => 'setMaxResults',
        'next_token' => 'setNextToken',
        'product_id' => 'setProductId',
        'zone' => 'setZone'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'custom_route_id' => 'getCustomRouteId',
        'custom_route_name' => 'getCustomRouteName',
        'dst_ip' => 'getDstIp',
        'max_results' => 'getMaxResults',
        'next_token' => 'getNextToken',
        'product_id' => 'getProductId',
        'zone' => 'getZone'
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
        $this->container['custom_route_id'] = isset($data['custom_route_id']) ? $data['custom_route_id'] : null;
        $this->container['custom_route_name'] = isset($data['custom_route_name']) ? $data['custom_route_name'] : null;
        $this->container['dst_ip'] = isset($data['dst_ip']) ? $data['dst_ip'] : null;
        $this->container['max_results'] = isset($data['max_results']) ? $data['max_results'] : null;
        $this->container['next_token'] = isset($data['next_token']) ? $data['next_token'] : null;
        $this->container['product_id'] = isset($data['product_id']) ? $data['product_id'] : null;
        $this->container['zone'] = isset($data['zone']) ? $data['zone'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['product_id'] === null) {
            $invalidProperties[] = "'product_id' can't be null";
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
     * Gets custom_route_id
     *
     * @return string
     */
    public function getCustomRouteId()
    {
        return $this->container['custom_route_id'];
    }

    /**
     * Sets custom_route_id
     *
     * @param string $custom_route_id custom_route_id
     *
     * @return $this
     */
    public function setCustomRouteId($custom_route_id)
    {
        $this->container['custom_route_id'] = $custom_route_id;

        return $this;
    }

    /**
     * Gets custom_route_name
     *
     * @return string
     */
    public function getCustomRouteName()
    {
        return $this->container['custom_route_name'];
    }

    /**
     * Sets custom_route_name
     *
     * @param string $custom_route_name custom_route_name
     *
     * @return $this
     */
    public function setCustomRouteName($custom_route_name)
    {
        $this->container['custom_route_name'] = $custom_route_name;

        return $this;
    }

    /**
     * Gets dst_ip
     *
     * @return string
     */
    public function getDstIp()
    {
        return $this->container['dst_ip'];
    }

    /**
     * Sets dst_ip
     *
     * @param string $dst_ip dst_ip
     *
     * @return $this
     */
    public function setDstIp($dst_ip)
    {
        $this->container['dst_ip'] = $dst_ip;

        return $this;
    }

    /**
     * Gets max_results
     *
     * @return int
     */
    public function getMaxResults()
    {
        return $this->container['max_results'];
    }

    /**
     * Sets max_results
     *
     * @param int $max_results max_results
     *
     * @return $this
     */
    public function setMaxResults($max_results)
    {
        $this->container['max_results'] = $max_results;

        return $this;
    }

    /**
     * Gets next_token
     *
     * @return string
     */
    public function getNextToken()
    {
        return $this->container['next_token'];
    }

    /**
     * Sets next_token
     *
     * @param string $next_token next_token
     *
     * @return $this
     */
    public function setNextToken($next_token)
    {
        $this->container['next_token'] = $next_token;

        return $this;
    }

    /**
     * Gets product_id
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->container['product_id'];
    }

    /**
     * Sets product_id
     *
     * @param string $product_id product_id
     *
     * @return $this
     */
    public function setProductId($product_id)
    {
        $this->container['product_id'] = $product_id;

        return $this;
    }

    /**
     * Gets zone
     *
     * @return string
     */
    public function getZone()
    {
        return $this->container['zone'];
    }

    /**
     * Sets zone
     *
     * @param string $zone zone
     *
     * @return $this
     */
    public function setZone($zone)
    {
        $this->container['zone'] = $zone;

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

