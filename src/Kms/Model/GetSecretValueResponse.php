<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Kms\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class GetSecretValueResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetSecretValueResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'creation_date' => 'int',
        'secret_value' => 'string',
        'version_id' => 'string',
        'version_stage' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'creation_date' => 'int64',
        'secret_value' => null,
        'version_id' => null,
        'version_stage' => null
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
        'creation_date' => 'CreationDate',
        'secret_value' => 'SecretValue',
        'version_id' => 'VersionID',
        'version_stage' => 'VersionStage'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'creation_date' => 'setCreationDate',
        'secret_value' => 'setSecretValue',
        'version_id' => 'setVersionId',
        'version_stage' => 'setVersionStage'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'creation_date' => 'getCreationDate',
        'secret_value' => 'getSecretValue',
        'version_id' => 'getVersionId',
        'version_stage' => 'getVersionStage'
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
        $this->container['creation_date'] = isset($data['creation_date']) ? $data['creation_date'] : null;
        $this->container['secret_value'] = isset($data['secret_value']) ? $data['secret_value'] : null;
        $this->container['version_id'] = isset($data['version_id']) ? $data['version_id'] : null;
        $this->container['version_stage'] = isset($data['version_stage']) ? $data['version_stage'] : null;
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
     * Gets creation_date
     *
     * @return int
     */
    public function getCreationDate()
    {
        return $this->container['creation_date'];
    }

    /**
     * Sets creation_date
     *
     * @param int $creation_date creation_date
     *
     * @return $this
     */
    public function setCreationDate($creation_date)
    {
        $this->container['creation_date'] = $creation_date;

        return $this;
    }

    /**
     * Gets secret_value
     *
     * @return string
     */
    public function getSecretValue()
    {
        return $this->container['secret_value'];
    }

    /**
     * Sets secret_value
     *
     * @param string $secret_value secret_value
     *
     * @return $this
     */
    public function setSecretValue($secret_value)
    {
        $this->container['secret_value'] = $secret_value;

        return $this;
    }

    /**
     * Gets version_id
     *
     * @return string
     */
    public function getVersionId()
    {
        return $this->container['version_id'];
    }

    /**
     * Sets version_id
     *
     * @param string $version_id version_id
     *
     * @return $this
     */
    public function setVersionId($version_id)
    {
        $this->container['version_id'] = $version_id;

        return $this;
    }

    /**
     * Gets version_stage
     *
     * @return string
     */
    public function getVersionStage()
    {
        return $this->container['version_stage'];
    }

    /**
     * Sets version_stage
     *
     * @param string $version_stage version_stage
     *
     * @return $this
     */
    public function setVersionStage($version_stage)
    {
        $this->container['version_stage'] = $version_stage;

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

