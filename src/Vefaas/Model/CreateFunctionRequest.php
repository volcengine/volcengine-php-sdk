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

class CreateFunctionRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CreateFunctionRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'description' => 'string',
        'envs' => '\Volcengine\Vefaas\Model\EnvForCreateFunctionInput[]',
        'exclusive_mode' => 'bool',
        'initializer_sec' => 'int',
        'max_concurrency' => 'int',
        'memory_mb' => 'int',
        'name' => 'string',
        'nas_storage' => '\Volcengine\Vefaas\Model\NasStorageForCreateFunctionInput',
        'request_timeout' => 'int',
        'runtime' => 'string',
        'source' => 'string',
        'source_access_config' => '\Volcengine\Vefaas\Model\SourceAccessConfigForCreateFunctionInput',
        'source_type' => 'string',
        'tls_config' => '\Volcengine\Vefaas\Model\TlsConfigForCreateFunctionInput',
        'top_param' => '\Volcengine\Vefaas\Model\TopParamForCreateFunctionInput',
        'tos_mount_config' => '\Volcengine\Vefaas\Model\TosMountConfigForCreateFunctionInput',
        'vpc_config' => '\Volcengine\Vefaas\Model\VpcConfigForCreateFunctionInput'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'description' => null,
        'envs' => null,
        'exclusive_mode' => null,
        'initializer_sec' => 'int32',
        'max_concurrency' => 'int32',
        'memory_mb' => 'int32',
        'name' => null,
        'nas_storage' => null,
        'request_timeout' => 'int32',
        'runtime' => null,
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
        'description' => 'Description',
        'envs' => 'Envs',
        'exclusive_mode' => 'ExclusiveMode',
        'initializer_sec' => 'InitializerSec',
        'max_concurrency' => 'MaxConcurrency',
        'memory_mb' => 'MemoryMB',
        'name' => 'Name',
        'nas_storage' => 'NasStorage',
        'request_timeout' => 'RequestTimeout',
        'runtime' => 'Runtime',
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
        'description' => 'setDescription',
        'envs' => 'setEnvs',
        'exclusive_mode' => 'setExclusiveMode',
        'initializer_sec' => 'setInitializerSec',
        'max_concurrency' => 'setMaxConcurrency',
        'memory_mb' => 'setMemoryMb',
        'name' => 'setName',
        'nas_storage' => 'setNasStorage',
        'request_timeout' => 'setRequestTimeout',
        'runtime' => 'setRuntime',
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
        'description' => 'getDescription',
        'envs' => 'getEnvs',
        'exclusive_mode' => 'getExclusiveMode',
        'initializer_sec' => 'getInitializerSec',
        'max_concurrency' => 'getMaxConcurrency',
        'memory_mb' => 'getMemoryMb',
        'name' => 'getName',
        'nas_storage' => 'getNasStorage',
        'request_timeout' => 'getRequestTimeout',
        'runtime' => 'getRuntime',
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
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['envs'] = isset($data['envs']) ? $data['envs'] : null;
        $this->container['exclusive_mode'] = isset($data['exclusive_mode']) ? $data['exclusive_mode'] : null;
        $this->container['initializer_sec'] = isset($data['initializer_sec']) ? $data['initializer_sec'] : null;
        $this->container['max_concurrency'] = isset($data['max_concurrency']) ? $data['max_concurrency'] : null;
        $this->container['memory_mb'] = isset($data['memory_mb']) ? $data['memory_mb'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['nas_storage'] = isset($data['nas_storage']) ? $data['nas_storage'] : null;
        $this->container['request_timeout'] = isset($data['request_timeout']) ? $data['request_timeout'] : null;
        $this->container['runtime'] = isset($data['runtime']) ? $data['runtime'] : null;
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

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['runtime'] === null) {
            $invalidProperties[] = "'runtime' can't be null";
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
     * @return \Volcengine\Vefaas\Model\EnvForCreateFunctionInput[]
     */
    public function getEnvs()
    {
        return $this->container['envs'];
    }

    /**
     * Sets envs
     *
     * @param \Volcengine\Vefaas\Model\EnvForCreateFunctionInput[] $envs envs
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
     * Gets nas_storage
     *
     * @return \Volcengine\Vefaas\Model\NasStorageForCreateFunctionInput
     */
    public function getNasStorage()
    {
        return $this->container['nas_storage'];
    }

    /**
     * Sets nas_storage
     *
     * @param \Volcengine\Vefaas\Model\NasStorageForCreateFunctionInput $nas_storage nas_storage
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
     * Gets runtime
     *
     * @return string
     */
    public function getRuntime()
    {
        return $this->container['runtime'];
    }

    /**
     * Sets runtime
     *
     * @param string $runtime runtime
     *
     * @return $this
     */
    public function setRuntime($runtime)
    {
        $this->container['runtime'] = $runtime;

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
     * @return \Volcengine\Vefaas\Model\SourceAccessConfigForCreateFunctionInput
     */
    public function getSourceAccessConfig()
    {
        return $this->container['source_access_config'];
    }

    /**
     * Sets source_access_config
     *
     * @param \Volcengine\Vefaas\Model\SourceAccessConfigForCreateFunctionInput $source_access_config source_access_config
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
     * @return \Volcengine\Vefaas\Model\TlsConfigForCreateFunctionInput
     */
    public function getTlsConfig()
    {
        return $this->container['tls_config'];
    }

    /**
     * Sets tls_config
     *
     * @param \Volcengine\Vefaas\Model\TlsConfigForCreateFunctionInput $tls_config tls_config
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
     * @return \Volcengine\Vefaas\Model\TopParamForCreateFunctionInput
     */
    public function getTopParam()
    {
        return $this->container['top_param'];
    }

    /**
     * Sets top_param
     *
     * @param \Volcengine\Vefaas\Model\TopParamForCreateFunctionInput $top_param top_param
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
     * @return \Volcengine\Vefaas\Model\TosMountConfigForCreateFunctionInput
     */
    public function getTosMountConfig()
    {
        return $this->container['tos_mount_config'];
    }

    /**
     * Sets tos_mount_config
     *
     * @param \Volcengine\Vefaas\Model\TosMountConfigForCreateFunctionInput $tos_mount_config tos_mount_config
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
     * @return \Volcengine\Vefaas\Model\VpcConfigForCreateFunctionInput
     */
    public function getVpcConfig()
    {
        return $this->container['vpc_config'];
    }

    /**
     * Sets vpc_config
     *
     * @param \Volcengine\Vefaas\Model\VpcConfigForCreateFunctionInput $vpc_config vpc_config
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

