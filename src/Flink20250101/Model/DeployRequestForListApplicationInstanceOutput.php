<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Flink20250101\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class DeployRequestForListApplicationInstanceOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DeployRequestForListApplicationInstanceOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'namespace' => 'string',
        'priority' => 'string',
        'queue' => 'string',
        'resource_pool' => 'string',
        'schedule_policy' => 'string',
        'schedule_timeout' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'namespace' => null,
        'priority' => null,
        'queue' => null,
        'resource_pool' => null,
        'schedule_policy' => null,
        'schedule_timeout' => null
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
        'namespace' => 'Namespace',
        'priority' => 'Priority',
        'queue' => 'Queue',
        'resource_pool' => 'ResourcePool',
        'schedule_policy' => 'SchedulePolicy',
        'schedule_timeout' => 'ScheduleTimeout'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'namespace' => 'setNamespace',
        'priority' => 'setPriority',
        'queue' => 'setQueue',
        'resource_pool' => 'setResourcePool',
        'schedule_policy' => 'setSchedulePolicy',
        'schedule_timeout' => 'setScheduleTimeout'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'namespace' => 'getNamespace',
        'priority' => 'getPriority',
        'queue' => 'getQueue',
        'resource_pool' => 'getResourcePool',
        'schedule_policy' => 'getSchedulePolicy',
        'schedule_timeout' => 'getScheduleTimeout'
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

    const SCHEDULE_POLICY_GANG = 'GANG';
    const SCHEDULE_POLICY_DRF = 'DRF';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSchedulePolicyAllowableValues()
    {
        return [
            self::SCHEDULE_POLICY_GANG,
            self::SCHEDULE_POLICY_DRF,
        ];
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
        $this->container['namespace'] = isset($data['namespace']) ? $data['namespace'] : null;
        $this->container['priority'] = isset($data['priority']) ? $data['priority'] : null;
        $this->container['queue'] = isset($data['queue']) ? $data['queue'] : null;
        $this->container['resource_pool'] = isset($data['resource_pool']) ? $data['resource_pool'] : null;
        $this->container['schedule_policy'] = isset($data['schedule_policy']) ? $data['schedule_policy'] : null;
        $this->container['schedule_timeout'] = isset($data['schedule_timeout']) ? $data['schedule_timeout'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getSchedulePolicyAllowableValues();
        if (!is_null($this->container['schedule_policy']) && !in_array($this->container['schedule_policy'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'schedule_policy', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
     * Gets priority
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->container['priority'];
    }

    /**
     * Sets priority
     *
     * @param string $priority priority
     *
     * @return $this
     */
    public function setPriority($priority)
    {
        $this->container['priority'] = $priority;

        return $this;
    }

    /**
     * Gets queue
     *
     * @return string
     */
    public function getQueue()
    {
        return $this->container['queue'];
    }

    /**
     * Sets queue
     *
     * @param string $queue queue
     *
     * @return $this
     */
    public function setQueue($queue)
    {
        $this->container['queue'] = $queue;

        return $this;
    }

    /**
     * Gets resource_pool
     *
     * @return string
     */
    public function getResourcePool()
    {
        return $this->container['resource_pool'];
    }

    /**
     * Sets resource_pool
     *
     * @param string $resource_pool resource_pool
     *
     * @return $this
     */
    public function setResourcePool($resource_pool)
    {
        $this->container['resource_pool'] = $resource_pool;

        return $this;
    }

    /**
     * Gets schedule_policy
     *
     * @return string
     */
    public function getSchedulePolicy()
    {
        return $this->container['schedule_policy'];
    }

    /**
     * Sets schedule_policy
     *
     * @param string $schedule_policy schedule_policy
     *
     * @return $this
     */
    public function setSchedulePolicy($schedule_policy)
    {
        $allowedValues = $this->getSchedulePolicyAllowableValues();
        if (!is_null($schedule_policy) && !in_array($schedule_policy, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'schedule_policy', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['schedule_policy'] = $schedule_policy;

        return $this;
    }

    /**
     * Gets schedule_timeout
     *
     * @return string
     */
    public function getScheduleTimeout()
    {
        return $this->container['schedule_timeout'];
    }

    /**
     * Sets schedule_timeout
     *
     * @param string $schedule_timeout schedule_timeout
     *
     * @return $this
     */
    public function setScheduleTimeout($schedule_timeout)
    {
        $this->container['schedule_timeout'] = $schedule_timeout;

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

