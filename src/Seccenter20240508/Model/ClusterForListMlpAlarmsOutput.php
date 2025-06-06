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

class ClusterForListMlpAlarmsOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ClusterForListMlpAlarmsOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'cluster_area' => 'string',
        'cluster_id' => 'string',
        'cluster_name' => 'string',
        'cluster_tags' => 'string[]',
        'rule_type1st' => 'string',
        'rule_type2nd' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'cluster_area' => null,
        'cluster_id' => null,
        'cluster_name' => null,
        'cluster_tags' => null,
        'rule_type1st' => null,
        'rule_type2nd' => null
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
        'cluster_area' => 'ClusterArea',
        'cluster_id' => 'ClusterID',
        'cluster_name' => 'ClusterName',
        'cluster_tags' => 'ClusterTags',
        'rule_type1st' => 'RuleType1st',
        'rule_type2nd' => 'RuleType2nd'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cluster_area' => 'setClusterArea',
        'cluster_id' => 'setClusterId',
        'cluster_name' => 'setClusterName',
        'cluster_tags' => 'setClusterTags',
        'rule_type1st' => 'setRuleType1st',
        'rule_type2nd' => 'setRuleType2nd'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cluster_area' => 'getClusterArea',
        'cluster_id' => 'getClusterId',
        'cluster_name' => 'getClusterName',
        'cluster_tags' => 'getClusterTags',
        'rule_type1st' => 'getRuleType1st',
        'rule_type2nd' => 'getRuleType2nd'
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
        $this->container['cluster_area'] = isset($data['cluster_area']) ? $data['cluster_area'] : null;
        $this->container['cluster_id'] = isset($data['cluster_id']) ? $data['cluster_id'] : null;
        $this->container['cluster_name'] = isset($data['cluster_name']) ? $data['cluster_name'] : null;
        $this->container['cluster_tags'] = isset($data['cluster_tags']) ? $data['cluster_tags'] : null;
        $this->container['rule_type1st'] = isset($data['rule_type1st']) ? $data['rule_type1st'] : null;
        $this->container['rule_type2nd'] = isset($data['rule_type2nd']) ? $data['rule_type2nd'] : null;
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
     * Gets cluster_area
     *
     * @return string
     */
    public function getClusterArea()
    {
        return $this->container['cluster_area'];
    }

    /**
     * Sets cluster_area
     *
     * @param string $cluster_area cluster_area
     *
     * @return $this
     */
    public function setClusterArea($cluster_area)
    {
        $this->container['cluster_area'] = $cluster_area;

        return $this;
    }

    /**
     * Gets cluster_id
     *
     * @return string
     */
    public function getClusterId()
    {
        return $this->container['cluster_id'];
    }

    /**
     * Sets cluster_id
     *
     * @param string $cluster_id cluster_id
     *
     * @return $this
     */
    public function setClusterId($cluster_id)
    {
        $this->container['cluster_id'] = $cluster_id;

        return $this;
    }

    /**
     * Gets cluster_name
     *
     * @return string
     */
    public function getClusterName()
    {
        return $this->container['cluster_name'];
    }

    /**
     * Sets cluster_name
     *
     * @param string $cluster_name cluster_name
     *
     * @return $this
     */
    public function setClusterName($cluster_name)
    {
        $this->container['cluster_name'] = $cluster_name;

        return $this;
    }

    /**
     * Gets cluster_tags
     *
     * @return string[]
     */
    public function getClusterTags()
    {
        return $this->container['cluster_tags'];
    }

    /**
     * Sets cluster_tags
     *
     * @param string[] $cluster_tags cluster_tags
     *
     * @return $this
     */
    public function setClusterTags($cluster_tags)
    {
        $this->container['cluster_tags'] = $cluster_tags;

        return $this;
    }

    /**
     * Gets rule_type1st
     *
     * @return string
     */
    public function getRuleType1st()
    {
        return $this->container['rule_type1st'];
    }

    /**
     * Sets rule_type1st
     *
     * @param string $rule_type1st rule_type1st
     *
     * @return $this
     */
    public function setRuleType1st($rule_type1st)
    {
        $this->container['rule_type1st'] = $rule_type1st;

        return $this;
    }

    /**
     * Gets rule_type2nd
     *
     * @return string
     */
    public function getRuleType2nd()
    {
        return $this->container['rule_type2nd'];
    }

    /**
     * Sets rule_type2nd
     *
     * @param string $rule_type2nd rule_type2nd
     *
     * @return $this
     */
    public function setRuleType2nd($rule_type2nd)
    {
        $this->container['rule_type2nd'] = $rule_type2nd;

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

