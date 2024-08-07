<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vefaas\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class TlsConfigForCreateFunctionInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TlsConfigForCreateFunctionInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'enable_log' => 'bool',
        'tls_project_id' => 'string',
        'tls_topic_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'enable_log' => null,
        'tls_project_id' => null,
        'tls_topic_id' => null
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
        'enable_log' => 'EnableLog',
        'tls_project_id' => 'TlsProjectId',
        'tls_topic_id' => 'TlsTopicId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'enable_log' => 'setEnableLog',
        'tls_project_id' => 'setTlsProjectId',
        'tls_topic_id' => 'setTlsTopicId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'enable_log' => 'getEnableLog',
        'tls_project_id' => 'getTlsProjectId',
        'tls_topic_id' => 'getTlsTopicId'
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
        $this->container['enable_log'] = isset($data['enable_log']) ? $data['enable_log'] : null;
        $this->container['tls_project_id'] = isset($data['tls_project_id']) ? $data['tls_project_id'] : null;
        $this->container['tls_topic_id'] = isset($data['tls_topic_id']) ? $data['tls_topic_id'] : null;
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
     * Gets enable_log
     *
     * @return bool
     */
    public function getEnableLog()
    {
        return $this->container['enable_log'];
    }

    /**
     * Sets enable_log
     *
     * @param bool $enable_log enable_log
     *
     * @return $this
     */
    public function setEnableLog($enable_log)
    {
        $this->container['enable_log'] = $enable_log;

        return $this;
    }

    /**
     * Gets tls_project_id
     *
     * @return string
     */
    public function getTlsProjectId()
    {
        return $this->container['tls_project_id'];
    }

    /**
     * Sets tls_project_id
     *
     * @param string $tls_project_id tls_project_id
     *
     * @return $this
     */
    public function setTlsProjectId($tls_project_id)
    {
        $this->container['tls_project_id'] = $tls_project_id;

        return $this;
    }

    /**
     * Gets tls_topic_id
     *
     * @return string
     */
    public function getTlsTopicId()
    {
        return $this->container['tls_topic_id'];
    }

    /**
     * Sets tls_topic_id
     *
     * @param string $tls_topic_id tls_topic_id
     *
     * @return $this
     */
    public function setTlsTopicId($tls_topic_id)
    {
        $this->container['tls_topic_id'] = $tls_topic_id;

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

