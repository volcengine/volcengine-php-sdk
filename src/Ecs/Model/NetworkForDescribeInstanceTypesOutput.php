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

class NetworkForDescribeInstanceTypesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'NetworkForDescribeInstanceTypesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'baseline_bandwidth_mbps' => 'int',
        'maximum_bandwidth_mbps' => 'int',
        'maximum_network_interfaces' => 'int',
        'maximum_private_ipv4_addresses_per_network_interface' => 'int',
        'maximum_queues_per_network_interface' => 'int',
        'maximum_throughput_kpps' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'baseline_bandwidth_mbps' => 'int32',
        'maximum_bandwidth_mbps' => 'int32',
        'maximum_network_interfaces' => 'int32',
        'maximum_private_ipv4_addresses_per_network_interface' => 'int32',
        'maximum_queues_per_network_interface' => 'int32',
        'maximum_throughput_kpps' => 'int32'
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
        'baseline_bandwidth_mbps' => 'BaselineBandwidthMbps',
        'maximum_bandwidth_mbps' => 'MaximumBandwidthMbps',
        'maximum_network_interfaces' => 'MaximumNetworkInterfaces',
        'maximum_private_ipv4_addresses_per_network_interface' => 'MaximumPrivateIpv4AddressesPerNetworkInterface',
        'maximum_queues_per_network_interface' => 'MaximumQueuesPerNetworkInterface',
        'maximum_throughput_kpps' => 'MaximumThroughputKpps'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'baseline_bandwidth_mbps' => 'setBaselineBandwidthMbps',
        'maximum_bandwidth_mbps' => 'setMaximumBandwidthMbps',
        'maximum_network_interfaces' => 'setMaximumNetworkInterfaces',
        'maximum_private_ipv4_addresses_per_network_interface' => 'setMaximumPrivateIpv4AddressesPerNetworkInterface',
        'maximum_queues_per_network_interface' => 'setMaximumQueuesPerNetworkInterface',
        'maximum_throughput_kpps' => 'setMaximumThroughputKpps'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'baseline_bandwidth_mbps' => 'getBaselineBandwidthMbps',
        'maximum_bandwidth_mbps' => 'getMaximumBandwidthMbps',
        'maximum_network_interfaces' => 'getMaximumNetworkInterfaces',
        'maximum_private_ipv4_addresses_per_network_interface' => 'getMaximumPrivateIpv4AddressesPerNetworkInterface',
        'maximum_queues_per_network_interface' => 'getMaximumQueuesPerNetworkInterface',
        'maximum_throughput_kpps' => 'getMaximumThroughputKpps'
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
        $this->container['baseline_bandwidth_mbps'] = isset($data['baseline_bandwidth_mbps']) ? $data['baseline_bandwidth_mbps'] : null;
        $this->container['maximum_bandwidth_mbps'] = isset($data['maximum_bandwidth_mbps']) ? $data['maximum_bandwidth_mbps'] : null;
        $this->container['maximum_network_interfaces'] = isset($data['maximum_network_interfaces']) ? $data['maximum_network_interfaces'] : null;
        $this->container['maximum_private_ipv4_addresses_per_network_interface'] = isset($data['maximum_private_ipv4_addresses_per_network_interface']) ? $data['maximum_private_ipv4_addresses_per_network_interface'] : null;
        $this->container['maximum_queues_per_network_interface'] = isset($data['maximum_queues_per_network_interface']) ? $data['maximum_queues_per_network_interface'] : null;
        $this->container['maximum_throughput_kpps'] = isset($data['maximum_throughput_kpps']) ? $data['maximum_throughput_kpps'] : null;
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
     * Gets baseline_bandwidth_mbps
     *
     * @return int
     */
    public function getBaselineBandwidthMbps()
    {
        return $this->container['baseline_bandwidth_mbps'];
    }

    /**
     * Sets baseline_bandwidth_mbps
     *
     * @param int $baseline_bandwidth_mbps baseline_bandwidth_mbps
     *
     * @return $this
     */
    public function setBaselineBandwidthMbps($baseline_bandwidth_mbps)
    {
        $this->container['baseline_bandwidth_mbps'] = $baseline_bandwidth_mbps;

        return $this;
    }

    /**
     * Gets maximum_bandwidth_mbps
     *
     * @return int
     */
    public function getMaximumBandwidthMbps()
    {
        return $this->container['maximum_bandwidth_mbps'];
    }

    /**
     * Sets maximum_bandwidth_mbps
     *
     * @param int $maximum_bandwidth_mbps maximum_bandwidth_mbps
     *
     * @return $this
     */
    public function setMaximumBandwidthMbps($maximum_bandwidth_mbps)
    {
        $this->container['maximum_bandwidth_mbps'] = $maximum_bandwidth_mbps;

        return $this;
    }

    /**
     * Gets maximum_network_interfaces
     *
     * @return int
     */
    public function getMaximumNetworkInterfaces()
    {
        return $this->container['maximum_network_interfaces'];
    }

    /**
     * Sets maximum_network_interfaces
     *
     * @param int $maximum_network_interfaces maximum_network_interfaces
     *
     * @return $this
     */
    public function setMaximumNetworkInterfaces($maximum_network_interfaces)
    {
        $this->container['maximum_network_interfaces'] = $maximum_network_interfaces;

        return $this;
    }

    /**
     * Gets maximum_private_ipv4_addresses_per_network_interface
     *
     * @return int
     */
    public function getMaximumPrivateIpv4AddressesPerNetworkInterface()
    {
        return $this->container['maximum_private_ipv4_addresses_per_network_interface'];
    }

    /**
     * Sets maximum_private_ipv4_addresses_per_network_interface
     *
     * @param int $maximum_private_ipv4_addresses_per_network_interface maximum_private_ipv4_addresses_per_network_interface
     *
     * @return $this
     */
    public function setMaximumPrivateIpv4AddressesPerNetworkInterface($maximum_private_ipv4_addresses_per_network_interface)
    {
        $this->container['maximum_private_ipv4_addresses_per_network_interface'] = $maximum_private_ipv4_addresses_per_network_interface;

        return $this;
    }

    /**
     * Gets maximum_queues_per_network_interface
     *
     * @return int
     */
    public function getMaximumQueuesPerNetworkInterface()
    {
        return $this->container['maximum_queues_per_network_interface'];
    }

    /**
     * Sets maximum_queues_per_network_interface
     *
     * @param int $maximum_queues_per_network_interface maximum_queues_per_network_interface
     *
     * @return $this
     */
    public function setMaximumQueuesPerNetworkInterface($maximum_queues_per_network_interface)
    {
        $this->container['maximum_queues_per_network_interface'] = $maximum_queues_per_network_interface;

        return $this;
    }

    /**
     * Gets maximum_throughput_kpps
     *
     * @return int
     */
    public function getMaximumThroughputKpps()
    {
        return $this->container['maximum_throughput_kpps'];
    }

    /**
     * Sets maximum_throughput_kpps
     *
     * @param int $maximum_throughput_kpps maximum_throughput_kpps
     *
     * @return $this
     */
    public function setMaximumThroughputKpps($maximum_throughput_kpps)
    {
        $this->container['maximum_throughput_kpps'] = $maximum_throughput_kpps;

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

