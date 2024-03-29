<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vke\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class PodsConfigForListClustersOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PodsConfigForListClustersOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'flannel_config' => '\Volcengine\Vke\Model\FlannelConfigForListClustersOutput',
        'pod_network_mode' => 'string',
        'vpc_cni_config' => '\Volcengine\Vke\Model\VpcCniConfigForListClustersOutput'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'flannel_config' => null,
        'pod_network_mode' => null,
        'vpc_cni_config' => null
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
        'flannel_config' => 'FlannelConfig',
        'pod_network_mode' => 'PodNetworkMode',
        'vpc_cni_config' => 'VpcCniConfig'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'flannel_config' => 'setFlannelConfig',
        'pod_network_mode' => 'setPodNetworkMode',
        'vpc_cni_config' => 'setVpcCniConfig'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'flannel_config' => 'getFlannelConfig',
        'pod_network_mode' => 'getPodNetworkMode',
        'vpc_cni_config' => 'getVpcCniConfig'
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
        $this->container['flannel_config'] = isset($data['flannel_config']) ? $data['flannel_config'] : null;
        $this->container['pod_network_mode'] = isset($data['pod_network_mode']) ? $data['pod_network_mode'] : null;
        $this->container['vpc_cni_config'] = isset($data['vpc_cni_config']) ? $data['vpc_cni_config'] : null;
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
     * Gets flannel_config
     *
     * @return \Volcengine\Vke\Model\FlannelConfigForListClustersOutput
     */
    public function getFlannelConfig()
    {
        return $this->container['flannel_config'];
    }

    /**
     * Sets flannel_config
     *
     * @param \Volcengine\Vke\Model\FlannelConfigForListClustersOutput $flannel_config flannel_config
     *
     * @return $this
     */
    public function setFlannelConfig($flannel_config)
    {
        $this->container['flannel_config'] = $flannel_config;

        return $this;
    }

    /**
     * Gets pod_network_mode
     *
     * @return string
     */
    public function getPodNetworkMode()
    {
        return $this->container['pod_network_mode'];
    }

    /**
     * Sets pod_network_mode
     *
     * @param string $pod_network_mode pod_network_mode
     *
     * @return $this
     */
    public function setPodNetworkMode($pod_network_mode)
    {
        $this->container['pod_network_mode'] = $pod_network_mode;

        return $this;
    }

    /**
     * Gets vpc_cni_config
     *
     * @return \Volcengine\Vke\Model\VpcCniConfigForListClustersOutput
     */
    public function getVpcCniConfig()
    {
        return $this->container['vpc_cni_config'];
    }

    /**
     * Sets vpc_cni_config
     *
     * @param \Volcengine\Vke\Model\VpcCniConfigForListClustersOutput $vpc_cni_config vpc_cni_config
     *
     * @return $this
     */
    public function setVpcCniConfig($vpc_cni_config)
    {
        $this->container['vpc_cni_config'] = $vpc_cni_config;

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

