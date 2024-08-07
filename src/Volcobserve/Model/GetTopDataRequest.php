<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Volcobserve\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class GetTopDataRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetTopDataRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'asc' => 'bool',
        'end_time' => 'int',
        'group_by' => 'string[]',
        'instances' => '\Volcengine\Volcobserve\Model\InstanceForGetTopDataInput[]',
        'metric_names' => 'string[]',
        'namespace' => 'string',
        'order_by_metric_name' => 'string',
        'start_time' => 'int',
        'sub_namespace' => 'string',
        'top_n' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'asc' => null,
        'end_time' => null,
        'group_by' => null,
        'instances' => null,
        'metric_names' => null,
        'namespace' => null,
        'order_by_metric_name' => null,
        'start_time' => null,
        'sub_namespace' => null,
        'top_n' => null
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
        'asc' => 'Asc',
        'end_time' => 'EndTime',
        'group_by' => 'GroupBy',
        'instances' => 'Instances',
        'metric_names' => 'MetricNames',
        'namespace' => 'Namespace',
        'order_by_metric_name' => 'OrderByMetricName',
        'start_time' => 'StartTime',
        'sub_namespace' => 'SubNamespace',
        'top_n' => 'TopN'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'asc' => 'setAsc',
        'end_time' => 'setEndTime',
        'group_by' => 'setGroupBy',
        'instances' => 'setInstances',
        'metric_names' => 'setMetricNames',
        'namespace' => 'setNamespace',
        'order_by_metric_name' => 'setOrderByMetricName',
        'start_time' => 'setStartTime',
        'sub_namespace' => 'setSubNamespace',
        'top_n' => 'setTopN'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'asc' => 'getAsc',
        'end_time' => 'getEndTime',
        'group_by' => 'getGroupBy',
        'instances' => 'getInstances',
        'metric_names' => 'getMetricNames',
        'namespace' => 'getNamespace',
        'order_by_metric_name' => 'getOrderByMetricName',
        'start_time' => 'getStartTime',
        'sub_namespace' => 'getSubNamespace',
        'top_n' => 'getTopN'
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
        $this->container['asc'] = isset($data['asc']) ? $data['asc'] : null;
        $this->container['end_time'] = isset($data['end_time']) ? $data['end_time'] : null;
        $this->container['group_by'] = isset($data['group_by']) ? $data['group_by'] : null;
        $this->container['instances'] = isset($data['instances']) ? $data['instances'] : null;
        $this->container['metric_names'] = isset($data['metric_names']) ? $data['metric_names'] : null;
        $this->container['namespace'] = isset($data['namespace']) ? $data['namespace'] : null;
        $this->container['order_by_metric_name'] = isset($data['order_by_metric_name']) ? $data['order_by_metric_name'] : null;
        $this->container['start_time'] = isset($data['start_time']) ? $data['start_time'] : null;
        $this->container['sub_namespace'] = isset($data['sub_namespace']) ? $data['sub_namespace'] : null;
        $this->container['top_n'] = isset($data['top_n']) ? $data['top_n'] : null;
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
     * Gets asc
     *
     * @return bool
     */
    public function getAsc()
    {
        return $this->container['asc'];
    }

    /**
     * Sets asc
     *
     * @param bool $asc asc
     *
     * @return $this
     */
    public function setAsc($asc)
    {
        $this->container['asc'] = $asc;

        return $this;
    }

    /**
     * Gets end_time
     *
     * @return int
     */
    public function getEndTime()
    {
        return $this->container['end_time'];
    }

    /**
     * Sets end_time
     *
     * @param int $end_time end_time
     *
     * @return $this
     */
    public function setEndTime($end_time)
    {
        $this->container['end_time'] = $end_time;

        return $this;
    }

    /**
     * Gets group_by
     *
     * @return string[]
     */
    public function getGroupBy()
    {
        return $this->container['group_by'];
    }

    /**
     * Sets group_by
     *
     * @param string[] $group_by group_by
     *
     * @return $this
     */
    public function setGroupBy($group_by)
    {
        $this->container['group_by'] = $group_by;

        return $this;
    }

    /**
     * Gets instances
     *
     * @return \Volcengine\Volcobserve\Model\InstanceForGetTopDataInput[]
     */
    public function getInstances()
    {
        return $this->container['instances'];
    }

    /**
     * Sets instances
     *
     * @param \Volcengine\Volcobserve\Model\InstanceForGetTopDataInput[] $instances instances
     *
     * @return $this
     */
    public function setInstances($instances)
    {
        $this->container['instances'] = $instances;

        return $this;
    }

    /**
     * Gets metric_names
     *
     * @return string[]
     */
    public function getMetricNames()
    {
        return $this->container['metric_names'];
    }

    /**
     * Sets metric_names
     *
     * @param string[] $metric_names metric_names
     *
     * @return $this
     */
    public function setMetricNames($metric_names)
    {
        $this->container['metric_names'] = $metric_names;

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
     * Gets order_by_metric_name
     *
     * @return string
     */
    public function getOrderByMetricName()
    {
        return $this->container['order_by_metric_name'];
    }

    /**
     * Sets order_by_metric_name
     *
     * @param string $order_by_metric_name order_by_metric_name
     *
     * @return $this
     */
    public function setOrderByMetricName($order_by_metric_name)
    {
        $this->container['order_by_metric_name'] = $order_by_metric_name;

        return $this;
    }

    /**
     * Gets start_time
     *
     * @return int
     */
    public function getStartTime()
    {
        return $this->container['start_time'];
    }

    /**
     * Sets start_time
     *
     * @param int $start_time start_time
     *
     * @return $this
     */
    public function setStartTime($start_time)
    {
        $this->container['start_time'] = $start_time;

        return $this;
    }

    /**
     * Gets sub_namespace
     *
     * @return string
     */
    public function getSubNamespace()
    {
        return $this->container['sub_namespace'];
    }

    /**
     * Sets sub_namespace
     *
     * @param string $sub_namespace sub_namespace
     *
     * @return $this
     */
    public function setSubNamespace($sub_namespace)
    {
        $this->container['sub_namespace'] = $sub_namespace;

        return $this;
    }

    /**
     * Gets top_n
     *
     * @return int
     */
    public function getTopN()
    {
        return $this->container['top_n'];
    }

    /**
     * Sets top_n
     *
     * @param int $top_n top_n
     *
     * @return $this
     */
    public function setTopN($top_n)
    {
        $this->container['top_n'] = $top_n;

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

