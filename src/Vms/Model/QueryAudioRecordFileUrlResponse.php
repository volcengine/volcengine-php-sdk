<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vms\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class QueryAudioRecordFileUrlResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'QueryAudioRecordFileUrlResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'audio_record_file_url' => 'string',
        'audio_record_left_file_url' => 'string',
        'audio_record_right_file_url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'audio_record_file_url' => null,
        'audio_record_left_file_url' => null,
        'audio_record_right_file_url' => null
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
        'audio_record_file_url' => 'AudioRecordFileUrl',
        'audio_record_left_file_url' => 'AudioRecordLeftFileUrl',
        'audio_record_right_file_url' => 'AudioRecordRightFileUrl'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'audio_record_file_url' => 'setAudioRecordFileUrl',
        'audio_record_left_file_url' => 'setAudioRecordLeftFileUrl',
        'audio_record_right_file_url' => 'setAudioRecordRightFileUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'audio_record_file_url' => 'getAudioRecordFileUrl',
        'audio_record_left_file_url' => 'getAudioRecordLeftFileUrl',
        'audio_record_right_file_url' => 'getAudioRecordRightFileUrl'
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
        $this->container['audio_record_file_url'] = isset($data['audio_record_file_url']) ? $data['audio_record_file_url'] : null;
        $this->container['audio_record_left_file_url'] = isset($data['audio_record_left_file_url']) ? $data['audio_record_left_file_url'] : null;
        $this->container['audio_record_right_file_url'] = isset($data['audio_record_right_file_url']) ? $data['audio_record_right_file_url'] : null;
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
     * Gets audio_record_file_url
     *
     * @return string
     */
    public function getAudioRecordFileUrl()
    {
        return $this->container['audio_record_file_url'];
    }

    /**
     * Sets audio_record_file_url
     *
     * @param string $audio_record_file_url audio_record_file_url
     *
     * @return $this
     */
    public function setAudioRecordFileUrl($audio_record_file_url)
    {
        $this->container['audio_record_file_url'] = $audio_record_file_url;

        return $this;
    }

    /**
     * Gets audio_record_left_file_url
     *
     * @return string
     */
    public function getAudioRecordLeftFileUrl()
    {
        return $this->container['audio_record_left_file_url'];
    }

    /**
     * Sets audio_record_left_file_url
     *
     * @param string $audio_record_left_file_url audio_record_left_file_url
     *
     * @return $this
     */
    public function setAudioRecordLeftFileUrl($audio_record_left_file_url)
    {
        $this->container['audio_record_left_file_url'] = $audio_record_left_file_url;

        return $this;
    }

    /**
     * Gets audio_record_right_file_url
     *
     * @return string
     */
    public function getAudioRecordRightFileUrl()
    {
        return $this->container['audio_record_right_file_url'];
    }

    /**
     * Sets audio_record_right_file_url
     *
     * @param string $audio_record_right_file_url audio_record_right_file_url
     *
     * @return $this
     */
    public function setAudioRecordRightFileUrl($audio_record_right_file_url)
    {
        $this->container['audio_record_right_file_url'] = $audio_record_right_file_url;

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

