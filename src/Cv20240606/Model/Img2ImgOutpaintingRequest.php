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

class Img2ImgOutpaintingRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Img2ImgOutpaintingRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'binary_data_base64' => 'string[]',
        'bottom' => 'float',
        'custom_prompt' => 'string',
        'image_urls' => 'string[]',
        'left' => 'float',
        'logo_info' => '\Volcengine\Cv20240606\Model\LogoInfoForImg2ImgOutpaintingInput',
        'max_height' => 'int',
        'max_width' => 'int',
        'req_key' => 'string',
        'return_url' => 'bool',
        'right' => 'float',
        'scale' => 'float',
        'seed' => 'int',
        'steps' => 'int',
        'strength' => 'float',
        'top' => 'float'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'binary_data_base64' => null,
        'bottom' => 'float',
        'custom_prompt' => null,
        'image_urls' => null,
        'left' => 'float',
        'logo_info' => null,
        'max_height' => 'int32',
        'max_width' => 'int32',
        'req_key' => null,
        'return_url' => null,
        'right' => 'float',
        'scale' => 'float',
        'seed' => 'int32',
        'steps' => 'int32',
        'strength' => 'float',
        'top' => 'float'
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
        'bottom' => 'bottom',
        'custom_prompt' => 'custom_prompt',
        'image_urls' => 'image_urls',
        'left' => 'left',
        'logo_info' => 'logo_info',
        'max_height' => 'max_height',
        'max_width' => 'max_width',
        'req_key' => 'req_key',
        'return_url' => 'return_url',
        'right' => 'right',
        'scale' => 'scale',
        'seed' => 'seed',
        'steps' => 'steps',
        'strength' => 'strength',
        'top' => 'top'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'binary_data_base64' => 'setBinaryDataBase64',
        'bottom' => 'setBottom',
        'custom_prompt' => 'setCustomPrompt',
        'image_urls' => 'setImageUrls',
        'left' => 'setLeft',
        'logo_info' => 'setLogoInfo',
        'max_height' => 'setMaxHeight',
        'max_width' => 'setMaxWidth',
        'req_key' => 'setReqKey',
        'return_url' => 'setReturnUrl',
        'right' => 'setRight',
        'scale' => 'setScale',
        'seed' => 'setSeed',
        'steps' => 'setSteps',
        'strength' => 'setStrength',
        'top' => 'setTop'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'binary_data_base64' => 'getBinaryDataBase64',
        'bottom' => 'getBottom',
        'custom_prompt' => 'getCustomPrompt',
        'image_urls' => 'getImageUrls',
        'left' => 'getLeft',
        'logo_info' => 'getLogoInfo',
        'max_height' => 'getMaxHeight',
        'max_width' => 'getMaxWidth',
        'req_key' => 'getReqKey',
        'return_url' => 'getReturnUrl',
        'right' => 'getRight',
        'scale' => 'getScale',
        'seed' => 'getSeed',
        'steps' => 'getSteps',
        'strength' => 'getStrength',
        'top' => 'getTop'
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
        $this->container['bottom'] = isset($data['bottom']) ? $data['bottom'] : null;
        $this->container['custom_prompt'] = isset($data['custom_prompt']) ? $data['custom_prompt'] : null;
        $this->container['image_urls'] = isset($data['image_urls']) ? $data['image_urls'] : null;
        $this->container['left'] = isset($data['left']) ? $data['left'] : null;
        $this->container['logo_info'] = isset($data['logo_info']) ? $data['logo_info'] : null;
        $this->container['max_height'] = isset($data['max_height']) ? $data['max_height'] : null;
        $this->container['max_width'] = isset($data['max_width']) ? $data['max_width'] : null;
        $this->container['req_key'] = isset($data['req_key']) ? $data['req_key'] : null;
        $this->container['return_url'] = isset($data['return_url']) ? $data['return_url'] : null;
        $this->container['right'] = isset($data['right']) ? $data['right'] : null;
        $this->container['scale'] = isset($data['scale']) ? $data['scale'] : null;
        $this->container['seed'] = isset($data['seed']) ? $data['seed'] : null;
        $this->container['steps'] = isset($data['steps']) ? $data['steps'] : null;
        $this->container['strength'] = isset($data['strength']) ? $data['strength'] : null;
        $this->container['top'] = isset($data['top']) ? $data['top'] : null;
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
     * Gets bottom
     *
     * @return float
     */
    public function getBottom()
    {
        return $this->container['bottom'];
    }

    /**
     * Sets bottom
     *
     * @param float $bottom bottom
     *
     * @return $this
     */
    public function setBottom($bottom)
    {
        $this->container['bottom'] = $bottom;

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
     * Gets left
     *
     * @return float
     */
    public function getLeft()
    {
        return $this->container['left'];
    }

    /**
     * Sets left
     *
     * @param float $left left
     *
     * @return $this
     */
    public function setLeft($left)
    {
        $this->container['left'] = $left;

        return $this;
    }

    /**
     * Gets logo_info
     *
     * @return \Volcengine\Cv20240606\Model\LogoInfoForImg2ImgOutpaintingInput
     */
    public function getLogoInfo()
    {
        return $this->container['logo_info'];
    }

    /**
     * Sets logo_info
     *
     * @param \Volcengine\Cv20240606\Model\LogoInfoForImg2ImgOutpaintingInput $logo_info logo_info
     *
     * @return $this
     */
    public function setLogoInfo($logo_info)
    {
        $this->container['logo_info'] = $logo_info;

        return $this;
    }

    /**
     * Gets max_height
     *
     * @return int
     */
    public function getMaxHeight()
    {
        return $this->container['max_height'];
    }

    /**
     * Sets max_height
     *
     * @param int $max_height max_height
     *
     * @return $this
     */
    public function setMaxHeight($max_height)
    {
        $this->container['max_height'] = $max_height;

        return $this;
    }

    /**
     * Gets max_width
     *
     * @return int
     */
    public function getMaxWidth()
    {
        return $this->container['max_width'];
    }

    /**
     * Sets max_width
     *
     * @param int $max_width max_width
     *
     * @return $this
     */
    public function setMaxWidth($max_width)
    {
        $this->container['max_width'] = $max_width;

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
     * Gets right
     *
     * @return float
     */
    public function getRight()
    {
        return $this->container['right'];
    }

    /**
     * Sets right
     *
     * @param float $right right
     *
     * @return $this
     */
    public function setRight($right)
    {
        $this->container['right'] = $right;

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
     * Gets strength
     *
     * @return float
     */
    public function getStrength()
    {
        return $this->container['strength'];
    }

    /**
     * Sets strength
     *
     * @param float $strength strength
     *
     * @return $this
     */
    public function setStrength($strength)
    {
        $this->container['strength'] = $strength;

        return $this;
    }

    /**
     * Gets top
     *
     * @return float
     */
    public function getTop()
    {
        return $this->container['top'];
    }

    /**
     * Sets top
     *
     * @param float $top top
     *
     * @return $this
     */
    public function setTop($top)
    {
        $this->container['top'] = $top;

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

