<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vpc\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class TrafficMirrorFilterForDescribeTrafficMirrorFiltersOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TrafficMirrorFilterForDescribeTrafficMirrorFiltersOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'created_at' => 'string',
        'description' => 'string',
        'egress_filter_rules' => '\Volcengine\Vpc\Model\EgressFilterRuleForDescribeTrafficMirrorFiltersOutput[]',
        'ingress_filter_rules' => '\Volcengine\Vpc\Model\IngressFilterRuleForDescribeTrafficMirrorFiltersOutput[]',
        'project_name' => 'string',
        'status' => 'string',
        'tags' => '\Volcengine\Vpc\Model\TagForDescribeTrafficMirrorFiltersOutput[]',
        'traffic_mirror_filter_id' => 'string',
        'traffic_mirror_filter_name' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'created_at' => null,
        'description' => null,
        'egress_filter_rules' => null,
        'ingress_filter_rules' => null,
        'project_name' => null,
        'status' => null,
        'tags' => null,
        'traffic_mirror_filter_id' => null,
        'traffic_mirror_filter_name' => null
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
        'created_at' => 'CreatedAt',
        'description' => 'Description',
        'egress_filter_rules' => 'EgressFilterRules',
        'ingress_filter_rules' => 'IngressFilterRules',
        'project_name' => 'ProjectName',
        'status' => 'Status',
        'tags' => 'Tags',
        'traffic_mirror_filter_id' => 'TrafficMirrorFilterId',
        'traffic_mirror_filter_name' => 'TrafficMirrorFilterName'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'created_at' => 'setCreatedAt',
        'description' => 'setDescription',
        'egress_filter_rules' => 'setEgressFilterRules',
        'ingress_filter_rules' => 'setIngressFilterRules',
        'project_name' => 'setProjectName',
        'status' => 'setStatus',
        'tags' => 'setTags',
        'traffic_mirror_filter_id' => 'setTrafficMirrorFilterId',
        'traffic_mirror_filter_name' => 'setTrafficMirrorFilterName'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'created_at' => 'getCreatedAt',
        'description' => 'getDescription',
        'egress_filter_rules' => 'getEgressFilterRules',
        'ingress_filter_rules' => 'getIngressFilterRules',
        'project_name' => 'getProjectName',
        'status' => 'getStatus',
        'tags' => 'getTags',
        'traffic_mirror_filter_id' => 'getTrafficMirrorFilterId',
        'traffic_mirror_filter_name' => 'getTrafficMirrorFilterName'
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
        $this->container['created_at'] = isset($data['created_at']) ? $data['created_at'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['egress_filter_rules'] = isset($data['egress_filter_rules']) ? $data['egress_filter_rules'] : null;
        $this->container['ingress_filter_rules'] = isset($data['ingress_filter_rules']) ? $data['ingress_filter_rules'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['traffic_mirror_filter_id'] = isset($data['traffic_mirror_filter_id']) ? $data['traffic_mirror_filter_id'] : null;
        $this->container['traffic_mirror_filter_name'] = isset($data['traffic_mirror_filter_name']) ? $data['traffic_mirror_filter_name'] : null;
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
     * Gets created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string $created_at created_at
     *
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->container['created_at'] = $created_at;

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
     * Gets egress_filter_rules
     *
     * @return \Volcengine\Vpc\Model\EgressFilterRuleForDescribeTrafficMirrorFiltersOutput[]
     */
    public function getEgressFilterRules()
    {
        return $this->container['egress_filter_rules'];
    }

    /**
     * Sets egress_filter_rules
     *
     * @param \Volcengine\Vpc\Model\EgressFilterRuleForDescribeTrafficMirrorFiltersOutput[] $egress_filter_rules egress_filter_rules
     *
     * @return $this
     */
    public function setEgressFilterRules($egress_filter_rules)
    {
        $this->container['egress_filter_rules'] = $egress_filter_rules;

        return $this;
    }

    /**
     * Gets ingress_filter_rules
     *
     * @return \Volcengine\Vpc\Model\IngressFilterRuleForDescribeTrafficMirrorFiltersOutput[]
     */
    public function getIngressFilterRules()
    {
        return $this->container['ingress_filter_rules'];
    }

    /**
     * Sets ingress_filter_rules
     *
     * @param \Volcengine\Vpc\Model\IngressFilterRuleForDescribeTrafficMirrorFiltersOutput[] $ingress_filter_rules ingress_filter_rules
     *
     * @return $this
     */
    public function setIngressFilterRules($ingress_filter_rules)
    {
        $this->container['ingress_filter_rules'] = $ingress_filter_rules;

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
     * @return \Volcengine\Vpc\Model\TagForDescribeTrafficMirrorFiltersOutput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Vpc\Model\TagForDescribeTrafficMirrorFiltersOutput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets traffic_mirror_filter_id
     *
     * @return string
     */
    public function getTrafficMirrorFilterId()
    {
        return $this->container['traffic_mirror_filter_id'];
    }

    /**
     * Sets traffic_mirror_filter_id
     *
     * @param string $traffic_mirror_filter_id traffic_mirror_filter_id
     *
     * @return $this
     */
    public function setTrafficMirrorFilterId($traffic_mirror_filter_id)
    {
        $this->container['traffic_mirror_filter_id'] = $traffic_mirror_filter_id;

        return $this;
    }

    /**
     * Gets traffic_mirror_filter_name
     *
     * @return string
     */
    public function getTrafficMirrorFilterName()
    {
        return $this->container['traffic_mirror_filter_name'];
    }

    /**
     * Sets traffic_mirror_filter_name
     *
     * @param string $traffic_mirror_filter_name traffic_mirror_filter_name
     *
     * @return $this
     */
    public function setTrafficMirrorFilterName($traffic_mirror_filter_name)
    {
        $this->container['traffic_mirror_filter_name'] = $traffic_mirror_filter_name;

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
