<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Storageebs\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class DescribeVolumesRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DescribeVolumesRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'instance_id' => 'string',
        'kind' => 'string',
        'page_number' => 'int',
        'page_size' => 'int',
        'project_name' => 'string',
        'tag_filters' => '\Volcengine\Storageebs\Model\TagFilterForDescribeVolumesInput[]',
        'volume_ids' => 'string[]',
        'volume_name' => 'string',
        'volume_status' => 'string',
        'volume_type' => 'string',
        'zone_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'instance_id' => null,
        'kind' => null,
        'page_number' => 'int32',
        'page_size' => 'int32',
        'project_name' => null,
        'tag_filters' => null,
        'volume_ids' => null,
        'volume_name' => null,
        'volume_status' => null,
        'volume_type' => null,
        'zone_id' => null
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
        'instance_id' => 'InstanceId',
        'kind' => 'Kind',
        'page_number' => 'PageNumber',
        'page_size' => 'PageSize',
        'project_name' => 'ProjectName',
        'tag_filters' => 'TagFilters',
        'volume_ids' => 'VolumeIds',
        'volume_name' => 'VolumeName',
        'volume_status' => 'VolumeStatus',
        'volume_type' => 'VolumeType',
        'zone_id' => 'ZoneId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'instance_id' => 'setInstanceId',
        'kind' => 'setKind',
        'page_number' => 'setPageNumber',
        'page_size' => 'setPageSize',
        'project_name' => 'setProjectName',
        'tag_filters' => 'setTagFilters',
        'volume_ids' => 'setVolumeIds',
        'volume_name' => 'setVolumeName',
        'volume_status' => 'setVolumeStatus',
        'volume_type' => 'setVolumeType',
        'zone_id' => 'setZoneId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'instance_id' => 'getInstanceId',
        'kind' => 'getKind',
        'page_number' => 'getPageNumber',
        'page_size' => 'getPageSize',
        'project_name' => 'getProjectName',
        'tag_filters' => 'getTagFilters',
        'volume_ids' => 'getVolumeIds',
        'volume_name' => 'getVolumeName',
        'volume_status' => 'getVolumeStatus',
        'volume_type' => 'getVolumeType',
        'zone_id' => 'getZoneId'
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
        $this->container['instance_id'] = isset($data['instance_id']) ? $data['instance_id'] : null;
        $this->container['kind'] = isset($data['kind']) ? $data['kind'] : null;
        $this->container['page_number'] = isset($data['page_number']) ? $data['page_number'] : null;
        $this->container['page_size'] = isset($data['page_size']) ? $data['page_size'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['tag_filters'] = isset($data['tag_filters']) ? $data['tag_filters'] : null;
        $this->container['volume_ids'] = isset($data['volume_ids']) ? $data['volume_ids'] : null;
        $this->container['volume_name'] = isset($data['volume_name']) ? $data['volume_name'] : null;
        $this->container['volume_status'] = isset($data['volume_status']) ? $data['volume_status'] : null;
        $this->container['volume_type'] = isset($data['volume_type']) ? $data['volume_type'] : null;
        $this->container['zone_id'] = isset($data['zone_id']) ? $data['zone_id'] : null;
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
     * Gets instance_id
     *
     * @return string
     */
    public function getInstanceId()
    {
        return $this->container['instance_id'];
    }

    /**
     * Sets instance_id
     *
     * @param string $instance_id instance_id
     *
     * @return $this
     */
    public function setInstanceId($instance_id)
    {
        $this->container['instance_id'] = $instance_id;

        return $this;
    }

    /**
     * Gets kind
     *
     * @return string
     */
    public function getKind()
    {
        return $this->container['kind'];
    }

    /**
     * Sets kind
     *
     * @param string $kind kind
     *
     * @return $this
     */
    public function setKind($kind)
    {
        $this->container['kind'] = $kind;

        return $this;
    }

    /**
     * Gets page_number
     *
     * @return int
     */
    public function getPageNumber()
    {
        return $this->container['page_number'];
    }

    /**
     * Sets page_number
     *
     * @param int $page_number page_number
     *
     * @return $this
     */
    public function setPageNumber($page_number)
    {
        $this->container['page_number'] = $page_number;

        return $this;
    }

    /**
     * Gets page_size
     *
     * @return int
     */
    public function getPageSize()
    {
        return $this->container['page_size'];
    }

    /**
     * Sets page_size
     *
     * @param int $page_size page_size
     *
     * @return $this
     */
    public function setPageSize($page_size)
    {
        $this->container['page_size'] = $page_size;

        return $this;
    }

    /**
     * Gets project_name
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->container['project_name'];
    }

    /**
     * Sets project_name
     *
     * @param string $project_name project_name
     *
     * @return $this
     */
    public function setProjectName($project_name)
    {
        $this->container['project_name'] = $project_name;

        return $this;
    }

    /**
     * Gets tag_filters
     *
     * @return \Volcengine\Storageebs\Model\TagFilterForDescribeVolumesInput[]
     */
    public function getTagFilters()
    {
        return $this->container['tag_filters'];
    }

    /**
     * Sets tag_filters
     *
     * @param \Volcengine\Storageebs\Model\TagFilterForDescribeVolumesInput[] $tag_filters tag_filters
     *
     * @return $this
     */
    public function setTagFilters($tag_filters)
    {
        $this->container['tag_filters'] = $tag_filters;

        return $this;
    }

    /**
     * Gets volume_ids
     *
     * @return string[]
     */
    public function getVolumeIds()
    {
        return $this->container['volume_ids'];
    }

    /**
     * Sets volume_ids
     *
     * @param string[] $volume_ids volume_ids
     *
     * @return $this
     */
    public function setVolumeIds($volume_ids)
    {
        $this->container['volume_ids'] = $volume_ids;

        return $this;
    }

    /**
     * Gets volume_name
     *
     * @return string
     */
    public function getVolumeName()
    {
        return $this->container['volume_name'];
    }

    /**
     * Sets volume_name
     *
     * @param string $volume_name volume_name
     *
     * @return $this
     */
    public function setVolumeName($volume_name)
    {
        $this->container['volume_name'] = $volume_name;

        return $this;
    }

    /**
     * Gets volume_status
     *
     * @return string
     */
    public function getVolumeStatus()
    {
        return $this->container['volume_status'];
    }

    /**
     * Sets volume_status
     *
     * @param string $volume_status volume_status
     *
     * @return $this
     */
    public function setVolumeStatus($volume_status)
    {
        $this->container['volume_status'] = $volume_status;

        return $this;
    }

    /**
     * Gets volume_type
     *
     * @return string
     */
    public function getVolumeType()
    {
        return $this->container['volume_type'];
    }

    /**
     * Sets volume_type
     *
     * @param string $volume_type volume_type
     *
     * @return $this
     */
    public function setVolumeType($volume_type)
    {
        $this->container['volume_type'] = $volume_type;

        return $this;
    }

    /**
     * Gets zone_id
     *
     * @return string
     */
    public function getZoneId()
    {
        return $this->container['zone_id'];
    }

    /**
     * Sets zone_id
     *
     * @param string $zone_id zone_id
     *
     * @return $this
     */
    public function setZoneId($zone_id)
    {
        $this->container['zone_id'] = $zone_id;

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

