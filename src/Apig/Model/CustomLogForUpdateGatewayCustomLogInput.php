<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Apig\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class CustomLogForUpdateGatewayCustomLogInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CustomLogForUpdateGatewayCustomLogInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'custom_variables' => '\Volcengine\Apig\Model\CustomVariableForUpdateGatewayCustomLogInput[]',
        'request_headers' => '\Volcengine\Apig\Model\RequestHeaderForUpdateGatewayCustomLogInput[]',
        'response_headers' => '\Volcengine\Apig\Model\ResponseHeaderForUpdateGatewayCustomLogInput[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'custom_variables' => null,
        'request_headers' => null,
        'response_headers' => null
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
        'custom_variables' => 'CustomVariables',
        'request_headers' => 'RequestHeaders',
        'response_headers' => 'ResponseHeaders'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'custom_variables' => 'setCustomVariables',
        'request_headers' => 'setRequestHeaders',
        'response_headers' => 'setResponseHeaders'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'custom_variables' => 'getCustomVariables',
        'request_headers' => 'getRequestHeaders',
        'response_headers' => 'getResponseHeaders'
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
        $this->container['custom_variables'] = isset($data['custom_variables']) ? $data['custom_variables'] : null;
        $this->container['request_headers'] = isset($data['request_headers']) ? $data['request_headers'] : null;
        $this->container['response_headers'] = isset($data['response_headers']) ? $data['response_headers'] : null;
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
     * Gets custom_variables
     *
     * @return \Volcengine\Apig\Model\CustomVariableForUpdateGatewayCustomLogInput[]
     */
    public function getCustomVariables()
    {
        return $this->container['custom_variables'];
    }

    /**
     * Sets custom_variables
     *
     * @param \Volcengine\Apig\Model\CustomVariableForUpdateGatewayCustomLogInput[] $custom_variables custom_variables
     *
     * @return $this
     */
    public function setCustomVariables($custom_variables)
    {
        $this->container['custom_variables'] = $custom_variables;

        return $this;
    }

    /**
     * Gets request_headers
     *
     * @return \Volcengine\Apig\Model\RequestHeaderForUpdateGatewayCustomLogInput[]
     */
    public function getRequestHeaders()
    {
        return $this->container['request_headers'];
    }

    /**
     * Sets request_headers
     *
     * @param \Volcengine\Apig\Model\RequestHeaderForUpdateGatewayCustomLogInput[] $request_headers request_headers
     *
     * @return $this
     */
    public function setRequestHeaders($request_headers)
    {
        $this->container['request_headers'] = $request_headers;

        return $this;
    }

    /**
     * Gets response_headers
     *
     * @return \Volcengine\Apig\Model\ResponseHeaderForUpdateGatewayCustomLogInput[]
     */
    public function getResponseHeaders()
    {
        return $this->container['response_headers'];
    }

    /**
     * Sets response_headers
     *
     * @param \Volcengine\Apig\Model\ResponseHeaderForUpdateGatewayCustomLogInput[] $response_headers response_headers
     *
     * @return $this
     */
    public function setResponseHeaders($response_headers)
    {
        $this->container['response_headers'] = $response_headers;

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

