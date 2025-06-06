<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vod20250101\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class ConvertTranscodeAudioForGetExecutionOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ConvertTranscodeAudioForGetExecutionOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'audio_stream_meta' => '\Volcengine\Vod20250101\Model\AudioStreamMetaForGetExecutionOutput',
        'create_time' => 'string',
        'duration' => 'float',
        'dynamic_range' => 'string',
        'encoded_type' => 'string',
        'encrypt' => 'bool',
        'encryption' => '\Volcengine\Vod20250101\Model\EncryptionForGetExecutionOutput',
        'file_id' => 'string',
        'file_type' => 'string',
        'format' => 'string',
        'logo_type' => 'string',
        'md5' => 'string',
        'size' => 'double',
        'store_uri' => 'string',
        'tos_storage_class' => 'string',
        'video_stream_meta' => '\Volcengine\Vod20250101\Model\VideoStreamMetaForGetExecutionOutput'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'audio_stream_meta' => null,
        'create_time' => null,
        'duration' => 'float',
        'dynamic_range' => null,
        'encoded_type' => null,
        'encrypt' => null,
        'encryption' => null,
        'file_id' => null,
        'file_type' => null,
        'format' => null,
        'logo_type' => null,
        'md5' => null,
        'size' => 'double',
        'store_uri' => null,
        'tos_storage_class' => null,
        'video_stream_meta' => null
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
        'audio_stream_meta' => 'AudioStreamMeta',
        'create_time' => 'CreateTime',
        'duration' => 'Duration',
        'dynamic_range' => 'DynamicRange',
        'encoded_type' => 'EncodedType',
        'encrypt' => 'Encrypt',
        'encryption' => 'Encryption',
        'file_id' => 'FileId',
        'file_type' => 'FileType',
        'format' => 'Format',
        'logo_type' => 'LogoType',
        'md5' => 'Md5',
        'size' => 'Size',
        'store_uri' => 'StoreUri',
        'tos_storage_class' => 'TosStorageClass',
        'video_stream_meta' => 'VideoStreamMeta'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'audio_stream_meta' => 'setAudioStreamMeta',
        'create_time' => 'setCreateTime',
        'duration' => 'setDuration',
        'dynamic_range' => 'setDynamicRange',
        'encoded_type' => 'setEncodedType',
        'encrypt' => 'setEncrypt',
        'encryption' => 'setEncryption',
        'file_id' => 'setFileId',
        'file_type' => 'setFileType',
        'format' => 'setFormat',
        'logo_type' => 'setLogoType',
        'md5' => 'setMd5',
        'size' => 'setSize',
        'store_uri' => 'setStoreUri',
        'tos_storage_class' => 'setTosStorageClass',
        'video_stream_meta' => 'setVideoStreamMeta'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'audio_stream_meta' => 'getAudioStreamMeta',
        'create_time' => 'getCreateTime',
        'duration' => 'getDuration',
        'dynamic_range' => 'getDynamicRange',
        'encoded_type' => 'getEncodedType',
        'encrypt' => 'getEncrypt',
        'encryption' => 'getEncryption',
        'file_id' => 'getFileId',
        'file_type' => 'getFileType',
        'format' => 'getFormat',
        'logo_type' => 'getLogoType',
        'md5' => 'getMd5',
        'size' => 'getSize',
        'store_uri' => 'getStoreUri',
        'tos_storage_class' => 'getTosStorageClass',
        'video_stream_meta' => 'getVideoStreamMeta'
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
        $this->container['audio_stream_meta'] = isset($data['audio_stream_meta']) ? $data['audio_stream_meta'] : null;
        $this->container['create_time'] = isset($data['create_time']) ? $data['create_time'] : null;
        $this->container['duration'] = isset($data['duration']) ? $data['duration'] : null;
        $this->container['dynamic_range'] = isset($data['dynamic_range']) ? $data['dynamic_range'] : null;
        $this->container['encoded_type'] = isset($data['encoded_type']) ? $data['encoded_type'] : null;
        $this->container['encrypt'] = isset($data['encrypt']) ? $data['encrypt'] : null;
        $this->container['encryption'] = isset($data['encryption']) ? $data['encryption'] : null;
        $this->container['file_id'] = isset($data['file_id']) ? $data['file_id'] : null;
        $this->container['file_type'] = isset($data['file_type']) ? $data['file_type'] : null;
        $this->container['format'] = isset($data['format']) ? $data['format'] : null;
        $this->container['logo_type'] = isset($data['logo_type']) ? $data['logo_type'] : null;
        $this->container['md5'] = isset($data['md5']) ? $data['md5'] : null;
        $this->container['size'] = isset($data['size']) ? $data['size'] : null;
        $this->container['store_uri'] = isset($data['store_uri']) ? $data['store_uri'] : null;
        $this->container['tos_storage_class'] = isset($data['tos_storage_class']) ? $data['tos_storage_class'] : null;
        $this->container['video_stream_meta'] = isset($data['video_stream_meta']) ? $data['video_stream_meta'] : null;
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
     * Gets audio_stream_meta
     *
     * @return \Volcengine\Vod20250101\Model\AudioStreamMetaForGetExecutionOutput
     */
    public function getAudioStreamMeta()
    {
        return $this->container['audio_stream_meta'];
    }

    /**
     * Sets audio_stream_meta
     *
     * @param \Volcengine\Vod20250101\Model\AudioStreamMetaForGetExecutionOutput $audio_stream_meta audio_stream_meta
     *
     * @return $this
     */
    public function setAudioStreamMeta($audio_stream_meta)
    {
        $this->container['audio_stream_meta'] = $audio_stream_meta;

        return $this;
    }

    /**
     * Gets create_time
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->container['create_time'];
    }

    /**
     * Sets create_time
     *
     * @param string $create_time create_time
     *
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->container['create_time'] = $create_time;

        return $this;
    }

    /**
     * Gets duration
     *
     * @return float
     */
    public function getDuration()
    {
        return $this->container['duration'];
    }

    /**
     * Sets duration
     *
     * @param float $duration duration
     *
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->container['duration'] = $duration;

        return $this;
    }

    /**
     * Gets dynamic_range
     *
     * @return string
     */
    public function getDynamicRange()
    {
        return $this->container['dynamic_range'];
    }

    /**
     * Sets dynamic_range
     *
     * @param string $dynamic_range dynamic_range
     *
     * @return $this
     */
    public function setDynamicRange($dynamic_range)
    {
        $this->container['dynamic_range'] = $dynamic_range;

        return $this;
    }

    /**
     * Gets encoded_type
     *
     * @return string
     */
    public function getEncodedType()
    {
        return $this->container['encoded_type'];
    }

    /**
     * Sets encoded_type
     *
     * @param string $encoded_type encoded_type
     *
     * @return $this
     */
    public function setEncodedType($encoded_type)
    {
        $this->container['encoded_type'] = $encoded_type;

        return $this;
    }

    /**
     * Gets encrypt
     *
     * @return bool
     */
    public function getEncrypt()
    {
        return $this->container['encrypt'];
    }

    /**
     * Sets encrypt
     *
     * @param bool $encrypt encrypt
     *
     * @return $this
     */
    public function setEncrypt($encrypt)
    {
        $this->container['encrypt'] = $encrypt;

        return $this;
    }

    /**
     * Gets encryption
     *
     * @return \Volcengine\Vod20250101\Model\EncryptionForGetExecutionOutput
     */
    public function getEncryption()
    {
        return $this->container['encryption'];
    }

    /**
     * Sets encryption
     *
     * @param \Volcengine\Vod20250101\Model\EncryptionForGetExecutionOutput $encryption encryption
     *
     * @return $this
     */
    public function setEncryption($encryption)
    {
        $this->container['encryption'] = $encryption;

        return $this;
    }

    /**
     * Gets file_id
     *
     * @return string
     */
    public function getFileId()
    {
        return $this->container['file_id'];
    }

    /**
     * Sets file_id
     *
     * @param string $file_id file_id
     *
     * @return $this
     */
    public function setFileId($file_id)
    {
        $this->container['file_id'] = $file_id;

        return $this;
    }

    /**
     * Gets file_type
     *
     * @return string
     */
    public function getFileType()
    {
        return $this->container['file_type'];
    }

    /**
     * Sets file_type
     *
     * @param string $file_type file_type
     *
     * @return $this
     */
    public function setFileType($file_type)
    {
        $this->container['file_type'] = $file_type;

        return $this;
    }

    /**
     * Gets format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->container['format'];
    }

    /**
     * Sets format
     *
     * @param string $format format
     *
     * @return $this
     */
    public function setFormat($format)
    {
        $this->container['format'] = $format;

        return $this;
    }

    /**
     * Gets logo_type
     *
     * @return string
     */
    public function getLogoType()
    {
        return $this->container['logo_type'];
    }

    /**
     * Sets logo_type
     *
     * @param string $logo_type logo_type
     *
     * @return $this
     */
    public function setLogoType($logo_type)
    {
        $this->container['logo_type'] = $logo_type;

        return $this;
    }

    /**
     * Gets md5
     *
     * @return string
     */
    public function getMd5()
    {
        return $this->container['md5'];
    }

    /**
     * Sets md5
     *
     * @param string $md5 md5
     *
     * @return $this
     */
    public function setMd5($md5)
    {
        $this->container['md5'] = $md5;

        return $this;
    }

    /**
     * Gets size
     *
     * @return double
     */
    public function getSize()
    {
        return $this->container['size'];
    }

    /**
     * Sets size
     *
     * @param double $size size
     *
     * @return $this
     */
    public function setSize($size)
    {
        $this->container['size'] = $size;

        return $this;
    }

    /**
     * Gets store_uri
     *
     * @return string
     */
    public function getStoreUri()
    {
        return $this->container['store_uri'];
    }

    /**
     * Sets store_uri
     *
     * @param string $store_uri store_uri
     *
     * @return $this
     */
    public function setStoreUri($store_uri)
    {
        $this->container['store_uri'] = $store_uri;

        return $this;
    }

    /**
     * Gets tos_storage_class
     *
     * @return string
     */
    public function getTosStorageClass()
    {
        return $this->container['tos_storage_class'];
    }

    /**
     * Sets tos_storage_class
     *
     * @param string $tos_storage_class tos_storage_class
     *
     * @return $this
     */
    public function setTosStorageClass($tos_storage_class)
    {
        $this->container['tos_storage_class'] = $tos_storage_class;

        return $this;
    }

    /**
     * Gets video_stream_meta
     *
     * @return \Volcengine\Vod20250101\Model\VideoStreamMetaForGetExecutionOutput
     */
    public function getVideoStreamMeta()
    {
        return $this->container['video_stream_meta'];
    }

    /**
     * Sets video_stream_meta
     *
     * @param \Volcengine\Vod20250101\Model\VideoStreamMetaForGetExecutionOutput $video_stream_meta video_stream_meta
     *
     * @return $this
     */
    public function setVideoStreamMeta($video_stream_meta)
    {
        $this->container['video_stream_meta'] = $video_stream_meta;

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

