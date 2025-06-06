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

class DataForListWhiteListsOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DataForListWhiteListsOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'desc' => 'string',
        'id' => 'string',
        'match_alarm_name' => 'string',
        'name' => 'string',
        'range' => '\Volcengine\Seccenter20240508\Model\RangeForListWhiteListsOutput',
        'rule_list' => '\Volcengine\Seccenter20240508\Model\RuleListForListWhiteListsOutput[]',
        'update_time' => 'int',
        'user' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'desc' => null,
        'id' => null,
        'match_alarm_name' => null,
        'name' => null,
        'range' => null,
        'rule_list' => null,
        'update_time' => 'int32',
        'user' => null
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
        'desc' => 'Desc',
        'id' => 'ID',
        'match_alarm_name' => 'MatchAlarmName',
        'name' => 'Name',
        'range' => 'Range',
        'rule_list' => 'RuleList',
        'update_time' => 'UpdateTime',
        'user' => 'User'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'desc' => 'setDesc',
        'id' => 'setId',
        'match_alarm_name' => 'setMatchAlarmName',
        'name' => 'setName',
        'range' => 'setRange',
        'rule_list' => 'setRuleList',
        'update_time' => 'setUpdateTime',
        'user' => 'setUser'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'desc' => 'getDesc',
        'id' => 'getId',
        'match_alarm_name' => 'getMatchAlarmName',
        'name' => 'getName',
        'range' => 'getRange',
        'rule_list' => 'getRuleList',
        'update_time' => 'getUpdateTime',
        'user' => 'getUser'
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
        $this->container['desc'] = isset($data['desc']) ? $data['desc'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['match_alarm_name'] = isset($data['match_alarm_name']) ? $data['match_alarm_name'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['range'] = isset($data['range']) ? $data['range'] : null;
        $this->container['rule_list'] = isset($data['rule_list']) ? $data['rule_list'] : null;
        $this->container['update_time'] = isset($data['update_time']) ? $data['update_time'] : null;
        $this->container['user'] = isset($data['user']) ? $data['user'] : null;
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
     * Gets desc
     *
     * @return string
     */
    public function getDesc()
    {
        return $this->container['desc'];
    }

    /**
     * Sets desc
     *
     * @param string $desc desc
     *
     * @return $this
     */
    public function setDesc($desc)
    {
        $this->container['desc'] = $desc;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets match_alarm_name
     *
     * @return string
     */
    public function getMatchAlarmName()
    {
        return $this->container['match_alarm_name'];
    }

    /**
     * Sets match_alarm_name
     *
     * @param string $match_alarm_name match_alarm_name
     *
     * @return $this
     */
    public function setMatchAlarmName($match_alarm_name)
    {
        $this->container['match_alarm_name'] = $match_alarm_name;

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
     * Gets range
     *
     * @return \Volcengine\Seccenter20240508\Model\RangeForListWhiteListsOutput
     */
    public function getRange()
    {
        return $this->container['range'];
    }

    /**
     * Sets range
     *
     * @param \Volcengine\Seccenter20240508\Model\RangeForListWhiteListsOutput $range range
     *
     * @return $this
     */
    public function setRange($range)
    {
        $this->container['range'] = $range;

        return $this;
    }

    /**
     * Gets rule_list
     *
     * @return \Volcengine\Seccenter20240508\Model\RuleListForListWhiteListsOutput[]
     */
    public function getRuleList()
    {
        return $this->container['rule_list'];
    }

    /**
     * Sets rule_list
     *
     * @param \Volcengine\Seccenter20240508\Model\RuleListForListWhiteListsOutput[] $rule_list rule_list
     *
     * @return $this
     */
    public function setRuleList($rule_list)
    {
        $this->container['rule_list'] = $rule_list;

        return $this;
    }

    /**
     * Gets update_time
     *
     * @return int
     */
    public function getUpdateTime()
    {
        return $this->container['update_time'];
    }

    /**
     * Sets update_time
     *
     * @param int $update_time update_time
     *
     * @return $this
     */
    public function setUpdateTime($update_time)
    {
        $this->container['update_time'] = $update_time;

        return $this;
    }

    /**
     * Gets user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->container['user'];
    }

    /**
     * Sets user
     *
     * @param string $user user
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->container['user'] = $user;

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

