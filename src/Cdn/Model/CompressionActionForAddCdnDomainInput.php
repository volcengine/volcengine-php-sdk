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

class CompressionActionForAddCdnDomainInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CompressionActionForAddCdnDomainInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'compression_format' => 'string',
        'compression_target' => 'string',
        'compression_type' => 'string[]',
        'max_file_size_kb' => 'int',
        'min_file_size_kb' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'compression_format' => null,
        'compression_target' => null,
        'compression_type' => null,
        'max_file_size_kb' => 'int64',
        'min_file_size_kb' => 'int64'
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
        'compression_format' => 'CompressionFormat',
        'compression_target' => 'CompressionTarget',
        'compression_type' => 'CompressionType',
        'max_file_size_kb' => 'MaxFileSizeKB',
        'min_file_size_kb' => 'MinFileSizeKB'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'compression_format' => 'setCompressionFormat',
        'compression_target' => 'setCompressionTarget',
        'compression_type' => 'setCompressionType',
        'max_file_size_kb' => 'setMaxFileSizeKb',
        'min_file_size_kb' => 'setMinFileSizeKb'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'compression_format' => 'getCompressionFormat',
        'compression_target' => 'getCompressionTarget',
        'compression_type' => 'getCompressionType',
        'max_file_size_kb' => 'getMaxFileSizeKb',
        'min_file_size_kb' => 'getMinFileSizeKb'
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
        $this->container['compression_format'] = isset($data['compression_format']) ? $data['compression_format'] : null;
        $this->container['compression_target'] = isset($data['compression_target']) ? $data['compression_target'] : null;
        $this->container['compression_type'] = isset($data['compression_type']) ? $data['compression_type'] : null;
        $this->container['max_file_size_kb'] = isset($data['max_file_size_kb']) ? $data['max_file_size_kb'] : null;
        $this->container['min_file_size_kb'] = isset($data['min_file_size_kb']) ? $data['min_file_size_kb'] : null;
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
     * Gets compression_format
     *
     * @return string
     */
    public function getCompressionFormat()
    {
        return $this->container['compression_format'];
    }

    /**
     * Sets compression_format
     *
     * @param string $compression_format compression_format
     *
     * @return $this
     */
    public function setCompressionFormat($compression_format)
    {
        $this->container['compression_format'] = $compression_format;

        return $this;
    }

    /**
     * Gets compression_target
     *
     * @return string
     */
    public function getCompressionTarget()
    {
        return $this->container['compression_target'];
    }

    /**
     * Sets compression_target
     *
     * @param string $compression_target compression_target
     *
     * @return $this
     */
    public function setCompressionTarget($compression_target)
    {
        $this->container['compression_target'] = $compression_target;

        return $this;
    }

    /**
     * Gets compression_type
     *
     * @return string[]
     */
    public function getCompressionType()
    {
        return $this->container['compression_type'];
    }

    /**
     * Sets compression_type
     *
     * @param string[] $compression_type compression_type
     *
     * @return $this
     */
    public function setCompressionType($compression_type)
    {
        $this->container['compression_type'] = $compression_type;

        return $this;
    }

    /**
     * Gets max_file_size_kb
     *
     * @return int
     */
    public function getMaxFileSizeKb()
    {
        return $this->container['max_file_size_kb'];
    }

    /**
     * Sets max_file_size_kb
     *
     * @param int $max_file_size_kb max_file_size_kb
     *
     * @return $this
     */
    public function setMaxFileSizeKb($max_file_size_kb)
    {
        $this->container['max_file_size_kb'] = $max_file_size_kb;

        return $this;
    }

    /**
     * Gets min_file_size_kb
     *
     * @return int
     */
    public function getMinFileSizeKb()
    {
        return $this->container['min_file_size_kb'];
    }

    /**
     * Sets min_file_size_kb
     *
     * @param int $min_file_size_kb min_file_size_kb
     *
     * @return $this
     */
    public function setMinFileSizeKb($min_file_size_kb)
    {
        $this->container['min_file_size_kb'] = $min_file_size_kb;

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

