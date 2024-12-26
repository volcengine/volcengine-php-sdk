<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vpc\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class DescribeIpv6EgressOnlyRulesRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DescribeIpv6EgressOnlyRulesRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'instance_id' => 'string',
        'ipv6_address' => 'string',
        'ipv6_egress_only_rule_ids' => 'string',
        'ipv6_gateway_id' => 'string',
        'max_results' => 'int',
        'name' => 'string',
        'next_token' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'instance_id' => null,
        'ipv6_address' => null,
        'ipv6_egress_only_rule_ids' => null,
        'ipv6_gateway_id' => null,
        'max_results' => null,
        'name' => null,
        'next_token' => null
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
        'instance_id' => 'InstanceId',
        'ipv6_address' => 'Ipv6Address',
        'ipv6_egress_only_rule_ids' => 'Ipv6EgressOnlyRuleIds',
        'ipv6_gateway_id' => 'Ipv6GatewayId',
        'max_results' => 'MaxResults',
        'name' => 'Name',
        'next_token' => 'NextToken'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'instance_id' => 'setInstanceId',
        'ipv6_address' => 'setIpv6Address',
        'ipv6_egress_only_rule_ids' => 'setIpv6EgressOnlyRuleIds',
        'ipv6_gateway_id' => 'setIpv6GatewayId',
        'max_results' => 'setMaxResults',
        'name' => 'setName',
        'next_token' => 'setNextToken'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'instance_id' => 'getInstanceId',
        'ipv6_address' => 'getIpv6Address',
        'ipv6_egress_only_rule_ids' => 'getIpv6EgressOnlyRuleIds',
        'ipv6_gateway_id' => 'getIpv6GatewayId',
        'max_results' => 'getMaxResults',
        'name' => 'getName',
        'next_token' => 'getNextToken'
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
        $this->container['instance_id'] = isset($data['instance_id']) ? $data['instance_id'] : null;
        $this->container['ipv6_address'] = isset($data['ipv6_address']) ? $data['ipv6_address'] : null;
        $this->container['ipv6_egress_only_rule_ids'] = isset($data['ipv6_egress_only_rule_ids']) ? $data['ipv6_egress_only_rule_ids'] : null;
        $this->container['ipv6_gateway_id'] = isset($data['ipv6_gateway_id']) ? $data['ipv6_gateway_id'] : null;
        $this->container['max_results'] = isset($data['max_results']) ? $data['max_results'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['next_token'] = isset($data['next_token']) ? $data['next_token'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['ipv6_gateway_id'] === null) {
            $invalidProperties[] = "'ipv6_gateway_id' can't be null";
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
     * Gets instance_id
     *
     * @return string
     */
    public function getInstanceId()
    {
        return $this->container['instance_id'];
    }

    /**
     * Sets instance_id
     *
     * @param string $instance_id instance_id
     *
     * @return $this
     */
    public function setInstanceId($instance_id)
    {
        $this->container['instance_id'] = $instance_id;

        return $this;
    }

    /**
     * Gets ipv6_address
     *
     * @return string
     */
    public function getIpv6Address()
    {
        return $this->container['ipv6_address'];
    }

    /**
     * Sets ipv6_address
     *
     * @param string $ipv6_address ipv6_address
     *
     * @return $this
     */
    public function setIpv6Address($ipv6_address)
    {
        $this->container['ipv6_address'] = $ipv6_address;

        return $this;
    }

    /**
     * Gets ipv6_egress_only_rule_ids
     *
     * @return string
     */
    public function getIpv6EgressOnlyRuleIds()
    {
        return $this->container['ipv6_egress_only_rule_ids'];
    }

    /**
     * Sets ipv6_egress_only_rule_ids
     *
     * @param string $ipv6_egress_only_rule_ids ipv6_egress_only_rule_ids
     *
     * @return $this
     */
    public function setIpv6EgressOnlyRuleIds($ipv6_egress_only_rule_ids)
    {
        $this->container['ipv6_egress_only_rule_ids'] = $ipv6_egress_only_rule_ids;

        return $this;
    }

    /**
     * Gets ipv6_gateway_id
     *
     * @return string
     */
    public function getIpv6GatewayId()
    {
        return $this->container['ipv6_gateway_id'];
    }

    /**
     * Sets ipv6_gateway_id
     *
     * @param string $ipv6_gateway_id ipv6_gateway_id
     *
     * @return $this
     */
    public function setIpv6GatewayId($ipv6_gateway_id)
    {
        $this->container['ipv6_gateway_id'] = $ipv6_gateway_id;

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
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

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
