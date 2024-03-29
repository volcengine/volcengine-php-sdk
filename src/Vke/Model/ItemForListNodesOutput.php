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

class ItemForListNodesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ItemForListNodesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'additional_container_storage_enabled' => 'bool',
        'cluster_id' => 'string',
        'container_storage_path' => 'string',
        'create_client_token' => 'string',
        'create_time' => 'string',
        'id' => 'string',
        'image_id' => 'string',
        'initialize_script' => 'string',
        'instance_id' => 'string',
        'is_virtual' => 'bool',
        'kubernetes_config' => '\Volcengine\Vke\Model\KubernetesConfigForListNodesOutput',
        'name' => 'string',
        'node_pool_id' => 'string',
        'roles' => 'string[]',
        'status' => '\Volcengine\Vke\Model\StatusForListNodesOutput',
        'update_time' => 'string',
        'zone_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'additional_container_storage_enabled' => null,
        'cluster_id' => null,
        'container_storage_path' => null,
        'create_client_token' => null,
        'create_time' => null,
        'id' => null,
        'image_id' => null,
        'initialize_script' => null,
        'instance_id' => null,
        'is_virtual' => null,
        'kubernetes_config' => null,
        'name' => null,
        'node_pool_id' => null,
        'roles' => null,
        'status' => null,
        'update_time' => null,
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
        'additional_container_storage_enabled' => 'AdditionalContainerStorageEnabled',
        'cluster_id' => 'ClusterId',
        'container_storage_path' => 'ContainerStoragePath',
        'create_client_token' => 'CreateClientToken',
        'create_time' => 'CreateTime',
        'id' => 'Id',
        'image_id' => 'ImageId',
        'initialize_script' => 'InitializeScript',
        'instance_id' => 'InstanceId',
        'is_virtual' => 'IsVirtual',
        'kubernetes_config' => 'KubernetesConfig',
        'name' => 'Name',
        'node_pool_id' => 'NodePoolId',
        'roles' => 'Roles',
        'status' => 'Status',
        'update_time' => 'UpdateTime',
        'zone_id' => 'ZoneId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'additional_container_storage_enabled' => 'setAdditionalContainerStorageEnabled',
        'cluster_id' => 'setClusterId',
        'container_storage_path' => 'setContainerStoragePath',
        'create_client_token' => 'setCreateClientToken',
        'create_time' => 'setCreateTime',
        'id' => 'setId',
        'image_id' => 'setImageId',
        'initialize_script' => 'setInitializeScript',
        'instance_id' => 'setInstanceId',
        'is_virtual' => 'setIsVirtual',
        'kubernetes_config' => 'setKubernetesConfig',
        'name' => 'setName',
        'node_pool_id' => 'setNodePoolId',
        'roles' => 'setRoles',
        'status' => 'setStatus',
        'update_time' => 'setUpdateTime',
        'zone_id' => 'setZoneId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'additional_container_storage_enabled' => 'getAdditionalContainerStorageEnabled',
        'cluster_id' => 'getClusterId',
        'container_storage_path' => 'getContainerStoragePath',
        'create_client_token' => 'getCreateClientToken',
        'create_time' => 'getCreateTime',
        'id' => 'getId',
        'image_id' => 'getImageId',
        'initialize_script' => 'getInitializeScript',
        'instance_id' => 'getInstanceId',
        'is_virtual' => 'getIsVirtual',
        'kubernetes_config' => 'getKubernetesConfig',
        'name' => 'getName',
        'node_pool_id' => 'getNodePoolId',
        'roles' => 'getRoles',
        'status' => 'getStatus',
        'update_time' => 'getUpdateTime',
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

    const ROLES_ETCD = 'Etcd';
    const ROLES_MASTER = 'Master';
    const ROLES_WORKER = 'Worker';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRolesAllowableValues()
    {
        return [
            self::ROLES_ETCD,
            self::ROLES_MASTER,
            self::ROLES_WORKER,
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
        $this->container['additional_container_storage_enabled'] = isset($data['additional_container_storage_enabled']) ? $data['additional_container_storage_enabled'] : null;
        $this->container['cluster_id'] = isset($data['cluster_id']) ? $data['cluster_id'] : null;
        $this->container['container_storage_path'] = isset($data['container_storage_path']) ? $data['container_storage_path'] : null;
        $this->container['create_client_token'] = isset($data['create_client_token']) ? $data['create_client_token'] : null;
        $this->container['create_time'] = isset($data['create_time']) ? $data['create_time'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['image_id'] = isset($data['image_id']) ? $data['image_id'] : null;
        $this->container['initialize_script'] = isset($data['initialize_script']) ? $data['initialize_script'] : null;
        $this->container['instance_id'] = isset($data['instance_id']) ? $data['instance_id'] : null;
        $this->container['is_virtual'] = isset($data['is_virtual']) ? $data['is_virtual'] : null;
        $this->container['kubernetes_config'] = isset($data['kubernetes_config']) ? $data['kubernetes_config'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['node_pool_id'] = isset($data['node_pool_id']) ? $data['node_pool_id'] : null;
        $this->container['roles'] = isset($data['roles']) ? $data['roles'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['update_time'] = isset($data['update_time']) ? $data['update_time'] : null;
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
     * Gets additional_container_storage_enabled
     *
     * @return bool
     */
    public function getAdditionalContainerStorageEnabled()
    {
        return $this->container['additional_container_storage_enabled'];
    }

    /**
     * Sets additional_container_storage_enabled
     *
     * @param bool $additional_container_storage_enabled additional_container_storage_enabled
     *
     * @return $this
     */
    public function setAdditionalContainerStorageEnabled($additional_container_storage_enabled)
    {
        $this->container['additional_container_storage_enabled'] = $additional_container_storage_enabled;

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
     * Gets container_storage_path
     *
     * @return string
     */
    public function getContainerStoragePath()
    {
        return $this->container['container_storage_path'];
    }

    /**
     * Sets container_storage_path
     *
     * @param string $container_storage_path container_storage_path
     *
     * @return $this
     */
    public function setContainerStoragePath($container_storage_path)
    {
        $this->container['container_storage_path'] = $container_storage_path;

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
     * Gets image_id
     *
     * @return string
     */
    public function getImageId()
    {
        return $this->container['image_id'];
    }

    /**
     * Sets image_id
     *
     * @param string $image_id image_id
     *
     * @return $this
     */
    public function setImageId($image_id)
    {
        $this->container['image_id'] = $image_id;

        return $this;
    }

    /**
     * Gets initialize_script
     *
     * @return string
     */
    public function getInitializeScript()
    {
        return $this->container['initialize_script'];
    }

    /**
     * Sets initialize_script
     *
     * @param string $initialize_script initialize_script
     *
     * @return $this
     */
    public function setInitializeScript($initialize_script)
    {
        $this->container['initialize_script'] = $initialize_script;

        return $this;
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
     * Gets is_virtual
     *
     * @return bool
     */
    public function getIsVirtual()
    {
        return $this->container['is_virtual'];
    }

    /**
     * Sets is_virtual
     *
     * @param bool $is_virtual is_virtual
     *
     * @return $this
     */
    public function setIsVirtual($is_virtual)
    {
        $this->container['is_virtual'] = $is_virtual;

        return $this;
    }

    /**
     * Gets kubernetes_config
     *
     * @return \Volcengine\Vke\Model\KubernetesConfigForListNodesOutput
     */
    public function getKubernetesConfig()
    {
        return $this->container['kubernetes_config'];
    }

    /**
     * Sets kubernetes_config
     *
     * @param \Volcengine\Vke\Model\KubernetesConfigForListNodesOutput $kubernetes_config kubernetes_config
     *
     * @return $this
     */
    public function setKubernetesConfig($kubernetes_config)
    {
        $this->container['kubernetes_config'] = $kubernetes_config;

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
     * Gets node_pool_id
     *
     * @return string
     */
    public function getNodePoolId()
    {
        return $this->container['node_pool_id'];
    }

    /**
     * Sets node_pool_id
     *
     * @param string $node_pool_id node_pool_id
     *
     * @return $this
     */
    public function setNodePoolId($node_pool_id)
    {
        $this->container['node_pool_id'] = $node_pool_id;

        return $this;
    }

    /**
     * Gets roles
     *
     * @return string[]
     */
    public function getRoles()
    {
        return $this->container['roles'];
    }

    /**
     * Sets roles
     *
     * @param string[] $roles roles
     *
     * @return $this
     */
    public function setRoles($roles)
    {
        $allowedValues = $this->getRolesAllowableValues();
        if (!is_null($roles) && array_diff($roles, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'roles', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['roles'] = $roles;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \Volcengine\Vke\Model\StatusForListNodesOutput
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \Volcengine\Vke\Model\StatusForListNodesOutput $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

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

