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

class ItemForListAddonsOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ItemForListAddonsOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'cluster_id' => 'string',
        'config' => 'string',
        'create_client_token' => 'string',
        'create_time' => 'string',
        'deploy_mode' => 'string',
        'deploy_node_type' => 'string',
        'name' => 'string',
        'status' => '\Volcengine\Vke\Model\StatusForListAddonsOutput',
        'update_client_token' => 'string',
        'update_time' => 'string',
        'version' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'cluster_id' => null,
        'config' => null,
        'create_client_token' => null,
        'create_time' => null,
        'deploy_mode' => null,
        'deploy_node_type' => null,
        'name' => null,
        'status' => null,
        'update_client_token' => null,
        'update_time' => null,
        'version' => null
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
        'cluster_id' => 'ClusterId',
        'config' => 'Config',
        'create_client_token' => 'CreateClientToken',
        'create_time' => 'CreateTime',
        'deploy_mode' => 'DeployMode',
        'deploy_node_type' => 'DeployNodeType',
        'name' => 'Name',
        'status' => 'Status',
        'update_client_token' => 'UpdateClientToken',
        'update_time' => 'UpdateTime',
        'version' => 'Version'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cluster_id' => 'setClusterId',
        'config' => 'setConfig',
        'create_client_token' => 'setCreateClientToken',
        'create_time' => 'setCreateTime',
        'deploy_mode' => 'setDeployMode',
        'deploy_node_type' => 'setDeployNodeType',
        'name' => 'setName',
        'status' => 'setStatus',
        'update_client_token' => 'setUpdateClientToken',
        'update_time' => 'setUpdateTime',
        'version' => 'setVersion'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cluster_id' => 'getClusterId',
        'config' => 'getConfig',
        'create_client_token' => 'getCreateClientToken',
        'create_time' => 'getCreateTime',
        'deploy_mode' => 'getDeployMode',
        'deploy_node_type' => 'getDeployNodeType',
        'name' => 'getName',
        'status' => 'getStatus',
        'update_client_token' => 'getUpdateClientToken',
        'update_time' => 'getUpdateTime',
        'version' => 'getVersion'
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
        $this->container['cluster_id'] = isset($data['cluster_id']) ? $data['cluster_id'] : null;
        $this->container['config'] = isset($data['config']) ? $data['config'] : null;
        $this->container['create_client_token'] = isset($data['create_client_token']) ? $data['create_client_token'] : null;
        $this->container['create_time'] = isset($data['create_time']) ? $data['create_time'] : null;
        $this->container['deploy_mode'] = isset($data['deploy_mode']) ? $data['deploy_mode'] : null;
        $this->container['deploy_node_type'] = isset($data['deploy_node_type']) ? $data['deploy_node_type'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['update_client_token'] = isset($data['update_client_token']) ? $data['update_client_token'] : null;
        $this->container['update_time'] = isset($data['update_time']) ? $data['update_time'] : null;
        $this->container['version'] = isset($data['version']) ? $data['version'] : null;
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
     * Gets config
     *
     * @return string
     */
    public function getConfig()
    {
        return $this->container['config'];
    }

    /**
     * Sets config
     *
     * @param string $config config
     *
     * @return $this
     */
    public function setConfig($config)
    {
        $this->container['config'] = $config;

        return $this;
    }

    /**
     * Gets create_client_token
     *
     * @return string
     */
    public function getCreateClientToken()
    {
        return $this->container['create_client_token'];
    }

    /**
     * Sets create_client_token
     *
     * @param string $create_client_token create_client_token
     *
     * @return $this
     */
    public function setCreateClientToken($create_client_token)
    {
        $this->container['create_client_token'] = $create_client_token;

        return $this;
    }

    /**
     * Gets create_time
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->container['create_time'];
    }

    /**
     * Sets create_time
     *
     * @param string $create_time create_time
     *
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->container['create_time'] = $create_time;

        return $this;
    }

    /**
     * Gets deploy_mode
     *
     * @return string
     */
    public function getDeployMode()
    {
        return $this->container['deploy_mode'];
    }

    /**
     * Sets deploy_mode
     *
     * @param string $deploy_mode deploy_mode
     *
     * @return $this
     */
    public function setDeployMode($deploy_mode)
    {
        $this->container['deploy_mode'] = $deploy_mode;

        return $this;
    }

    /**
     * Gets deploy_node_type
     *
     * @return string
     */
    public function getDeployNodeType()
    {
        return $this->container['deploy_node_type'];
    }

    /**
     * Sets deploy_node_type
     *
     * @param string $deploy_node_type deploy_node_type
     *
     * @return $this
     */
    public function setDeployNodeType($deploy_node_type)
    {
        $this->container['deploy_node_type'] = $deploy_node_type;

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
     * Gets status
     *
     * @return \Volcengine\Vke\Model\StatusForListAddonsOutput
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \Volcengine\Vke\Model\StatusForListAddonsOutput $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets update_client_token
     *
     * @return string
     */
    public function getUpdateClientToken()
    {
        return $this->container['update_client_token'];
    }

    /**
     * Sets update_client_token
     *
     * @param string $update_client_token update_client_token
     *
     * @return $this
     */
    public function setUpdateClientToken($update_client_token)
    {
        $this->container['update_client_token'] = $update_client_token;

        return $this;
    }

    /**
     * Gets update_time
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->container['update_time'];
    }

    /**
     * Sets update_time
     *
     * @param string $update_time update_time
     *
     * @return $this
     */
    public function setUpdateTime($update_time)
    {
        $this->container['update_time'] = $update_time;

        return $this;
    }

    /**
     * Gets version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->container['version'];
    }

    /**
     * Sets version
     *
     * @param string $version version
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->container['version'] = $version;

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
