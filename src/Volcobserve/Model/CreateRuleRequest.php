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

class CreateRuleRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CreateRuleRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'alert_methods' => 'string[]',
        'condition_operator' => 'string',
        'conditions' => '\Volcengine\Volcobserve\Model\ConditionForCreateRuleInput[]',
        'contact_group_ids' => 'string[]',
        'description' => 'string',
        'dimension_conditions' => '\Volcengine\Volcobserve\Model\DimensionConditionsForCreateRuleInput',
        'effect_end_at' => 'string',
        'effect_start_at' => 'string',
        'enable_state' => 'string',
        'evaluation_count' => 'int',
        'level' => 'string',
        'level_conditions' => '\Volcengine\Volcobserve\Model\LevelConditionForCreateRuleInput[]',
        'multiple_conditions' => 'bool',
        'namespace' => 'string',
        'no_data' => '\Volcengine\Volcobserve\Model\NoDataForCreateRuleInput',
        'notification_id' => 'string',
        'original_dimensions' => 'map[string,string[]]',
        'project_name' => 'string',
        'recovery_notify' => '\Volcengine\Volcobserve\Model\RecoveryNotifyForCreateRuleInput',
        'regions' => 'string[]',
        'rule_name' => 'string',
        'rule_type' => 'string',
        'silence_time' => 'int',
        'sub_namespace' => 'string',
        'tags' => '\Volcengine\Volcobserve\Model\ConvertTagForCreateRuleInput[]',
        'webhook' => 'string',
        'webhook_ids' => 'string[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'alert_methods' => null,
        'condition_operator' => null,
        'conditions' => null,
        'contact_group_ids' => null,
        'description' => null,
        'dimension_conditions' => null,
        'effect_end_at' => null,
        'effect_start_at' => null,
        'enable_state' => null,
        'evaluation_count' => null,
        'level' => null,
        'level_conditions' => null,
        'multiple_conditions' => null,
        'namespace' => null,
        'no_data' => null,
        'notification_id' => null,
        'original_dimensions' => null,
        'project_name' => null,
        'recovery_notify' => null,
        'regions' => null,
        'rule_name' => null,
        'rule_type' => null,
        'silence_time' => null,
        'sub_namespace' => null,
        'tags' => null,
        'webhook' => null,
        'webhook_ids' => null
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
        'alert_methods' => 'AlertMethods',
        'condition_operator' => 'ConditionOperator',
        'conditions' => 'Conditions',
        'contact_group_ids' => 'ContactGroupIds',
        'description' => 'Description',
        'dimension_conditions' => 'DimensionConditions',
        'effect_end_at' => 'EffectEndAt',
        'effect_start_at' => 'EffectStartAt',
        'enable_state' => 'EnableState',
        'evaluation_count' => 'EvaluationCount',
        'level' => 'Level',
        'level_conditions' => 'LevelConditions',
        'multiple_conditions' => 'MultipleConditions',
        'namespace' => 'Namespace',
        'no_data' => 'NoData',
        'notification_id' => 'NotificationId',
        'original_dimensions' => 'OriginalDimensions',
        'project_name' => 'ProjectName',
        'recovery_notify' => 'RecoveryNotify',
        'regions' => 'Regions',
        'rule_name' => 'RuleName',
        'rule_type' => 'RuleType',
        'silence_time' => 'SilenceTime',
        'sub_namespace' => 'SubNamespace',
        'tags' => 'Tags',
        'webhook' => 'Webhook',
        'webhook_ids' => 'WebhookIds'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'alert_methods' => 'setAlertMethods',
        'condition_operator' => 'setConditionOperator',
        'conditions' => 'setConditions',
        'contact_group_ids' => 'setContactGroupIds',
        'description' => 'setDescription',
        'dimension_conditions' => 'setDimensionConditions',
        'effect_end_at' => 'setEffectEndAt',
        'effect_start_at' => 'setEffectStartAt',
        'enable_state' => 'setEnableState',
        'evaluation_count' => 'setEvaluationCount',
        'level' => 'setLevel',
        'level_conditions' => 'setLevelConditions',
        'multiple_conditions' => 'setMultipleConditions',
        'namespace' => 'setNamespace',
        'no_data' => 'setNoData',
        'notification_id' => 'setNotificationId',
        'original_dimensions' => 'setOriginalDimensions',
        'project_name' => 'setProjectName',
        'recovery_notify' => 'setRecoveryNotify',
        'regions' => 'setRegions',
        'rule_name' => 'setRuleName',
        'rule_type' => 'setRuleType',
        'silence_time' => 'setSilenceTime',
        'sub_namespace' => 'setSubNamespace',
        'tags' => 'setTags',
        'webhook' => 'setWebhook',
        'webhook_ids' => 'setWebhookIds'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'alert_methods' => 'getAlertMethods',
        'condition_operator' => 'getConditionOperator',
        'conditions' => 'getConditions',
        'contact_group_ids' => 'getContactGroupIds',
        'description' => 'getDescription',
        'dimension_conditions' => 'getDimensionConditions',
        'effect_end_at' => 'getEffectEndAt',
        'effect_start_at' => 'getEffectStartAt',
        'enable_state' => 'getEnableState',
        'evaluation_count' => 'getEvaluationCount',
        'level' => 'getLevel',
        'level_conditions' => 'getLevelConditions',
        'multiple_conditions' => 'getMultipleConditions',
        'namespace' => 'getNamespace',
        'no_data' => 'getNoData',
        'notification_id' => 'getNotificationId',
        'original_dimensions' => 'getOriginalDimensions',
        'project_name' => 'getProjectName',
        'recovery_notify' => 'getRecoveryNotify',
        'regions' => 'getRegions',
        'rule_name' => 'getRuleName',
        'rule_type' => 'getRuleType',
        'silence_time' => 'getSilenceTime',
        'sub_namespace' => 'getSubNamespace',
        'tags' => 'getTags',
        'webhook' => 'getWebhook',
        'webhook_ids' => 'getWebhookIds'
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

    const ALERT_METHODS_EMAIL = 'Email';
    const ALERT_METHODS_PHONE = 'Phone';
    const ALERT_METHODS_SMS = 'SMS';
    const ALERT_METHODS_WEBHOOK = 'Webhook';
    const RULE_TYPE__STATIC = 'static';
    const RULE_TYPE_DYNAMIC = 'dynamic';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAlertMethodsAllowableValues()
    {
        return [
            self::ALERT_METHODS_EMAIL,
            self::ALERT_METHODS_PHONE,
            self::ALERT_METHODS_SMS,
            self::ALERT_METHODS_WEBHOOK,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRuleTypeAllowableValues()
    {
        return [
            self::RULE_TYPE__STATIC,
            self::RULE_TYPE_DYNAMIC,
        ];
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
        $this->container['alert_methods'] = isset($data['alert_methods']) ? $data['alert_methods'] : null;
        $this->container['condition_operator'] = isset($data['condition_operator']) ? $data['condition_operator'] : null;
        $this->container['conditions'] = isset($data['conditions']) ? $data['conditions'] : null;
        $this->container['contact_group_ids'] = isset($data['contact_group_ids']) ? $data['contact_group_ids'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['dimension_conditions'] = isset($data['dimension_conditions']) ? $data['dimension_conditions'] : null;
        $this->container['effect_end_at'] = isset($data['effect_end_at']) ? $data['effect_end_at'] : null;
        $this->container['effect_start_at'] = isset($data['effect_start_at']) ? $data['effect_start_at'] : null;
        $this->container['enable_state'] = isset($data['enable_state']) ? $data['enable_state'] : null;
        $this->container['evaluation_count'] = isset($data['evaluation_count']) ? $data['evaluation_count'] : null;
        $this->container['level'] = isset($data['level']) ? $data['level'] : null;
        $this->container['level_conditions'] = isset($data['level_conditions']) ? $data['level_conditions'] : null;
        $this->container['multiple_conditions'] = isset($data['multiple_conditions']) ? $data['multiple_conditions'] : null;
        $this->container['namespace'] = isset($data['namespace']) ? $data['namespace'] : null;
        $this->container['no_data'] = isset($data['no_data']) ? $data['no_data'] : null;
        $this->container['notification_id'] = isset($data['notification_id']) ? $data['notification_id'] : null;
        $this->container['original_dimensions'] = isset($data['original_dimensions']) ? $data['original_dimensions'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['recovery_notify'] = isset($data['recovery_notify']) ? $data['recovery_notify'] : null;
        $this->container['regions'] = isset($data['regions']) ? $data['regions'] : null;
        $this->container['rule_name'] = isset($data['rule_name']) ? $data['rule_name'] : null;
        $this->container['rule_type'] = isset($data['rule_type']) ? $data['rule_type'] : null;
        $this->container['silence_time'] = isset($data['silence_time']) ? $data['silence_time'] : null;
        $this->container['sub_namespace'] = isset($data['sub_namespace']) ? $data['sub_namespace'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['webhook'] = isset($data['webhook']) ? $data['webhook'] : null;
        $this->container['webhook_ids'] = isset($data['webhook_ids']) ? $data['webhook_ids'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['effect_end_at'] === null) {
            $invalidProperties[] = "'effect_end_at' can't be null";
        }
        if ($this->container['effect_start_at'] === null) {
            $invalidProperties[] = "'effect_start_at' can't be null";
        }
        if ($this->container['enable_state'] === null) {
            $invalidProperties[] = "'enable_state' can't be null";
        }
        if ($this->container['evaluation_count'] === null) {
            $invalidProperties[] = "'evaluation_count' can't be null";
        }
        if ($this->container['level'] === null) {
            $invalidProperties[] = "'level' can't be null";
        }
        if ($this->container['namespace'] === null) {
            $invalidProperties[] = "'namespace' can't be null";
        }
        if ($this->container['rule_name'] === null) {
            $invalidProperties[] = "'rule_name' can't be null";
        }
        if ($this->container['rule_type'] === null) {
            $invalidProperties[] = "'rule_type' can't be null";
        }
        $allowedValues = $this->getRuleTypeAllowableValues();
        if (!is_null($this->container['rule_type']) && !in_array($this->container['rule_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'rule_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['silence_time'] === null) {
            $invalidProperties[] = "'silence_time' can't be null";
        }
        if ($this->container['sub_namespace'] === null) {
            $invalidProperties[] = "'sub_namespace' can't be null";
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
     * Gets alert_methods
     *
     * @return string[]
     */
    public function getAlertMethods()
    {
        return $this->container['alert_methods'];
    }

    /**
     * Sets alert_methods
     *
     * @param string[] $alert_methods alert_methods
     *
     * @return $this
     */
    public function setAlertMethods($alert_methods)
    {
        $allowedValues = $this->getAlertMethodsAllowableValues();
        if (!is_null($alert_methods) && array_diff($alert_methods, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'alert_methods', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['alert_methods'] = $alert_methods;

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
     * Gets conditions
     *
     * @return \Volcengine\Volcobserve\Model\ConditionForCreateRuleInput[]
     */
    public function getConditions()
    {
        return $this->container['conditions'];
    }

    /**
     * Sets conditions
     *
     * @param \Volcengine\Volcobserve\Model\ConditionForCreateRuleInput[] $conditions conditions
     *
     * @return $this
     */
    public function setConditions($conditions)
    {
        $this->container['conditions'] = $conditions;

        return $this;
    }

    /**
     * Gets contact_group_ids
     *
     * @return string[]
     */
    public function getContactGroupIds()
    {
        return $this->container['contact_group_ids'];
    }

    /**
     * Sets contact_group_ids
     *
     * @param string[] $contact_group_ids contact_group_ids
     *
     * @return $this
     */
    public function setContactGroupIds($contact_group_ids)
    {
        $this->container['contact_group_ids'] = $contact_group_ids;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets dimension_conditions
     *
     * @return \Volcengine\Volcobserve\Model\DimensionConditionsForCreateRuleInput
     */
    public function getDimensionConditions()
    {
        return $this->container['dimension_conditions'];
    }

    /**
     * Sets dimension_conditions
     *
     * @param \Volcengine\Volcobserve\Model\DimensionConditionsForCreateRuleInput $dimension_conditions dimension_conditions
     *
     * @return $this
     */
    public function setDimensionConditions($dimension_conditions)
    {
        $this->container['dimension_conditions'] = $dimension_conditions;

        return $this;
    }

    /**
     * Gets effect_end_at
     *
     * @return string
     */
    public function getEffectEndAt()
    {
        return $this->container['effect_end_at'];
    }

    /**
     * Sets effect_end_at
     *
     * @param string $effect_end_at effect_end_at
     *
     * @return $this
     */
    public function setEffectEndAt($effect_end_at)
    {
        $this->container['effect_end_at'] = $effect_end_at;

        return $this;
    }

    /**
     * Gets effect_start_at
     *
     * @return string
     */
    public function getEffectStartAt()
    {
        return $this->container['effect_start_at'];
    }

    /**
     * Sets effect_start_at
     *
     * @param string $effect_start_at effect_start_at
     *
     * @return $this
     */
    public function setEffectStartAt($effect_start_at)
    {
        $this->container['effect_start_at'] = $effect_start_at;

        return $this;
    }

    /**
     * Gets enable_state
     *
     * @return string
     */
    public function getEnableState()
    {
        return $this->container['enable_state'];
    }

    /**
     * Sets enable_state
     *
     * @param string $enable_state enable_state
     *
     * @return $this
     */
    public function setEnableState($enable_state)
    {
        $this->container['enable_state'] = $enable_state;

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
     * Gets level
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->container['level'];
    }

    /**
     * Sets level
     *
     * @param string $level level
     *
     * @return $this
     */
    public function setLevel($level)
    {
        $this->container['level'] = $level;

        return $this;
    }

    /**
     * Gets level_conditions
     *
     * @return \Volcengine\Volcobserve\Model\LevelConditionForCreateRuleInput[]
     */
    public function getLevelConditions()
    {
        return $this->container['level_conditions'];
    }

    /**
     * Sets level_conditions
     *
     * @param \Volcengine\Volcobserve\Model\LevelConditionForCreateRuleInput[] $level_conditions level_conditions
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
     * Gets no_data
     *
     * @return \Volcengine\Volcobserve\Model\NoDataForCreateRuleInput
     */
    public function getNoData()
    {
        return $this->container['no_data'];
    }

    /**
     * Sets no_data
     *
     * @param \Volcengine\Volcobserve\Model\NoDataForCreateRuleInput $no_data no_data
     *
     * @return $this
     */
    public function setNoData($no_data)
    {
        $this->container['no_data'] = $no_data;

        return $this;
    }

    /**
     * Gets notification_id
     *
     * @return string
     */
    public function getNotificationId()
    {
        return $this->container['notification_id'];
    }

    /**
     * Sets notification_id
     *
     * @param string $notification_id notification_id
     *
     * @return $this
     */
    public function setNotificationId($notification_id)
    {
        $this->container['notification_id'] = $notification_id;

        return $this;
    }

    /**
     * Gets original_dimensions
     *
     * @return map[string,string[]]
     */
    public function getOriginalDimensions()
    {
        return $this->container['original_dimensions'];
    }

    /**
     * Sets original_dimensions
     *
     * @param map[string,string[]] $original_dimensions original_dimensions
     *
     * @return $this
     */
    public function setOriginalDimensions($original_dimensions)
    {
        $this->container['original_dimensions'] = $original_dimensions;

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
     * Gets recovery_notify
     *
     * @return \Volcengine\Volcobserve\Model\RecoveryNotifyForCreateRuleInput
     */
    public function getRecoveryNotify()
    {
        return $this->container['recovery_notify'];
    }

    /**
     * Sets recovery_notify
     *
     * @param \Volcengine\Volcobserve\Model\RecoveryNotifyForCreateRuleInput $recovery_notify recovery_notify
     *
     * @return $this
     */
    public function setRecoveryNotify($recovery_notify)
    {
        $this->container['recovery_notify'] = $recovery_notify;

        return $this;
    }

    /**
     * Gets regions
     *
     * @return string[]
     */
    public function getRegions()
    {
        return $this->container['regions'];
    }

    /**
     * Sets regions
     *
     * @param string[] $regions regions
     *
     * @return $this
     */
    public function setRegions($regions)
    {
        $this->container['regions'] = $regions;

        return $this;
    }

    /**
     * Gets rule_name
     *
     * @return string
     */
    public function getRuleName()
    {
        return $this->container['rule_name'];
    }

    /**
     * Sets rule_name
     *
     * @param string $rule_name rule_name
     *
     * @return $this
     */
    public function setRuleName($rule_name)
    {
        $this->container['rule_name'] = $rule_name;

        return $this;
    }

    /**
     * Gets rule_type
     *
     * @return string
     */
    public function getRuleType()
    {
        return $this->container['rule_type'];
    }

    /**
     * Sets rule_type
     *
     * @param string $rule_type rule_type
     *
     * @return $this
     */
    public function setRuleType($rule_type)
    {
        $allowedValues = $this->getRuleTypeAllowableValues();
        if (!in_array($rule_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'rule_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['rule_type'] = $rule_type;

        return $this;
    }

    /**
     * Gets silence_time
     *
     * @return int
     */
    public function getSilenceTime()
    {
        return $this->container['silence_time'];
    }

    /**
     * Sets silence_time
     *
     * @param int $silence_time silence_time
     *
     * @return $this
     */
    public function setSilenceTime($silence_time)
    {
        $this->container['silence_time'] = $silence_time;

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
     * Gets tags
     *
     * @return \Volcengine\Volcobserve\Model\ConvertTagForCreateRuleInput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Volcobserve\Model\ConvertTagForCreateRuleInput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets webhook
     *
     * @return string
     */
    public function getWebhook()
    {
        return $this->container['webhook'];
    }

    /**
     * Sets webhook
     *
     * @param string $webhook webhook
     *
     * @return $this
     */
    public function setWebhook($webhook)
    {
        $this->container['webhook'] = $webhook;

        return $this;
    }

    /**
     * Gets webhook_ids
     *
     * @return string[]
     */
    public function getWebhookIds()
    {
        return $this->container['webhook_ids'];
    }

    /**
     * Sets webhook_ids
     *
     * @param string[] $webhook_ids webhook_ids
     *
     * @return $this
     */
    public function setWebhookIds($webhook_ids)
    {
        $this->container['webhook_ids'] = $webhook_ids;

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

