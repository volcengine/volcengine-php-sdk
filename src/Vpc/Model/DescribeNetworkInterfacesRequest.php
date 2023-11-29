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

class DescribeNetworkInterfacesRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DescribeNetworkInterfacesRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'instance_id' => 'string',
        'ipv6_addresses' => 'string[]',
        'max_results' => 'int',
        'network_interface_ids' => 'string[]',
        'network_interface_name' => 'string',
        'next_token' => 'string',
        'page_number' => 'int',
        'page_size' => 'int',
        'primary_ip_addresses' => 'string[]',
        'private_ip_addresses' => 'string[]',
        'project_name' => 'string',
        'security_group_id' => 'string',
        'status' => 'string',
        'subnet_id' => 'string',
        'tag_filters' => '\Volcengine\Vpc\Model\TagFilterForDescribeNetworkInterfacesInput[]',
        'type' => 'string',
        'vpc_id' => 'string',
        'zone_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'instance_id' => null,
        'ipv6_addresses' => null,
        'max_results' => null,
        'network_interface_ids' => null,
        'network_interface_name' => null,
        'next_token' => null,
        'page_number' => null,
        'page_size' => null,
        'primary_ip_addresses' => null,
        'private_ip_addresses' => null,
        'project_name' => null,
        'security_group_id' => null,
        'status' => null,
        'subnet_id' => null,
        'tag_filters' => null,
        'type' => null,
        'vpc_id' => null,
        'zone_id' => null
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
        'instance_id' => 'InstanceId',
        'ipv6_addresses' => 'Ipv6Addresses',
        'max_results' => 'MaxResults',
        'network_interface_ids' => 'NetworkInterfaceIds',
        'network_interface_name' => 'NetworkInterfaceName',
        'next_token' => 'NextToken',
        'page_number' => 'PageNumber',
        'page_size' => 'PageSize',
        'primary_ip_addresses' => 'PrimaryIpAddresses',
        'private_ip_addresses' => 'PrivateIpAddresses',
        'project_name' => 'ProjectName',
        'security_group_id' => 'SecurityGroupId',
        'status' => 'Status',
        'subnet_id' => 'SubnetId',
        'tag_filters' => 'TagFilters',
        'type' => 'Type',
        'vpc_id' => 'VpcId',
        'zone_id' => 'ZoneId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'instance_id' => 'setInstanceId',
        'ipv6_addresses' => 'setIpv6Addresses',
        'max_results' => 'setMaxResults',
        'network_interface_ids' => 'setNetworkInterfaceIds',
        'network_interface_name' => 'setNetworkInterfaceName',
        'next_token' => 'setNextToken',
        'page_number' => 'setPageNumber',
        'page_size' => 'setPageSize',
        'primary_ip_addresses' => 'setPrimaryIpAddresses',
        'private_ip_addresses' => 'setPrivateIpAddresses',
        'project_name' => 'setProjectName',
        'security_group_id' => 'setSecurityGroupId',
        'status' => 'setStatus',
        'subnet_id' => 'setSubnetId',
        'tag_filters' => 'setTagFilters',
        'type' => 'setType',
        'vpc_id' => 'setVpcId',
        'zone_id' => 'setZoneId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'instance_id' => 'getInstanceId',
        'ipv6_addresses' => 'getIpv6Addresses',
        'max_results' => 'getMaxResults',
        'network_interface_ids' => 'getNetworkInterfaceIds',
        'network_interface_name' => 'getNetworkInterfaceName',
        'next_token' => 'getNextToken',
        'page_number' => 'getPageNumber',
        'page_size' => 'getPageSize',
        'primary_ip_addresses' => 'getPrimaryIpAddresses',
        'private_ip_addresses' => 'getPrivateIpAddresses',
        'project_name' => 'getProjectName',
        'security_group_id' => 'getSecurityGroupId',
        'status' => 'getStatus',
        'subnet_id' => 'getSubnetId',
        'tag_filters' => 'getTagFilters',
        'type' => 'getType',
        'vpc_id' => 'getVpcId',
        'zone_id' => 'getZoneId'
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
        $this->container['instance_id'] = isset($data['instance_id']) ? $data['instance_id'] : null;
        $this->container['ipv6_addresses'] = isset($data['ipv6_addresses']) ? $data['ipv6_addresses'] : null;
        $this->container['max_results'] = isset($data['max_results']) ? $data['max_results'] : null;
        $this->container['network_interface_ids'] = isset($data['network_interface_ids']) ? $data['network_interface_ids'] : null;
        $this->container['network_interface_name'] = isset($data['network_interface_name']) ? $data['network_interface_name'] : null;
        $this->container['next_token'] = isset($data['next_token']) ? $data['next_token'] : null;
        $this->container['page_number'] = isset($data['page_number']) ? $data['page_number'] : null;
        $this->container['page_size'] = isset($data['page_size']) ? $data['page_size'] : null;
        $this->container['primary_ip_addresses'] = isset($data['primary_ip_addresses']) ? $data['primary_ip_addresses'] : null;
        $this->container['private_ip_addresses'] = isset($data['private_ip_addresses']) ? $data['private_ip_addresses'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['security_group_id'] = isset($data['security_group_id']) ? $data['security_group_id'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['subnet_id'] = isset($data['subnet_id']) ? $data['subnet_id'] : null;
        $this->container['tag_filters'] = isset($data['tag_filters']) ? $data['tag_filters'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['vpc_id'] = isset($data['vpc_id']) ? $data['vpc_id'] : null;
        $this->container['zone_id'] = isset($data['zone_id']) ? $data['zone_id'] : null;
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
     * Gets ipv6_addresses
     *
     * @return string[]
     */
    public function getIpv6Addresses()
    {
        return $this->container['ipv6_addresses'];
    }

    /**
     * Sets ipv6_addresses
     *
     * @param string[] $ipv6_addresses ipv6_addresses
     *
     * @return $this
     */
    public function setIpv6Addresses($ipv6_addresses)
    {
        $this->container['ipv6_addresses'] = $ipv6_addresses;

        return $this;
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
     * Gets network_interface_ids
     *
     * @return string[]
     */
    public function getNetworkInterfaceIds()
    {
        return $this->container['network_interface_ids'];
    }

    /**
     * Sets network_interface_ids
     *
     * @param string[] $network_interface_ids network_interface_ids
     *
     * @return $this
     */
    public function setNetworkInterfaceIds($network_interface_ids)
    {
        $this->container['network_interface_ids'] = $network_interface_ids;

        return $this;
    }

    /**
     * Gets network_interface_name
     *
     * @return string
     */
    public function getNetworkInterfaceName()
    {
        return $this->container['network_interface_name'];
    }

    /**
     * Sets network_interface_name
     *
     * @param string $network_interface_name network_interface_name
     *
     * @return $this
     */
    public function setNetworkInterfaceName($network_interface_name)
    {
        $this->container['network_interface_name'] = $network_interface_name;

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
     * Gets page_number
     *
     * @return int
     */
    public function getPageNumber()
    {
        return $this->container['page_number'];
    }

    /**
     * Sets page_number
     *
     * @param int $page_number page_number
     *
     * @return $this
     */
    public function setPageNumber($page_number)
    {
        $this->container['page_number'] = $page_number;

        return $this;
    }

    /**
     * Gets page_size
     *
     * @return int
     */
    public function getPageSize()
    {
        return $this->container['page_size'];
    }

    /**
     * Sets page_size
     *
     * @param int $page_size page_size
     *
     * @return $this
     */
    public function setPageSize($page_size)
    {
        $this->container['page_size'] = $page_size;

        return $this;
    }

    /**
     * Gets primary_ip_addresses
     *
     * @return string[]
     */
    public function getPrimaryIpAddresses()
    {
        return $this->container['primary_ip_addresses'];
    }

    /**
     * Sets primary_ip_addresses
     *
     * @param string[] $primary_ip_addresses primary_ip_addresses
     *
     * @return $this
     */
    public function setPrimaryIpAddresses($primary_ip_addresses)
    {
        $this->container['primary_ip_addresses'] = $primary_ip_addresses;

        return $this;
    }

    /**
     * Gets private_ip_addresses
     *
     * @return string[]
     */
    public function getPrivateIpAddresses()
    {
        return $this->container['private_ip_addresses'];
    }

    /**
     * Sets private_ip_addresses
     *
     * @param string[] $private_ip_addresses private_ip_addresses
     *
     * @return $this
     */
    public function setPrivateIpAddresses($private_ip_addresses)
    {
        $this->container['private_ip_addresses'] = $private_ip_addresses;

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
     * Gets security_group_id
     *
     * @return string
     */
    public function getSecurityGroupId()
    {
        return $this->container['security_group_id'];
    }

    /**
     * Sets security_group_id
     *
     * @param string $security_group_id security_group_id
     *
     * @return $this
     */
    public function setSecurityGroupId($security_group_id)
    {
        $this->container['security_group_id'] = $security_group_id;

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
     * Gets subnet_id
     *
     * @return string
     */
    public function getSubnetId()
    {
        return $this->container['subnet_id'];
    }

    /**
     * Sets subnet_id
     *
     * @param string $subnet_id subnet_id
     *
     * @return $this
     */
    public function setSubnetId($subnet_id)
    {
        $this->container['subnet_id'] = $subnet_id;

        return $this;
    }

    /**
     * Gets tag_filters
     *
     * @return \Volcengine\Vpc\Model\TagFilterForDescribeNetworkInterfacesInput[]
     */
    public function getTagFilters()
    {
        return $this->container['tag_filters'];
    }

    /**
     * Sets tag_filters
     *
     * @param \Volcengine\Vpc\Model\TagFilterForDescribeNetworkInterfacesInput[] $tag_filters tag_filters
     *
     * @return $this
     */
    public function setTagFilters($tag_filters)
    {
        $this->container['tag_filters'] = $tag_filters;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets vpc_id
     *
     * @return string
     */
    public function getVpcId()
    {
        return $this->container['vpc_id'];
    }

    /**
     * Sets vpc_id
     *
     * @param string $vpc_id vpc_id
     *
     * @return $this
     */
    public function setVpcId($vpc_id)
    {
        $this->container['vpc_id'] = $vpc_id;

        return $this;
    }

    /**
     * Gets zone_id
     *
     * @return string
     */
    public function getZoneId()
    {
        return $this->container['zone_id'];
    }

    /**
     * Sets zone_id
     *
     * @param string $zone_id zone_id
     *
     * @return $this
     */
    public function setZoneId($zone_id)
    {
        $this->container['zone_id'] = $zone_id;

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

