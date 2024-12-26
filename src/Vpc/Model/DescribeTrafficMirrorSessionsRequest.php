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

class DescribeTrafficMirrorSessionsRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DescribeTrafficMirrorSessionsRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'max_results' => 'int',
        'network_interface_id' => 'string',
        'next_token' => 'string',
        'packet_length' => 'int',
        'priority' => 'int',
        'project_name' => 'string',
        'tag_filters' => '\Volcengine\Vpc\Model\TagFilterForDescribeTrafficMirrorSessionsInput[]',
        'traffic_mirror_filter_id' => 'string',
        'traffic_mirror_session_ids' => 'string',
        'traffic_mirror_session_names' => 'string',
        'traffic_mirror_target_id' => 'string',
        'virtual_network_id' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'max_results' => null,
        'network_interface_id' => null,
        'next_token' => null,
        'packet_length' => null,
        'priority' => null,
        'project_name' => null,
        'tag_filters' => null,
        'traffic_mirror_filter_id' => null,
        'traffic_mirror_session_ids' => null,
        'traffic_mirror_session_names' => null,
        'traffic_mirror_target_id' => null,
        'virtual_network_id' => null
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
        'max_results' => 'MaxResults',
        'network_interface_id' => 'NetworkInterfaceId',
        'next_token' => 'NextToken',
        'packet_length' => 'PacketLength',
        'priority' => 'Priority',
        'project_name' => 'ProjectName',
        'tag_filters' => 'TagFilters',
        'traffic_mirror_filter_id' => 'TrafficMirrorFilterId',
        'traffic_mirror_session_ids' => 'TrafficMirrorSessionIds',
        'traffic_mirror_session_names' => 'TrafficMirrorSessionNames',
        'traffic_mirror_target_id' => 'TrafficMirrorTargetId',
        'virtual_network_id' => 'VirtualNetworkId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'max_results' => 'setMaxResults',
        'network_interface_id' => 'setNetworkInterfaceId',
        'next_token' => 'setNextToken',
        'packet_length' => 'setPacketLength',
        'priority' => 'setPriority',
        'project_name' => 'setProjectName',
        'tag_filters' => 'setTagFilters',
        'traffic_mirror_filter_id' => 'setTrafficMirrorFilterId',
        'traffic_mirror_session_ids' => 'setTrafficMirrorSessionIds',
        'traffic_mirror_session_names' => 'setTrafficMirrorSessionNames',
        'traffic_mirror_target_id' => 'setTrafficMirrorTargetId',
        'virtual_network_id' => 'setVirtualNetworkId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'max_results' => 'getMaxResults',
        'network_interface_id' => 'getNetworkInterfaceId',
        'next_token' => 'getNextToken',
        'packet_length' => 'getPacketLength',
        'priority' => 'getPriority',
        'project_name' => 'getProjectName',
        'tag_filters' => 'getTagFilters',
        'traffic_mirror_filter_id' => 'getTrafficMirrorFilterId',
        'traffic_mirror_session_ids' => 'getTrafficMirrorSessionIds',
        'traffic_mirror_session_names' => 'getTrafficMirrorSessionNames',
        'traffic_mirror_target_id' => 'getTrafficMirrorTargetId',
        'virtual_network_id' => 'getVirtualNetworkId'
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
        $this->container['max_results'] = isset($data['max_results']) ? $data['max_results'] : null;
        $this->container['network_interface_id'] = isset($data['network_interface_id']) ? $data['network_interface_id'] : null;
        $this->container['next_token'] = isset($data['next_token']) ? $data['next_token'] : null;
        $this->container['packet_length'] = isset($data['packet_length']) ? $data['packet_length'] : null;
        $this->container['priority'] = isset($data['priority']) ? $data['priority'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['tag_filters'] = isset($data['tag_filters']) ? $data['tag_filters'] : null;
        $this->container['traffic_mirror_filter_id'] = isset($data['traffic_mirror_filter_id']) ? $data['traffic_mirror_filter_id'] : null;
        $this->container['traffic_mirror_session_ids'] = isset($data['traffic_mirror_session_ids']) ? $data['traffic_mirror_session_ids'] : null;
        $this->container['traffic_mirror_session_names'] = isset($data['traffic_mirror_session_names']) ? $data['traffic_mirror_session_names'] : null;
        $this->container['traffic_mirror_target_id'] = isset($data['traffic_mirror_target_id']) ? $data['traffic_mirror_target_id'] : null;
        $this->container['virtual_network_id'] = isset($data['virtual_network_id']) ? $data['virtual_network_id'] : null;
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
     * Gets max_results
     *
     * @return int
     */
    public function getMaxResults()
    {
        return $this->container['max_results'];
    }

    /**
     * Sets max_results
     *
     * @param int $max_results max_results
     *
     * @return $this
     */
    public function setMaxResults($max_results)
    {
        $this->container['max_results'] = $max_results;

        return $this;
    }

    /**
     * Gets network_interface_id
     *
     * @return string
     */
    public function getNetworkInterfaceId()
    {
        return $this->container['network_interface_id'];
    }

    /**
     * Sets network_interface_id
     *
     * @param string $network_interface_id network_interface_id
     *
     * @return $this
     */
    public function setNetworkInterfaceId($network_interface_id)
    {
        $this->container['network_interface_id'] = $network_interface_id;

        return $this;
    }

    /**
     * Gets next_token
     *
     * @return string
     */
    public function getNextToken()
    {
        return $this->container['next_token'];
    }

    /**
     * Sets next_token
     *
     * @param string $next_token next_token
     *
     * @return $this
     */
    public function setNextToken($next_token)
    {
        $this->container['next_token'] = $next_token;

        return $this;
    }

    /**
     * Gets packet_length
     *
     * @return int
     */
    public function getPacketLength()
    {
        return $this->container['packet_length'];
    }

    /**
     * Sets packet_length
     *
     * @param int $packet_length packet_length
     *
     * @return $this
     */
    public function setPacketLength($packet_length)
    {
        $this->container['packet_length'] = $packet_length;

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
     * Gets tag_filters
     *
     * @return \Volcengine\Vpc\Model\TagFilterForDescribeTrafficMirrorSessionsInput[]
     */
    public function getTagFilters()
    {
        return $this->container['tag_filters'];
    }

    /**
     * Sets tag_filters
     *
     * @param \Volcengine\Vpc\Model\TagFilterForDescribeTrafficMirrorSessionsInput[] $tag_filters tag_filters
     *
     * @return $this
     */
    public function setTagFilters($tag_filters)
    {
        $this->container['tag_filters'] = $tag_filters;

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
     * Gets traffic_mirror_session_ids
     *
     * @return string
     */
    public function getTrafficMirrorSessionIds()
    {
        return $this->container['traffic_mirror_session_ids'];
    }

    /**
     * Sets traffic_mirror_session_ids
     *
     * @param string $traffic_mirror_session_ids traffic_mirror_session_ids
     *
     * @return $this
     */
    public function setTrafficMirrorSessionIds($traffic_mirror_session_ids)
    {
        $this->container['traffic_mirror_session_ids'] = $traffic_mirror_session_ids;

        return $this;
    }

    /**
     * Gets traffic_mirror_session_names
     *
     * @return string
     */
    public function getTrafficMirrorSessionNames()
    {
        return $this->container['traffic_mirror_session_names'];
    }

    /**
     * Sets traffic_mirror_session_names
     *
     * @param string $traffic_mirror_session_names traffic_mirror_session_names
     *
     * @return $this
     */
    public function setTrafficMirrorSessionNames($traffic_mirror_session_names)
    {
        $this->container['traffic_mirror_session_names'] = $traffic_mirror_session_names;

        return $this;
    }

    /**
     * Gets traffic_mirror_target_id
     *
     * @return string
     */
    public function getTrafficMirrorTargetId()
    {
        return $this->container['traffic_mirror_target_id'];
    }

    /**
     * Sets traffic_mirror_target_id
     *
     * @param string $traffic_mirror_target_id traffic_mirror_target_id
     *
     * @return $this
     */
    public function setTrafficMirrorTargetId($traffic_mirror_target_id)
    {
        $this->container['traffic_mirror_target_id'] = $traffic_mirror_target_id;

        return $this;
    }

    /**
     * Gets virtual_network_id
     *
     * @return int
     */
    public function getVirtualNetworkId()
    {
        return $this->container['virtual_network_id'];
    }

    /**
     * Sets virtual_network_id
     *
     * @param int $virtual_network_id virtual_network_id
     *
     * @return $this
     */
    public function setVirtualNetworkId($virtual_network_id)
    {
        $this->container['virtual_network_id'] = $virtual_network_id;

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
