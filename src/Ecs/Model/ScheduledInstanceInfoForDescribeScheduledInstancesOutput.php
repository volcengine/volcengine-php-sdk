<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Ecs\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class ScheduledInstanceInfoForDescribeScheduledInstancesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ScheduledInstanceInfoForDescribeScheduledInstancesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'auto_release_at' => 'string',
        'count' => 'int',
        'created_at' => 'string',
        'delivery_count' => 'int',
        'delivery_type' => 'string',
        'elastic_scheduled_instance_type' => 'string',
        'end_delivery_at' => 'string',
        'instance_config' => '\Volcengine\Ecs\Model\InstanceConfigForDescribeScheduledInstancesOutput',
        'invalid_at' => 'string',
        'project_name' => 'string',
        'release_count' => 'int',
        'scheduled_instance_description' => 'string',
        'scheduled_instance_id' => 'string',
        'scheduled_instance_name' => 'string',
        'start_delivery_at' => 'string',
        'status' => 'string',
        'tags' => '\Volcengine\Ecs\Model\TagForDescribeScheduledInstancesOutput[]',
        'updated_at' => 'string',
        'zone_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'auto_release_at' => null,
        'count' => 'int32',
        'created_at' => null,
        'delivery_count' => 'int32',
        'delivery_type' => null,
        'elastic_scheduled_instance_type' => null,
        'end_delivery_at' => null,
        'instance_config' => null,
        'invalid_at' => null,
        'project_name' => null,
        'release_count' => 'int32',
        'scheduled_instance_description' => null,
        'scheduled_instance_id' => null,
        'scheduled_instance_name' => null,
        'start_delivery_at' => null,
        'status' => null,
        'tags' => null,
        'updated_at' => null,
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
        'auto_release_at' => 'AutoReleaseAt',
        'count' => 'Count',
        'created_at' => 'CreatedAt',
        'delivery_count' => 'DeliveryCount',
        'delivery_type' => 'DeliveryType',
        'elastic_scheduled_instance_type' => 'ElasticScheduledInstanceType',
        'end_delivery_at' => 'EndDeliveryAt',
        'instance_config' => 'InstanceConfig',
        'invalid_at' => 'InvalidAt',
        'project_name' => 'ProjectName',
        'release_count' => 'ReleaseCount',
        'scheduled_instance_description' => 'ScheduledInstanceDescription',
        'scheduled_instance_id' => 'ScheduledInstanceId',
        'scheduled_instance_name' => 'ScheduledInstanceName',
        'start_delivery_at' => 'StartDeliveryAt',
        'status' => 'Status',
        'tags' => 'Tags',
        'updated_at' => 'UpdatedAt',
        'zone_id' => 'ZoneId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'auto_release_at' => 'setAutoReleaseAt',
        'count' => 'setCount',
        'created_at' => 'setCreatedAt',
        'delivery_count' => 'setDeliveryCount',
        'delivery_type' => 'setDeliveryType',
        'elastic_scheduled_instance_type' => 'setElasticScheduledInstanceType',
        'end_delivery_at' => 'setEndDeliveryAt',
        'instance_config' => 'setInstanceConfig',
        'invalid_at' => 'setInvalidAt',
        'project_name' => 'setProjectName',
        'release_count' => 'setReleaseCount',
        'scheduled_instance_description' => 'setScheduledInstanceDescription',
        'scheduled_instance_id' => 'setScheduledInstanceId',
        'scheduled_instance_name' => 'setScheduledInstanceName',
        'start_delivery_at' => 'setStartDeliveryAt',
        'status' => 'setStatus',
        'tags' => 'setTags',
        'updated_at' => 'setUpdatedAt',
        'zone_id' => 'setZoneId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'auto_release_at' => 'getAutoReleaseAt',
        'count' => 'getCount',
        'created_at' => 'getCreatedAt',
        'delivery_count' => 'getDeliveryCount',
        'delivery_type' => 'getDeliveryType',
        'elastic_scheduled_instance_type' => 'getElasticScheduledInstanceType',
        'end_delivery_at' => 'getEndDeliveryAt',
        'instance_config' => 'getInstanceConfig',
        'invalid_at' => 'getInvalidAt',
        'project_name' => 'getProjectName',
        'release_count' => 'getReleaseCount',
        'scheduled_instance_description' => 'getScheduledInstanceDescription',
        'scheduled_instance_id' => 'getScheduledInstanceId',
        'scheduled_instance_name' => 'getScheduledInstanceName',
        'start_delivery_at' => 'getStartDeliveryAt',
        'status' => 'getStatus',
        'tags' => 'getTags',
        'updated_at' => 'getUpdatedAt',
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
        $this->container['auto_release_at'] = isset($data['auto_release_at']) ? $data['auto_release_at'] : null;
        $this->container['count'] = isset($data['count']) ? $data['count'] : null;
        $this->container['created_at'] = isset($data['created_at']) ? $data['created_at'] : null;
        $this->container['delivery_count'] = isset($data['delivery_count']) ? $data['delivery_count'] : null;
        $this->container['delivery_type'] = isset($data['delivery_type']) ? $data['delivery_type'] : null;
        $this->container['elastic_scheduled_instance_type'] = isset($data['elastic_scheduled_instance_type']) ? $data['elastic_scheduled_instance_type'] : null;
        $this->container['end_delivery_at'] = isset($data['end_delivery_at']) ? $data['end_delivery_at'] : null;
        $this->container['instance_config'] = isset($data['instance_config']) ? $data['instance_config'] : null;
        $this->container['invalid_at'] = isset($data['invalid_at']) ? $data['invalid_at'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['release_count'] = isset($data['release_count']) ? $data['release_count'] : null;
        $this->container['scheduled_instance_description'] = isset($data['scheduled_instance_description']) ? $data['scheduled_instance_description'] : null;
        $this->container['scheduled_instance_id'] = isset($data['scheduled_instance_id']) ? $data['scheduled_instance_id'] : null;
        $this->container['scheduled_instance_name'] = isset($data['scheduled_instance_name']) ? $data['scheduled_instance_name'] : null;
        $this->container['start_delivery_at'] = isset($data['start_delivery_at']) ? $data['start_delivery_at'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['updated_at'] = isset($data['updated_at']) ? $data['updated_at'] : null;
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
     * Gets auto_release_at
     *
     * @return string
     */
    public function getAutoReleaseAt()
    {
        return $this->container['auto_release_at'];
    }

    /**
     * Sets auto_release_at
     *
     * @param string $auto_release_at auto_release_at
     *
     * @return $this
     */
    public function setAutoReleaseAt($auto_release_at)
    {
        $this->container['auto_release_at'] = $auto_release_at;

        return $this;
    }

    /**
     * Gets count
     *
     * @return int
     */
    public function getCount()
    {
        return $this->container['count'];
    }

    /**
     * Sets count
     *
     * @param int $count count
     *
     * @return $this
     */
    public function setCount($count)
    {
        $this->container['count'] = $count;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string $created_at created_at
     *
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets delivery_count
     *
     * @return int
     */
    public function getDeliveryCount()
    {
        return $this->container['delivery_count'];
    }

    /**
     * Sets delivery_count
     *
     * @param int $delivery_count delivery_count
     *
     * @return $this
     */
    public function setDeliveryCount($delivery_count)
    {
        $this->container['delivery_count'] = $delivery_count;

        return $this;
    }

    /**
     * Gets delivery_type
     *
     * @return string
     */
    public function getDeliveryType()
    {
        return $this->container['delivery_type'];
    }

    /**
     * Sets delivery_type
     *
     * @param string $delivery_type delivery_type
     *
     * @return $this
     */
    public function setDeliveryType($delivery_type)
    {
        $this->container['delivery_type'] = $delivery_type;

        return $this;
    }

    /**
     * Gets elastic_scheduled_instance_type
     *
     * @return string
     */
    public function getElasticScheduledInstanceType()
    {
        return $this->container['elastic_scheduled_instance_type'];
    }

    /**
     * Sets elastic_scheduled_instance_type
     *
     * @param string $elastic_scheduled_instance_type elastic_scheduled_instance_type
     *
     * @return $this
     */
    public function setElasticScheduledInstanceType($elastic_scheduled_instance_type)
    {
        $this->container['elastic_scheduled_instance_type'] = $elastic_scheduled_instance_type;

        return $this;
    }

    /**
     * Gets end_delivery_at
     *
     * @return string
     */
    public function getEndDeliveryAt()
    {
        return $this->container['end_delivery_at'];
    }

    /**
     * Sets end_delivery_at
     *
     * @param string $end_delivery_at end_delivery_at
     *
     * @return $this
     */
    public function setEndDeliveryAt($end_delivery_at)
    {
        $this->container['end_delivery_at'] = $end_delivery_at;

        return $this;
    }

    /**
     * Gets instance_config
     *
     * @return \Volcengine\Ecs\Model\InstanceConfigForDescribeScheduledInstancesOutput
     */
    public function getInstanceConfig()
    {
        return $this->container['instance_config'];
    }

    /**
     * Sets instance_config
     *
     * @param \Volcengine\Ecs\Model\InstanceConfigForDescribeScheduledInstancesOutput $instance_config instance_config
     *
     * @return $this
     */
    public function setInstanceConfig($instance_config)
    {
        $this->container['instance_config'] = $instance_config;

        return $this;
    }

    /**
     * Gets invalid_at
     *
     * @return string
     */
    public function getInvalidAt()
    {
        return $this->container['invalid_at'];
    }

    /**
     * Sets invalid_at
     *
     * @param string $invalid_at invalid_at
     *
     * @return $this
     */
    public function setInvalidAt($invalid_at)
    {
        $this->container['invalid_at'] = $invalid_at;

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
     * Gets release_count
     *
     * @return int
     */
    public function getReleaseCount()
    {
        return $this->container['release_count'];
    }

    /**
     * Sets release_count
     *
     * @param int $release_count release_count
     *
     * @return $this
     */
    public function setReleaseCount($release_count)
    {
        $this->container['release_count'] = $release_count;

        return $this;
    }

    /**
     * Gets scheduled_instance_description
     *
     * @return string
     */
    public function getScheduledInstanceDescription()
    {
        return $this->container['scheduled_instance_description'];
    }

    /**
     * Sets scheduled_instance_description
     *
     * @param string $scheduled_instance_description scheduled_instance_description
     *
     * @return $this
     */
    public function setScheduledInstanceDescription($scheduled_instance_description)
    {
        $this->container['scheduled_instance_description'] = $scheduled_instance_description;

        return $this;
    }

    /**
     * Gets scheduled_instance_id
     *
     * @return string
     */
    public function getScheduledInstanceId()
    {
        return $this->container['scheduled_instance_id'];
    }

    /**
     * Sets scheduled_instance_id
     *
     * @param string $scheduled_instance_id scheduled_instance_id
     *
     * @return $this
     */
    public function setScheduledInstanceId($scheduled_instance_id)
    {
        $this->container['scheduled_instance_id'] = $scheduled_instance_id;

        return $this;
    }

    /**
     * Gets scheduled_instance_name
     *
     * @return string
     */
    public function getScheduledInstanceName()
    {
        return $this->container['scheduled_instance_name'];
    }

    /**
     * Sets scheduled_instance_name
     *
     * @param string $scheduled_instance_name scheduled_instance_name
     *
     * @return $this
     */
    public function setScheduledInstanceName($scheduled_instance_name)
    {
        $this->container['scheduled_instance_name'] = $scheduled_instance_name;

        return $this;
    }

    /**
     * Gets start_delivery_at
     *
     * @return string
     */
    public function getStartDeliveryAt()
    {
        return $this->container['start_delivery_at'];
    }

    /**
     * Sets start_delivery_at
     *
     * @param string $start_delivery_at start_delivery_at
     *
     * @return $this
     */
    public function setStartDeliveryAt($start_delivery_at)
    {
        $this->container['start_delivery_at'] = $start_delivery_at;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return \Volcengine\Ecs\Model\TagForDescribeScheduledInstancesOutput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Ecs\Model\TagForDescribeScheduledInstancesOutput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param string $updated_at updated_at
     *
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

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
