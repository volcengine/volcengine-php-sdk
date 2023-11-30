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

class CreateDefaultNodePoolRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CreateDefaultNodePoolRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'client_token' => 'string',
        'cluster_id' => 'string',
        'kubernetes_config' => '\Volcengine\Vke\Model\KubernetesConfigForCreateDefaultNodePoolInput',
        'node_config' => '\Volcengine\Vke\Model\NodeConfigForCreateDefaultNodePoolInput',
        'tags' => '\Volcengine\Vke\Model\TagForCreateDefaultNodePoolInput[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'client_token' => null,
        'cluster_id' => null,
        'kubernetes_config' => null,
        'node_config' => null,
        'tags' => null
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
        'client_token' => 'ClientToken',
        'cluster_id' => 'ClusterId',
        'kubernetes_config' => 'KubernetesConfig',
        'node_config' => 'NodeConfig',
        'tags' => 'Tags'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'client_token' => 'setClientToken',
        'cluster_id' => 'setClusterId',
        'kubernetes_config' => 'setKubernetesConfig',
        'node_config' => 'setNodeConfig',
        'tags' => 'setTags'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'client_token' => 'getClientToken',
        'cluster_id' => 'getClusterId',
        'kubernetes_config' => 'getKubernetesConfig',
        'node_config' => 'getNodeConfig',
        'tags' => 'getTags'
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
        $this->container['client_token'] = isset($data['client_token']) ? $data['client_token'] : null;
        $this->container['cluster_id'] = isset($data['cluster_id']) ? $data['cluster_id'] : null;
        $this->container['kubernetes_config'] = isset($data['kubernetes_config']) ? $data['kubernetes_config'] : null;
        $this->container['node_config'] = isset($data['node_config']) ? $data['node_config'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
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
     * Gets client_token
     *
     * @return string
     */
    public function getClientToken()
    {
        return $this->container['client_token'];
    }

    /**
     * Sets client_token
     *
     * @param string $client_token client_token
     *
     * @return $this
     */
    public function setClientToken($client_token)
    {
        $this->container['client_token'] = $client_token;

        return $this;
    }

    /**
     * Gets cluster_id
     *
     * @return string
     */
    public function getClusterId()
    {
        return $this->container['cluster_id'];
    }

    /**
     * Sets cluster_id
     *
     * @param string $cluster_id cluster_id
     *
     * @return $this
     */
    public function setClusterId($cluster_id)
    {
        $this->container['cluster_id'] = $cluster_id;

        return $this;
    }

    /**
     * Gets kubernetes_config
     *
     * @return \Volcengine\Vke\Model\KubernetesConfigForCreateDefaultNodePoolInput
     */
    public function getKubernetesConfig()
    {
        return $this->container['kubernetes_config'];
    }

    /**
     * Sets kubernetes_config
     *
     * @param \Volcengine\Vke\Model\KubernetesConfigForCreateDefaultNodePoolInput $kubernetes_config kubernetes_config
     *
     * @return $this
     */
    public function setKubernetesConfig($kubernetes_config)
    {
        $this->container['kubernetes_config'] = $kubernetes_config;

        return $this;
    }

    /**
     * Gets node_config
     *
     * @return \Volcengine\Vke\Model\NodeConfigForCreateDefaultNodePoolInput
     */
    public function getNodeConfig()
    {
        return $this->container['node_config'];
    }

    /**
     * Sets node_config
     *
     * @param \Volcengine\Vke\Model\NodeConfigForCreateDefaultNodePoolInput $node_config node_config
     *
     * @return $this
     */
    public function setNodeConfig($node_config)
    {
        $this->container['node_config'] = $node_config;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return \Volcengine\Vke\Model\TagForCreateDefaultNodePoolInput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Vke\Model\TagForCreateDefaultNodePoolInput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

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
