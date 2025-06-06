<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Seccenter20240508\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class DataForGetRegistryImageDetailOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DataForGetRegistryImageDetailOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'arch' => '\Volcengine\Seccenter20240508\Model\ArchForGetRegistryImageDetailOutput[]',
        'digest' => 'string',
        'id' => 'string',
        'image_id' => 'string',
        'namespace' => 'string',
        'push_time' => 'int',
        'registry_name' => 'string',
        'registry_type' => 'string',
        'repo' => 'string',
        'scan' => '\Volcengine\Seccenter20240508\Model\ScanForGetRegistryImageDetailOutput',
        'scan_id' => 'string',
        'scan_status' => 'string',
        'scan_time' => 'int',
        'size' => 'int',
        'tag' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'arch' => null,
        'digest' => null,
        'id' => null,
        'image_id' => null,
        'namespace' => null,
        'push_time' => 'int32',
        'registry_name' => null,
        'registry_type' => null,
        'repo' => null,
        'scan' => null,
        'scan_id' => null,
        'scan_status' => null,
        'scan_time' => 'int32',
        'size' => 'int32',
        'tag' => null
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
        'arch' => 'Arch',
        'digest' => 'Digest',
        'id' => 'ID',
        'image_id' => 'ImageID',
        'namespace' => 'Namespace',
        'push_time' => 'PushTime',
        'registry_name' => 'RegistryName',
        'registry_type' => 'RegistryType',
        'repo' => 'Repo',
        'scan' => 'Scan',
        'scan_id' => 'ScanID',
        'scan_status' => 'ScanStatus',
        'scan_time' => 'ScanTime',
        'size' => 'Size',
        'tag' => 'Tag'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'arch' => 'setArch',
        'digest' => 'setDigest',
        'id' => 'setId',
        'image_id' => 'setImageId',
        'namespace' => 'setNamespace',
        'push_time' => 'setPushTime',
        'registry_name' => 'setRegistryName',
        'registry_type' => 'setRegistryType',
        'repo' => 'setRepo',
        'scan' => 'setScan',
        'scan_id' => 'setScanId',
        'scan_status' => 'setScanStatus',
        'scan_time' => 'setScanTime',
        'size' => 'setSize',
        'tag' => 'setTag'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'arch' => 'getArch',
        'digest' => 'getDigest',
        'id' => 'getId',
        'image_id' => 'getImageId',
        'namespace' => 'getNamespace',
        'push_time' => 'getPushTime',
        'registry_name' => 'getRegistryName',
        'registry_type' => 'getRegistryType',
        'repo' => 'getRepo',
        'scan' => 'getScan',
        'scan_id' => 'getScanId',
        'scan_status' => 'getScanStatus',
        'scan_time' => 'getScanTime',
        'size' => 'getSize',
        'tag' => 'getTag'
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
        $this->container['arch'] = isset($data['arch']) ? $data['arch'] : null;
        $this->container['digest'] = isset($data['digest']) ? $data['digest'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['image_id'] = isset($data['image_id']) ? $data['image_id'] : null;
        $this->container['namespace'] = isset($data['namespace']) ? $data['namespace'] : null;
        $this->container['push_time'] = isset($data['push_time']) ? $data['push_time'] : null;
        $this->container['registry_name'] = isset($data['registry_name']) ? $data['registry_name'] : null;
        $this->container['registry_type'] = isset($data['registry_type']) ? $data['registry_type'] : null;
        $this->container['repo'] = isset($data['repo']) ? $data['repo'] : null;
        $this->container['scan'] = isset($data['scan']) ? $data['scan'] : null;
        $this->container['scan_id'] = isset($data['scan_id']) ? $data['scan_id'] : null;
        $this->container['scan_status'] = isset($data['scan_status']) ? $data['scan_status'] : null;
        $this->container['scan_time'] = isset($data['scan_time']) ? $data['scan_time'] : null;
        $this->container['size'] = isset($data['size']) ? $data['size'] : null;
        $this->container['tag'] = isset($data['tag']) ? $data['tag'] : null;
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
     * Gets arch
     *
     * @return \Volcengine\Seccenter20240508\Model\ArchForGetRegistryImageDetailOutput[]
     */
    public function getArch()
    {
        return $this->container['arch'];
    }

    /**
     * Sets arch
     *
     * @param \Volcengine\Seccenter20240508\Model\ArchForGetRegistryImageDetailOutput[] $arch arch
     *
     * @return $this
     */
    public function setArch($arch)
    {
        $this->container['arch'] = $arch;

        return $this;
    }

    /**
     * Gets digest
     *
     * @return string
     */
    public function getDigest()
    {
        return $this->container['digest'];
    }

    /**
     * Sets digest
     *
     * @param string $digest digest
     *
     * @return $this
     */
    public function setDigest($digest)
    {
        $this->container['digest'] = $digest;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets image_id
     *
     * @return string
     */
    public function getImageId()
    {
        return $this->container['image_id'];
    }

    /**
     * Sets image_id
     *
     * @param string $image_id image_id
     *
     * @return $this
     */
    public function setImageId($image_id)
    {
        $this->container['image_id'] = $image_id;

        return $this;
    }

    /**
     * Gets namespace
     *
     * @return string
     */
    public function getNamespace()
    {
        return $this->container['namespace'];
    }

    /**
     * Sets namespace
     *
     * @param string $namespace namespace
     *
     * @return $this
     */
    public function setNamespace($namespace)
    {
        $this->container['namespace'] = $namespace;

        return $this;
    }

    /**
     * Gets push_time
     *
     * @return int
     */
    public function getPushTime()
    {
        return $this->container['push_time'];
    }

    /**
     * Sets push_time
     *
     * @param int $push_time push_time
     *
     * @return $this
     */
    public function setPushTime($push_time)
    {
        $this->container['push_time'] = $push_time;

        return $this;
    }

    /**
     * Gets registry_name
     *
     * @return string
     */
    public function getRegistryName()
    {
        return $this->container['registry_name'];
    }

    /**
     * Sets registry_name
     *
     * @param string $registry_name registry_name
     *
     * @return $this
     */
    public function setRegistryName($registry_name)
    {
        $this->container['registry_name'] = $registry_name;

        return $this;
    }

    /**
     * Gets registry_type
     *
     * @return string
     */
    public function getRegistryType()
    {
        return $this->container['registry_type'];
    }

    /**
     * Sets registry_type
     *
     * @param string $registry_type registry_type
     *
     * @return $this
     */
    public function setRegistryType($registry_type)
    {
        $this->container['registry_type'] = $registry_type;

        return $this;
    }

    /**
     * Gets repo
     *
     * @return string
     */
    public function getRepo()
    {
        return $this->container['repo'];
    }

    /**
     * Sets repo
     *
     * @param string $repo repo
     *
     * @return $this
     */
    public function setRepo($repo)
    {
        $this->container['repo'] = $repo;

        return $this;
    }

    /**
     * Gets scan
     *
     * @return \Volcengine\Seccenter20240508\Model\ScanForGetRegistryImageDetailOutput
     */
    public function getScan()
    {
        return $this->container['scan'];
    }

    /**
     * Sets scan
     *
     * @param \Volcengine\Seccenter20240508\Model\ScanForGetRegistryImageDetailOutput $scan scan
     *
     * @return $this
     */
    public function setScan($scan)
    {
        $this->container['scan'] = $scan;

        return $this;
    }

    /**
     * Gets scan_id
     *
     * @return string
     */
    public function getScanId()
    {
        return $this->container['scan_id'];
    }

    /**
     * Sets scan_id
     *
     * @param string $scan_id scan_id
     *
     * @return $this
     */
    public function setScanId($scan_id)
    {
        $this->container['scan_id'] = $scan_id;

        return $this;
    }

    /**
     * Gets scan_status
     *
     * @return string
     */
    public function getScanStatus()
    {
        return $this->container['scan_status'];
    }

    /**
     * Sets scan_status
     *
     * @param string $scan_status scan_status
     *
     * @return $this
     */
    public function setScanStatus($scan_status)
    {
        $this->container['scan_status'] = $scan_status;

        return $this;
    }

    /**
     * Gets scan_time
     *
     * @return int
     */
    public function getScanTime()
    {
        return $this->container['scan_time'];
    }

    /**
     * Sets scan_time
     *
     * @param int $scan_time scan_time
     *
     * @return $this
     */
    public function setScanTime($scan_time)
    {
        $this->container['scan_time'] = $scan_time;

        return $this;
    }

    /**
     * Gets size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->container['size'];
    }

    /**
     * Sets size
     *
     * @param int $size size
     *
     * @return $this
     */
    public function setSize($size)
    {
        $this->container['size'] = $size;

        return $this;
    }

    /**
     * Gets tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->container['tag'];
    }

    /**
     * Sets tag
     *
     * @param string $tag tag
     *
     * @return $this
     */
    public function setTag($tag)
    {
        $this->container['tag'] = $tag;

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

