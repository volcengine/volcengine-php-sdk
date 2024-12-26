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

class InvocationResultForDescribeInvocationResultsOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'InvocationResultForDescribeInvocationResultsOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'command_id' => 'string',
        'end_time' => 'string',
        'error_code' => 'string',
        'error_message' => 'string',
        'exit_code' => 'int',
        'instance_id' => 'string',
        'invocation_id' => 'string',
        'invocation_result_id' => 'string',
        'invocation_result_status' => 'string',
        'output' => 'string',
        'start_time' => 'string',
        'username' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'command_id' => null,
        'end_time' => null,
        'error_code' => null,
        'error_message' => null,
        'exit_code' => 'int32',
        'instance_id' => null,
        'invocation_id' => null,
        'invocation_result_id' => null,
        'invocation_result_status' => null,
        'output' => null,
        'start_time' => null,
        'username' => null
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
        'command_id' => 'CommandId',
        'end_time' => 'EndTime',
        'error_code' => 'ErrorCode',
        'error_message' => 'ErrorMessage',
        'exit_code' => 'ExitCode',
        'instance_id' => 'InstanceId',
        'invocation_id' => 'InvocationId',
        'invocation_result_id' => 'InvocationResultId',
        'invocation_result_status' => 'InvocationResultStatus',
        'output' => 'Output',
        'start_time' => 'StartTime',
        'username' => 'Username'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'command_id' => 'setCommandId',
        'end_time' => 'setEndTime',
        'error_code' => 'setErrorCode',
        'error_message' => 'setErrorMessage',
        'exit_code' => 'setExitCode',
        'instance_id' => 'setInstanceId',
        'invocation_id' => 'setInvocationId',
        'invocation_result_id' => 'setInvocationResultId',
        'invocation_result_status' => 'setInvocationResultStatus',
        'output' => 'setOutput',
        'start_time' => 'setStartTime',
        'username' => 'setUsername'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'command_id' => 'getCommandId',
        'end_time' => 'getEndTime',
        'error_code' => 'getErrorCode',
        'error_message' => 'getErrorMessage',
        'exit_code' => 'getExitCode',
        'instance_id' => 'getInstanceId',
        'invocation_id' => 'getInvocationId',
        'invocation_result_id' => 'getInvocationResultId',
        'invocation_result_status' => 'getInvocationResultStatus',
        'output' => 'getOutput',
        'start_time' => 'getStartTime',
        'username' => 'getUsername'
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
        $this->container['command_id'] = isset($data['command_id']) ? $data['command_id'] : null;
        $this->container['end_time'] = isset($data['end_time']) ? $data['end_time'] : null;
        $this->container['error_code'] = isset($data['error_code']) ? $data['error_code'] : null;
        $this->container['error_message'] = isset($data['error_message']) ? $data['error_message'] : null;
        $this->container['exit_code'] = isset($data['exit_code']) ? $data['exit_code'] : null;
        $this->container['instance_id'] = isset($data['instance_id']) ? $data['instance_id'] : null;
        $this->container['invocation_id'] = isset($data['invocation_id']) ? $data['invocation_id'] : null;
        $this->container['invocation_result_id'] = isset($data['invocation_result_id']) ? $data['invocation_result_id'] : null;
        $this->container['invocation_result_status'] = isset($data['invocation_result_status']) ? $data['invocation_result_status'] : null;
        $this->container['output'] = isset($data['output']) ? $data['output'] : null;
        $this->container['start_time'] = isset($data['start_time']) ? $data['start_time'] : null;
        $this->container['username'] = isset($data['username']) ? $data['username'] : null;
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
     * Gets command_id
     *
     * @return string
     */
    public function getCommandId()
    {
        return $this->container['command_id'];
    }

    /**
     * Sets command_id
     *
     * @param string $command_id command_id
     *
     * @return $this
     */
    public function setCommandId($command_id)
    {
        $this->container['command_id'] = $command_id;

        return $this;
    }

    /**
     * Gets end_time
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->container['end_time'];
    }

    /**
     * Sets end_time
     *
     * @param string $end_time end_time
     *
     * @return $this
     */
    public function setEndTime($end_time)
    {
        $this->container['end_time'] = $end_time;

        return $this;
    }

    /**
     * Gets error_code
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->container['error_code'];
    }

    /**
     * Sets error_code
     *
     * @param string $error_code error_code
     *
     * @return $this
     */
    public function setErrorCode($error_code)
    {
        $this->container['error_code'] = $error_code;

        return $this;
    }

    /**
     * Gets error_message
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->container['error_message'];
    }

    /**
     * Sets error_message
     *
     * @param string $error_message error_message
     *
     * @return $this
     */
    public function setErrorMessage($error_message)
    {
        $this->container['error_message'] = $error_message;

        return $this;
    }

    /**
     * Gets exit_code
     *
     * @return int
     */
    public function getExitCode()
    {
        return $this->container['exit_code'];
    }

    /**
     * Sets exit_code
     *
     * @param int $exit_code exit_code
     *
     * @return $this
     */
    public function setExitCode($exit_code)
    {
        $this->container['exit_code'] = $exit_code;

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
     * Gets invocation_id
     *
     * @return string
     */
    public function getInvocationId()
    {
        return $this->container['invocation_id'];
    }

    /**
     * Sets invocation_id
     *
     * @param string $invocation_id invocation_id
     *
     * @return $this
     */
    public function setInvocationId($invocation_id)
    {
        $this->container['invocation_id'] = $invocation_id;

        return $this;
    }

    /**
     * Gets invocation_result_id
     *
     * @return string
     */
    public function getInvocationResultId()
    {
        return $this->container['invocation_result_id'];
    }

    /**
     * Sets invocation_result_id
     *
     * @param string $invocation_result_id invocation_result_id
     *
     * @return $this
     */
    public function setInvocationResultId($invocation_result_id)
    {
        $this->container['invocation_result_id'] = $invocation_result_id;

        return $this;
    }

    /**
     * Gets invocation_result_status
     *
     * @return string
     */
    public function getInvocationResultStatus()
    {
        return $this->container['invocation_result_status'];
    }

    /**
     * Sets invocation_result_status
     *
     * @param string $invocation_result_status invocation_result_status
     *
     * @return $this
     */
    public function setInvocationResultStatus($invocation_result_status)
    {
        $this->container['invocation_result_status'] = $invocation_result_status;

        return $this;
    }

    /**
     * Gets output
     *
     * @return string
     */
    public function getOutput()
    {
        return $this->container['output'];
    }

    /**
     * Sets output
     *
     * @param string $output output
     *
     * @return $this
     */
    public function setOutput($output)
    {
        $this->container['output'] = $output;

        return $this;
    }

    /**
     * Gets start_time
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->container['start_time'];
    }

    /**
     * Sets start_time
     *
     * @param string $start_time start_time
     *
     * @return $this
     */
    public function setStartTime($start_time)
    {
        $this->container['start_time'] = $start_time;

        return $this;
    }

    /**
     * Gets username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->container['username'];
    }

    /**
     * Sets username
     *
     * @param string $username username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->container['username'] = $username;

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
