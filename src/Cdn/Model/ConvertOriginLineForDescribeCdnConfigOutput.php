<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Cdn\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class ConvertOriginLineForDescribeCdnConfigOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ConvertOriginLineForDescribeCdnConfigOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'address' => 'string',
        'bucket_name' => 'string',
        'http_port' => 'string',
        'https_port' => 'string',
        'instance_type' => 'string',
        'origin_host' => 'string',
        'origin_type' => 'string',
        'private_bucket_access' => 'bool',
        'private_bucket_auth' => '\Volcengine\Cdn\Model\PrivateBucketAuthForDescribeCdnConfigOutput',
        'region' => 'string',
        'weight' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'address' => null,
        'bucket_name' => null,
        'http_port' => null,
        'https_port' => null,
        'instance_type' => null,
        'origin_host' => null,
        'origin_type' => null,
        'private_bucket_access' => null,
        'private_bucket_auth' => null,
        'region' => null,
        'weight' => null
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
        'address' => 'Address',
        'bucket_name' => 'BucketName',
        'http_port' => 'HttpPort',
        'https_port' => 'HttpsPort',
        'instance_type' => 'InstanceType',
        'origin_host' => 'OriginHost',
        'origin_type' => 'OriginType',
        'private_bucket_access' => 'PrivateBucketAccess',
        'private_bucket_auth' => 'PrivateBucketAuth',
        'region' => 'Region',
        'weight' => 'Weight'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'address' => 'setAddress',
        'bucket_name' => 'setBucketName',
        'http_port' => 'setHttpPort',
        'https_port' => 'setHttpsPort',
        'instance_type' => 'setInstanceType',
        'origin_host' => 'setOriginHost',
        'origin_type' => 'setOriginType',
        'private_bucket_access' => 'setPrivateBucketAccess',
        'private_bucket_auth' => 'setPrivateBucketAuth',
        'region' => 'setRegion',
        'weight' => 'setWeight'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'address' => 'getAddress',
        'bucket_name' => 'getBucketName',
        'http_port' => 'getHttpPort',
        'https_port' => 'getHttpsPort',
        'instance_type' => 'getInstanceType',
        'origin_host' => 'getOriginHost',
        'origin_type' => 'getOriginType',
        'private_bucket_access' => 'getPrivateBucketAccess',
        'private_bucket_auth' => 'getPrivateBucketAuth',
        'region' => 'getRegion',
        'weight' => 'getWeight'
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
        $this->container['address'] = isset($data['address']) ? $data['address'] : null;
        $this->container['bucket_name'] = isset($data['bucket_name']) ? $data['bucket_name'] : null;
        $this->container['http_port'] = isset($data['http_port']) ? $data['http_port'] : null;
        $this->container['https_port'] = isset($data['https_port']) ? $data['https_port'] : null;
        $this->container['instance_type'] = isset($data['instance_type']) ? $data['instance_type'] : null;
        $this->container['origin_host'] = isset($data['origin_host']) ? $data['origin_host'] : null;
        $this->container['origin_type'] = isset($data['origin_type']) ? $data['origin_type'] : null;
        $this->container['private_bucket_access'] = isset($data['private_bucket_access']) ? $data['private_bucket_access'] : null;
        $this->container['private_bucket_auth'] = isset($data['private_bucket_auth']) ? $data['private_bucket_auth'] : null;
        $this->container['region'] = isset($data['region']) ? $data['region'] : null;
        $this->container['weight'] = isset($data['weight']) ? $data['weight'] : null;
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
     * Gets address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->container['address'];
    }

    /**
     * Sets address
     *
     * @param string $address address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->container['address'] = $address;

        return $this;
    }

    /**
     * Gets bucket_name
     *
     * @return string
     */
    public function getBucketName()
    {
        return $this->container['bucket_name'];
    }

    /**
     * Sets bucket_name
     *
     * @param string $bucket_name bucket_name
     *
     * @return $this
     */
    public function setBucketName($bucket_name)
    {
        $this->container['bucket_name'] = $bucket_name;

        return $this;
    }

    /**
     * Gets http_port
     *
     * @return string
     */
    public function getHttpPort()
    {
        return $this->container['http_port'];
    }

    /**
     * Sets http_port
     *
     * @param string $http_port http_port
     *
     * @return $this
     */
    public function setHttpPort($http_port)
    {
        $this->container['http_port'] = $http_port;

        return $this;
    }

    /**
     * Gets https_port
     *
     * @return string
     */
    public function getHttpsPort()
    {
        return $this->container['https_port'];
    }

    /**
     * Sets https_port
     *
     * @param string $https_port https_port
     *
     * @return $this
     */
    public function setHttpsPort($https_port)
    {
        $this->container['https_port'] = $https_port;

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
     * Gets origin_host
     *
     * @return string
     */
    public function getOriginHost()
    {
        return $this->container['origin_host'];
    }

    /**
     * Sets origin_host
     *
     * @param string $origin_host origin_host
     *
     * @return $this
     */
    public function setOriginHost($origin_host)
    {
        $this->container['origin_host'] = $origin_host;

        return $this;
    }

    /**
     * Gets origin_type
     *
     * @return string
     */
    public function getOriginType()
    {
        return $this->container['origin_type'];
    }

    /**
     * Sets origin_type
     *
     * @param string $origin_type origin_type
     *
     * @return $this
     */
    public function setOriginType($origin_type)
    {
        $this->container['origin_type'] = $origin_type;

        return $this;
    }

    /**
     * Gets private_bucket_access
     *
     * @return bool
     */
    public function getPrivateBucketAccess()
    {
        return $this->container['private_bucket_access'];
    }

    /**
     * Sets private_bucket_access
     *
     * @param bool $private_bucket_access private_bucket_access
     *
     * @return $this
     */
    public function setPrivateBucketAccess($private_bucket_access)
    {
        $this->container['private_bucket_access'] = $private_bucket_access;

        return $this;
    }

    /**
     * Gets private_bucket_auth
     *
     * @return \Volcengine\Cdn\Model\PrivateBucketAuthForDescribeCdnConfigOutput
     */
    public function getPrivateBucketAuth()
    {
        return $this->container['private_bucket_auth'];
    }

    /**
     * Sets private_bucket_auth
     *
     * @param \Volcengine\Cdn\Model\PrivateBucketAuthForDescribeCdnConfigOutput $private_bucket_auth private_bucket_auth
     *
     * @return $this
     */
    public function setPrivateBucketAuth($private_bucket_auth)
    {
        $this->container['private_bucket_auth'] = $private_bucket_auth;

        return $this;
    }

    /**
     * Gets region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->container['region'];
    }

    /**
     * Sets region
     *
     * @param string $region region
     *
     * @return $this
     */
    public function setRegion($region)
    {
        $this->container['region'] = $region;

        return $this;
    }

    /**
     * Gets weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->container['weight'];
    }

    /**
     * Sets weight
     *
     * @param string $weight weight
     *
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->container['weight'] = $weight;

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

