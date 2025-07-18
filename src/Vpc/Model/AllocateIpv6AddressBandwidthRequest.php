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

class AllocateIpv6AddressBandwidthRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'AllocateIpv6AddressBandwidthRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'bandwidth' => 'int',
        'bandwidth_package_id' => 'string',
        'billing_type' => 'int',
        'client_token' => 'string',
        'ipv6_address' => 'string',
        'project_name' => 'string',
        'tags' => '\Volcengine\Vpc\Model\TagForAllocateIpv6AddressBandwidthInput[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'bandwidth' => null,
        'bandwidth_package_id' => null,
        'billing_type' => null,
        'client_token' => null,
        'ipv6_address' => null,
        'project_name' => null,
        'tags' => null
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
        'bandwidth' => 'Bandwidth',
        'bandwidth_package_id' => 'BandwidthPackageId',
        'billing_type' => 'BillingType',
        'client_token' => 'ClientToken',
        'ipv6_address' => 'Ipv6Address',
        'project_name' => 'ProjectName',
        'tags' => 'Tags'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'bandwidth' => 'setBandwidth',
        'bandwidth_package_id' => 'setBandwidthPackageId',
        'billing_type' => 'setBillingType',
        'client_token' => 'setClientToken',
        'ipv6_address' => 'setIpv6Address',
        'project_name' => 'setProjectName',
        'tags' => 'setTags'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'bandwidth' => 'getBandwidth',
        'bandwidth_package_id' => 'getBandwidthPackageId',
        'billing_type' => 'getBillingType',
        'client_token' => 'getClientToken',
        'ipv6_address' => 'getIpv6Address',
        'project_name' => 'getProjectName',
        'tags' => 'getTags'
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
        $this->container['bandwidth'] = isset($data['bandwidth']) ? $data['bandwidth'] : null;
        $this->container['bandwidth_package_id'] = isset($data['bandwidth_package_id']) ? $data['bandwidth_package_id'] : null;
        $this->container['billing_type'] = isset($data['billing_type']) ? $data['billing_type'] : null;
        $this->container['client_token'] = isset($data['client_token']) ? $data['client_token'] : null;
        $this->container['ipv6_address'] = isset($data['ipv6_address']) ? $data['ipv6_address'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['billing_type'] === null) {
            $invalidProperties[] = "'billing_type' can't be null";
        }
        if ($this->container['ipv6_address'] === null) {
            $invalidProperties[] = "'ipv6_address' can't be null";
        }
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
     * Gets client_token
     *
     * @return string
     */
    public function getClientToken()
    {
        return $this->container['client_token'];
    }

    /**
     * Sets client_token
     *
     * @param string $client_token client_token
     *
     * @return $this
     */
    public function setClientToken($client_token)
    {
        $this->container['client_token'] = $client_token;

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
     * Gets tags
     *
     * @return \Volcengine\Vpc\Model\TagForAllocateIpv6AddressBandwidthInput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Vpc\Model\TagForAllocateIpv6AddressBandwidthInput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

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

