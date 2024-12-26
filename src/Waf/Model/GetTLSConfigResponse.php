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

class GetTLSConfigResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetTLSConfigResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'alarm_threshold' => 'int',
        'capacity_alert' => 'bool',
        'capacity_alert_interval' => 'int',
        'domain_list' => 'string[]',
        'field_list' => '\Volcengine\Waf\Model\FieldListForGetTLSConfigOutput',
        'field_select_all' => 'bool',
        'project_id' => 'string',
        'project_name' => 'string',
        'tls_region' => 'string',
        'tls_storage_time' => 'int',
        'tls_total_capacity' => 'int',
        'tls_total_usage' => 'int',
        'topic_id' => 'string',
        'topic_name' => 'string',
        'total_domain_list' => 'string[]',
        'waf_action_list' => '\Volcengine\Waf\Model\WafActionListForGetTLSConfigOutput',
        'waf_action_select_all' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'alarm_threshold' => 'int32',
        'capacity_alert' => null,
        'capacity_alert_interval' => 'int32',
        'domain_list' => null,
        'field_list' => null,
        'field_select_all' => null,
        'project_id' => null,
        'project_name' => null,
        'tls_region' => null,
        'tls_storage_time' => 'int32',
        'tls_total_capacity' => 'int32',
        'tls_total_usage' => 'int32',
        'topic_id' => null,
        'topic_name' => null,
        'total_domain_list' => null,
        'waf_action_list' => null,
        'waf_action_select_all' => null
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
        'alarm_threshold' => 'AlarmThreshold',
        'capacity_alert' => 'CapacityAlert',
        'capacity_alert_interval' => 'CapacityAlertInterval',
        'domain_list' => 'DomainList',
        'field_list' => 'FieldList',
        'field_select_all' => 'FieldSelectAll',
        'project_id' => 'ProjectID',
        'project_name' => 'ProjectName',
        'tls_region' => 'TLSRegion',
        'tls_storage_time' => 'TLSStorageTime',
        'tls_total_capacity' => 'TLSTotalCapacity',
        'tls_total_usage' => 'TLSTotalUsage',
        'topic_id' => 'TopicID',
        'topic_name' => 'TopicName',
        'total_domain_list' => 'TotalDomainList',
        'waf_action_list' => 'WafActionList',
        'waf_action_select_all' => 'WafActionSelectAll'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'alarm_threshold' => 'setAlarmThreshold',
        'capacity_alert' => 'setCapacityAlert',
        'capacity_alert_interval' => 'setCapacityAlertInterval',
        'domain_list' => 'setDomainList',
        'field_list' => 'setFieldList',
        'field_select_all' => 'setFieldSelectAll',
        'project_id' => 'setProjectId',
        'project_name' => 'setProjectName',
        'tls_region' => 'setTlsRegion',
        'tls_storage_time' => 'setTlsStorageTime',
        'tls_total_capacity' => 'setTlsTotalCapacity',
        'tls_total_usage' => 'setTlsTotalUsage',
        'topic_id' => 'setTopicId',
        'topic_name' => 'setTopicName',
        'total_domain_list' => 'setTotalDomainList',
        'waf_action_list' => 'setWafActionList',
        'waf_action_select_all' => 'setWafActionSelectAll'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'alarm_threshold' => 'getAlarmThreshold',
        'capacity_alert' => 'getCapacityAlert',
        'capacity_alert_interval' => 'getCapacityAlertInterval',
        'domain_list' => 'getDomainList',
        'field_list' => 'getFieldList',
        'field_select_all' => 'getFieldSelectAll',
        'project_id' => 'getProjectId',
        'project_name' => 'getProjectName',
        'tls_region' => 'getTlsRegion',
        'tls_storage_time' => 'getTlsStorageTime',
        'tls_total_capacity' => 'getTlsTotalCapacity',
        'tls_total_usage' => 'getTlsTotalUsage',
        'topic_id' => 'getTopicId',
        'topic_name' => 'getTopicName',
        'total_domain_list' => 'getTotalDomainList',
        'waf_action_list' => 'getWafActionList',
        'waf_action_select_all' => 'getWafActionSelectAll'
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
        $this->container['alarm_threshold'] = isset($data['alarm_threshold']) ? $data['alarm_threshold'] : null;
        $this->container['capacity_alert'] = isset($data['capacity_alert']) ? $data['capacity_alert'] : null;
        $this->container['capacity_alert_interval'] = isset($data['capacity_alert_interval']) ? $data['capacity_alert_interval'] : null;
        $this->container['domain_list'] = isset($data['domain_list']) ? $data['domain_list'] : null;
        $this->container['field_list'] = isset($data['field_list']) ? $data['field_list'] : null;
        $this->container['field_select_all'] = isset($data['field_select_all']) ? $data['field_select_all'] : null;
        $this->container['project_id'] = isset($data['project_id']) ? $data['project_id'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['tls_region'] = isset($data['tls_region']) ? $data['tls_region'] : null;
        $this->container['tls_storage_time'] = isset($data['tls_storage_time']) ? $data['tls_storage_time'] : null;
        $this->container['tls_total_capacity'] = isset($data['tls_total_capacity']) ? $data['tls_total_capacity'] : null;
        $this->container['tls_total_usage'] = isset($data['tls_total_usage']) ? $data['tls_total_usage'] : null;
        $this->container['topic_id'] = isset($data['topic_id']) ? $data['topic_id'] : null;
        $this->container['topic_name'] = isset($data['topic_name']) ? $data['topic_name'] : null;
        $this->container['total_domain_list'] = isset($data['total_domain_list']) ? $data['total_domain_list'] : null;
        $this->container['waf_action_list'] = isset($data['waf_action_list']) ? $data['waf_action_list'] : null;
        $this->container['waf_action_select_all'] = isset($data['waf_action_select_all']) ? $data['waf_action_select_all'] : null;
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
     * Gets alarm_threshold
     *
     * @return int
     */
    public function getAlarmThreshold()
    {
        return $this->container['alarm_threshold'];
    }

    /**
     * Sets alarm_threshold
     *
     * @param int $alarm_threshold alarm_threshold
     *
     * @return $this
     */
    public function setAlarmThreshold($alarm_threshold)
    {
        $this->container['alarm_threshold'] = $alarm_threshold;

        return $this;
    }

    /**
     * Gets capacity_alert
     *
     * @return bool
     */
    public function getCapacityAlert()
    {
        return $this->container['capacity_alert'];
    }

    /**
     * Sets capacity_alert
     *
     * @param bool $capacity_alert capacity_alert
     *
     * @return $this
     */
    public function setCapacityAlert($capacity_alert)
    {
        $this->container['capacity_alert'] = $capacity_alert;

        return $this;
    }

    /**
     * Gets capacity_alert_interval
     *
     * @return int
     */
    public function getCapacityAlertInterval()
    {
        return $this->container['capacity_alert_interval'];
    }

    /**
     * Sets capacity_alert_interval
     *
     * @param int $capacity_alert_interval capacity_alert_interval
     *
     * @return $this
     */
    public function setCapacityAlertInterval($capacity_alert_interval)
    {
        $this->container['capacity_alert_interval'] = $capacity_alert_interval;

        return $this;
    }

    /**
     * Gets domain_list
     *
     * @return string[]
     */
    public function getDomainList()
    {
        return $this->container['domain_list'];
    }

    /**
     * Sets domain_list
     *
     * @param string[] $domain_list domain_list
     *
     * @return $this
     */
    public function setDomainList($domain_list)
    {
        $this->container['domain_list'] = $domain_list;

        return $this;
    }

    /**
     * Gets field_list
     *
     * @return \Volcengine\Waf\Model\FieldListForGetTLSConfigOutput
     */
    public function getFieldList()
    {
        return $this->container['field_list'];
    }

    /**
     * Sets field_list
     *
     * @param \Volcengine\Waf\Model\FieldListForGetTLSConfigOutput $field_list field_list
     *
     * @return $this
     */
    public function setFieldList($field_list)
    {
        $this->container['field_list'] = $field_list;

        return $this;
    }

    /**
     * Gets field_select_all
     *
     * @return bool
     */
    public function getFieldSelectAll()
    {
        return $this->container['field_select_all'];
    }

    /**
     * Sets field_select_all
     *
     * @param bool $field_select_all field_select_all
     *
     * @return $this
     */
    public function setFieldSelectAll($field_select_all)
    {
        $this->container['field_select_all'] = $field_select_all;

        return $this;
    }

    /**
     * Gets project_id
     *
     * @return string
     */
    public function getProjectId()
    {
        return $this->container['project_id'];
    }

    /**
     * Sets project_id
     *
     * @param string $project_id project_id
     *
     * @return $this
     */
    public function setProjectId($project_id)
    {
        $this->container['project_id'] = $project_id;

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
     * Gets tls_region
     *
     * @return string
     */
    public function getTlsRegion()
    {
        return $this->container['tls_region'];
    }

    /**
     * Sets tls_region
     *
     * @param string $tls_region tls_region
     *
     * @return $this
     */
    public function setTlsRegion($tls_region)
    {
        $this->container['tls_region'] = $tls_region;

        return $this;
    }

    /**
     * Gets tls_storage_time
     *
     * @return int
     */
    public function getTlsStorageTime()
    {
        return $this->container['tls_storage_time'];
    }

    /**
     * Sets tls_storage_time
     *
     * @param int $tls_storage_time tls_storage_time
     *
     * @return $this
     */
    public function setTlsStorageTime($tls_storage_time)
    {
        $this->container['tls_storage_time'] = $tls_storage_time;

        return $this;
    }

    /**
     * Gets tls_total_capacity
     *
     * @return int
     */
    public function getTlsTotalCapacity()
    {
        return $this->container['tls_total_capacity'];
    }

    /**
     * Sets tls_total_capacity
     *
     * @param int $tls_total_capacity tls_total_capacity
     *
     * @return $this
     */
    public function setTlsTotalCapacity($tls_total_capacity)
    {
        $this->container['tls_total_capacity'] = $tls_total_capacity;

        return $this;
    }

    /**
     * Gets tls_total_usage
     *
     * @return int
     */
    public function getTlsTotalUsage()
    {
        return $this->container['tls_total_usage'];
    }

    /**
     * Sets tls_total_usage
     *
     * @param int $tls_total_usage tls_total_usage
     *
     * @return $this
     */
    public function setTlsTotalUsage($tls_total_usage)
    {
        $this->container['tls_total_usage'] = $tls_total_usage;

        return $this;
    }

    /**
     * Gets topic_id
     *
     * @return string
     */
    public function getTopicId()
    {
        return $this->container['topic_id'];
    }

    /**
     * Sets topic_id
     *
     * @param string $topic_id topic_id
     *
     * @return $this
     */
    public function setTopicId($topic_id)
    {
        $this->container['topic_id'] = $topic_id;

        return $this;
    }

    /**
     * Gets topic_name
     *
     * @return string
     */
    public function getTopicName()
    {
        return $this->container['topic_name'];
    }

    /**
     * Sets topic_name
     *
     * @param string $topic_name topic_name
     *
     * @return $this
     */
    public function setTopicName($topic_name)
    {
        $this->container['topic_name'] = $topic_name;

        return $this;
    }

    /**
     * Gets total_domain_list
     *
     * @return string[]
     */
    public function getTotalDomainList()
    {
        return $this->container['total_domain_list'];
    }

    /**
     * Sets total_domain_list
     *
     * @param string[] $total_domain_list total_domain_list
     *
     * @return $this
     */
    public function setTotalDomainList($total_domain_list)
    {
        $this->container['total_domain_list'] = $total_domain_list;

        return $this;
    }

    /**
     * Gets waf_action_list
     *
     * @return \Volcengine\Waf\Model\WafActionListForGetTLSConfigOutput
     */
    public function getWafActionList()
    {
        return $this->container['waf_action_list'];
    }

    /**
     * Sets waf_action_list
     *
     * @param \Volcengine\Waf\Model\WafActionListForGetTLSConfigOutput $waf_action_list waf_action_list
     *
     * @return $this
     */
    public function setWafActionList($waf_action_list)
    {
        $this->container['waf_action_list'] = $waf_action_list;

        return $this;
    }

    /**
     * Gets waf_action_select_all
     *
     * @return bool
     */
    public function getWafActionSelectAll()
    {
        return $this->container['waf_action_select_all'];
    }

    /**
     * Sets waf_action_select_all
     *
     * @param bool $waf_action_select_all waf_action_select_all
     *
     * @return $this
     */
    public function setWafActionSelectAll($waf_action_select_all)
    {
        $this->container['waf_action_select_all'] = $waf_action_select_all;

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
