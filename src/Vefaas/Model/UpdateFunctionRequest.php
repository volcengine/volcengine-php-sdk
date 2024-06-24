<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vefaas\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class UpdateFunctionRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'UpdateFunctionRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'debug_instance_enable' => 'bool',
        'description' => 'string',
        'envs' => '\Volcengine\Vefaas\Model\EnvForUpdateFunctionInput[]',
        'exclusive_mode' => 'bool',
        'id' => 'string',
        'initializer_sec' => 'int',
        'max_concurrency' => 'int',
        'memory_mb' => 'int',
        'nas_storage' => '\Volcengine\Vefaas\Model\NasStorageForUpdateFunctionInput',
        'request_timeout' => 'int',
        'source' => 'string',
        'source_access_config' => '\Volcengine\Vefaas\Model\SourceAccessConfigForUpdateFunctionInput',
        'source_type' => 'string',
        'tls_config' => '\Volcengine\Vefaas\Model\TlsConfigForUpdateFunctionInput',
        'top_param' => '\Volcengine\Vefaas\Model\TopParamForUpdateFunctionInput',
        'tos_mount_config' => '\Volcengine\Vefaas\Model\TosMountConfigForUpdateFunctionInput',
        'vpc_config' => '\Volcengine\Vefaas\Model\VpcConfigForUpdateFunctionInput'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'debug_instance_enable' => null,
        'description' => null,
        'envs' => null,
        'exclusive_mode' => null,
        'id' => null,
        'initializer_sec' => 'int32',
        'max_concurrency' => 'int32',
        'memory_mb' => 'int32',
        'nas_storage' => null,
        'request_timeout' => 'int32',
        'source' => null,
        'source_access_config' => null,
        'source_type' => null,
        'tls_config' => null,
        'top_param' => null,
        'tos_mount_config' => null,
        'vpc_config' => null
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
        'debug_instance_enable' => 'DebugInstanceEnable',
        'description' => 'Description',
        'envs' => 'Envs',
        'exclusive_mode' => 'ExclusiveMode',
        'id' => 'Id',
        'initializer_sec' => 'InitializerSec',
        'max_concurrency' => 'MaxConcurrency',
        'memory_mb' => 'MemoryMB',
        'nas_storage' => 'NasStorage',
        'request_timeout' => 'RequestTimeout',
        'source' => 'Source',
        'source_access_config' => 'SourceAccessConfig',
        'source_type' => 'SourceType',
        'tls_config' => 'TlsConfig',
        'top_param' => 'TopParam',
        'tos_mount_config' => 'TosMountConfig',
        'vpc_config' => 'VpcConfig'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'debug_instance_enable' => 'setDebugInstanceEnable',
        'description' => 'setDescription',
        'envs' => 'setEnvs',
        'exclusive_mode' => 'setExclusiveMode',
        'id' => 'setId',
        'initializer_sec' => 'setInitializerSec',
        'max_concurrency' => 'setMaxConcurrency',
        'memory_mb' => 'setMemoryMb',
        'nas_storage' => 'setNasStorage',
        'request_timeout' => 'setRequestTimeout',
        'source' => 'setSource',
        'source_access_config' => 'setSourceAccessConfig',
        'source_type' => 'setSourceType',
        'tls_config' => 'setTlsConfig',
        'top_param' => 'setTopParam',
        'tos_mount_config' => 'setTosMountConfig',
        'vpc_config' => 'setVpcConfig'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'debug_instance_enable' => 'getDebugInstanceEnable',
        'description' => 'getDescription',
        'envs' => 'getEnvs',
        'exclusive_mode' => 'getExclusiveMode',
        'id' => 'getId',
        'initializer_sec' => 'getInitializerSec',
        'max_concurrency' => 'getMaxConcurrency',
        'memory_mb' => 'getMemoryMb',
        'nas_storage' => 'getNasStorage',
        'request_timeout' => 'getRequestTimeout',
        'source' => 'getSource',
        'source_access_config' => 'getSourceAccessConfig',
        'source_type' => 'getSourceType',
        'tls_config' => 'getTlsConfig',
        'top_param' => 'getTopParam',
        'tos_mount_config' => 'getTosMountConfig',
        'vpc_config' => 'getVpcConfig'
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
        $this->container['debug_instance_enable'] = isset($data['debug_instance_enable']) ? $data['debug_instance_enable'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['envs'] = isset($data['envs']) ? $data['envs'] : null;
        $this->container['exclusive_mode'] = isset($data['exclusive_mode']) ? $data['exclusive_mode'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['initializer_sec'] = isset($data['initializer_sec']) ? $data['initializer_sec'] : null;
        $this->container['max_concurrency'] = isset($data['max_concurrency']) ? $data['max_concurrency'] : null;
        $this->container['memory_mb'] = isset($data['memory_mb']) ? $data['memory_mb'] : null;
        $this->container['nas_storage'] = isset($data['nas_storage']) ? $data['nas_storage'] : null;
        $this->container['request_timeout'] = isset($data['request_timeout']) ? $data['request_timeout'] : null;
        $this->container['source'] = isset($data['source']) ? $data['source'] : null;
        $this->container['source_access_config'] = isset($data['source_access_config']) ? $data['source_access_config'] : null;
        $this->container['source_type'] = isset($data['source_type']) ? $data['source_type'] : null;
        $this->container['tls_config'] = isset($data['tls_config']) ? $data['tls_config'] : null;
        $this->container['top_param'] = isset($data['top_param']) ? $data['top_param'] : null;
        $this->container['tos_mount_config'] = isset($data['tos_mount_config']) ? $data['tos_mount_config'] : null;
        $this->container['vpc_config'] = isset($data['vpc_config']) ? $data['vpc_config'] : null;
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
     * Gets debug_instance_enable
     *
     * @return bool
     */
    public function getDebugInstanceEnable()
    {
        return $this->container['debug_instance_enable'];
    }

    /**
     * Sets debug_instance_enable
     *
     * @param bool $debug_instance_enable debug_instance_enable
     *
     * @return $this
     */
    public function setDebugInstanceEnable($debug_instance_enable)
    {
        $this->container['debug_instance_enable'] = $debug_instance_enable;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets envs
     *
     * @return \Volcengine\Vefaas\Model\EnvForUpdateFunctionInput[]
     */
    public function getEnvs()
    {
        return $this->container['envs'];
    }

    /**
     * Sets envs
     *
     * @param \Volcengine\Vefaas\Model\EnvForUpdateFunctionInput[] $envs envs
     *
     * @return $this
     */
    public function setEnvs($envs)
    {
        $this->container['envs'] = $envs;

        return $this;
    }

    /**
     * Gets exclusive_mode
     *
     * @return bool
     */
    public function getExclusiveMode()
    {
        return $this->container['exclusive_mode'];
    }

    /**
     * Sets exclusive_mode
     *
     * @param bool $exclusive_mode exclusive_mode
     *
     * @return $this
     */
    public function setExclusiveMode($exclusive_mode)
    {
        $this->container['exclusive_mode'] = $exclusive_mode;

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
     * Gets initializer_sec
     *
     * @return int
     */
    public function getInitializerSec()
    {
        return $this->container['initializer_sec'];
    }

    /**
     * Sets initializer_sec
     *
     * @param int $initializer_sec initializer_sec
     *
     * @return $this
     */
    public function setInitializerSec($initializer_sec)
    {
        $this->container['initializer_sec'] = $initializer_sec;

        return $this;
    }

    /**
     * Gets max_concurrency
     *
     * @return int
     */
    public function getMaxConcurrency()
    {
        return $this->container['max_concurrency'];
    }

    /**
     * Sets max_concurrency
     *
     * @param int $max_concurrency max_concurrency
     *
     * @return $this
     */
    public function setMaxConcurrency($max_concurrency)
    {
        $this->container['max_concurrency'] = $max_concurrency;

        return $this;
    }

    /**
     * Gets memory_mb
     *
     * @return int
     */
    public function getMemoryMb()
    {
        return $this->container['memory_mb'];
    }

    /**
     * Sets memory_mb
     *
     * @param int $memory_mb memory_mb
     *
     * @return $this
     */
    public function setMemoryMb($memory_mb)
    {
        $this->container['memory_mb'] = $memory_mb;

        return $this;
    }

    /**
     * Gets nas_storage
     *
     * @return \Volcengine\Vefaas\Model\NasStorageForUpdateFunctionInput
     */
    public function getNasStorage()
    {
        return $this->container['nas_storage'];
    }

    /**
     * Sets nas_storage
     *
     * @param \Volcengine\Vefaas\Model\NasStorageForUpdateFunctionInput $nas_storage nas_storage
     *
     * @return $this
     */
    public function setNasStorage($nas_storage)
    {
        $this->container['nas_storage'] = $nas_storage;

        return $this;
    }

    /**
     * Gets request_timeout
     *
     * @return int
     */
    public function getRequestTimeout()
    {
        return $this->container['request_timeout'];
    }

    /**
     * Sets request_timeout
     *
     * @param int $request_timeout request_timeout
     *
     * @return $this
     */
    public function setRequestTimeout($request_timeout)
    {
        $this->container['request_timeout'] = $request_timeout;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string $source source
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets source_access_config
     *
     * @return \Volcengine\Vefaas\Model\SourceAccessConfigForUpdateFunctionInput
     */
    public function getSourceAccessConfig()
    {
        return $this->container['source_access_config'];
    }

    /**
     * Sets source_access_config
     *
     * @param \Volcengine\Vefaas\Model\SourceAccessConfigForUpdateFunctionInput $source_access_config source_access_config
     *
     * @return $this
     */
    public function setSourceAccessConfig($source_access_config)
    {
        $this->container['source_access_config'] = $source_access_config;

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
     * Gets tls_config
     *
     * @return \Volcengine\Vefaas\Model\TlsConfigForUpdateFunctionInput
     */
    public function getTlsConfig()
    {
        return $this->container['tls_config'];
    }

    /**
     * Sets tls_config
     *
     * @param \Volcengine\Vefaas\Model\TlsConfigForUpdateFunctionInput $tls_config tls_config
     *
     * @return $this
     */
    public function setTlsConfig($tls_config)
    {
        $this->container['tls_config'] = $tls_config;

        return $this;
    }

    /**
     * Gets top_param
     *
     * @return \Volcengine\Vefaas\Model\TopParamForUpdateFunctionInput
     */
    public function getTopParam()
    {
        return $this->container['top_param'];
    }

    /**
     * Sets top_param
     *
     * @param \Volcengine\Vefaas\Model\TopParamForUpdateFunctionInput $top_param top_param
     *
     * @return $this
     */
    public function setTopParam($top_param)
    {
        $this->container['top_param'] = $top_param;

        return $this;
    }

    /**
     * Gets tos_mount_config
     *
     * @return \Volcengine\Vefaas\Model\TosMountConfigForUpdateFunctionInput
     */
    public function getTosMountConfig()
    {
        return $this->container['tos_mount_config'];
    }

    /**
     * Sets tos_mount_config
     *
     * @param \Volcengine\Vefaas\Model\TosMountConfigForUpdateFunctionInput $tos_mount_config tos_mount_config
     *
     * @return $this
     */
    public function setTosMountConfig($tos_mount_config)
    {
        $this->container['tos_mount_config'] = $tos_mount_config;

        return $this;
    }

    /**
     * Gets vpc_config
     *
     * @return \Volcengine\Vefaas\Model\VpcConfigForUpdateFunctionInput
     */
    public function getVpcConfig()
    {
        return $this->container['vpc_config'];
    }

    /**
     * Sets vpc_config
     *
     * @param \Volcengine\Vefaas\Model\VpcConfigForUpdateFunctionInput $vpc_config vpc_config
     *
     * @return $this
     */
    public function setVpcConfig($vpc_config)
    {
        $this->container['vpc_config'] = $vpc_config;

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

