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

class InvocationForDescribeInvocationsOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'InvocationForDescribeInvocationsOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'command_content' => 'string',
        'command_description' => 'string',
        'command_id' => 'string',
        'command_name' => 'string',
        'command_provider' => 'string',
        'command_type' => 'string',
        'enable_parameter' => 'bool',
        'end_time' => 'string',
        'frequency' => 'string',
        'instance_number' => 'int',
        'invocation_description' => 'string',
        'invocation_id' => 'string',
        'invocation_name' => 'string',
        'invocation_status' => 'string',
        'launch_time' => 'string',
        'parameter_definitions' => '\Volcengine\Ecs\Model\ParameterDefinitionForDescribeInvocationsOutput[]',
        'parameters' => 'string',
        'project_name' => 'string',
        'recurrence_end_time' => 'string',
        'repeat_mode' => 'string',
        'start_time' => 'string',
        'tags' => '\Volcengine\Ecs\Model\TagForDescribeInvocationsOutput[]',
        'timeout' => 'int',
        'username' => 'string',
        'working_dir' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'command_content' => null,
        'command_description' => null,
        'command_id' => null,
        'command_name' => null,
        'command_provider' => null,
        'command_type' => null,
        'enable_parameter' => null,
        'end_time' => null,
        'frequency' => null,
        'instance_number' => 'int32',
        'invocation_description' => null,
        'invocation_id' => null,
        'invocation_name' => null,
        'invocation_status' => null,
        'launch_time' => null,
        'parameter_definitions' => null,
        'parameters' => null,
        'project_name' => null,
        'recurrence_end_time' => null,
        'repeat_mode' => null,
        'start_time' => null,
        'tags' => null,
        'timeout' => 'int32',
        'username' => null,
        'working_dir' => null
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
        'command_content' => 'CommandContent',
        'command_description' => 'CommandDescription',
        'command_id' => 'CommandId',
        'command_name' => 'CommandName',
        'command_provider' => 'CommandProvider',
        'command_type' => 'CommandType',
        'enable_parameter' => 'EnableParameter',
        'end_time' => 'EndTime',
        'frequency' => 'Frequency',
        'instance_number' => 'InstanceNumber',
        'invocation_description' => 'InvocationDescription',
        'invocation_id' => 'InvocationId',
        'invocation_name' => 'InvocationName',
        'invocation_status' => 'InvocationStatus',
        'launch_time' => 'LaunchTime',
        'parameter_definitions' => 'ParameterDefinitions',
        'parameters' => 'Parameters',
        'project_name' => 'ProjectName',
        'recurrence_end_time' => 'RecurrenceEndTime',
        'repeat_mode' => 'RepeatMode',
        'start_time' => 'StartTime',
        'tags' => 'Tags',
        'timeout' => 'Timeout',
        'username' => 'Username',
        'working_dir' => 'WorkingDir'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'command_content' => 'setCommandContent',
        'command_description' => 'setCommandDescription',
        'command_id' => 'setCommandId',
        'command_name' => 'setCommandName',
        'command_provider' => 'setCommandProvider',
        'command_type' => 'setCommandType',
        'enable_parameter' => 'setEnableParameter',
        'end_time' => 'setEndTime',
        'frequency' => 'setFrequency',
        'instance_number' => 'setInstanceNumber',
        'invocation_description' => 'setInvocationDescription',
        'invocation_id' => 'setInvocationId',
        'invocation_name' => 'setInvocationName',
        'invocation_status' => 'setInvocationStatus',
        'launch_time' => 'setLaunchTime',
        'parameter_definitions' => 'setParameterDefinitions',
        'parameters' => 'setParameters',
        'project_name' => 'setProjectName',
        'recurrence_end_time' => 'setRecurrenceEndTime',
        'repeat_mode' => 'setRepeatMode',
        'start_time' => 'setStartTime',
        'tags' => 'setTags',
        'timeout' => 'setTimeout',
        'username' => 'setUsername',
        'working_dir' => 'setWorkingDir'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'command_content' => 'getCommandContent',
        'command_description' => 'getCommandDescription',
        'command_id' => 'getCommandId',
        'command_name' => 'getCommandName',
        'command_provider' => 'getCommandProvider',
        'command_type' => 'getCommandType',
        'enable_parameter' => 'getEnableParameter',
        'end_time' => 'getEndTime',
        'frequency' => 'getFrequency',
        'instance_number' => 'getInstanceNumber',
        'invocation_description' => 'getInvocationDescription',
        'invocation_id' => 'getInvocationId',
        'invocation_name' => 'getInvocationName',
        'invocation_status' => 'getInvocationStatus',
        'launch_time' => 'getLaunchTime',
        'parameter_definitions' => 'getParameterDefinitions',
        'parameters' => 'getParameters',
        'project_name' => 'getProjectName',
        'recurrence_end_time' => 'getRecurrenceEndTime',
        'repeat_mode' => 'getRepeatMode',
        'start_time' => 'getStartTime',
        'tags' => 'getTags',
        'timeout' => 'getTimeout',
        'username' => 'getUsername',
        'working_dir' => 'getWorkingDir'
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
        $this->container['command_content'] = isset($data['command_content']) ? $data['command_content'] : null;
        $this->container['command_description'] = isset($data['command_description']) ? $data['command_description'] : null;
        $this->container['command_id'] = isset($data['command_id']) ? $data['command_id'] : null;
        $this->container['command_name'] = isset($data['command_name']) ? $data['command_name'] : null;
        $this->container['command_provider'] = isset($data['command_provider']) ? $data['command_provider'] : null;
        $this->container['command_type'] = isset($data['command_type']) ? $data['command_type'] : null;
        $this->container['enable_parameter'] = isset($data['enable_parameter']) ? $data['enable_parameter'] : null;
        $this->container['end_time'] = isset($data['end_time']) ? $data['end_time'] : null;
        $this->container['frequency'] = isset($data['frequency']) ? $data['frequency'] : null;
        $this->container['instance_number'] = isset($data['instance_number']) ? $data['instance_number'] : null;
        $this->container['invocation_description'] = isset($data['invocation_description']) ? $data['invocation_description'] : null;
        $this->container['invocation_id'] = isset($data['invocation_id']) ? $data['invocation_id'] : null;
        $this->container['invocation_name'] = isset($data['invocation_name']) ? $data['invocation_name'] : null;
        $this->container['invocation_status'] = isset($data['invocation_status']) ? $data['invocation_status'] : null;
        $this->container['launch_time'] = isset($data['launch_time']) ? $data['launch_time'] : null;
        $this->container['parameter_definitions'] = isset($data['parameter_definitions']) ? $data['parameter_definitions'] : null;
        $this->container['parameters'] = isset($data['parameters']) ? $data['parameters'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['recurrence_end_time'] = isset($data['recurrence_end_time']) ? $data['recurrence_end_time'] : null;
        $this->container['repeat_mode'] = isset($data['repeat_mode']) ? $data['repeat_mode'] : null;
        $this->container['start_time'] = isset($data['start_time']) ? $data['start_time'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['timeout'] = isset($data['timeout']) ? $data['timeout'] : null;
        $this->container['username'] = isset($data['username']) ? $data['username'] : null;
        $this->container['working_dir'] = isset($data['working_dir']) ? $data['working_dir'] : null;
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
     * Gets command_content
     *
     * @return string
     */
    public function getCommandContent()
    {
        return $this->container['command_content'];
    }

    /**
     * Sets command_content
     *
     * @param string $command_content command_content
     *
     * @return $this
     */
    public function setCommandContent($command_content)
    {
        $this->container['command_content'] = $command_content;

        return $this;
    }

    /**
     * Gets command_description
     *
     * @return string
     */
    public function getCommandDescription()
    {
        return $this->container['command_description'];
    }

    /**
     * Sets command_description
     *
     * @param string $command_description command_description
     *
     * @return $this
     */
    public function setCommandDescription($command_description)
    {
        $this->container['command_description'] = $command_description;

        return $this;
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
     * Gets command_name
     *
     * @return string
     */
    public function getCommandName()
    {
        return $this->container['command_name'];
    }

    /**
     * Sets command_name
     *
     * @param string $command_name command_name
     *
     * @return $this
     */
    public function setCommandName($command_name)
    {
        $this->container['command_name'] = $command_name;

        return $this;
    }

    /**
     * Gets command_provider
     *
     * @return string
     */
    public function getCommandProvider()
    {
        return $this->container['command_provider'];
    }

    /**
     * Sets command_provider
     *
     * @param string $command_provider command_provider
     *
     * @return $this
     */
    public function setCommandProvider($command_provider)
    {
        $this->container['command_provider'] = $command_provider;

        return $this;
    }

    /**
     * Gets command_type
     *
     * @return string
     */
    public function getCommandType()
    {
        return $this->container['command_type'];
    }

    /**
     * Sets command_type
     *
     * @param string $command_type command_type
     *
     * @return $this
     */
    public function setCommandType($command_type)
    {
        $this->container['command_type'] = $command_type;

        return $this;
    }

    /**
     * Gets enable_parameter
     *
     * @return bool
     */
    public function getEnableParameter()
    {
        return $this->container['enable_parameter'];
    }

    /**
     * Sets enable_parameter
     *
     * @param bool $enable_parameter enable_parameter
     *
     * @return $this
     */
    public function setEnableParameter($enable_parameter)
    {
        $this->container['enable_parameter'] = $enable_parameter;

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
     * Gets frequency
     *
     * @return string
     */
    public function getFrequency()
    {
        return $this->container['frequency'];
    }

    /**
     * Sets frequency
     *
     * @param string $frequency frequency
     *
     * @return $this
     */
    public function setFrequency($frequency)
    {
        $this->container['frequency'] = $frequency;

        return $this;
    }

    /**
     * Gets instance_number
     *
     * @return int
     */
    public function getInstanceNumber()
    {
        return $this->container['instance_number'];
    }

    /**
     * Sets instance_number
     *
     * @param int $instance_number instance_number
     *
     * @return $this
     */
    public function setInstanceNumber($instance_number)
    {
        $this->container['instance_number'] = $instance_number;

        return $this;
    }

    /**
     * Gets invocation_description
     *
     * @return string
     */
    public function getInvocationDescription()
    {
        return $this->container['invocation_description'];
    }

    /**
     * Sets invocation_description
     *
     * @param string $invocation_description invocation_description
     *
     * @return $this
     */
    public function setInvocationDescription($invocation_description)
    {
        $this->container['invocation_description'] = $invocation_description;

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
     * Gets invocation_name
     *
     * @return string
     */
    public function getInvocationName()
    {
        return $this->container['invocation_name'];
    }

    /**
     * Sets invocation_name
     *
     * @param string $invocation_name invocation_name
     *
     * @return $this
     */
    public function setInvocationName($invocation_name)
    {
        $this->container['invocation_name'] = $invocation_name;

        return $this;
    }

    /**
     * Gets invocation_status
     *
     * @return string
     */
    public function getInvocationStatus()
    {
        return $this->container['invocation_status'];
    }

    /**
     * Sets invocation_status
     *
     * @param string $invocation_status invocation_status
     *
     * @return $this
     */
    public function setInvocationStatus($invocation_status)
    {
        $this->container['invocation_status'] = $invocation_status;

        return $this;
    }

    /**
     * Gets launch_time
     *
     * @return string
     */
    public function getLaunchTime()
    {
        return $this->container['launch_time'];
    }

    /**
     * Sets launch_time
     *
     * @param string $launch_time launch_time
     *
     * @return $this
     */
    public function setLaunchTime($launch_time)
    {
        $this->container['launch_time'] = $launch_time;

        return $this;
    }

    /**
     * Gets parameter_definitions
     *
     * @return \Volcengine\Ecs\Model\ParameterDefinitionForDescribeInvocationsOutput[]
     */
    public function getParameterDefinitions()
    {
        return $this->container['parameter_definitions'];
    }

    /**
     * Sets parameter_definitions
     *
     * @param \Volcengine\Ecs\Model\ParameterDefinitionForDescribeInvocationsOutput[] $parameter_definitions parameter_definitions
     *
     * @return $this
     */
    public function setParameterDefinitions($parameter_definitions)
    {
        $this->container['parameter_definitions'] = $parameter_definitions;

        return $this;
    }

    /**
     * Gets parameters
     *
     * @return string
     */
    public function getParameters()
    {
        return $this->container['parameters'];
    }

    /**
     * Sets parameters
     *
     * @param string $parameters parameters
     *
     * @return $this
     */
    public function setParameters($parameters)
    {
        $this->container['parameters'] = $parameters;

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
     * Gets recurrence_end_time
     *
     * @return string
     */
    public function getRecurrenceEndTime()
    {
        return $this->container['recurrence_end_time'];
    }

    /**
     * Sets recurrence_end_time
     *
     * @param string $recurrence_end_time recurrence_end_time
     *
     * @return $this
     */
    public function setRecurrenceEndTime($recurrence_end_time)
    {
        $this->container['recurrence_end_time'] = $recurrence_end_time;

        return $this;
    }

    /**
     * Gets repeat_mode
     *
     * @return string
     */
    public function getRepeatMode()
    {
        return $this->container['repeat_mode'];
    }

    /**
     * Sets repeat_mode
     *
     * @param string $repeat_mode repeat_mode
     *
     * @return $this
     */
    public function setRepeatMode($repeat_mode)
    {
        $this->container['repeat_mode'] = $repeat_mode;

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
     * Gets tags
     *
     * @return \Volcengine\Ecs\Model\TagForDescribeInvocationsOutput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Ecs\Model\TagForDescribeInvocationsOutput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets timeout
     *
     * @return int
     */
    public function getTimeout()
    {
        return $this->container['timeout'];
    }

    /**
     * Sets timeout
     *
     * @param int $timeout timeout
     *
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $this->container['timeout'] = $timeout;

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
     * Gets working_dir
     *
     * @return string
     */
    public function getWorkingDir()
    {
        return $this->container['working_dir'];
    }

    /**
     * Sets working_dir
     *
     * @param string $working_dir working_dir
     *
     * @return $this
     */
    public function setWorkingDir($working_dir)
    {
        $this->container['working_dir'] = $working_dir;

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
