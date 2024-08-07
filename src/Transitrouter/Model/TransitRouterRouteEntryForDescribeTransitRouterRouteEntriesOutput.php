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

class TransitRouterRouteEntryForDescribeTransitRouterRouteEntriesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TransitRouterRouteEntryForDescribeTransitRouterRouteEntriesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'as_path' => 'string[]',
        'creation_time' => 'string',
        'description' => 'string',
        'destination_cidr_block' => 'string',
        'status' => 'string',
        'transit_router_route_entry_id' => 'string',
        'transit_router_route_entry_name' => 'string',
        'transit_router_route_entry_next_hop_id' => 'string',
        'transit_router_route_entry_next_hop_type' => 'string',
        'transit_router_route_entry_type' => 'string',
        'update_time' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'as_path' => null,
        'creation_time' => null,
        'description' => null,
        'destination_cidr_block' => null,
        'status' => null,
        'transit_router_route_entry_id' => null,
        'transit_router_route_entry_name' => null,
        'transit_router_route_entry_next_hop_id' => null,
        'transit_router_route_entry_next_hop_type' => null,
        'transit_router_route_entry_type' => null,
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
        'as_path' => 'AsPath',
        'creation_time' => 'CreationTime',
        'description' => 'Description',
        'destination_cidr_block' => 'DestinationCidrBlock',
        'status' => 'Status',
        'transit_router_route_entry_id' => 'TransitRouterRouteEntryId',
        'transit_router_route_entry_name' => 'TransitRouterRouteEntryName',
        'transit_router_route_entry_next_hop_id' => 'TransitRouterRouteEntryNextHopId',
        'transit_router_route_entry_next_hop_type' => 'TransitRouterRouteEntryNextHopType',
        'transit_router_route_entry_type' => 'TransitRouterRouteEntryType',
        'update_time' => 'UpdateTime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'as_path' => 'setAsPath',
        'creation_time' => 'setCreationTime',
        'description' => 'setDescription',
        'destination_cidr_block' => 'setDestinationCidrBlock',
        'status' => 'setStatus',
        'transit_router_route_entry_id' => 'setTransitRouterRouteEntryId',
        'transit_router_route_entry_name' => 'setTransitRouterRouteEntryName',
        'transit_router_route_entry_next_hop_id' => 'setTransitRouterRouteEntryNextHopId',
        'transit_router_route_entry_next_hop_type' => 'setTransitRouterRouteEntryNextHopType',
        'transit_router_route_entry_type' => 'setTransitRouterRouteEntryType',
        'update_time' => 'setUpdateTime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'as_path' => 'getAsPath',
        'creation_time' => 'getCreationTime',
        'description' => 'getDescription',
        'destination_cidr_block' => 'getDestinationCidrBlock',
        'status' => 'getStatus',
        'transit_router_route_entry_id' => 'getTransitRouterRouteEntryId',
        'transit_router_route_entry_name' => 'getTransitRouterRouteEntryName',
        'transit_router_route_entry_next_hop_id' => 'getTransitRouterRouteEntryNextHopId',
        'transit_router_route_entry_next_hop_type' => 'getTransitRouterRouteEntryNextHopType',
        'transit_router_route_entry_type' => 'getTransitRouterRouteEntryType',
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
        $this->container['as_path'] = isset($data['as_path']) ? $data['as_path'] : null;
        $this->container['creation_time'] = isset($data['creation_time']) ? $data['creation_time'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['destination_cidr_block'] = isset($data['destination_cidr_block']) ? $data['destination_cidr_block'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['transit_router_route_entry_id'] = isset($data['transit_router_route_entry_id']) ? $data['transit_router_route_entry_id'] : null;
        $this->container['transit_router_route_entry_name'] = isset($data['transit_router_route_entry_name']) ? $data['transit_router_route_entry_name'] : null;
        $this->container['transit_router_route_entry_next_hop_id'] = isset($data['transit_router_route_entry_next_hop_id']) ? $data['transit_router_route_entry_next_hop_id'] : null;
        $this->container['transit_router_route_entry_next_hop_type'] = isset($data['transit_router_route_entry_next_hop_type']) ? $data['transit_router_route_entry_next_hop_type'] : null;
        $this->container['transit_router_route_entry_type'] = isset($data['transit_router_route_entry_type']) ? $data['transit_router_route_entry_type'] : null;
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
     * Gets as_path
     *
     * @return string[]
     */
    public function getAsPath()
    {
        return $this->container['as_path'];
    }

    /**
     * Sets as_path
     *
     * @param string[] $as_path as_path
     *
     * @return $this
     */
    public function setAsPath($as_path)
    {
        $this->container['as_path'] = $as_path;

        return $this;
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
     * Gets transit_router_route_entry_id
     *
     * @return string
     */
    public function getTransitRouterRouteEntryId()
    {
        return $this->container['transit_router_route_entry_id'];
    }

    /**
     * Sets transit_router_route_entry_id
     *
     * @param string $transit_router_route_entry_id transit_router_route_entry_id
     *
     * @return $this
     */
    public function setTransitRouterRouteEntryId($transit_router_route_entry_id)
    {
        $this->container['transit_router_route_entry_id'] = $transit_router_route_entry_id;

        return $this;
    }

    /**
     * Gets transit_router_route_entry_name
     *
     * @return string
     */
    public function getTransitRouterRouteEntryName()
    {
        return $this->container['transit_router_route_entry_name'];
    }

    /**
     * Sets transit_router_route_entry_name
     *
     * @param string $transit_router_route_entry_name transit_router_route_entry_name
     *
     * @return $this
     */
    public function setTransitRouterRouteEntryName($transit_router_route_entry_name)
    {
        $this->container['transit_router_route_entry_name'] = $transit_router_route_entry_name;

        return $this;
    }

    /**
     * Gets transit_router_route_entry_next_hop_id
     *
     * @return string
     */
    public function getTransitRouterRouteEntryNextHopId()
    {
        return $this->container['transit_router_route_entry_next_hop_id'];
    }

    /**
     * Sets transit_router_route_entry_next_hop_id
     *
     * @param string $transit_router_route_entry_next_hop_id transit_router_route_entry_next_hop_id
     *
     * @return $this
     */
    public function setTransitRouterRouteEntryNextHopId($transit_router_route_entry_next_hop_id)
    {
        $this->container['transit_router_route_entry_next_hop_id'] = $transit_router_route_entry_next_hop_id;

        return $this;
    }

    /**
     * Gets transit_router_route_entry_next_hop_type
     *
     * @return string
     */
    public function getTransitRouterRouteEntryNextHopType()
    {
        return $this->container['transit_router_route_entry_next_hop_type'];
    }

    /**
     * Sets transit_router_route_entry_next_hop_type
     *
     * @param string $transit_router_route_entry_next_hop_type transit_router_route_entry_next_hop_type
     *
     * @return $this
     */
    public function setTransitRouterRouteEntryNextHopType($transit_router_route_entry_next_hop_type)
    {
        $this->container['transit_router_route_entry_next_hop_type'] = $transit_router_route_entry_next_hop_type;

        return $this;
    }

    /**
     * Gets transit_router_route_entry_type
     *
     * @return string
     */
    public function getTransitRouterRouteEntryType()
    {
        return $this->container['transit_router_route_entry_type'];
    }

    /**
     * Sets transit_router_route_entry_type
     *
     * @param string $transit_router_route_entry_type transit_router_route_entry_type
     *
     * @return $this
     */
    public function setTransitRouterRouteEntryType($transit_router_route_entry_type)
    {
        $this->container['transit_router_route_entry_type'] = $transit_router_route_entry_type;

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

