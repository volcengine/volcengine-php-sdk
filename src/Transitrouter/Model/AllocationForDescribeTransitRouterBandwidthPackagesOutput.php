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

class AllocationForDescribeTransitRouterBandwidthPackagesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'AllocationForDescribeTransitRouterBandwidthPackagesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'allocate_time' => 'string',
        'bandwidth' => 'int',
        'local_region_id' => 'string',
        'peer_region_id' => 'string',
        'transit_router_peer_attachment_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'allocate_time' => null,
        'bandwidth' => 'int32',
        'local_region_id' => null,
        'peer_region_id' => null,
        'transit_router_peer_attachment_id' => null
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
        'allocate_time' => 'AllocateTime',
        'bandwidth' => 'Bandwidth',
        'local_region_id' => 'LocalRegionId',
        'peer_region_id' => 'PeerRegionId',
        'transit_router_peer_attachment_id' => 'TransitRouterPeerAttachmentId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'allocate_time' => 'setAllocateTime',
        'bandwidth' => 'setBandwidth',
        'local_region_id' => 'setLocalRegionId',
        'peer_region_id' => 'setPeerRegionId',
        'transit_router_peer_attachment_id' => 'setTransitRouterPeerAttachmentId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'allocate_time' => 'getAllocateTime',
        'bandwidth' => 'getBandwidth',
        'local_region_id' => 'getLocalRegionId',
        'peer_region_id' => 'getPeerRegionId',
        'transit_router_peer_attachment_id' => 'getTransitRouterPeerAttachmentId'
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
        $this->container['allocate_time'] = isset($data['allocate_time']) ? $data['allocate_time'] : null;
        $this->container['bandwidth'] = isset($data['bandwidth']) ? $data['bandwidth'] : null;
        $this->container['local_region_id'] = isset($data['local_region_id']) ? $data['local_region_id'] : null;
        $this->container['peer_region_id'] = isset($data['peer_region_id']) ? $data['peer_region_id'] : null;
        $this->container['transit_router_peer_attachment_id'] = isset($data['transit_router_peer_attachment_id']) ? $data['transit_router_peer_attachment_id'] : null;
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
     * Gets allocate_time
     *
     * @return string
     */
    public function getAllocateTime()
    {
        return $this->container['allocate_time'];
    }

    /**
     * Sets allocate_time
     *
     * @param string $allocate_time allocate_time
     *
     * @return $this
     */
    public function setAllocateTime($allocate_time)
    {
        $this->container['allocate_time'] = $allocate_time;

        return $this;
    }

    /**
     * Gets bandwidth
     *
     * @return int
     */
    public function getBandwidth()
    {
        return $this->container['bandwidth'];
    }

    /**
     * Sets bandwidth
     *
     * @param int $bandwidth bandwidth
     *
     * @return $this
     */
    public function setBandwidth($bandwidth)
    {
        $this->container['bandwidth'] = $bandwidth;

        return $this;
    }

    /**
     * Gets local_region_id
     *
     * @return string
     */
    public function getLocalRegionId()
    {
        return $this->container['local_region_id'];
    }

    /**
     * Sets local_region_id
     *
     * @param string $local_region_id local_region_id
     *
     * @return $this
     */
    public function setLocalRegionId($local_region_id)
    {
        $this->container['local_region_id'] = $local_region_id;

        return $this;
    }

    /**
     * Gets peer_region_id
     *
     * @return string
     */
    public function getPeerRegionId()
    {
        return $this->container['peer_region_id'];
    }

    /**
     * Sets peer_region_id
     *
     * @param string $peer_region_id peer_region_id
     *
     * @return $this
     */
    public function setPeerRegionId($peer_region_id)
    {
        $this->container['peer_region_id'] = $peer_region_id;

        return $this;
    }

    /**
     * Gets transit_router_peer_attachment_id
     *
     * @return string
     */
    public function getTransitRouterPeerAttachmentId()
    {
        return $this->container['transit_router_peer_attachment_id'];
    }

    /**
     * Sets transit_router_peer_attachment_id
     *
     * @param string $transit_router_peer_attachment_id transit_router_peer_attachment_id
     *
     * @return $this
     */
    public function setTransitRouterPeerAttachmentId($transit_router_peer_attachment_id)
    {
        $this->container['transit_router_peer_attachment_id'] = $transit_router_peer_attachment_id;

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

