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

class TopParamForListRevisionsInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TopParamForListRevisionsInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'account_id' => 'int',
        'dest_service' => 'string',
        'is_internal' => 'string',
        'psm' => 'string',
        'real_ip' => 'string',
        'region' => 'string',
        'request_id' => 'string',
        'role_id' => 'int',
        'site' => 'string',
        'source_service' => 'string',
        'user_id' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'account_id' => 'int64',
        'dest_service' => null,
        'is_internal' => null,
        'psm' => null,
        'real_ip' => null,
        'region' => null,
        'request_id' => null,
        'role_id' => 'int64',
        'site' => null,
        'source_service' => null,
        'user_id' => 'int64'
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
        'account_id' => 'AccountId',
        'dest_service' => 'DestService',
        'is_internal' => 'IsInternal',
        'psm' => 'Psm',
        'real_ip' => 'RealIp',
        'region' => 'Region',
        'request_id' => 'RequestId',
        'role_id' => 'RoleId',
        'site' => 'Site',
        'source_service' => 'SourceService',
        'user_id' => 'UserId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account_id' => 'setAccountId',
        'dest_service' => 'setDestService',
        'is_internal' => 'setIsInternal',
        'psm' => 'setPsm',
        'real_ip' => 'setRealIp',
        'region' => 'setRegion',
        'request_id' => 'setRequestId',
        'role_id' => 'setRoleId',
        'site' => 'setSite',
        'source_service' => 'setSourceService',
        'user_id' => 'setUserId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account_id' => 'getAccountId',
        'dest_service' => 'getDestService',
        'is_internal' => 'getIsInternal',
        'psm' => 'getPsm',
        'real_ip' => 'getRealIp',
        'region' => 'getRegion',
        'request_id' => 'getRequestId',
        'role_id' => 'getRoleId',
        'site' => 'getSite',
        'source_service' => 'getSourceService',
        'user_id' => 'getUserId'
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
        $this->container['account_id'] = isset($data['account_id']) ? $data['account_id'] : null;
        $this->container['dest_service'] = isset($data['dest_service']) ? $data['dest_service'] : null;
        $this->container['is_internal'] = isset($data['is_internal']) ? $data['is_internal'] : null;
        $this->container['psm'] = isset($data['psm']) ? $data['psm'] : null;
        $this->container['real_ip'] = isset($data['real_ip']) ? $data['real_ip'] : null;
        $this->container['region'] = isset($data['region']) ? $data['region'] : null;
        $this->container['request_id'] = isset($data['request_id']) ? $data['request_id'] : null;
        $this->container['role_id'] = isset($data['role_id']) ? $data['role_id'] : null;
        $this->container['site'] = isset($data['site']) ? $data['site'] : null;
        $this->container['source_service'] = isset($data['source_service']) ? $data['source_service'] : null;
        $this->container['user_id'] = isset($data['user_id']) ? $data['user_id'] : null;
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
     * Gets account_id
     *
     * @return int
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     *
     * @param int $account_id account_id
     *
     * @return $this
     */
    public function setAccountId($account_id)
    {
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets dest_service
     *
     * @return string
     */
    public function getDestService()
    {
        return $this->container['dest_service'];
    }

    /**
     * Sets dest_service
     *
     * @param string $dest_service dest_service
     *
     * @return $this
     */
    public function setDestService($dest_service)
    {
        $this->container['dest_service'] = $dest_service;

        return $this;
    }

    /**
     * Gets is_internal
     *
     * @return string
     */
    public function getIsInternal()
    {
        return $this->container['is_internal'];
    }

    /**
     * Sets is_internal
     *
     * @param string $is_internal is_internal
     *
     * @return $this
     */
    public function setIsInternal($is_internal)
    {
        $this->container['is_internal'] = $is_internal;

        return $this;
    }

    /**
     * Gets psm
     *
     * @return string
     */
    public function getPsm()
    {
        return $this->container['psm'];
    }

    /**
     * Sets psm
     *
     * @param string $psm psm
     *
     * @return $this
     */
    public function setPsm($psm)
    {
        $this->container['psm'] = $psm;

        return $this;
    }

    /**
     * Gets real_ip
     *
     * @return string
     */
    public function getRealIp()
    {
        return $this->container['real_ip'];
    }

    /**
     * Sets real_ip
     *
     * @param string $real_ip real_ip
     *
     * @return $this
     */
    public function setRealIp($real_ip)
    {
        $this->container['real_ip'] = $real_ip;

        return $this;
    }

    /**
     * Gets region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->container['region'];
    }

    /**
     * Sets region
     *
     * @param string $region region
     *
     * @return $this
     */
    public function setRegion($region)
    {
        $this->container['region'] = $region;

        return $this;
    }

    /**
     * Gets request_id
     *
     * @return string
     */
    public function getRequestId()
    {
        return $this->container['request_id'];
    }

    /**
     * Sets request_id
     *
     * @param string $request_id request_id
     *
     * @return $this
     */
    public function setRequestId($request_id)
    {
        $this->container['request_id'] = $request_id;

        return $this;
    }

    /**
     * Gets role_id
     *
     * @return int
     */
    public function getRoleId()
    {
        return $this->container['role_id'];
    }

    /**
     * Sets role_id
     *
     * @param int $role_id role_id
     *
     * @return $this
     */
    public function setRoleId($role_id)
    {
        $this->container['role_id'] = $role_id;

        return $this;
    }

    /**
     * Gets site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->container['site'];
    }

    /**
     * Sets site
     *
     * @param string $site site
     *
     * @return $this
     */
    public function setSite($site)
    {
        $this->container['site'] = $site;

        return $this;
    }

    /**
     * Gets source_service
     *
     * @return string
     */
    public function getSourceService()
    {
        return $this->container['source_service'];
    }

    /**
     * Sets source_service
     *
     * @param string $source_service source_service
     *
     * @return $this
     */
    public function setSourceService($source_service)
    {
        $this->container['source_service'] = $source_service;

        return $this;
    }

    /**
     * Gets user_id
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->container['user_id'];
    }

    /**
     * Sets user_id
     *
     * @param int $user_id user_id
     *
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->container['user_id'] = $user_id;

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

