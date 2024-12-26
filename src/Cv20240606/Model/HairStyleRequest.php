<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Cv20240606\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class HairStyleRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'HairStyleRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'binary_data_base64' => 'string[]',
        'hair_type' => 'int',
        'image_urls' => 'string[]',
        'logo_info' => '\Volcengine\Cv20240606\Model\LogoInfoForHairStyleInput',
        'req_key' => 'string',
        'return_url' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'binary_data_base64' => null,
        'hair_type' => 'int32',
        'image_urls' => null,
        'logo_info' => null,
        'req_key' => null,
        'return_url' => null
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
        'binary_data_base64' => 'binary_data_base64',
        'hair_type' => 'hair_type',
        'image_urls' => 'image_urls',
        'logo_info' => 'logo_info',
        'req_key' => 'req_key',
        'return_url' => 'return_url'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'binary_data_base64' => 'setBinaryDataBase64',
        'hair_type' => 'setHairType',
        'image_urls' => 'setImageUrls',
        'logo_info' => 'setLogoInfo',
        'req_key' => 'setReqKey',
        'return_url' => 'setReturnUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'binary_data_base64' => 'getBinaryDataBase64',
        'hair_type' => 'getHairType',
        'image_urls' => 'getImageUrls',
        'logo_info' => 'getLogoInfo',
        'req_key' => 'getReqKey',
        'return_url' => 'getReturnUrl'
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
        $this->container['binary_data_base64'] = isset($data['binary_data_base64']) ? $data['binary_data_base64'] : null;
        $this->container['hair_type'] = isset($data['hair_type']) ? $data['hair_type'] : null;
        $this->container['image_urls'] = isset($data['image_urls']) ? $data['image_urls'] : null;
        $this->container['logo_info'] = isset($data['logo_info']) ? $data['logo_info'] : null;
        $this->container['req_key'] = isset($data['req_key']) ? $data['req_key'] : null;
        $this->container['return_url'] = isset($data['return_url']) ? $data['return_url'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['req_key'] === null) {
            $invalidProperties[] = "'req_key' can't be null";
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
     * Gets binary_data_base64
     *
     * @return string[]
     */
    public function getBinaryDataBase64()
    {
        return $this->container['binary_data_base64'];
    }

    /**
     * Sets binary_data_base64
     *
     * @param string[] $binary_data_base64 binary_data_base64
     *
     * @return $this
     */
    public function setBinaryDataBase64($binary_data_base64)
    {
        $this->container['binary_data_base64'] = $binary_data_base64;

        return $this;
    }

    /**
     * Gets hair_type
     *
     * @return int
     */
    public function getHairType()
    {
        return $this->container['hair_type'];
    }

    /**
     * Sets hair_type
     *
     * @param int $hair_type hair_type
     *
     * @return $this
     */
    public function setHairType($hair_type)
    {
        $this->container['hair_type'] = $hair_type;

        return $this;
    }

    /**
     * Gets image_urls
     *
     * @return string[]
     */
    public function getImageUrls()
    {
        return $this->container['image_urls'];
    }

    /**
     * Sets image_urls
     *
     * @param string[] $image_urls image_urls
     *
     * @return $this
     */
    public function setImageUrls($image_urls)
    {
        $this->container['image_urls'] = $image_urls;

        return $this;
    }

    /**
     * Gets logo_info
     *
     * @return \Volcengine\Cv20240606\Model\LogoInfoForHairStyleInput
     */
    public function getLogoInfo()
    {
        return $this->container['logo_info'];
    }

    /**
     * Sets logo_info
     *
     * @param \Volcengine\Cv20240606\Model\LogoInfoForHairStyleInput $logo_info logo_info
     *
     * @return $this
     */
    public function setLogoInfo($logo_info)
    {
        $this->container['logo_info'] = $logo_info;

        return $this;
    }

    /**
     * Gets req_key
     *
     * @return string
     */
    public function getReqKey()
    {
        return $this->container['req_key'];
    }

    /**
     * Sets req_key
     *
     * @param string $req_key req_key
     *
     * @return $this
     */
    public function setReqKey($req_key)
    {
        $this->container['req_key'] = $req_key;

        return $this;
    }

    /**
     * Gets return_url
     *
     * @return bool
     */
    public function getReturnUrl()
    {
        return $this->container['return_url'];
    }

    /**
     * Sets return_url
     *
     * @param bool $return_url return_url
     *
     * @return $this
     */
    public function setReturnUrl($return_url)
    {
        $this->container['return_url'] = $return_url;

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
