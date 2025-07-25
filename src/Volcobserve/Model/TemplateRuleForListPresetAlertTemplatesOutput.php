<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Volcobserve\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class TemplateRuleForListPresetAlertTemplatesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TemplateRuleForListPresetAlertTemplatesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'applied_rules' => '\Volcengine\Volcobserve\Model\AppliedRuleForListPresetAlertTemplatesOutput[]',
        'check_interval' => 'int',
        'condition_operator' => 'string',
        'evaluation_count' => 'int',
        'level_conditions' => '\Volcengine\Volcobserve\Model\LevelConditionForListPresetAlertTemplatesOutput[]',
        'multiple_conditions' => 'bool',
        'name' => 'string',
        'namespace' => 'string',
        'sub_namespace' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'applied_rules' => null,
        'check_interval' => null,
        'condition_operator' => null,
        'evaluation_count' => null,
        'level_conditions' => null,
        'multiple_conditions' => null,
        'name' => null,
        'namespace' => null,
        'sub_namespace' => null
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
        'applied_rules' => 'AppliedRules',
        'check_interval' => 'CheckInterval',
        'condition_operator' => 'ConditionOperator',
        'evaluation_count' => 'EvaluationCount',
        'level_conditions' => 'LevelConditions',
        'multiple_conditions' => 'MultipleConditions',
        'name' => 'Name',
        'namespace' => 'Namespace',
        'sub_namespace' => 'SubNamespace'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'applied_rules' => 'setAppliedRules',
        'check_interval' => 'setCheckInterval',
        'condition_operator' => 'setConditionOperator',
        'evaluation_count' => 'setEvaluationCount',
        'level_conditions' => 'setLevelConditions',
        'multiple_conditions' => 'setMultipleConditions',
        'name' => 'setName',
        'namespace' => 'setNamespace',
        'sub_namespace' => 'setSubNamespace'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'applied_rules' => 'getAppliedRules',
        'check_interval' => 'getCheckInterval',
        'condition_operator' => 'getConditionOperator',
        'evaluation_count' => 'getEvaluationCount',
        'level_conditions' => 'getLevelConditions',
        'multiple_conditions' => 'getMultipleConditions',
        'name' => 'getName',
        'namespace' => 'getNamespace',
        'sub_namespace' => 'getSubNamespace'
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
        $this->container['applied_rules'] = isset($data['applied_rules']) ? $data['applied_rules'] : null;
        $this->container['check_interval'] = isset($data['check_interval']) ? $data['check_interval'] : null;
        $this->container['condition_operator'] = isset($data['condition_operator']) ? $data['condition_operator'] : null;
        $this->container['evaluation_count'] = isset($data['evaluation_count']) ? $data['evaluation_count'] : null;
        $this->container['level_conditions'] = isset($data['level_conditions']) ? $data['level_conditions'] : null;
        $this->container['multiple_conditions'] = isset($data['multiple_conditions']) ? $data['multiple_conditions'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['namespace'] = isset($data['namespace']) ? $data['namespace'] : null;
        $this->container['sub_namespace'] = isset($data['sub_namespace']) ? $data['sub_namespace'] : null;
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
     * Gets applied_rules
     *
     * @return \Volcengine\Volcobserve\Model\AppliedRuleForListPresetAlertTemplatesOutput[]
     */
    public function getAppliedRules()
    {
        return $this->container['applied_rules'];
    }

    /**
     * Sets applied_rules
     *
     * @param \Volcengine\Volcobserve\Model\AppliedRuleForListPresetAlertTemplatesOutput[] $applied_rules applied_rules
     *
     * @return $this
     */
    public function setAppliedRules($applied_rules)
    {
        $this->container['applied_rules'] = $applied_rules;

        return $this;
    }

    /**
     * Gets check_interval
     *
     * @return int
     */
    public function getCheckInterval()
    {
        return $this->container['check_interval'];
    }

    /**
     * Sets check_interval
     *
     * @param int $check_interval check_interval
     *
     * @return $this
     */
    public function setCheckInterval($check_interval)
    {
        $this->container['check_interval'] = $check_interval;

        return $this;
    }

    /**
     * Gets condition_operator
     *
     * @return string
     */
    public function getConditionOperator()
    {
        return $this->container['condition_operator'];
    }

    /**
     * Sets condition_operator
     *
     * @param string $condition_operator condition_operator
     *
     * @return $this
     */
    public function setConditionOperator($condition_operator)
    {
        $this->container['condition_operator'] = $condition_operator;

        return $this;
    }

    /**
     * Gets evaluation_count
     *
     * @return int
     */
    public function getEvaluationCount()
    {
        return $this->container['evaluation_count'];
    }

    /**
     * Sets evaluation_count
     *
     * @param int $evaluation_count evaluation_count
     *
     * @return $this
     */
    public function setEvaluationCount($evaluation_count)
    {
        $this->container['evaluation_count'] = $evaluation_count;

        return $this;
    }

    /**
     * Gets level_conditions
     *
     * @return \Volcengine\Volcobserve\Model\LevelConditionForListPresetAlertTemplatesOutput[]
     */
    public function getLevelConditions()
    {
        return $this->container['level_conditions'];
    }

    /**
     * Sets level_conditions
     *
     * @param \Volcengine\Volcobserve\Model\LevelConditionForListPresetAlertTemplatesOutput[] $level_conditions level_conditions
     *
     * @return $this
     */
    public function setLevelConditions($level_conditions)
    {
        $this->container['level_conditions'] = $level_conditions;

        return $this;
    }

    /**
     * Gets multiple_conditions
     *
     * @return bool
     */
    public function getMultipleConditions()
    {
        return $this->container['multiple_conditions'];
    }

    /**
     * Sets multiple_conditions
     *
     * @param bool $multiple_conditions multiple_conditions
     *
     * @return $this
     */
    public function setMultipleConditions($multiple_conditions)
    {
        $this->container['multiple_conditions'] = $multiple_conditions;

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
     * Gets namespace
     *
     * @return string
     */
    public function getNamespace()
    {
        return $this->container['namespace'];
    }

    /**
     * Sets namespace
     *
     * @param string $namespace namespace
     *
     * @return $this
     */
    public function setNamespace($namespace)
    {
        $this->container['namespace'] = $namespace;

        return $this;
    }

    /**
     * Gets sub_namespace
     *
     * @return string
     */
    public function getSubNamespace()
    {
        return $this->container['sub_namespace'];
    }

    /**
     * Sets sub_namespace
     *
     * @param string $sub_namespace sub_namespace
     *
     * @return $this
     */
    public function setSubNamespace($sub_namespace)
    {
        $this->container['sub_namespace'] = $sub_namespace;

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

