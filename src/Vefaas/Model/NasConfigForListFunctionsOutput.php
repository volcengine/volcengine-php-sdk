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

class NasConfigForListFunctionsOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'NasConfigForListFunctionsOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'file_system_id' => 'string',
        'gid' => 'int',
        'local_mount_path' => 'string',
        'mount_point_id' => 'string',
        'remote_path' => 'string',
        'uid' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'file_system_id' => null,
        'gid' => 'int64',
        'local_mount_path' => null,
        'mount_point_id' => null,
        'remote_path' => null,
        'uid' => 'int64'
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
        'file_system_id' => 'FileSystemId',
        'gid' => 'Gid',
        'local_mount_path' => 'LocalMountPath',
        'mount_point_id' => 'MountPointId',
        'remote_path' => 'RemotePath',
        'uid' => 'Uid'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'file_system_id' => 'setFileSystemId',
        'gid' => 'setGid',
        'local_mount_path' => 'setLocalMountPath',
        'mount_point_id' => 'setMountPointId',
        'remote_path' => 'setRemotePath',
        'uid' => 'setUid'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'file_system_id' => 'getFileSystemId',
        'gid' => 'getGid',
        'local_mount_path' => 'getLocalMountPath',
        'mount_point_id' => 'getMountPointId',
        'remote_path' => 'getRemotePath',
        'uid' => 'getUid'
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
        $this->container['file_system_id'] = isset($data['file_system_id']) ? $data['file_system_id'] : null;
        $this->container['gid'] = isset($data['gid']) ? $data['gid'] : null;
        $this->container['local_mount_path'] = isset($data['local_mount_path']) ? $data['local_mount_path'] : null;
        $this->container['mount_point_id'] = isset($data['mount_point_id']) ? $data['mount_point_id'] : null;
        $this->container['remote_path'] = isset($data['remote_path']) ? $data['remote_path'] : null;
        $this->container['uid'] = isset($data['uid']) ? $data['uid'] : null;
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
     * Gets file_system_id
     *
     * @return string
     */
    public function getFileSystemId()
    {
        return $this->container['file_system_id'];
    }

    /**
     * Sets file_system_id
     *
     * @param string $file_system_id file_system_id
     *
     * @return $this
     */
    public function setFileSystemId($file_system_id)
    {
        $this->container['file_system_id'] = $file_system_id;

        return $this;
    }

    /**
     * Gets gid
     *
     * @return int
     */
    public function getGid()
    {
        return $this->container['gid'];
    }

    /**
     * Sets gid
     *
     * @param int $gid gid
     *
     * @return $this
     */
    public function setGid($gid)
    {
        $this->container['gid'] = $gid;

        return $this;
    }

    /**
     * Gets local_mount_path
     *
     * @return string
     */
    public function getLocalMountPath()
    {
        return $this->container['local_mount_path'];
    }

    /**
     * Sets local_mount_path
     *
     * @param string $local_mount_path local_mount_path
     *
     * @return $this
     */
    public function setLocalMountPath($local_mount_path)
    {
        $this->container['local_mount_path'] = $local_mount_path;

        return $this;
    }

    /**
     * Gets mount_point_id
     *
     * @return string
     */
    public function getMountPointId()
    {
        return $this->container['mount_point_id'];
    }

    /**
     * Sets mount_point_id
     *
     * @param string $mount_point_id mount_point_id
     *
     * @return $this
     */
    public function setMountPointId($mount_point_id)
    {
        $this->container['mount_point_id'] = $mount_point_id;

        return $this;
    }

    /**
     * Gets remote_path
     *
     * @return string
     */
    public function getRemotePath()
    {
        return $this->container['remote_path'];
    }

    /**
     * Sets remote_path
     *
     * @param string $remote_path remote_path
     *
     * @return $this
     */
    public function setRemotePath($remote_path)
    {
        $this->container['remote_path'] = $remote_path;

        return $this;
    }

    /**
     * Gets uid
     *
     * @return int
     */
    public function getUid()
    {
        return $this->container['uid'];
    }

    /**
     * Sets uid
     *
     * @param int $uid uid
     *
     * @return $this
     */
    public function setUid($uid)
    {
        $this->container['uid'] = $uid;

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

