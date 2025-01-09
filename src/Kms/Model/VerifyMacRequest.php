<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Kms\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class VerifyMacRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'VerifyMacRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'key_id' => 'string',
        'key_name' => 'string',
        'keyring_name' => 'string',
        'mac' => 'string',
        'mac_algorithm' => 'string',
        'message' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'key_id' => null,
        'key_name' => null,
        'keyring_name' => null,
        'mac' => null,
        'mac_algorithm' => null,
        'message' => null
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
        'key_id' => 'KeyID',
        'key_name' => 'KeyName',
        'keyring_name' => 'KeyringName',
        'mac' => 'Mac',
        'mac_algorithm' => 'MacAlgorithm',
        'message' => 'Message'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'key_id' => 'setKeyId',
        'key_name' => 'setKeyName',
        'keyring_name' => 'setKeyringName',
        'mac' => 'setMac',
        'mac_algorithm' => 'setMacAlgorithm',
        'message' => 'setMessage'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'key_id' => 'getKeyId',
        'key_name' => 'getKeyName',
        'keyring_name' => 'getKeyringName',
        'mac' => 'getMac',
        'mac_algorithm' => 'getMacAlgorithm',
        'message' => 'getMessage'
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
        $this->container['key_id'] = isset($data['key_id']) ? $data['key_id'] : null;
        $this->container['key_name'] = isset($data['key_name']) ? $data['key_name'] : null;
        $this->container['keyring_name'] = isset($data['keyring_name']) ? $data['keyring_name'] : null;
        $this->container['mac'] = isset($data['mac']) ? $data['mac'] : null;
        $this->container['mac_algorithm'] = isset($data['mac_algorithm']) ? $data['mac_algorithm'] : null;
        $this->container['message'] = isset($data['message']) ? $data['message'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['mac'] === null) {
            $invalidProperties[] = "'mac' can't be null";
        }
        if ($this->container['mac_algorithm'] === null) {
            $invalidProperties[] = "'mac_algorithm' can't be null";
        }
        if ($this->container['message'] === null) {
            $invalidProperties[] = "'message' can't be null";
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
     * Gets key_id
     *
     * @return string
     */
    public function getKeyId()
    {
        return $this->container['key_id'];
    }

    /**
     * Sets key_id
     *
     * @param string $key_id key_id
     *
     * @return $this
     */
    public function setKeyId($key_id)
    {
        $this->container['key_id'] = $key_id;

        return $this;
    }

    /**
     * Gets key_name
     *
     * @return string
     */
    public function getKeyName()
    {
        return $this->container['key_name'];
    }

    /**
     * Sets key_name
     *
     * @param string $key_name key_name
     *
     * @return $this
     */
    public function setKeyName($key_name)
    {
        $this->container['key_name'] = $key_name;

        return $this;
    }

    /**
     * Gets keyring_name
     *
     * @return string
     */
    public function getKeyringName()
    {
        return $this->container['keyring_name'];
    }

    /**
     * Sets keyring_name
     *
     * @param string $keyring_name keyring_name
     *
     * @return $this
     */
    public function setKeyringName($keyring_name)
    {
        $this->container['keyring_name'] = $keyring_name;

        return $this;
    }

    /**
     * Gets mac
     *
     * @return string
     */
    public function getMac()
    {
        return $this->container['mac'];
    }

    /**
     * Sets mac
     *
     * @param string $mac mac
     *
     * @return $this
     */
    public function setMac($mac)
    {
        $this->container['mac'] = $mac;

        return $this;
    }

    /**
     * Gets mac_algorithm
     *
     * @return string
     */
    public function getMacAlgorithm()
    {
        return $this->container['mac_algorithm'];
    }

    /**
     * Sets mac_algorithm
     *
     * @param string $mac_algorithm mac_algorithm
     *
     * @return $this
     */
    public function setMacAlgorithm($mac_algorithm)
    {
        $this->container['mac_algorithm'] = $mac_algorithm;

        return $this;
    }

    /**
     * Gets message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->container['message'];
    }

    /**
     * Sets message
     *
     * @param string $message message
     *
     * @return $this
     */
    public function setMessage($message)
    {
        $this->container['message'] = $message;

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

