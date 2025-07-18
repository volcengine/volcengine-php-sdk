<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Apig\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class UpdateUpstreamRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'UpdateUpstreamRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'circuit_breaking_settings' => '\Volcengine\Apig\Model\CircuitBreakingSettingsForUpdateUpstreamInput',
        'comments' => 'string',
        'id' => 'string',
        'load_balancer_settings' => '\Volcengine\Apig\Model\LoadBalancerSettingsForUpdateUpstreamInput',
        'name' => 'string',
        'protocol' => 'string',
        'source_type' => 'string',
        'tls_settings' => '\Volcengine\Apig\Model\TlsSettingsForUpdateUpstreamInput',
        'upstream_spec' => '\Volcengine\Apig\Model\UpstreamSpecForUpdateUpstreamInput'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'circuit_breaking_settings' => null,
        'comments' => null,
        'id' => null,
        'load_balancer_settings' => null,
        'name' => null,
        'protocol' => null,
        'source_type' => null,
        'tls_settings' => null,
        'upstream_spec' => null
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
        'circuit_breaking_settings' => 'CircuitBreakingSettings',
        'comments' => 'Comments',
        'id' => 'Id',
        'load_balancer_settings' => 'LoadBalancerSettings',
        'name' => 'Name',
        'protocol' => 'Protocol',
        'source_type' => 'SourceType',
        'tls_settings' => 'TlsSettings',
        'upstream_spec' => 'UpstreamSpec'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'circuit_breaking_settings' => 'setCircuitBreakingSettings',
        'comments' => 'setComments',
        'id' => 'setId',
        'load_balancer_settings' => 'setLoadBalancerSettings',
        'name' => 'setName',
        'protocol' => 'setProtocol',
        'source_type' => 'setSourceType',
        'tls_settings' => 'setTlsSettings',
        'upstream_spec' => 'setUpstreamSpec'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'circuit_breaking_settings' => 'getCircuitBreakingSettings',
        'comments' => 'getComments',
        'id' => 'getId',
        'load_balancer_settings' => 'getLoadBalancerSettings',
        'name' => 'getName',
        'protocol' => 'getProtocol',
        'source_type' => 'getSourceType',
        'tls_settings' => 'getTlsSettings',
        'upstream_spec' => 'getUpstreamSpec'
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
        $this->container['circuit_breaking_settings'] = isset($data['circuit_breaking_settings']) ? $data['circuit_breaking_settings'] : null;
        $this->container['comments'] = isset($data['comments']) ? $data['comments'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['load_balancer_settings'] = isset($data['load_balancer_settings']) ? $data['load_balancer_settings'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['protocol'] = isset($data['protocol']) ? $data['protocol'] : null;
        $this->container['source_type'] = isset($data['source_type']) ? $data['source_type'] : null;
        $this->container['tls_settings'] = isset($data['tls_settings']) ? $data['tls_settings'] : null;
        $this->container['upstream_spec'] = isset($data['upstream_spec']) ? $data['upstream_spec'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['source_type'] === null) {
            $invalidProperties[] = "'source_type' can't be null";
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
     * Gets circuit_breaking_settings
     *
     * @return \Volcengine\Apig\Model\CircuitBreakingSettingsForUpdateUpstreamInput
     */
    public function getCircuitBreakingSettings()
    {
        return $this->container['circuit_breaking_settings'];
    }

    /**
     * Sets circuit_breaking_settings
     *
     * @param \Volcengine\Apig\Model\CircuitBreakingSettingsForUpdateUpstreamInput $circuit_breaking_settings circuit_breaking_settings
     *
     * @return $this
     */
    public function setCircuitBreakingSettings($circuit_breaking_settings)
    {
        $this->container['circuit_breaking_settings'] = $circuit_breaking_settings;

        return $this;
    }

    /**
     * Gets comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->container['comments'];
    }

    /**
     * Sets comments
     *
     * @param string $comments comments
     *
     * @return $this
     */
    public function setComments($comments)
    {
        $this->container['comments'] = $comments;

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
     * Gets load_balancer_settings
     *
     * @return \Volcengine\Apig\Model\LoadBalancerSettingsForUpdateUpstreamInput
     */
    public function getLoadBalancerSettings()
    {
        return $this->container['load_balancer_settings'];
    }

    /**
     * Sets load_balancer_settings
     *
     * @param \Volcengine\Apig\Model\LoadBalancerSettingsForUpdateUpstreamInput $load_balancer_settings load_balancer_settings
     *
     * @return $this
     */
    public function setLoadBalancerSettings($load_balancer_settings)
    {
        $this->container['load_balancer_settings'] = $load_balancer_settings;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets protocol
     *
     * @return string
     */
    public function getProtocol()
    {
        return $this->container['protocol'];
    }

    /**
     * Sets protocol
     *
     * @param string $protocol protocol
     *
     * @return $this
     */
    public function setProtocol($protocol)
    {
        $this->container['protocol'] = $protocol;

        return $this;
    }

    /**
     * Gets source_type
     *
     * @return string
     */
    public function getSourceType()
    {
        return $this->container['source_type'];
    }

    /**
     * Sets source_type
     *
     * @param string $source_type source_type
     *
     * @return $this
     */
    public function setSourceType($source_type)
    {
        $this->container['source_type'] = $source_type;

        return $this;
    }

    /**
     * Gets tls_settings
     *
     * @return \Volcengine\Apig\Model\TlsSettingsForUpdateUpstreamInput
     */
    public function getTlsSettings()
    {
        return $this->container['tls_settings'];
    }

    /**
     * Sets tls_settings
     *
     * @param \Volcengine\Apig\Model\TlsSettingsForUpdateUpstreamInput $tls_settings tls_settings
     *
     * @return $this
     */
    public function setTlsSettings($tls_settings)
    {
        $this->container['tls_settings'] = $tls_settings;

        return $this;
    }

    /**
     * Gets upstream_spec
     *
     * @return \Volcengine\Apig\Model\UpstreamSpecForUpdateUpstreamInput
     */
    public function getUpstreamSpec()
    {
        return $this->container['upstream_spec'];
    }

    /**
     * Sets upstream_spec
     *
     * @param \Volcengine\Apig\Model\UpstreamSpecForUpdateUpstreamInput $upstream_spec upstream_spec
     *
     * @return $this
     */
    public function setUpstreamSpec($upstream_spec)
    {
        $this->container['upstream_spec'] = $upstream_spec;

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

