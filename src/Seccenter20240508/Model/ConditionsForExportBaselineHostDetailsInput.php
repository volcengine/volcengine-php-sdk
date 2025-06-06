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

class ConditionsForExportBaselineHostDetailsInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ConditionsForExportBaselineHostDetailsInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'agent_id' => 'string',
        'asset_id' => 'string',
        'asset_name' => 'string',
        'cloud_providers' => 'string[]',
        'hostname' => 'string',
        'ip' => 'string',
        'leaf_group_ids' => 'string[]',
        'tag' => 'string',
        'top_group_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'agent_id' => null,
        'asset_id' => null,
        'asset_name' => null,
        'cloud_providers' => null,
        'hostname' => null,
        'ip' => null,
        'leaf_group_ids' => null,
        'tag' => null,
        'top_group_id' => null
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
        'asset_id' => 'AssetID',
        'asset_name' => 'AssetName',
        'cloud_providers' => 'CloudProviders',
        'hostname' => 'Hostname',
        'ip' => 'IP',
        'leaf_group_ids' => 'LeafGroupIDs',
        'tag' => 'Tag',
        'top_group_id' => 'TopGroupID'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'agent_id' => 'setAgentId',
        'asset_id' => 'setAssetId',
        'asset_name' => 'setAssetName',
        'cloud_providers' => 'setCloudProviders',
        'hostname' => 'setHostname',
        'ip' => 'setIp',
        'leaf_group_ids' => 'setLeafGroupIds',
        'tag' => 'setTag',
        'top_group_id' => 'setTopGroupId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'agent_id' => 'getAgentId',
        'asset_id' => 'getAssetId',
        'asset_name' => 'getAssetName',
        'cloud_providers' => 'getCloudProviders',
        'hostname' => 'getHostname',
        'ip' => 'getIp',
        'leaf_group_ids' => 'getLeafGroupIds',
        'tag' => 'getTag',
        'top_group_id' => 'getTopGroupId'
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
        $this->container['asset_id'] = isset($data['asset_id']) ? $data['asset_id'] : null;
        $this->container['asset_name'] = isset($data['asset_name']) ? $data['asset_name'] : null;
        $this->container['cloud_providers'] = isset($data['cloud_providers']) ? $data['cloud_providers'] : null;
        $this->container['hostname'] = isset($data['hostname']) ? $data['hostname'] : null;
        $this->container['ip'] = isset($data['ip']) ? $data['ip'] : null;
        $this->container['leaf_group_ids'] = isset($data['leaf_group_ids']) ? $data['leaf_group_ids'] : null;
        $this->container['tag'] = isset($data['tag']) ? $data['tag'] : null;
        $this->container['top_group_id'] = isset($data['top_group_id']) ? $data['top_group_id'] : null;
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
     * Gets asset_id
     *
     * @return string
     */
    public function getAssetId()
    {
        return $this->container['asset_id'];
    }

    /**
     * Sets asset_id
     *
     * @param string $asset_id asset_id
     *
     * @return $this
     */
    public function setAssetId($asset_id)
    {
        $this->container['asset_id'] = $asset_id;

        return $this;
    }

    /**
     * Gets asset_name
     *
     * @return string
     */
    public function getAssetName()
    {
        return $this->container['asset_name'];
    }

    /**
     * Sets asset_name
     *
     * @param string $asset_name asset_name
     *
     * @return $this
     */
    public function setAssetName($asset_name)
    {
        $this->container['asset_name'] = $asset_name;

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
     * Gets ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->container['ip'];
    }

    /**
     * Sets ip
     *
     * @param string $ip ip
     *
     * @return $this
     */
    public function setIp($ip)
    {
        $this->container['ip'] = $ip;

        return $this;
    }

    /**
     * Gets leaf_group_ids
     *
     * @return string[]
     */
    public function getLeafGroupIds()
    {
        return $this->container['leaf_group_ids'];
    }

    /**
     * Sets leaf_group_ids
     *
     * @param string[] $leaf_group_ids leaf_group_ids
     *
     * @return $this
     */
    public function setLeafGroupIds($leaf_group_ids)
    {
        $this->container['leaf_group_ids'] = $leaf_group_ids;

        return $this;
    }

    /**
     * Gets tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->container['tag'];
    }

    /**
     * Sets tag
     *
     * @param string $tag tag
     *
     * @return $this
     */
    public function setTag($tag)
    {
        $this->container['tag'] = $tag;

        return $this;
    }

    /**
     * Gets top_group_id
     *
     * @return string
     */
    public function getTopGroupId()
    {
        return $this->container['top_group_id'];
    }

    /**
     * Sets top_group_id
     *
     * @param string $top_group_id top_group_id
     *
     * @return $this
     */
    public function setTopGroupId($top_group_id)
    {
        $this->container['top_group_id'] = $top_group_id;

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

