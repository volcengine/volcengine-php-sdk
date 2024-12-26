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

class ModifyInstancePlacementRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ModifyInstancePlacementRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'affinity' => 'string',
        'client_token' => 'string',
        'dedicated_host_id' => 'string',
        'dry_run' => 'bool',
        'instance_id' => 'string',
        'instance_type_id' => 'string',
        'migration_type' => 'string',
        'tenancy' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'affinity' => null,
        'client_token' => null,
        'dedicated_host_id' => null,
        'dry_run' => null,
        'instance_id' => null,
        'instance_type_id' => null,
        'migration_type' => null,
        'tenancy' => null
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
        'affinity' => 'Affinity',
        'client_token' => 'ClientToken',
        'dedicated_host_id' => 'DedicatedHostId',
        'dry_run' => 'DryRun',
        'instance_id' => 'InstanceId',
        'instance_type_id' => 'InstanceTypeId',
        'migration_type' => 'MigrationType',
        'tenancy' => 'Tenancy'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'affinity' => 'setAffinity',
        'client_token' => 'setClientToken',
        'dedicated_host_id' => 'setDedicatedHostId',
        'dry_run' => 'setDryRun',
        'instance_id' => 'setInstanceId',
        'instance_type_id' => 'setInstanceTypeId',
        'migration_type' => 'setMigrationType',
        'tenancy' => 'setTenancy'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'affinity' => 'getAffinity',
        'client_token' => 'getClientToken',
        'dedicated_host_id' => 'getDedicatedHostId',
        'dry_run' => 'getDryRun',
        'instance_id' => 'getInstanceId',
        'instance_type_id' => 'getInstanceTypeId',
        'migration_type' => 'getMigrationType',
        'tenancy' => 'getTenancy'
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
        $this->container['affinity'] = isset($data['affinity']) ? $data['affinity'] : null;
        $this->container['client_token'] = isset($data['client_token']) ? $data['client_token'] : null;
        $this->container['dedicated_host_id'] = isset($data['dedicated_host_id']) ? $data['dedicated_host_id'] : null;
        $this->container['dry_run'] = isset($data['dry_run']) ? $data['dry_run'] : null;
        $this->container['instance_id'] = isset($data['instance_id']) ? $data['instance_id'] : null;
        $this->container['instance_type_id'] = isset($data['instance_type_id']) ? $data['instance_type_id'] : null;
        $this->container['migration_type'] = isset($data['migration_type']) ? $data['migration_type'] : null;
        $this->container['tenancy'] = isset($data['tenancy']) ? $data['tenancy'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['instance_id'] === null) {
            $invalidProperties[] = "'instance_id' can't be null";
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
     * Gets affinity
     *
     * @return string
     */
    public function getAffinity()
    {
        return $this->container['affinity'];
    }

    /**
     * Sets affinity
     *
     * @param string $affinity affinity
     *
     * @return $this
     */
    public function setAffinity($affinity)
    {
        $this->container['affinity'] = $affinity;

        return $this;
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
     * Gets dedicated_host_id
     *
     * @return string
     */
    public function getDedicatedHostId()
    {
        return $this->container['dedicated_host_id'];
    }

    /**
     * Sets dedicated_host_id
     *
     * @param string $dedicated_host_id dedicated_host_id
     *
     * @return $this
     */
    public function setDedicatedHostId($dedicated_host_id)
    {
        $this->container['dedicated_host_id'] = $dedicated_host_id;

        return $this;
    }

    /**
     * Gets dry_run
     *
     * @return bool
     */
    public function getDryRun()
    {
        return $this->container['dry_run'];
    }

    /**
     * Sets dry_run
     *
     * @param bool $dry_run dry_run
     *
     * @return $this
     */
    public function setDryRun($dry_run)
    {
        $this->container['dry_run'] = $dry_run;

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
     * Gets instance_type_id
     *
     * @return string
     */
    public function getInstanceTypeId()
    {
        return $this->container['instance_type_id'];
    }

    /**
     * Sets instance_type_id
     *
     * @param string $instance_type_id instance_type_id
     *
     * @return $this
     */
    public function setInstanceTypeId($instance_type_id)
    {
        $this->container['instance_type_id'] = $instance_type_id;

        return $this;
    }

    /**
     * Gets migration_type
     *
     * @return string
     */
    public function getMigrationType()
    {
        return $this->container['migration_type'];
    }

    /**
     * Sets migration_type
     *
     * @param string $migration_type migration_type
     *
     * @return $this
     */
    public function setMigrationType($migration_type)
    {
        $this->container['migration_type'] = $migration_type;

        return $this;
    }

    /**
     * Gets tenancy
     *
     * @return string
     */
    public function getTenancy()
    {
        return $this->container['tenancy'];
    }

    /**
     * Sets tenancy
     *
     * @param string $tenancy tenancy
     *
     * @return $this
     */
    public function setTenancy($tenancy)
    {
        $this->container['tenancy'] = $tenancy;

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
