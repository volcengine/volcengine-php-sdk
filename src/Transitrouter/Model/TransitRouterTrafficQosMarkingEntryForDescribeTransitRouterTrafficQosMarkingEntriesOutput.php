<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Transitrouter\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class TransitRouterTrafficQosMarkingEntryForDescribeTransitRouterTrafficQosMarkingEntriesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TransitRouterTrafficQosMarkingEntryForDescribeTransitRouterTrafficQosMarkingEntriesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'creation_time' => 'string',
        'description' => 'string',
        'destination_cidr_block' => 'string',
        'destination_port_end' => 'int',
        'destination_port_start' => 'int',
        'match_dscp' => 'int',
        'priority' => 'int',
        'protocol' => 'string',
        'remarking_dscp' => 'int',
        'source_cidr_block' => 'string',
        'source_port_end' => 'int',
        'source_port_start' => 'int',
        'status' => 'string',
        'transit_router_traffic_qos_marking_entry_id' => 'string',
        'transit_router_traffic_qos_marking_entry_name' => 'string',
        'transit_router_traffic_qos_marking_policy_id' => 'string',
        'update_time' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'creation_time' => null,
        'description' => null,
        'destination_cidr_block' => null,
        'destination_port_end' => 'int32',
        'destination_port_start' => 'int32',
        'match_dscp' => 'int32',
        'priority' => 'int32',
        'protocol' => null,
        'remarking_dscp' => 'int32',
        'source_cidr_block' => null,
        'source_port_end' => 'int32',
        'source_port_start' => 'int32',
        'status' => null,
        'transit_router_traffic_qos_marking_entry_id' => null,
        'transit_router_traffic_qos_marking_entry_name' => null,
        'transit_router_traffic_qos_marking_policy_id' => null,
        'update_time' => null
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
        'creation_time' => 'CreationTime',
        'description' => 'Description',
        'destination_cidr_block' => 'DestinationCidrBlock',
        'destination_port_end' => 'DestinationPortEnd',
        'destination_port_start' => 'DestinationPortStart',
        'match_dscp' => 'MatchDscp',
        'priority' => 'Priority',
        'protocol' => 'Protocol',
        'remarking_dscp' => 'RemarkingDscp',
        'source_cidr_block' => 'SourceCidrBlock',
        'source_port_end' => 'SourcePortEnd',
        'source_port_start' => 'SourcePortStart',
        'status' => 'Status',
        'transit_router_traffic_qos_marking_entry_id' => 'TransitRouterTrafficQosMarkingEntryId',
        'transit_router_traffic_qos_marking_entry_name' => 'TransitRouterTrafficQosMarkingEntryName',
        'transit_router_traffic_qos_marking_policy_id' => 'TransitRouterTrafficQosMarkingPolicyId',
        'update_time' => 'UpdateTime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'creation_time' => 'setCreationTime',
        'description' => 'setDescription',
        'destination_cidr_block' => 'setDestinationCidrBlock',
        'destination_port_end' => 'setDestinationPortEnd',
        'destination_port_start' => 'setDestinationPortStart',
        'match_dscp' => 'setMatchDscp',
        'priority' => 'setPriority',
        'protocol' => 'setProtocol',
        'remarking_dscp' => 'setRemarkingDscp',
        'source_cidr_block' => 'setSourceCidrBlock',
        'source_port_end' => 'setSourcePortEnd',
        'source_port_start' => 'setSourcePortStart',
        'status' => 'setStatus',
        'transit_router_traffic_qos_marking_entry_id' => 'setTransitRouterTrafficQosMarkingEntryId',
        'transit_router_traffic_qos_marking_entry_name' => 'setTransitRouterTrafficQosMarkingEntryName',
        'transit_router_traffic_qos_marking_policy_id' => 'setTransitRouterTrafficQosMarkingPolicyId',
        'update_time' => 'setUpdateTime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'creation_time' => 'getCreationTime',
        'description' => 'getDescription',
        'destination_cidr_block' => 'getDestinationCidrBlock',
        'destination_port_end' => 'getDestinationPortEnd',
        'destination_port_start' => 'getDestinationPortStart',
        'match_dscp' => 'getMatchDscp',
        'priority' => 'getPriority',
        'protocol' => 'getProtocol',
        'remarking_dscp' => 'getRemarkingDscp',
        'source_cidr_block' => 'getSourceCidrBlock',
        'source_port_end' => 'getSourcePortEnd',
        'source_port_start' => 'getSourcePortStart',
        'status' => 'getStatus',
        'transit_router_traffic_qos_marking_entry_id' => 'getTransitRouterTrafficQosMarkingEntryId',
        'transit_router_traffic_qos_marking_entry_name' => 'getTransitRouterTrafficQosMarkingEntryName',
        'transit_router_traffic_qos_marking_policy_id' => 'getTransitRouterTrafficQosMarkingPolicyId',
        'update_time' => 'getUpdateTime'
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
        $this->container['creation_time'] = isset($data['creation_time']) ? $data['creation_time'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['destination_cidr_block'] = isset($data['destination_cidr_block']) ? $data['destination_cidr_block'] : null;
        $this->container['destination_port_end'] = isset($data['destination_port_end']) ? $data['destination_port_end'] : null;
        $this->container['destination_port_start'] = isset($data['destination_port_start']) ? $data['destination_port_start'] : null;
        $this->container['match_dscp'] = isset($data['match_dscp']) ? $data['match_dscp'] : null;
        $this->container['priority'] = isset($data['priority']) ? $data['priority'] : null;
        $this->container['protocol'] = isset($data['protocol']) ? $data['protocol'] : null;
        $this->container['remarking_dscp'] = isset($data['remarking_dscp']) ? $data['remarking_dscp'] : null;
        $this->container['source_cidr_block'] = isset($data['source_cidr_block']) ? $data['source_cidr_block'] : null;
        $this->container['source_port_end'] = isset($data['source_port_end']) ? $data['source_port_end'] : null;
        $this->container['source_port_start'] = isset($data['source_port_start']) ? $data['source_port_start'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['transit_router_traffic_qos_marking_entry_id'] = isset($data['transit_router_traffic_qos_marking_entry_id']) ? $data['transit_router_traffic_qos_marking_entry_id'] : null;
        $this->container['transit_router_traffic_qos_marking_entry_name'] = isset($data['transit_router_traffic_qos_marking_entry_name']) ? $data['transit_router_traffic_qos_marking_entry_name'] : null;
        $this->container['transit_router_traffic_qos_marking_policy_id'] = isset($data['transit_router_traffic_qos_marking_policy_id']) ? $data['transit_router_traffic_qos_marking_policy_id'] : null;
        $this->container['update_time'] = isset($data['update_time']) ? $data['update_time'] : null;
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
     * Gets creation_time
     *
     * @return string
     */
    public function getCreationTime()
    {
        return $this->container['creation_time'];
    }

    /**
     * Sets creation_time
     *
     * @param string $creation_time creation_time
     *
     * @return $this
     */
    public function setCreationTime($creation_time)
    {
        $this->container['creation_time'] = $creation_time;

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
     * Gets destination_cidr_block
     *
     * @return string
     */
    public function getDestinationCidrBlock()
    {
        return $this->container['destination_cidr_block'];
    }

    /**
     * Sets destination_cidr_block
     *
     * @param string $destination_cidr_block destination_cidr_block
     *
     * @return $this
     */
    public function setDestinationCidrBlock($destination_cidr_block)
    {
        $this->container['destination_cidr_block'] = $destination_cidr_block;

        return $this;
    }

    /**
     * Gets destination_port_end
     *
     * @return int
     */
    public function getDestinationPortEnd()
    {
        return $this->container['destination_port_end'];
    }

    /**
     * Sets destination_port_end
     *
     * @param int $destination_port_end destination_port_end
     *
     * @return $this
     */
    public function setDestinationPortEnd($destination_port_end)
    {
        $this->container['destination_port_end'] = $destination_port_end;

        return $this;
    }

    /**
     * Gets destination_port_start
     *
     * @return int
     */
    public function getDestinationPortStart()
    {
        return $this->container['destination_port_start'];
    }

    /**
     * Sets destination_port_start
     *
     * @param int $destination_port_start destination_port_start
     *
     * @return $this
     */
    public function setDestinationPortStart($destination_port_start)
    {
        $this->container['destination_port_start'] = $destination_port_start;

        return $this;
    }

    /**
     * Gets match_dscp
     *
     * @return int
     */
    public function getMatchDscp()
    {
        return $this->container['match_dscp'];
    }

    /**
     * Sets match_dscp
     *
     * @param int $match_dscp match_dscp
     *
     * @return $this
     */
    public function setMatchDscp($match_dscp)
    {
        $this->container['match_dscp'] = $match_dscp;

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
     * Gets protocol
     *
     * @return string
     */
    public function getProtocol()
    {
        return $this->container['protocol'];
    }

    /**
     * Sets protocol
     *
     * @param string $protocol protocol
     *
     * @return $this
     */
    public function setProtocol($protocol)
    {
        $this->container['protocol'] = $protocol;

        return $this;
    }

    /**
     * Gets remarking_dscp
     *
     * @return int
     */
    public function getRemarkingDscp()
    {
        return $this->container['remarking_dscp'];
    }

    /**
     * Sets remarking_dscp
     *
     * @param int $remarking_dscp remarking_dscp
     *
     * @return $this
     */
    public function setRemarkingDscp($remarking_dscp)
    {
        $this->container['remarking_dscp'] = $remarking_dscp;

        return $this;
    }

    /**
     * Gets source_cidr_block
     *
     * @return string
     */
    public function getSourceCidrBlock()
    {
        return $this->container['source_cidr_block'];
    }

    /**
     * Sets source_cidr_block
     *
     * @param string $source_cidr_block source_cidr_block
     *
     * @return $this
     */
    public function setSourceCidrBlock($source_cidr_block)
    {
        $this->container['source_cidr_block'] = $source_cidr_block;

        return $this;
    }

    /**
     * Gets source_port_end
     *
     * @return int
     */
    public function getSourcePortEnd()
    {
        return $this->container['source_port_end'];
    }

    /**
     * Sets source_port_end
     *
     * @param int $source_port_end source_port_end
     *
     * @return $this
     */
    public function setSourcePortEnd($source_port_end)
    {
        $this->container['source_port_end'] = $source_port_end;

        return $this;
    }

    /**
     * Gets source_port_start
     *
     * @return int
     */
    public function getSourcePortStart()
    {
        return $this->container['source_port_start'];
    }

    /**
     * Sets source_port_start
     *
     * @param int $source_port_start source_port_start
     *
     * @return $this
     */
    public function setSourcePortStart($source_port_start)
    {
        $this->container['source_port_start'] = $source_port_start;

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
     * Gets transit_router_traffic_qos_marking_entry_id
     *
     * @return string
     */
    public function getTransitRouterTrafficQosMarkingEntryId()
    {
        return $this->container['transit_router_traffic_qos_marking_entry_id'];
    }

    /**
     * Sets transit_router_traffic_qos_marking_entry_id
     *
     * @param string $transit_router_traffic_qos_marking_entry_id transit_router_traffic_qos_marking_entry_id
     *
     * @return $this
     */
    public function setTransitRouterTrafficQosMarkingEntryId($transit_router_traffic_qos_marking_entry_id)
    {
        $this->container['transit_router_traffic_qos_marking_entry_id'] = $transit_router_traffic_qos_marking_entry_id;

        return $this;
    }

    /**
     * Gets transit_router_traffic_qos_marking_entry_name
     *
     * @return string
     */
    public function getTransitRouterTrafficQosMarkingEntryName()
    {
        return $this->container['transit_router_traffic_qos_marking_entry_name'];
    }

    /**
     * Sets transit_router_traffic_qos_marking_entry_name
     *
     * @param string $transit_router_traffic_qos_marking_entry_name transit_router_traffic_qos_marking_entry_name
     *
     * @return $this
     */
    public function setTransitRouterTrafficQosMarkingEntryName($transit_router_traffic_qos_marking_entry_name)
    {
        $this->container['transit_router_traffic_qos_marking_entry_name'] = $transit_router_traffic_qos_marking_entry_name;

        return $this;
    }

    /**
     * Gets transit_router_traffic_qos_marking_policy_id
     *
     * @return string
     */
    public function getTransitRouterTrafficQosMarkingPolicyId()
    {
        return $this->container['transit_router_traffic_qos_marking_policy_id'];
    }

    /**
     * Sets transit_router_traffic_qos_marking_policy_id
     *
     * @param string $transit_router_traffic_qos_marking_policy_id transit_router_traffic_qos_marking_policy_id
     *
     * @return $this
     */
    public function setTransitRouterTrafficQosMarkingPolicyId($transit_router_traffic_qos_marking_policy_id)
    {
        $this->container['transit_router_traffic_qos_marking_policy_id'] = $transit_router_traffic_qos_marking_policy_id;

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
