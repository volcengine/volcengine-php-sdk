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

class Img2ImgInpaintingEditRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Img2ImgInpaintingEditRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'binary_data_base64' => 'string[]',
        'custom_prompt' => 'string',
        'image_urls' => 'string[]',
        'logo_info' => '\Volcengine\Cv20240606\Model\LogoInfoForImg2ImgInpaintingEditInput',
        'req_key' => 'string',
        'return_url' => 'bool',
        'scale' => 'float',
        'seed' => 'int',
        'steps' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'binary_data_base64' => null,
        'custom_prompt' => null,
        'image_urls' => null,
        'logo_info' => null,
        'req_key' => null,
        'return_url' => null,
        'scale' => 'float',
        'seed' => 'int32',
        'steps' => 'int32'
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
        'custom_prompt' => 'custom_prompt',
        'image_urls' => 'image_urls',
        'logo_info' => 'logo_info',
        'req_key' => 'req_key',
        'return_url' => 'return_url',
        'scale' => 'scale',
        'seed' => 'seed',
        'steps' => 'steps'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'binary_data_base64' => 'setBinaryDataBase64',
        'custom_prompt' => 'setCustomPrompt',
        'image_urls' => 'setImageUrls',
        'logo_info' => 'setLogoInfo',
        'req_key' => 'setReqKey',
        'return_url' => 'setReturnUrl',
        'scale' => 'setScale',
        'seed' => 'setSeed',
        'steps' => 'setSteps'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'binary_data_base64' => 'getBinaryDataBase64',
        'custom_prompt' => 'getCustomPrompt',
        'image_urls' => 'getImageUrls',
        'logo_info' => 'getLogoInfo',
        'req_key' => 'getReqKey',
        'return_url' => 'getReturnUrl',
        'scale' => 'getScale',
        'seed' => 'getSeed',
        'steps' => 'getSteps'
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
        $this->container['custom_prompt'] = isset($data['custom_prompt']) ? $data['custom_prompt'] : null;
        $this->container['image_urls'] = isset($data['image_urls']) ? $data['image_urls'] : null;
        $this->container['logo_info'] = isset($data['logo_info']) ? $data['logo_info'] : null;
        $this->container['req_key'] = isset($data['req_key']) ? $data['req_key'] : null;
        $this->container['return_url'] = isset($data['return_url']) ? $data['return_url'] : null;
        $this->container['scale'] = isset($data['scale']) ? $data['scale'] : null;
        $this->container['seed'] = isset($data['seed']) ? $data['seed'] : null;
        $this->container['steps'] = isset($data['steps']) ? $data['steps'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['custom_prompt'] === null) {
            $invalidProperties[] = "'custom_prompt' can't be null";
        }
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
     * Gets custom_prompt
     *
     * @return string
     */
    public function getCustomPrompt()
    {
        return $this->container['custom_prompt'];
    }

    /**
     * Sets custom_prompt
     *
     * @param string $custom_prompt custom_prompt
     *
     * @return $this
     */
    public function setCustomPrompt($custom_prompt)
    {
        $this->container['custom_prompt'] = $custom_prompt;

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
     * @return \Volcengine\Cv20240606\Model\LogoInfoForImg2ImgInpaintingEditInput
     */
    public function getLogoInfo()
    {
        return $this->container['logo_info'];
    }

    /**
     * Sets logo_info
     *
     * @param \Volcengine\Cv20240606\Model\LogoInfoForImg2ImgInpaintingEditInput $logo_info logo_info
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
     * Gets scale
     *
     * @return float
     */
    public function getScale()
    {
        return $this->container['scale'];
    }

    /**
     * Sets scale
     *
     * @param float $scale scale
     *
     * @return $this
     */
    public function setScale($scale)
    {
        $this->container['scale'] = $scale;

        return $this;
    }

    /**
     * Gets seed
     *
     * @return int
     */
    public function getSeed()
    {
        return $this->container['seed'];
    }

    /**
     * Sets seed
     *
     * @param int $seed seed
     *
     * @return $this
     */
    public function setSeed($seed)
    {
        $this->container['seed'] = $seed;

        return $this;
    }

    /**
     * Gets steps
     *
     * @return int
     */
    public function getSteps()
    {
        return $this->container['steps'];
    }

    /**
     * Sets steps
     *
     * @param int $steps steps
     *
     * @return $this
     */
    public function setSteps($steps)
    {
        $this->container['steps'] = $steps;

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

