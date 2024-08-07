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

class TosAuthInformationForUpdateCdnConfigInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TosAuthInformationForUpdateCdnConfigInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'access_key_id' => 'string',
        'access_key_secret' => 'string',
        'account_key' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'access_key_id' => null,
        'access_key_secret' => null,
        'account_key' => null
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
        'access_key_id' => 'AccessKeyId',
        'access_key_secret' => 'AccessKeySecret',
        'account_key' => 'AccountKey'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'access_key_id' => 'setAccessKeyId',
        'access_key_secret' => 'setAccessKeySecret',
        'account_key' => 'setAccountKey'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'access_key_id' => 'getAccessKeyId',
        'access_key_secret' => 'getAccessKeySecret',
        'account_key' => 'getAccountKey'
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
        $this->container['access_key_id'] = isset($data['access_key_id']) ? $data['access_key_id'] : null;
        $this->container['access_key_secret'] = isset($data['access_key_secret']) ? $data['access_key_secret'] : null;
        $this->container['account_key'] = isset($data['account_key']) ? $data['account_key'] : null;
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
     * Gets access_key_id
     *
     * @return string
     */
    public function getAccessKeyId()
    {
        return $this->container['access_key_id'];
    }

    /**
     * Sets access_key_id
     *
     * @param string $access_key_id access_key_id
     *
     * @return $this
     */
    public function setAccessKeyId($access_key_id)
    {
        $this->container['access_key_id'] = $access_key_id;

        return $this;
    }

    /**
     * Gets access_key_secret
     *
     * @return string
     */
    public function getAccessKeySecret()
    {
        return $this->container['access_key_secret'];
    }

    /**
     * Sets access_key_secret
     *
     * @param string $access_key_secret access_key_secret
     *
     * @return $this
     */
    public function setAccessKeySecret($access_key_secret)
    {
        $this->container['access_key_secret'] = $access_key_secret;

        return $this;
    }

    /**
     * Gets account_key
     *
     * @return string
     */
    public function getAccountKey()
    {
        return $this->container['account_key'];
    }

    /**
     * Sets account_key
     *
     * @param string $account_key account_key
     *
     * @return $this
     */
    public function setAccountKey($account_key)
    {
        $this->container['account_key'] = $account_key;

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

