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

class TransitRouterBandwidthPackageForDescribeTransitRouterBandwidthPackagesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TransitRouterBandwidthPackageForDescribeTransitRouterBandwidthPackagesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'account_id' => 'string',
        'allocations' => '\Volcengine\Transitrouter\Model\AllocationForDescribeTransitRouterBandwidthPackagesOutput[]',
        'bandwidth' => 'int',
        'billing_type' => 'int',
        'business_status' => 'string',
        'creation_time' => 'string',
        'deleted_time' => 'string',
        'description' => 'string',
        'expired_time' => 'string',
        'local_geographic_region_set_id' => 'string',
        'peer_geographic_region_set_id' => 'string',
        'project_name' => 'string',
        'remaining_bandwidth' => 'int',
        'status' => 'string',
        'tags' => '\Volcengine\Transitrouter\Model\TagForDescribeTransitRouterBandwidthPackagesOutput[]',
        'transit_router_bandwidth_package_id' => 'string',
        'transit_router_bandwidth_package_name' => 'string',
        'update_time' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'account_id' => null,
        'allocations' => null,
        'bandwidth' => 'int32',
        'billing_type' => 'int32',
        'business_status' => null,
        'creation_time' => null,
        'deleted_time' => null,
        'description' => null,
        'expired_time' => null,
        'local_geographic_region_set_id' => null,
        'peer_geographic_region_set_id' => null,
        'project_name' => null,
        'remaining_bandwidth' => 'int32',
        'status' => null,
        'tags' => null,
        'transit_router_bandwidth_package_id' => null,
        'transit_router_bandwidth_package_name' => null,
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
        'account_id' => 'AccountId',
        'allocations' => 'Allocations',
        'bandwidth' => 'Bandwidth',
        'billing_type' => 'BillingType',
        'business_status' => 'BusinessStatus',
        'creation_time' => 'CreationTime',
        'deleted_time' => 'DeletedTime',
        'description' => 'Description',
        'expired_time' => 'ExpiredTime',
        'local_geographic_region_set_id' => 'LocalGeographicRegionSetId',
        'peer_geographic_region_set_id' => 'PeerGeographicRegionSetId',
        'project_name' => 'ProjectName',
        'remaining_bandwidth' => 'RemainingBandwidth',
        'status' => 'Status',
        'tags' => 'Tags',
        'transit_router_bandwidth_package_id' => 'TransitRouterBandwidthPackageId',
        'transit_router_bandwidth_package_name' => 'TransitRouterBandwidthPackageName',
        'update_time' => 'UpdateTime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account_id' => 'setAccountId',
        'allocations' => 'setAllocations',
        'bandwidth' => 'setBandwidth',
        'billing_type' => 'setBillingType',
        'business_status' => 'setBusinessStatus',
        'creation_time' => 'setCreationTime',
        'deleted_time' => 'setDeletedTime',
        'description' => 'setDescription',
        'expired_time' => 'setExpiredTime',
        'local_geographic_region_set_id' => 'setLocalGeographicRegionSetId',
        'peer_geographic_region_set_id' => 'setPeerGeographicRegionSetId',
        'project_name' => 'setProjectName',
        'remaining_bandwidth' => 'setRemainingBandwidth',
        'status' => 'setStatus',
        'tags' => 'setTags',
        'transit_router_bandwidth_package_id' => 'setTransitRouterBandwidthPackageId',
        'transit_router_bandwidth_package_name' => 'setTransitRouterBandwidthPackageName',
        'update_time' => 'setUpdateTime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account_id' => 'getAccountId',
        'allocations' => 'getAllocations',
        'bandwidth' => 'getBandwidth',
        'billing_type' => 'getBillingType',
        'business_status' => 'getBusinessStatus',
        'creation_time' => 'getCreationTime',
        'deleted_time' => 'getDeletedTime',
        'description' => 'getDescription',
        'expired_time' => 'getExpiredTime',
        'local_geographic_region_set_id' => 'getLocalGeographicRegionSetId',
        'peer_geographic_region_set_id' => 'getPeerGeographicRegionSetId',
        'project_name' => 'getProjectName',
        'remaining_bandwidth' => 'getRemainingBandwidth',
        'status' => 'getStatus',
        'tags' => 'getTags',
        'transit_router_bandwidth_package_id' => 'getTransitRouterBandwidthPackageId',
        'transit_router_bandwidth_package_name' => 'getTransitRouterBandwidthPackageName',
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
        $this->container['account_id'] = isset($data['account_id']) ? $data['account_id'] : null;
        $this->container['allocations'] = isset($data['allocations']) ? $data['allocations'] : null;
        $this->container['bandwidth'] = isset($data['bandwidth']) ? $data['bandwidth'] : null;
        $this->container['billing_type'] = isset($data['billing_type']) ? $data['billing_type'] : null;
        $this->container['business_status'] = isset($data['business_status']) ? $data['business_status'] : null;
        $this->container['creation_time'] = isset($data['creation_time']) ? $data['creation_time'] : null;
        $this->container['deleted_time'] = isset($data['deleted_time']) ? $data['deleted_time'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['expired_time'] = isset($data['expired_time']) ? $data['expired_time'] : null;
        $this->container['local_geographic_region_set_id'] = isset($data['local_geographic_region_set_id']) ? $data['local_geographic_region_set_id'] : null;
        $this->container['peer_geographic_region_set_id'] = isset($data['peer_geographic_region_set_id']) ? $data['peer_geographic_region_set_id'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['remaining_bandwidth'] = isset($data['remaining_bandwidth']) ? $data['remaining_bandwidth'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['transit_router_bandwidth_package_id'] = isset($data['transit_router_bandwidth_package_id']) ? $data['transit_router_bandwidth_package_id'] : null;
        $this->container['transit_router_bandwidth_package_name'] = isset($data['transit_router_bandwidth_package_name']) ? $data['transit_router_bandwidth_package_name'] : null;
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
     * Gets account_id
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     *
     * @param string $account_id account_id
     *
     * @return $this
     */
    public function setAccountId($account_id)
    {
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets allocations
     *
     * @return \Volcengine\Transitrouter\Model\AllocationForDescribeTransitRouterBandwidthPackagesOutput[]
     */
    public function getAllocations()
    {
        return $this->container['allocations'];
    }

    /**
     * Sets allocations
     *
     * @param \Volcengine\Transitrouter\Model\AllocationForDescribeTransitRouterBandwidthPackagesOutput[] $allocations allocations
     *
     * @return $this
     */
    public function setAllocations($allocations)
    {
        $this->container['allocations'] = $allocations;

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
     * Gets billing_type
     *
     * @return int
     */
    public function getBillingType()
    {
        return $this->container['billing_type'];
    }

    /**
     * Sets billing_type
     *
     * @param int $billing_type billing_type
     *
     * @return $this
     */
    public function setBillingType($billing_type)
    {
        $this->container['billing_type'] = $billing_type;

        return $this;
    }

    /**
     * Gets business_status
     *
     * @return string
     */
    public function getBusinessStatus()
    {
        return $this->container['business_status'];
    }

    /**
     * Sets business_status
     *
     * @param string $business_status business_status
     *
     * @return $this
     */
    public function setBusinessStatus($business_status)
    {
        $this->container['business_status'] = $business_status;

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
     * Gets deleted_time
     *
     * @return string
     */
    public function getDeletedTime()
    {
        return $this->container['deleted_time'];
    }

    /**
     * Sets deleted_time
     *
     * @param string $deleted_time deleted_time
     *
     * @return $this
     */
    public function setDeletedTime($deleted_time)
    {
        $this->container['deleted_time'] = $deleted_time;

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
     * Gets expired_time
     *
     * @return string
     */
    public function getExpiredTime()
    {
        return $this->container['expired_time'];
    }

    /**
     * Sets expired_time
     *
     * @param string $expired_time expired_time
     *
     * @return $this
     */
    public function setExpiredTime($expired_time)
    {
        $this->container['expired_time'] = $expired_time;

        return $this;
    }

    /**
     * Gets local_geographic_region_set_id
     *
     * @return string
     */
    public function getLocalGeographicRegionSetId()
    {
        return $this->container['local_geographic_region_set_id'];
    }

    /**
     * Sets local_geographic_region_set_id
     *
     * @param string $local_geographic_region_set_id local_geographic_region_set_id
     *
     * @return $this
     */
    public function setLocalGeographicRegionSetId($local_geographic_region_set_id)
    {
        $this->container['local_geographic_region_set_id'] = $local_geographic_region_set_id;

        return $this;
    }

    /**
     * Gets peer_geographic_region_set_id
     *
     * @return string
     */
    public function getPeerGeographicRegionSetId()
    {
        return $this->container['peer_geographic_region_set_id'];
    }

    /**
     * Sets peer_geographic_region_set_id
     *
     * @param string $peer_geographic_region_set_id peer_geographic_region_set_id
     *
     * @return $this
     */
    public function setPeerGeographicRegionSetId($peer_geographic_region_set_id)
    {
        $this->container['peer_geographic_region_set_id'] = $peer_geographic_region_set_id;

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
     * Gets remaining_bandwidth
     *
     * @return int
     */
    public function getRemainingBandwidth()
    {
        return $this->container['remaining_bandwidth'];
    }

    /**
     * Sets remaining_bandwidth
     *
     * @param int $remaining_bandwidth remaining_bandwidth
     *
     * @return $this
     */
    public function setRemainingBandwidth($remaining_bandwidth)
    {
        $this->container['remaining_bandwidth'] = $remaining_bandwidth;

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
     * @return \Volcengine\Transitrouter\Model\TagForDescribeTransitRouterBandwidthPackagesOutput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Transitrouter\Model\TagForDescribeTransitRouterBandwidthPackagesOutput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets transit_router_bandwidth_package_id
     *
     * @return string
     */
    public function getTransitRouterBandwidthPackageId()
    {
        return $this->container['transit_router_bandwidth_package_id'];
    }

    /**
     * Sets transit_router_bandwidth_package_id
     *
     * @param string $transit_router_bandwidth_package_id transit_router_bandwidth_package_id
     *
     * @return $this
     */
    public function setTransitRouterBandwidthPackageId($transit_router_bandwidth_package_id)
    {
        $this->container['transit_router_bandwidth_package_id'] = $transit_router_bandwidth_package_id;

        return $this;
    }

    /**
     * Gets transit_router_bandwidth_package_name
     *
     * @return string
     */
    public function getTransitRouterBandwidthPackageName()
    {
        return $this->container['transit_router_bandwidth_package_name'];
    }

    /**
     * Sets transit_router_bandwidth_package_name
     *
     * @param string $transit_router_bandwidth_package_name transit_router_bandwidth_package_name
     *
     * @return $this
     */
    public function setTransitRouterBandwidthPackageName($transit_router_bandwidth_package_name)
    {
        $this->container['transit_router_bandwidth_package_name'] = $transit_router_bandwidth_package_name;

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

