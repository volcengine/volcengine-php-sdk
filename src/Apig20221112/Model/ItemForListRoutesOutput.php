<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Apig20221112\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class ItemForListRoutesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ItemForListRoutesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'advanced_setting' => '\Volcengine\Apig20221112\Model\AdvancedSettingForListRoutesOutput',
        'create_time' => 'string',
        'custom_domains' => '\Volcengine\Apig20221112\Model\CustomDomainForListRoutesOutput[]',
        'domains' => '\Volcengine\Apig20221112\Model\DomainForListRoutesOutput[]',
        'enable' => 'bool',
        'id' => 'string',
        'match_rule' => '\Volcengine\Apig20221112\Model\MatchRuleForListRoutesOutput',
        'name' => 'string',
        'priority' => 'int',
        'reason' => 'string',
        'resource_type' => 'string',
        'service_id' => 'string',
        'service_name' => 'string',
        'status' => 'string',
        'tags' => '\Volcengine\Apig20221112\Model\TagForListRoutesOutput[]',
        'update_time' => 'string',
        'upstream_list' => '\Volcengine\Apig20221112\Model\UpstreamListForListRoutesOutput[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'advanced_setting' => null,
        'create_time' => null,
        'custom_domains' => null,
        'domains' => null,
        'enable' => null,
        'id' => null,
        'match_rule' => null,
        'name' => null,
        'priority' => 'int64',
        'reason' => null,
        'resource_type' => null,
        'service_id' => null,
        'service_name' => null,
        'status' => null,
        'tags' => null,
        'update_time' => null,
        'upstream_list' => null
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
        'advanced_setting' => 'AdvancedSetting',
        'create_time' => 'CreateTime',
        'custom_domains' => 'CustomDomains',
        'domains' => 'Domains',
        'enable' => 'Enable',
        'id' => 'Id',
        'match_rule' => 'MatchRule',
        'name' => 'Name',
        'priority' => 'Priority',
        'reason' => 'Reason',
        'resource_type' => 'ResourceType',
        'service_id' => 'ServiceId',
        'service_name' => 'ServiceName',
        'status' => 'Status',
        'tags' => 'Tags',
        'update_time' => 'UpdateTime',
        'upstream_list' => 'UpstreamList'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'advanced_setting' => 'setAdvancedSetting',
        'create_time' => 'setCreateTime',
        'custom_domains' => 'setCustomDomains',
        'domains' => 'setDomains',
        'enable' => 'setEnable',
        'id' => 'setId',
        'match_rule' => 'setMatchRule',
        'name' => 'setName',
        'priority' => 'setPriority',
        'reason' => 'setReason',
        'resource_type' => 'setResourceType',
        'service_id' => 'setServiceId',
        'service_name' => 'setServiceName',
        'status' => 'setStatus',
        'tags' => 'setTags',
        'update_time' => 'setUpdateTime',
        'upstream_list' => 'setUpstreamList'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'advanced_setting' => 'getAdvancedSetting',
        'create_time' => 'getCreateTime',
        'custom_domains' => 'getCustomDomains',
        'domains' => 'getDomains',
        'enable' => 'getEnable',
        'id' => 'getId',
        'match_rule' => 'getMatchRule',
        'name' => 'getName',
        'priority' => 'getPriority',
        'reason' => 'getReason',
        'resource_type' => 'getResourceType',
        'service_id' => 'getServiceId',
        'service_name' => 'getServiceName',
        'status' => 'getStatus',
        'tags' => 'getTags',
        'update_time' => 'getUpdateTime',
        'upstream_list' => 'getUpstreamList'
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
        $this->container['advanced_setting'] = isset($data['advanced_setting']) ? $data['advanced_setting'] : null;
        $this->container['create_time'] = isset($data['create_time']) ? $data['create_time'] : null;
        $this->container['custom_domains'] = isset($data['custom_domains']) ? $data['custom_domains'] : null;
        $this->container['domains'] = isset($data['domains']) ? $data['domains'] : null;
        $this->container['enable'] = isset($data['enable']) ? $data['enable'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['match_rule'] = isset($data['match_rule']) ? $data['match_rule'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['priority'] = isset($data['priority']) ? $data['priority'] : null;
        $this->container['reason'] = isset($data['reason']) ? $data['reason'] : null;
        $this->container['resource_type'] = isset($data['resource_type']) ? $data['resource_type'] : null;
        $this->container['service_id'] = isset($data['service_id']) ? $data['service_id'] : null;
        $this->container['service_name'] = isset($data['service_name']) ? $data['service_name'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['update_time'] = isset($data['update_time']) ? $data['update_time'] : null;
        $this->container['upstream_list'] = isset($data['upstream_list']) ? $data['upstream_list'] : null;
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
     * Gets advanced_setting
     *
     * @return \Volcengine\Apig20221112\Model\AdvancedSettingForListRoutesOutput
     */
    public function getAdvancedSetting()
    {
        return $this->container['advanced_setting'];
    }

    /**
     * Sets advanced_setting
     *
     * @param \Volcengine\Apig20221112\Model\AdvancedSettingForListRoutesOutput $advanced_setting advanced_setting
     *
     * @return $this
     */
    public function setAdvancedSetting($advanced_setting)
    {
        $this->container['advanced_setting'] = $advanced_setting;

        return $this;
    }

    /**
     * Gets create_time
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->container['create_time'];
    }

    /**
     * Sets create_time
     *
     * @param string $create_time create_time
     *
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->container['create_time'] = $create_time;

        return $this;
    }

    /**
     * Gets custom_domains
     *
     * @return \Volcengine\Apig20221112\Model\CustomDomainForListRoutesOutput[]
     */
    public function getCustomDomains()
    {
        return $this->container['custom_domains'];
    }

    /**
     * Sets custom_domains
     *
     * @param \Volcengine\Apig20221112\Model\CustomDomainForListRoutesOutput[] $custom_domains custom_domains
     *
     * @return $this
     */
    public function setCustomDomains($custom_domains)
    {
        $this->container['custom_domains'] = $custom_domains;

        return $this;
    }

    /**
     * Gets domains
     *
     * @return \Volcengine\Apig20221112\Model\DomainForListRoutesOutput[]
     */
    public function getDomains()
    {
        return $this->container['domains'];
    }

    /**
     * Sets domains
     *
     * @param \Volcengine\Apig20221112\Model\DomainForListRoutesOutput[] $domains domains
     *
     * @return $this
     */
    public function setDomains($domains)
    {
        $this->container['domains'] = $domains;

        return $this;
    }

    /**
     * Gets enable
     *
     * @return bool
     */
    public function getEnable()
    {
        return $this->container['enable'];
    }

    /**
     * Sets enable
     *
     * @param bool $enable enable
     *
     * @return $this
     */
    public function setEnable($enable)
    {
        $this->container['enable'] = $enable;

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
     * Gets match_rule
     *
     * @return \Volcengine\Apig20221112\Model\MatchRuleForListRoutesOutput
     */
    public function getMatchRule()
    {
        return $this->container['match_rule'];
    }

    /**
     * Sets match_rule
     *
     * @param \Volcengine\Apig20221112\Model\MatchRuleForListRoutesOutput $match_rule match_rule
     *
     * @return $this
     */
    public function setMatchRule($match_rule)
    {
        $this->container['match_rule'] = $match_rule;

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
     * Gets priority
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->container['priority'];
    }

    /**
     * Sets priority
     *
     * @param int $priority priority
     *
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->container['priority'] = $priority;

        return $this;
    }

    /**
     * Gets reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->container['reason'];
    }

    /**
     * Sets reason
     *
     * @param string $reason reason
     *
     * @return $this
     */
    public function setReason($reason)
    {
        $this->container['reason'] = $reason;

        return $this;
    }

    /**
     * Gets resource_type
     *
     * @return string
     */
    public function getResourceType()
    {
        return $this->container['resource_type'];
    }

    /**
     * Sets resource_type
     *
     * @param string $resource_type resource_type
     *
     * @return $this
     */
    public function setResourceType($resource_type)
    {
        $this->container['resource_type'] = $resource_type;

        return $this;
    }

    /**
     * Gets service_id
     *
     * @return string
     */
    public function getServiceId()
    {
        return $this->container['service_id'];
    }

    /**
     * Sets service_id
     *
     * @param string $service_id service_id
     *
     * @return $this
     */
    public function setServiceId($service_id)
    {
        $this->container['service_id'] = $service_id;

        return $this;
    }

    /**
     * Gets service_name
     *
     * @return string
     */
    public function getServiceName()
    {
        return $this->container['service_name'];
    }

    /**
     * Sets service_name
     *
     * @param string $service_name service_name
     *
     * @return $this
     */
    public function setServiceName($service_name)
    {
        $this->container['service_name'] = $service_name;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return \Volcengine\Apig20221112\Model\TagForListRoutesOutput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Apig20221112\Model\TagForListRoutesOutput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

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
     * Gets upstream_list
     *
     * @return \Volcengine\Apig20221112\Model\UpstreamListForListRoutesOutput[]
     */
    public function getUpstreamList()
    {
        return $this->container['upstream_list'];
    }

    /**
     * Sets upstream_list
     *
     * @param \Volcengine\Apig20221112\Model\UpstreamListForListRoutesOutput[] $upstream_list upstream_list
     *
     * @return $this
     */
    public function setUpstreamList($upstream_list)
    {
        $this->container['upstream_list'] = $upstream_list;

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

