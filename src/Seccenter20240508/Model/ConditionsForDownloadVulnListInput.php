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

class ConditionsForDownloadVulnListInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ConditionsForDownloadVulnListInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'cloud_providers' => 'string[]',
        'cve_id' => 'string',
        'if_high_availability' => 'bool',
        'leaf_group_ids' => 'string[]',
        'level' => 'string[]',
        'tag' => 'string[]',
        'top_group_id' => 'string',
        'vuln_name' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'cloud_providers' => null,
        'cve_id' => null,
        'if_high_availability' => null,
        'leaf_group_ids' => null,
        'level' => null,
        'tag' => null,
        'top_group_id' => null,
        'vuln_name' => null
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
        'cloud_providers' => 'CloudProviders',
        'cve_id' => 'CveID',
        'if_high_availability' => 'IfHighAvailability',
        'leaf_group_ids' => 'LeafGroupIDs',
        'level' => 'Level',
        'tag' => 'Tag',
        'top_group_id' => 'TopGroupID',
        'vuln_name' => 'VulnName'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cloud_providers' => 'setCloudProviders',
        'cve_id' => 'setCveId',
        'if_high_availability' => 'setIfHighAvailability',
        'leaf_group_ids' => 'setLeafGroupIds',
        'level' => 'setLevel',
        'tag' => 'setTag',
        'top_group_id' => 'setTopGroupId',
        'vuln_name' => 'setVulnName'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cloud_providers' => 'getCloudProviders',
        'cve_id' => 'getCveId',
        'if_high_availability' => 'getIfHighAvailability',
        'leaf_group_ids' => 'getLeafGroupIds',
        'level' => 'getLevel',
        'tag' => 'getTag',
        'top_group_id' => 'getTopGroupId',
        'vuln_name' => 'getVulnName'
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
        $this->container['cloud_providers'] = isset($data['cloud_providers']) ? $data['cloud_providers'] : null;
        $this->container['cve_id'] = isset($data['cve_id']) ? $data['cve_id'] : null;
        $this->container['if_high_availability'] = isset($data['if_high_availability']) ? $data['if_high_availability'] : null;
        $this->container['leaf_group_ids'] = isset($data['leaf_group_ids']) ? $data['leaf_group_ids'] : null;
        $this->container['level'] = isset($data['level']) ? $data['level'] : null;
        $this->container['tag'] = isset($data['tag']) ? $data['tag'] : null;
        $this->container['top_group_id'] = isset($data['top_group_id']) ? $data['top_group_id'] : null;
        $this->container['vuln_name'] = isset($data['vuln_name']) ? $data['vuln_name'] : null;
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
     * Gets cve_id
     *
     * @return string
     */
    public function getCveId()
    {
        return $this->container['cve_id'];
    }

    /**
     * Sets cve_id
     *
     * @param string $cve_id cve_id
     *
     * @return $this
     */
    public function setCveId($cve_id)
    {
        $this->container['cve_id'] = $cve_id;

        return $this;
    }

    /**
     * Gets if_high_availability
     *
     * @return bool
     */
    public function getIfHighAvailability()
    {
        return $this->container['if_high_availability'];
    }

    /**
     * Sets if_high_availability
     *
     * @param bool $if_high_availability if_high_availability
     *
     * @return $this
     */
    public function setIfHighAvailability($if_high_availability)
    {
        $this->container['if_high_availability'] = $if_high_availability;

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
     * Gets level
     *
     * @return string[]
     */
    public function getLevel()
    {
        return $this->container['level'];
    }

    /**
     * Sets level
     *
     * @param string[] $level level
     *
     * @return $this
     */
    public function setLevel($level)
    {
        $this->container['level'] = $level;

        return $this;
    }

    /**
     * Gets tag
     *
     * @return string[]
     */
    public function getTag()
    {
        return $this->container['tag'];
    }

    /**
     * Sets tag
     *
     * @param string[] $tag tag
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
     * Gets vuln_name
     *
     * @return string
     */
    public function getVulnName()
    {
        return $this->container['vuln_name'];
    }

    /**
     * Sets vuln_name
     *
     * @param string $vuln_name vuln_name
     *
     * @return $this
     */
    public function setVulnName($vuln_name)
    {
        $this->container['vuln_name'] = $vuln_name;

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

