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

class UpdateCCRuleRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'UpdateCCRuleRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'accurate_group' => '\Volcengine\Waf\Model\AccurateGroupForUpdateCCRuleInput',
        'accurate_group_priority' => 'int',
        'cc_type' => 'int',
        'count_time' => 'int',
        'cron_confs' => '\Volcengine\Waf\Model\CronConfForUpdateCCRuleInput[]',
        'cron_enable' => 'int',
        'effect_time' => 'int',
        'enable' => 'int',
        'exemption_time' => 'int',
        'field' => 'string',
        'host' => 'string',
        'id' => 'int',
        'name' => 'string',
        'path_threshold' => 'int',
        'project_name' => 'string',
        'rule_priority' => 'int',
        'rule_tag' => 'string',
        'single_threshold' => 'int',
        'update_time' => 'string',
        'url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'accurate_group' => null,
        'accurate_group_priority' => 'int32',
        'cc_type' => 'int32',
        'count_time' => 'int32',
        'cron_confs' => null,
        'cron_enable' => 'int32',
        'effect_time' => 'int32',
        'enable' => 'int32',
        'exemption_time' => 'int32',
        'field' => null,
        'host' => null,
        'id' => 'int32',
        'name' => null,
        'path_threshold' => 'int32',
        'project_name' => null,
        'rule_priority' => 'int32',
        'rule_tag' => null,
        'single_threshold' => 'int32',
        'update_time' => null,
        'url' => null
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
        'accurate_group_priority' => 'AccurateGroupPriority',
        'cc_type' => 'CCType',
        'count_time' => 'CountTime',
        'cron_confs' => 'CronConfs',
        'cron_enable' => 'CronEnable',
        'effect_time' => 'EffectTime',
        'enable' => 'Enable',
        'exemption_time' => 'ExemptionTime',
        'field' => 'Field',
        'host' => 'Host',
        'id' => 'Id',
        'name' => 'Name',
        'path_threshold' => 'PathThreshold',
        'project_name' => 'ProjectName',
        'rule_priority' => 'RulePriority',
        'rule_tag' => 'RuleTag',
        'single_threshold' => 'SingleThreshold',
        'update_time' => 'UpdateTime',
        'url' => 'Url'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accurate_group' => 'setAccurateGroup',
        'accurate_group_priority' => 'setAccurateGroupPriority',
        'cc_type' => 'setCcType',
        'count_time' => 'setCountTime',
        'cron_confs' => 'setCronConfs',
        'cron_enable' => 'setCronEnable',
        'effect_time' => 'setEffectTime',
        'enable' => 'setEnable',
        'exemption_time' => 'setExemptionTime',
        'field' => 'setField',
        'host' => 'setHost',
        'id' => 'setId',
        'name' => 'setName',
        'path_threshold' => 'setPathThreshold',
        'project_name' => 'setProjectName',
        'rule_priority' => 'setRulePriority',
        'rule_tag' => 'setRuleTag',
        'single_threshold' => 'setSingleThreshold',
        'update_time' => 'setUpdateTime',
        'url' => 'setUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accurate_group' => 'getAccurateGroup',
        'accurate_group_priority' => 'getAccurateGroupPriority',
        'cc_type' => 'getCcType',
        'count_time' => 'getCountTime',
        'cron_confs' => 'getCronConfs',
        'cron_enable' => 'getCronEnable',
        'effect_time' => 'getEffectTime',
        'enable' => 'getEnable',
        'exemption_time' => 'getExemptionTime',
        'field' => 'getField',
        'host' => 'getHost',
        'id' => 'getId',
        'name' => 'getName',
        'path_threshold' => 'getPathThreshold',
        'project_name' => 'getProjectName',
        'rule_priority' => 'getRulePriority',
        'rule_tag' => 'getRuleTag',
        'single_threshold' => 'getSingleThreshold',
        'update_time' => 'getUpdateTime',
        'url' => 'getUrl'
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
        $this->container['accurate_group_priority'] = isset($data['accurate_group_priority']) ? $data['accurate_group_priority'] : null;
        $this->container['cc_type'] = isset($data['cc_type']) ? $data['cc_type'] : null;
        $this->container['count_time'] = isset($data['count_time']) ? $data['count_time'] : null;
        $this->container['cron_confs'] = isset($data['cron_confs']) ? $data['cron_confs'] : null;
        $this->container['cron_enable'] = isset($data['cron_enable']) ? $data['cron_enable'] : null;
        $this->container['effect_time'] = isset($data['effect_time']) ? $data['effect_time'] : null;
        $this->container['enable'] = isset($data['enable']) ? $data['enable'] : null;
        $this->container['exemption_time'] = isset($data['exemption_time']) ? $data['exemption_time'] : null;
        $this->container['field'] = isset($data['field']) ? $data['field'] : null;
        $this->container['host'] = isset($data['host']) ? $data['host'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['path_threshold'] = isset($data['path_threshold']) ? $data['path_threshold'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['rule_priority'] = isset($data['rule_priority']) ? $data['rule_priority'] : null;
        $this->container['rule_tag'] = isset($data['rule_tag']) ? $data['rule_tag'] : null;
        $this->container['single_threshold'] = isset($data['single_threshold']) ? $data['single_threshold'] : null;
        $this->container['update_time'] = isset($data['update_time']) ? $data['update_time'] : null;
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['rule_priority'] === null) {
            $invalidProperties[] = "'rule_priority' can't be null";
        }
        if ($this->container['url'] === null) {
            $invalidProperties[] = "'url' can't be null";
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
     * @return \Volcengine\Waf\Model\AccurateGroupForUpdateCCRuleInput
     */
    public function getAccurateGroup()
    {
        return $this->container['accurate_group'];
    }

    /**
     * Sets accurate_group
     *
     * @param \Volcengine\Waf\Model\AccurateGroupForUpdateCCRuleInput $accurate_group accurate_group
     *
     * @return $this
     */
    public function setAccurateGroup($accurate_group)
    {
        $this->container['accurate_group'] = $accurate_group;

        return $this;
    }

    /**
     * Gets accurate_group_priority
     *
     * @return int
     */
    public function getAccurateGroupPriority()
    {
        return $this->container['accurate_group_priority'];
    }

    /**
     * Sets accurate_group_priority
     *
     * @param int $accurate_group_priority accurate_group_priority
     *
     * @return $this
     */
    public function setAccurateGroupPriority($accurate_group_priority)
    {
        $this->container['accurate_group_priority'] = $accurate_group_priority;

        return $this;
    }

    /**
     * Gets cc_type
     *
     * @return int
     */
    public function getCcType()
    {
        return $this->container['cc_type'];
    }

    /**
     * Sets cc_type
     *
     * @param int $cc_type cc_type
     *
     * @return $this
     */
    public function setCcType($cc_type)
    {
        $this->container['cc_type'] = $cc_type;

        return $this;
    }

    /**
     * Gets count_time
     *
     * @return int
     */
    public function getCountTime()
    {
        return $this->container['count_time'];
    }

    /**
     * Sets count_time
     *
     * @param int $count_time count_time
     *
     * @return $this
     */
    public function setCountTime($count_time)
    {
        $this->container['count_time'] = $count_time;

        return $this;
    }

    /**
     * Gets cron_confs
     *
     * @return \Volcengine\Waf\Model\CronConfForUpdateCCRuleInput[]
     */
    public function getCronConfs()
    {
        return $this->container['cron_confs'];
    }

    /**
     * Sets cron_confs
     *
     * @param \Volcengine\Waf\Model\CronConfForUpdateCCRuleInput[] $cron_confs cron_confs
     *
     * @return $this
     */
    public function setCronConfs($cron_confs)
    {
        $this->container['cron_confs'] = $cron_confs;

        return $this;
    }

    /**
     * Gets cron_enable
     *
     * @return int
     */
    public function getCronEnable()
    {
        return $this->container['cron_enable'];
    }

    /**
     * Sets cron_enable
     *
     * @param int $cron_enable cron_enable
     *
     * @return $this
     */
    public function setCronEnable($cron_enable)
    {
        $this->container['cron_enable'] = $cron_enable;

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
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

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
     * Gets rule_tag
     *
     * @return string
     */
    public function getRuleTag()
    {
        return $this->container['rule_tag'];
    }

    /**
     * Sets rule_tag
     *
     * @param string $rule_tag rule_tag
     *
     * @return $this
     */
    public function setRuleTag($rule_tag)
    {
        $this->container['rule_tag'] = $rule_tag;

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
     * Gets update_time
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->container['update_time'];
    }

    /**
     * Sets update_time
     *
     * @param string $update_time update_time
     *
     * @return $this
     */
    public function setUpdateTime($update_time)
    {
        $this->container['update_time'] = $update_time;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

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

