<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Ecs\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class EipAddressForRunInstancesInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'EipAddressForRunInstancesInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'bandwidth_mbps' => 'int',
        'bandwidth_package_id' => 'string',
        'charge_type' => 'string',
        'isp' => 'string',
        'release_with_instance' => 'bool',
        'security_protection_instance_id' => 'int',
        'security_protection_types' => 'string[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'bandwidth_mbps' => 'int32',
        'bandwidth_package_id' => null,
        'charge_type' => null,
        'isp' => null,
        'release_with_instance' => null,
        'security_protection_instance_id' => 'int32',
        'security_protection_types' => null
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
        'bandwidth_mbps' => 'BandwidthMbps',
        'bandwidth_package_id' => 'BandwidthPackageId',
        'charge_type' => 'ChargeType',
        'isp' => 'ISP',
        'release_with_instance' => 'ReleaseWithInstance',
        'security_protection_instance_id' => 'SecurityProtectionInstanceId',
        'security_protection_types' => 'SecurityProtectionTypes'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'bandwidth_mbps' => 'setBandwidthMbps',
        'bandwidth_package_id' => 'setBandwidthPackageId',
        'charge_type' => 'setChargeType',
        'isp' => 'setIsp',
        'release_with_instance' => 'setReleaseWithInstance',
        'security_protection_instance_id' => 'setSecurityProtectionInstanceId',
        'security_protection_types' => 'setSecurityProtectionTypes'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'bandwidth_mbps' => 'getBandwidthMbps',
        'bandwidth_package_id' => 'getBandwidthPackageId',
        'charge_type' => 'getChargeType',
        'isp' => 'getIsp',
        'release_with_instance' => 'getReleaseWithInstance',
        'security_protection_instance_id' => 'getSecurityProtectionInstanceId',
        'security_protection_types' => 'getSecurityProtectionTypes'
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
        $this->container['bandwidth_mbps'] = isset($data['bandwidth_mbps']) ? $data['bandwidth_mbps'] : null;
        $this->container['bandwidth_package_id'] = isset($data['bandwidth_package_id']) ? $data['bandwidth_package_id'] : null;
        $this->container['charge_type'] = isset($data['charge_type']) ? $data['charge_type'] : null;
        $this->container['isp'] = isset($data['isp']) ? $data['isp'] : null;
        $this->container['release_with_instance'] = isset($data['release_with_instance']) ? $data['release_with_instance'] : null;
        $this->container['security_protection_instance_id'] = isset($data['security_protection_instance_id']) ? $data['security_protection_instance_id'] : null;
        $this->container['security_protection_types'] = isset($data['security_protection_types']) ? $data['security_protection_types'] : null;
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
     * Gets bandwidth_mbps
     *
     * @return int
     */
    public function getBandwidthMbps()
    {
        return $this->container['bandwidth_mbps'];
    }

    /**
     * Sets bandwidth_mbps
     *
     * @param int $bandwidth_mbps bandwidth_mbps
     *
     * @return $this
     */
    public function setBandwidthMbps($bandwidth_mbps)
    {
        $this->container['bandwidth_mbps'] = $bandwidth_mbps;

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
     * Gets charge_type
     *
     * @return string
     */
    public function getChargeType()
    {
        return $this->container['charge_type'];
    }

    /**
     * Sets charge_type
     *
     * @param string $charge_type charge_type
     *
     * @return $this
     */
    public function setChargeType($charge_type)
    {
        $this->container['charge_type'] = $charge_type;

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
     * Gets release_with_instance
     *
     * @return bool
     */
    public function getReleaseWithInstance()
    {
        return $this->container['release_with_instance'];
    }

    /**
     * Sets release_with_instance
     *
     * @param bool $release_with_instance release_with_instance
     *
     * @return $this
     */
    public function setReleaseWithInstance($release_with_instance)
    {
        $this->container['release_with_instance'] = $release_with_instance;

        return $this;
    }

    /**
     * Gets security_protection_instance_id
     *
     * @return int
     */
    public function getSecurityProtectionInstanceId()
    {
        return $this->container['security_protection_instance_id'];
    }

    /**
     * Sets security_protection_instance_id
     *
     * @param int $security_protection_instance_id security_protection_instance_id
     *
     * @return $this
     */
    public function setSecurityProtectionInstanceId($security_protection_instance_id)
    {
        $this->container['security_protection_instance_id'] = $security_protection_instance_id;

        return $this;
    }

    /**
     * Gets security_protection_types
     *
     * @return string[]
     */
    public function getSecurityProtectionTypes()
    {
        return $this->container['security_protection_types'];
    }

    /**
     * Sets security_protection_types
     *
     * @param string[] $security_protection_types security_protection_types
     *
     * @return $this
     */
    public function setSecurityProtectionTypes($security_protection_types)
    {
        $this->container['security_protection_types'] = $security_protection_types;

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

