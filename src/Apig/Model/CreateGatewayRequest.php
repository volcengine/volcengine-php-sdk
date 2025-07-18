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

class CreateGatewayRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CreateGatewayRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'backend_spec' => '\Volcengine\Apig\Model\BackendSpecForCreateGatewayInput',
        'comments' => 'string',
        'log_spec' => '\Volcengine\Apig\Model\LogSpecForCreateGatewayInput',
        'monitor_spec' => '\Volcengine\Apig\Model\MonitorSpecForCreateGatewayInput',
        'name' => 'string',
        'network_spec' => '\Volcengine\Apig\Model\NetworkSpecForCreateGatewayInput',
        'project_name' => 'string',
        'region' => 'string',
        'resource_spec' => '\Volcengine\Apig\Model\ResourceSpecForCreateGatewayInput',
        'tags' => '\Volcengine\Apig\Model\TagForCreateGatewayInput[]',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'backend_spec' => null,
        'comments' => null,
        'log_spec' => null,
        'monitor_spec' => null,
        'name' => null,
        'network_spec' => null,
        'project_name' => null,
        'region' => null,
        'resource_spec' => null,
        'tags' => null,
        'type' => null
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
        'backend_spec' => 'BackendSpec',
        'comments' => 'Comments',
        'log_spec' => 'LogSpec',
        'monitor_spec' => 'MonitorSpec',
        'name' => 'Name',
        'network_spec' => 'NetworkSpec',
        'project_name' => 'ProjectName',
        'region' => 'Region',
        'resource_spec' => 'ResourceSpec',
        'tags' => 'Tags',
        'type' => 'Type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'backend_spec' => 'setBackendSpec',
        'comments' => 'setComments',
        'log_spec' => 'setLogSpec',
        'monitor_spec' => 'setMonitorSpec',
        'name' => 'setName',
        'network_spec' => 'setNetworkSpec',
        'project_name' => 'setProjectName',
        'region' => 'setRegion',
        'resource_spec' => 'setResourceSpec',
        'tags' => 'setTags',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'backend_spec' => 'getBackendSpec',
        'comments' => 'getComments',
        'log_spec' => 'getLogSpec',
        'monitor_spec' => 'getMonitorSpec',
        'name' => 'getName',
        'network_spec' => 'getNetworkSpec',
        'project_name' => 'getProjectName',
        'region' => 'getRegion',
        'resource_spec' => 'getResourceSpec',
        'tags' => 'getTags',
        'type' => 'getType'
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
        $this->container['backend_spec'] = isset($data['backend_spec']) ? $data['backend_spec'] : null;
        $this->container['comments'] = isset($data['comments']) ? $data['comments'] : null;
        $this->container['log_spec'] = isset($data['log_spec']) ? $data['log_spec'] : null;
        $this->container['monitor_spec'] = isset($data['monitor_spec']) ? $data['monitor_spec'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['network_spec'] = isset($data['network_spec']) ? $data['network_spec'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['region'] = isset($data['region']) ? $data['region'] : null;
        $this->container['resource_spec'] = isset($data['resource_spec']) ? $data['resource_spec'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['region'] === null) {
            $invalidProperties[] = "'region' can't be null";
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
     * Gets backend_spec
     *
     * @return \Volcengine\Apig\Model\BackendSpecForCreateGatewayInput
     */
    public function getBackendSpec()
    {
        return $this->container['backend_spec'];
    }

    /**
     * Sets backend_spec
     *
     * @param \Volcengine\Apig\Model\BackendSpecForCreateGatewayInput $backend_spec backend_spec
     *
     * @return $this
     */
    public function setBackendSpec($backend_spec)
    {
        $this->container['backend_spec'] = $backend_spec;

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
     * Gets log_spec
     *
     * @return \Volcengine\Apig\Model\LogSpecForCreateGatewayInput
     */
    public function getLogSpec()
    {
        return $this->container['log_spec'];
    }

    /**
     * Sets log_spec
     *
     * @param \Volcengine\Apig\Model\LogSpecForCreateGatewayInput $log_spec log_spec
     *
     * @return $this
     */
    public function setLogSpec($log_spec)
    {
        $this->container['log_spec'] = $log_spec;

        return $this;
    }

    /**
     * Gets monitor_spec
     *
     * @return \Volcengine\Apig\Model\MonitorSpecForCreateGatewayInput
     */
    public function getMonitorSpec()
    {
        return $this->container['monitor_spec'];
    }

    /**
     * Sets monitor_spec
     *
     * @param \Volcengine\Apig\Model\MonitorSpecForCreateGatewayInput $monitor_spec monitor_spec
     *
     * @return $this
     */
    public function setMonitorSpec($monitor_spec)
    {
        $this->container['monitor_spec'] = $monitor_spec;

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
     * Gets network_spec
     *
     * @return \Volcengine\Apig\Model\NetworkSpecForCreateGatewayInput
     */
    public function getNetworkSpec()
    {
        return $this->container['network_spec'];
    }

    /**
     * Sets network_spec
     *
     * @param \Volcengine\Apig\Model\NetworkSpecForCreateGatewayInput $network_spec network_spec
     *
     * @return $this
     */
    public function setNetworkSpec($network_spec)
    {
        $this->container['network_spec'] = $network_spec;

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
     * Gets region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->container['region'];
    }

    /**
     * Sets region
     *
     * @param string $region region
     *
     * @return $this
     */
    public function setRegion($region)
    {
        $this->container['region'] = $region;

        return $this;
    }

    /**
     * Gets resource_spec
     *
     * @return \Volcengine\Apig\Model\ResourceSpecForCreateGatewayInput
     */
    public function getResourceSpec()
    {
        return $this->container['resource_spec'];
    }

    /**
     * Sets resource_spec
     *
     * @param \Volcengine\Apig\Model\ResourceSpecForCreateGatewayInput $resource_spec resource_spec
     *
     * @return $this
     */
    public function setResourceSpec($resource_spec)
    {
        $this->container['resource_spec'] = $resource_spec;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return \Volcengine\Apig\Model\TagForCreateGatewayInput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Apig\Model\TagForCreateGatewayInput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

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

