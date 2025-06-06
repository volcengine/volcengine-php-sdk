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

class ConditionsForModifyAutoDefenseRuleInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ConditionsForModifyAutoDefenseRuleInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'agent_id' => 'string',
        'agent_ip' => 'string',
        'agent_tags' => 'string[]',
        'cloud_providers' => 'string[]',
        'hostname' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'agent_id' => null,
        'agent_ip' => null,
        'agent_tags' => null,
        'cloud_providers' => null,
        'hostname' => null
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
        'agent_id' => 'AgentID',
        'agent_ip' => 'AgentIP',
        'agent_tags' => 'AgentTags',
        'cloud_providers' => 'CloudProviders',
        'hostname' => 'Hostname'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'agent_id' => 'setAgentId',
        'agent_ip' => 'setAgentIp',
        'agent_tags' => 'setAgentTags',
        'cloud_providers' => 'setCloudProviders',
        'hostname' => 'setHostname'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'agent_id' => 'getAgentId',
        'agent_ip' => 'getAgentIp',
        'agent_tags' => 'getAgentTags',
        'cloud_providers' => 'getCloudProviders',
        'hostname' => 'getHostname'
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
        $this->container['agent_id'] = isset($data['agent_id']) ? $data['agent_id'] : null;
        $this->container['agent_ip'] = isset($data['agent_ip']) ? $data['agent_ip'] : null;
        $this->container['agent_tags'] = isset($data['agent_tags']) ? $data['agent_tags'] : null;
        $this->container['cloud_providers'] = isset($data['cloud_providers']) ? $data['cloud_providers'] : null;
        $this->container['hostname'] = isset($data['hostname']) ? $data['hostname'] : null;
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
     * Gets agent_id
     *
     * @return string
     */
    public function getAgentId()
    {
        return $this->container['agent_id'];
    }

    /**
     * Sets agent_id
     *
     * @param string $agent_id agent_id
     *
     * @return $this
     */
    public function setAgentId($agent_id)
    {
        $this->container['agent_id'] = $agent_id;

        return $this;
    }

    /**
     * Gets agent_ip
     *
     * @return string
     */
    public function getAgentIp()
    {
        return $this->container['agent_ip'];
    }

    /**
     * Sets agent_ip
     *
     * @param string $agent_ip agent_ip
     *
     * @return $this
     */
    public function setAgentIp($agent_ip)
    {
        $this->container['agent_ip'] = $agent_ip;

        return $this;
    }

    /**
     * Gets agent_tags
     *
     * @return string[]
     */
    public function getAgentTags()
    {
        return $this->container['agent_tags'];
    }

    /**
     * Sets agent_tags
     *
     * @param string[] $agent_tags agent_tags
     *
     * @return $this
     */
    public function setAgentTags($agent_tags)
    {
        $this->container['agent_tags'] = $agent_tags;

        return $this;
    }

    /**
     * Gets cloud_providers
     *
     * @return string[]
     */
    public function getCloudProviders()
    {
        return $this->container['cloud_providers'];
    }

    /**
     * Sets cloud_providers
     *
     * @param string[] $cloud_providers cloud_providers
     *
     * @return $this
     */
    public function setCloudProviders($cloud_providers)
    {
        $this->container['cloud_providers'] = $cloud_providers;

        return $this;
    }

    /**
     * Gets hostname
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->container['hostname'];
    }

    /**
     * Sets hostname
     *
     * @param string $hostname hostname
     *
     * @return $this
     */
    public function setHostname($hostname)
    {
        $this->container['hostname'] = $hostname;

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

