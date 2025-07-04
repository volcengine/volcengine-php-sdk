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

class CreateBotAnalyseProtectRuleRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CreateBotAnalyseProtectRuleRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'accurate_group' => '\Volcengine\Waf\Model\AccurateGroupForCreateBotAnalyseProtectRuleInput[]',
        'action_after_verification' => 'int',
        'action_type' => 'int',
        'effect_time' => 'int',
        'enable' => 'int',
        'exemption_time' => 'int',
        'field' => 'string',
        'host' => 'string',
        'name' => 'string',
        'path' => 'string',
        'path_threshold' => 'int',
        'project_name' => 'string',
        'rule_priority' => 'int',
        'single_proportion' => 'float',
        'single_threshold' => 'int',
        'statistical_duration' => 'int',
        'statistical_type' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'accurate_group' => null,
        'action_after_verification' => 'int32',
        'action_type' => 'int32',
        'effect_time' => 'int32',
        'enable' => 'int32',
        'exemption_time' => 'int32',
        'field' => null,
        'host' => null,
        'name' => null,
        'path' => null,
        'path_threshold' => 'int32',
        'project_name' => null,
        'rule_priority' => 'int32',
        'single_proportion' => 'float',
        'single_threshold' => 'int32',
        'statistical_duration' => 'int32',
        'statistical_type' => 'int32'
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
        'accurate_group' => 'AccurateGroup',
        'action_after_verification' => 'ActionAfterVerification',
        'action_type' => 'ActionType',
        'effect_time' => 'EffectTime',
        'enable' => 'Enable',
        'exemption_time' => 'ExemptionTime',
        'field' => 'Field',
        'host' => 'Host',
        'name' => 'Name',
        'path' => 'Path',
        'path_threshold' => 'PathThreshold',
        'project_name' => 'ProjectName',
        'rule_priority' => 'RulePriority',
        'single_proportion' => 'SingleProportion',
        'single_threshold' => 'SingleThreshold',
        'statistical_duration' => 'StatisticalDuration',
        'statistical_type' => 'StatisticalType'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accurate_group' => 'setAccurateGroup',
        'action_after_verification' => 'setActionAfterVerification',
        'action_type' => 'setActionType',
        'effect_time' => 'setEffectTime',
        'enable' => 'setEnable',
        'exemption_time' => 'setExemptionTime',
        'field' => 'setField',
        'host' => 'setHost',
        'name' => 'setName',
        'path' => 'setPath',
        'path_threshold' => 'setPathThreshold',
        'project_name' => 'setProjectName',
        'rule_priority' => 'setRulePriority',
        'single_proportion' => 'setSingleProportion',
        'single_threshold' => 'setSingleThreshold',
        'statistical_duration' => 'setStatisticalDuration',
        'statistical_type' => 'setStatisticalType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accurate_group' => 'getAccurateGroup',
        'action_after_verification' => 'getActionAfterVerification',
        'action_type' => 'getActionType',
        'effect_time' => 'getEffectTime',
        'enable' => 'getEnable',
        'exemption_time' => 'getExemptionTime',
        'field' => 'getField',
        'host' => 'getHost',
        'name' => 'getName',
        'path' => 'getPath',
        'path_threshold' => 'getPathThreshold',
        'project_name' => 'getProjectName',
        'rule_priority' => 'getRulePriority',
        'single_proportion' => 'getSingleProportion',
        'single_threshold' => 'getSingleThreshold',
        'statistical_duration' => 'getStatisticalDuration',
        'statistical_type' => 'getStatisticalType'
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
        $this->container['accurate_group'] = isset($data['accurate_group']) ? $data['accurate_group'] : null;
        $this->container['action_after_verification'] = isset($data['action_after_verification']) ? $data['action_after_verification'] : null;
        $this->container['action_type'] = isset($data['action_type']) ? $data['action_type'] : null;
        $this->container['effect_time'] = isset($data['effect_time']) ? $data['effect_time'] : null;
        $this->container['enable'] = isset($data['enable']) ? $data['enable'] : null;
        $this->container['exemption_time'] = isset($data['exemption_time']) ? $data['exemption_time'] : null;
        $this->container['field'] = isset($data['field']) ? $data['field'] : null;
        $this->container['host'] = isset($data['host']) ? $data['host'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['path'] = isset($data['path']) ? $data['path'] : null;
        $this->container['path_threshold'] = isset($data['path_threshold']) ? $data['path_threshold'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['rule_priority'] = isset($data['rule_priority']) ? $data['rule_priority'] : null;
        $this->container['single_proportion'] = isset($data['single_proportion']) ? $data['single_proportion'] : null;
        $this->container['single_threshold'] = isset($data['single_threshold']) ? $data['single_threshold'] : null;
        $this->container['statistical_duration'] = isset($data['statistical_duration']) ? $data['statistical_duration'] : null;
        $this->container['statistical_type'] = isset($data['statistical_type']) ? $data['statistical_type'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['action_type'] === null) {
            $invalidProperties[] = "'action_type' can't be null";
        }
        if ($this->container['effect_time'] === null) {
            $invalidProperties[] = "'effect_time' can't be null";
        }
        if ($this->container['enable'] === null) {
            $invalidProperties[] = "'enable' can't be null";
        }
        if ($this->container['field'] === null) {
            $invalidProperties[] = "'field' can't be null";
        }
        if ($this->container['host'] === null) {
            $invalidProperties[] = "'host' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['path'] === null) {
            $invalidProperties[] = "'path' can't be null";
        }
        if ($this->container['rule_priority'] === null) {
            $invalidProperties[] = "'rule_priority' can't be null";
        }
        if ($this->container['single_threshold'] === null) {
            $invalidProperties[] = "'single_threshold' can't be null";
        }
        if ($this->container['statistical_duration'] === null) {
            $invalidProperties[] = "'statistical_duration' can't be null";
        }
        if ($this->container['statistical_type'] === null) {
            $invalidProperties[] = "'statistical_type' can't be null";
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
     * Gets accurate_group
     *
     * @return \Volcengine\Waf\Model\AccurateGroupForCreateBotAnalyseProtectRuleInput[]
     */
    public function getAccurateGroup()
    {
        return $this->container['accurate_group'];
    }

    /**
     * Sets accurate_group
     *
     * @param \Volcengine\Waf\Model\AccurateGroupForCreateBotAnalyseProtectRuleInput[] $accurate_group accurate_group
     *
     * @return $this
     */
    public function setAccurateGroup($accurate_group)
    {
        $this->container['accurate_group'] = $accurate_group;

        return $this;
    }

    /**
     * Gets action_after_verification
     *
     * @return int
     */
    public function getActionAfterVerification()
    {
        return $this->container['action_after_verification'];
    }

    /**
     * Sets action_after_verification
     *
     * @param int $action_after_verification action_after_verification
     *
     * @return $this
     */
    public function setActionAfterVerification($action_after_verification)
    {
        $this->container['action_after_verification'] = $action_after_verification;

        return $this;
    }

    /**
     * Gets action_type
     *
     * @return int
     */
    public function getActionType()
    {
        return $this->container['action_type'];
    }

    /**
     * Sets action_type
     *
     * @param int $action_type action_type
     *
     * @return $this
     */
    public function setActionType($action_type)
    {
        $this->container['action_type'] = $action_type;

        return $this;
    }

    /**
     * Gets effect_time
     *
     * @return int
     */
    public function getEffectTime()
    {
        return $this->container['effect_time'];
    }

    /**
     * Sets effect_time
     *
     * @param int $effect_time effect_time
     *
     * @return $this
     */
    public function setEffectTime($effect_time)
    {
        $this->container['effect_time'] = $effect_time;

        return $this;
    }

    /**
     * Gets enable
     *
     * @return int
     */
    public function getEnable()
    {
        return $this->container['enable'];
    }

    /**
     * Sets enable
     *
     * @param int $enable enable
     *
     * @return $this
     */
    public function setEnable($enable)
    {
        $this->container['enable'] = $enable;

        return $this;
    }

    /**
     * Gets exemption_time
     *
     * @return int
     */
    public function getExemptionTime()
    {
        return $this->container['exemption_time'];
    }

    /**
     * Sets exemption_time
     *
     * @param int $exemption_time exemption_time
     *
     * @return $this
     */
    public function setExemptionTime($exemption_time)
    {
        $this->container['exemption_time'] = $exemption_time;

        return $this;
    }

    /**
     * Gets field
     *
     * @return string
     */
    public function getField()
    {
        return $this->container['field'];
    }

    /**
     * Sets field
     *
     * @param string $field field
     *
     * @return $this
     */
    public function setField($field)
    {
        $this->container['field'] = $field;

        return $this;
    }

    /**
     * Gets host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->container['host'];
    }

    /**
     * Sets host
     *
     * @param string $host host
     *
     * @return $this
     */
    public function setHost($host)
    {
        $this->container['host'] = $host;

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
     * Gets path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->container['path'];
    }

    /**
     * Sets path
     *
     * @param string $path path
     *
     * @return $this
     */
    public function setPath($path)
    {
        $this->container['path'] = $path;

        return $this;
    }

    /**
     * Gets path_threshold
     *
     * @return int
     */
    public function getPathThreshold()
    {
        return $this->container['path_threshold'];
    }

    /**
     * Sets path_threshold
     *
     * @param int $path_threshold path_threshold
     *
     * @return $this
     */
    public function setPathThreshold($path_threshold)
    {
        $this->container['path_threshold'] = $path_threshold;

        return $this;
    }

    /**
     * Gets project_name
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->container['project_name'];
    }

    /**
     * Sets project_name
     *
     * @param string $project_name project_name
     *
     * @return $this
     */
    public function setProjectName($project_name)
    {
        $this->container['project_name'] = $project_name;

        return $this;
    }

    /**
     * Gets rule_priority
     *
     * @return int
     */
    public function getRulePriority()
    {
        return $this->container['rule_priority'];
    }

    /**
     * Sets rule_priority
     *
     * @param int $rule_priority rule_priority
     *
     * @return $this
     */
    public function setRulePriority($rule_priority)
    {
        $this->container['rule_priority'] = $rule_priority;

        return $this;
    }

    /**
     * Gets single_proportion
     *
     * @return float
     */
    public function getSingleProportion()
    {
        return $this->container['single_proportion'];
    }

    /**
     * Sets single_proportion
     *
     * @param float $single_proportion single_proportion
     *
     * @return $this
     */
    public function setSingleProportion($single_proportion)
    {
        $this->container['single_proportion'] = $single_proportion;

        return $this;
    }

    /**
     * Gets single_threshold
     *
     * @return int
     */
    public function getSingleThreshold()
    {
        return $this->container['single_threshold'];
    }

    /**
     * Sets single_threshold
     *
     * @param int $single_threshold single_threshold
     *
     * @return $this
     */
    public function setSingleThreshold($single_threshold)
    {
        $this->container['single_threshold'] = $single_threshold;

        return $this;
    }

    /**
     * Gets statistical_duration
     *
     * @return int
     */
    public function getStatisticalDuration()
    {
        return $this->container['statistical_duration'];
    }

    /**
     * Sets statistical_duration
     *
     * @param int $statistical_duration statistical_duration
     *
     * @return $this
     */
    public function setStatisticalDuration($statistical_duration)
    {
        $this->container['statistical_duration'] = $statistical_duration;

        return $this;
    }

    /**
     * Gets statistical_type
     *
     * @return int
     */
    public function getStatisticalType()
    {
        return $this->container['statistical_type'];
    }

    /**
     * Sets statistical_type
     *
     * @param int $statistical_type statistical_type
     *
     * @return $this
     */
    public function setStatisticalType($statistical_type)
    {
        $this->container['statistical_type'] = $statistical_type;

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

