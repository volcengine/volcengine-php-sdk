<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Billing\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class AuthForListInvitationOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'AuthForListInvitationOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'auth_id' => 'string',
        'auth_list' => 'int[]',
        'major_account_id' => 'int',
        'relation_id' => 'string',
        'sub_account_id' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'auth_id' => null,
        'auth_list' => 'int32',
        'major_account_id' => 'int32',
        'relation_id' => null,
        'sub_account_id' => 'int32'
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
        'auth_id' => 'AuthID',
        'auth_list' => 'AuthList',
        'major_account_id' => 'MajorAccountID',
        'relation_id' => 'RelationID',
        'sub_account_id' => 'SubAccountID'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'auth_id' => 'setAuthId',
        'auth_list' => 'setAuthList',
        'major_account_id' => 'setMajorAccountId',
        'relation_id' => 'setRelationId',
        'sub_account_id' => 'setSubAccountId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'auth_id' => 'getAuthId',
        'auth_list' => 'getAuthList',
        'major_account_id' => 'getMajorAccountId',
        'relation_id' => 'getRelationId',
        'sub_account_id' => 'getSubAccountId'
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
        $this->container['auth_id'] = isset($data['auth_id']) ? $data['auth_id'] : null;
        $this->container['auth_list'] = isset($data['auth_list']) ? $data['auth_list'] : null;
        $this->container['major_account_id'] = isset($data['major_account_id']) ? $data['major_account_id'] : null;
        $this->container['relation_id'] = isset($data['relation_id']) ? $data['relation_id'] : null;
        $this->container['sub_account_id'] = isset($data['sub_account_id']) ? $data['sub_account_id'] : null;
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
     * Gets auth_id
     *
     * @return string
     */
    public function getAuthId()
    {
        return $this->container['auth_id'];
    }

    /**
     * Sets auth_id
     *
     * @param string $auth_id auth_id
     *
     * @return $this
     */
    public function setAuthId($auth_id)
    {
        $this->container['auth_id'] = $auth_id;

        return $this;
    }

    /**
     * Gets auth_list
     *
     * @return int[]
     */
    public function getAuthList()
    {
        return $this->container['auth_list'];
    }

    /**
     * Sets auth_list
     *
     * @param int[] $auth_list auth_list
     *
     * @return $this
     */
    public function setAuthList($auth_list)
    {
        $this->container['auth_list'] = $auth_list;

        return $this;
    }

    /**
     * Gets major_account_id
     *
     * @return int
     */
    public function getMajorAccountId()
    {
        return $this->container['major_account_id'];
    }

    /**
     * Sets major_account_id
     *
     * @param int $major_account_id major_account_id
     *
     * @return $this
     */
    public function setMajorAccountId($major_account_id)
    {
        $this->container['major_account_id'] = $major_account_id;

        return $this;
    }

    /**
     * Gets relation_id
     *
     * @return string
     */
    public function getRelationId()
    {
        return $this->container['relation_id'];
    }

    /**
     * Sets relation_id
     *
     * @param string $relation_id relation_id
     *
     * @return $this
     */
    public function setRelationId($relation_id)
    {
        $this->container['relation_id'] = $relation_id;

        return $this;
    }

    /**
     * Gets sub_account_id
     *
     * @return int
     */
    public function getSubAccountId()
    {
        return $this->container['sub_account_id'];
    }

    /**
     * Sets sub_account_id
     *
     * @param int $sub_account_id sub_account_id
     *
     * @return $this
     */
    public function setSubAccountId($sub_account_id)
    {
        $this->container['sub_account_id'] = $sub_account_id;

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

