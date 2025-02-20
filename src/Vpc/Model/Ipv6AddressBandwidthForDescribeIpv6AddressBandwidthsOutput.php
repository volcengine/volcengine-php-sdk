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

class Ipv6AddressBandwidthForDescribeIpv6AddressBandwidthsOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Ipv6AddressBandwidthForDescribeIpv6AddressBandwidthsOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'allocation_id' => 'string',
        'bandwidth' => 'string',
        'bandwidth_package_id' => 'string',
        'billing_type' => 'int',
        'business_status' => 'string',
        'creation_time' => 'string',
        'deleted_time' => 'string',
        'isp' => 'string',
        'instance_id' => 'string',
        'instance_type' => 'string',
        'ipv6_address' => 'string',
        'ipv6_gateway_id' => 'string',
        'lock_reason' => 'string',
        'network_type' => 'string',
        'overdue_time' => 'string',
        'project_name' => 'string',
        'status' => 'string',
        'updated_at' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'allocation_id' => null,
        'bandwidth' => null,
        'bandwidth_package_id' => null,
        'billing_type' => null,
        'business_status' => null,
        'creation_time' => null,
        'deleted_time' => null,
        'isp' => null,
        'instance_id' => null,
        'instance_type' => null,
        'ipv6_address' => null,
        'ipv6_gateway_id' => null,
        'lock_reason' => null,
        'network_type' => null,
        'overdue_time' => null,
        'project_name' => null,
        'status' => null,
        'updated_at' => null
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
        'allocation_id' => 'AllocationId',
        'bandwidth' => 'Bandwidth',
        'bandwidth_package_id' => 'BandwidthPackageId',
        'billing_type' => 'BillingType',
        'business_status' => 'BusinessStatus',
        'creation_time' => 'CreationTime',
        'deleted_time' => 'DeletedTime',
        'isp' => 'ISP',
        'instance_id' => 'InstanceId',
        'instance_type' => 'InstanceType',
        'ipv6_address' => 'Ipv6Address',
        'ipv6_gateway_id' => 'Ipv6GatewayId',
        'lock_reason' => 'LockReason',
        'network_type' => 'NetworkType',
        'overdue_time' => 'OverdueTime',
        'project_name' => 'ProjectName',
        'status' => 'Status',
        'updated_at' => 'UpdatedAt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'allocation_id' => 'setAllocationId',
        'bandwidth' => 'setBandwidth',
        'bandwidth_package_id' => 'setBandwidthPackageId',
        'billing_type' => 'setBillingType',
        'business_status' => 'setBusinessStatus',
        'creation_time' => 'setCreationTime',
        'deleted_time' => 'setDeletedTime',
        'isp' => 'setIsp',
        'instance_id' => 'setInstanceId',
        'instance_type' => 'setInstanceType',
        'ipv6_address' => 'setIpv6Address',
        'ipv6_gateway_id' => 'setIpv6GatewayId',
        'lock_reason' => 'setLockReason',
        'network_type' => 'setNetworkType',
        'overdue_time' => 'setOverdueTime',
        'project_name' => 'setProjectName',
        'status' => 'setStatus',
        'updated_at' => 'setUpdatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'allocation_id' => 'getAllocationId',
        'bandwidth' => 'getBandwidth',
        'bandwidth_package_id' => 'getBandwidthPackageId',
        'billing_type' => 'getBillingType',
        'business_status' => 'getBusinessStatus',
        'creation_time' => 'getCreationTime',
        'deleted_time' => 'getDeletedTime',
        'isp' => 'getIsp',
        'instance_id' => 'getInstanceId',
        'instance_type' => 'getInstanceType',
        'ipv6_address' => 'getIpv6Address',
        'ipv6_gateway_id' => 'getIpv6GatewayId',
        'lock_reason' => 'getLockReason',
        'network_type' => 'getNetworkType',
        'overdue_time' => 'getOverdueTime',
        'project_name' => 'getProjectName',
        'status' => 'getStatus',
        'updated_at' => 'getUpdatedAt'
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
        $this->container['allocation_id'] = isset($data['allocation_id']) ? $data['allocation_id'] : null;
        $this->container['bandwidth'] = isset($data['bandwidth']) ? $data['bandwidth'] : null;
        $this->container['bandwidth_package_id'] = isset($data['bandwidth_package_id']) ? $data['bandwidth_package_id'] : null;
        $this->container['billing_type'] = isset($data['billing_type']) ? $data['billing_type'] : null;
        $this->container['business_status'] = isset($data['business_status']) ? $data['business_status'] : null;
        $this->container['creation_time'] = isset($data['creation_time']) ? $data['creation_time'] : null;
        $this->container['deleted_time'] = isset($data['deleted_time']) ? $data['deleted_time'] : null;
        $this->container['isp'] = isset($data['isp']) ? $data['isp'] : null;
        $this->container['instance_id'] = isset($data['instance_id']) ? $data['instance_id'] : null;
        $this->container['instance_type'] = isset($data['instance_type']) ? $data['instance_type'] : null;
        $this->container['ipv6_address'] = isset($data['ipv6_address']) ? $data['ipv6_address'] : null;
        $this->container['ipv6_gateway_id'] = isset($data['ipv6_gateway_id']) ? $data['ipv6_gateway_id'] : null;
        $this->container['lock_reason'] = isset($data['lock_reason']) ? $data['lock_reason'] : null;
        $this->container['network_type'] = isset($data['network_type']) ? $data['network_type'] : null;
        $this->container['overdue_time'] = isset($data['overdue_time']) ? $data['overdue_time'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['updated_at'] = isset($data['updated_at']) ? $data['updated_at'] : null;
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
     * Gets allocation_id
     *
     * @return string
     */
    public function getAllocationId()
    {
        return $this->container['allocation_id'];
    }

    /**
     * Sets allocation_id
     *
     * @param string $allocation_id allocation_id
     *
     * @return $this
     */
    public function setAllocationId($allocation_id)
    {
        $this->container['allocation_id'] = $allocation_id;

        return $this;
    }

    /**
     * Gets bandwidth
     *
     * @return string
     */
    public function getBandwidth()
    {
        return $this->container['bandwidth'];
    }

    /**
     * Sets bandwidth
     *
     * @param string $bandwidth bandwidth
     *
     * @return $this
     */
    public function setBandwidth($bandwidth)
    {
        $this->container['bandwidth'] = $bandwidth;

        return $this;
    }

    /**
     * Gets bandwidth_package_id
     *
     * @return string
     */
    public function getBandwidthPackageId()
    {
        return $this->container['bandwidth_package_id'];
    }

    /**
     * Sets bandwidth_package_id
     *
     * @param string $bandwidth_package_id bandwidth_package_id
     *
     * @return $this
     */
    public function setBandwidthPackageId($bandwidth_package_id)
    {
        $this->container['bandwidth_package_id'] = $bandwidth_package_id;

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
     * Gets isp
     *
     * @return string
     */
    public function getIsp()
    {
        return $this->container['isp'];
    }

    /**
     * Sets isp
     *
     * @param string $isp isp
     *
     * @return $this
     */
    public function setIsp($isp)
    {
        $this->container['isp'] = $isp;

        return $this;
    }

    /**
     * Gets instance_id
     *
     * @return string
     */
    public function getInstanceId()
    {
        return $this->container['instance_id'];
    }

    /**
     * Sets instance_id
     *
     * @param string $instance_id instance_id
     *
     * @return $this
     */
    public function setInstanceId($instance_id)
    {
        $this->container['instance_id'] = $instance_id;

        return $this;
    }

    /**
     * Gets instance_type
     *
     * @return string
     */
    public function getInstanceType()
    {
        return $this->container['instance_type'];
    }

    /**
     * Sets instance_type
     *
     * @param string $instance_type instance_type
     *
     * @return $this
     */
    public function setInstanceType($instance_type)
    {
        $this->container['instance_type'] = $instance_type;

        return $this;
    }

    /**
     * Gets ipv6_address
     *
     * @return string
     */
    public function getIpv6Address()
    {
        return $this->container['ipv6_address'];
    }

    /**
     * Sets ipv6_address
     *
     * @param string $ipv6_address ipv6_address
     *
     * @return $this
     */
    public function setIpv6Address($ipv6_address)
    {
        $this->container['ipv6_address'] = $ipv6_address;

        return $this;
    }

    /**
     * Gets ipv6_gateway_id
     *
     * @return string
     */
    public function getIpv6GatewayId()
    {
        return $this->container['ipv6_gateway_id'];
    }

    /**
     * Sets ipv6_gateway_id
     *
     * @param string $ipv6_gateway_id ipv6_gateway_id
     *
     * @return $this
     */
    public function setIpv6GatewayId($ipv6_gateway_id)
    {
        $this->container['ipv6_gateway_id'] = $ipv6_gateway_id;

        return $this;
    }

    /**
     * Gets lock_reason
     *
     * @return string
     */
    public function getLockReason()
    {
        return $this->container['lock_reason'];
    }

    /**
     * Sets lock_reason
     *
     * @param string $lock_reason lock_reason
     *
     * @return $this
     */
    public function setLockReason($lock_reason)
    {
        $this->container['lock_reason'] = $lock_reason;

        return $this;
    }

    /**
     * Gets network_type
     *
     * @return string
     */
    public function getNetworkType()
    {
        return $this->container['network_type'];
    }

    /**
     * Sets network_type
     *
     * @param string $network_type network_type
     *
     * @return $this
     */
    public function setNetworkType($network_type)
    {
        $this->container['network_type'] = $network_type;

        return $this;
    }

    /**
     * Gets overdue_time
     *
     * @return string
     */
    public function getOverdueTime()
    {
        return $this->container['overdue_time'];
    }

    /**
     * Sets overdue_time
     *
     * @param string $overdue_time overdue_time
     *
     * @return $this
     */
    public function setOverdueTime($overdue_time)
    {
        $this->container['overdue_time'] = $overdue_time;

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
     * Gets updated_at
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param string $updated_at updated_at
     *
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

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

