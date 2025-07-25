<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Secagent\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class CheckIMConfigParamsRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CheckIMConfigParamsRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'notify_platform' => 'string',
        'signature' => 'string',
        'webhook' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'notify_platform' => null,
        'signature' => null,
        'webhook' => null
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
        'notify_platform' => 'NotifyPlatform',
        'signature' => 'Signature',
        'webhook' => 'Webhook'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'notify_platform' => 'setNotifyPlatform',
        'signature' => 'setSignature',
        'webhook' => 'setWebhook'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'notify_platform' => 'getNotifyPlatform',
        'signature' => 'getSignature',
        'webhook' => 'getWebhook'
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
        $this->container['notify_platform'] = isset($data['notify_platform']) ? $data['notify_platform'] : null;
        $this->container['signature'] = isset($data['signature']) ? $data['signature'] : null;
        $this->container['webhook'] = isset($data['webhook']) ? $data['webhook'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['notify_platform'] === null) {
            $invalidProperties[] = "'notify_platform' can't be null";
        }
        if ($this->container['signature'] === null) {
            $invalidProperties[] = "'signature' can't be null";
        }
        if ($this->container['webhook'] === null) {
            $invalidProperties[] = "'webhook' can't be null";
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
     * Gets notify_platform
     *
     * @return string
     */
    public function getNotifyPlatform()
    {
        return $this->container['notify_platform'];
    }

    /**
     * Sets notify_platform
     *
     * @param string $notify_platform notify_platform
     *
     * @return $this
     */
    public function setNotifyPlatform($notify_platform)
    {
        $this->container['notify_platform'] = $notify_platform;

        return $this;
    }

    /**
     * Gets signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->container['signature'];
    }

    /**
     * Sets signature
     *
     * @param string $signature signature
     *
     * @return $this
     */
    public function setSignature($signature)
    {
        $this->container['signature'] = $signature;

        return $this;
    }

    /**
     * Gets webhook
     *
     * @return string
     */
    public function getWebhook()
    {
        return $this->container['webhook'];
    }

    /**
     * Sets webhook
     *
     * @param string $webhook webhook
     *
     * @return $this
     */
    public function setWebhook($webhook)
    {
        $this->container['webhook'] = $webhook;

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

