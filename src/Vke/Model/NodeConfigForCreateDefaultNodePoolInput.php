<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vke\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class NodeConfigForCreateDefaultNodePoolInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'NodeConfigForCreateDefaultNodePoolInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'initialize_script' => 'string',
        'name_prefix' => 'string',
        'security' => '\Volcengine\Vke\Model\SecurityForCreateDefaultNodePoolInput',
        'tags' => '\Volcengine\Vke\Model\TagForCreateDefaultNodePoolInput[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'initialize_script' => null,
        'name_prefix' => null,
        'security' => null,
        'tags' => null
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
        'initialize_script' => 'InitializeScript',
        'name_prefix' => 'NamePrefix',
        'security' => 'Security',
        'tags' => 'Tags'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'initialize_script' => 'setInitializeScript',
        'name_prefix' => 'setNamePrefix',
        'security' => 'setSecurity',
        'tags' => 'setTags'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'initialize_script' => 'getInitializeScript',
        'name_prefix' => 'getNamePrefix',
        'security' => 'getSecurity',
        'tags' => 'getTags'
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
        $this->container['initialize_script'] = isset($data['initialize_script']) ? $data['initialize_script'] : null;
        $this->container['name_prefix'] = isset($data['name_prefix']) ? $data['name_prefix'] : null;
        $this->container['security'] = isset($data['security']) ? $data['security'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
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
     * Gets initialize_script
     *
     * @return string
     */
    public function getInitializeScript()
    {
        return $this->container['initialize_script'];
    }

    /**
     * Sets initialize_script
     *
     * @param string $initialize_script initialize_script
     *
     * @return $this
     */
    public function setInitializeScript($initialize_script)
    {
        $this->container['initialize_script'] = $initialize_script;

        return $this;
    }

    /**
     * Gets name_prefix
     *
     * @return string
     */
    public function getNamePrefix()
    {
        return $this->container['name_prefix'];
    }

    /**
     * Sets name_prefix
     *
     * @param string $name_prefix name_prefix
     *
     * @return $this
     */
    public function setNamePrefix($name_prefix)
    {
        $this->container['name_prefix'] = $name_prefix;

        return $this;
    }

    /**
     * Gets security
     *
     * @return \Volcengine\Vke\Model\SecurityForCreateDefaultNodePoolInput
     */
    public function getSecurity()
    {
        return $this->container['security'];
    }

    /**
     * Sets security
     *
     * @param \Volcengine\Vke\Model\SecurityForCreateDefaultNodePoolInput $security security
     *
     * @return $this
     */
    public function setSecurity($security)
    {
        $this->container['security'] = $security;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return \Volcengine\Vke\Model\TagForCreateDefaultNodePoolInput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Vke\Model\TagForCreateDefaultNodePoolInput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

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

