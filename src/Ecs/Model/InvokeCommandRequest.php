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

class InvokeCommandRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'InvokeCommandRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'command_id' => 'string',
        'frequency' => 'string',
        'instance_ids' => 'string[]',
        'invocation_description' => 'string',
        'invocation_name' => 'string',
        'launch_time' => 'string',
        'parameters' => 'string',
        'project_name' => 'string',
        'recurrence_end_time' => 'string',
        'repeat_mode' => 'string',
        'tags' => '\Volcengine\Ecs\Model\TagForInvokeCommandInput[]',
        'timeout' => 'int',
        'username' => 'string',
        'windows_password' => 'string',
        'working_dir' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'command_id' => null,
        'frequency' => null,
        'instance_ids' => null,
        'invocation_description' => null,
        'invocation_name' => null,
        'launch_time' => null,
        'parameters' => null,
        'project_name' => null,
        'recurrence_end_time' => null,
        'repeat_mode' => null,
        'tags' => null,
        'timeout' => 'int32',
        'username' => null,
        'windows_password' => null,
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
        'command_id' => 'CommandId',
        'frequency' => 'Frequency',
        'instance_ids' => 'InstanceIds',
        'invocation_description' => 'InvocationDescription',
        'invocation_name' => 'InvocationName',
        'launch_time' => 'LaunchTime',
        'parameters' => 'Parameters',
        'project_name' => 'ProjectName',
        'recurrence_end_time' => 'RecurrenceEndTime',
        'repeat_mode' => 'RepeatMode',
        'tags' => 'Tags',
        'timeout' => 'Timeout',
        'username' => 'Username',
        'windows_password' => 'WindowsPassword',
        'working_dir' => 'WorkingDir'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'command_id' => 'setCommandId',
        'frequency' => 'setFrequency',
        'instance_ids' => 'setInstanceIds',
        'invocation_description' => 'setInvocationDescription',
        'invocation_name' => 'setInvocationName',
        'launch_time' => 'setLaunchTime',
        'parameters' => 'setParameters',
        'project_name' => 'setProjectName',
        'recurrence_end_time' => 'setRecurrenceEndTime',
        'repeat_mode' => 'setRepeatMode',
        'tags' => 'setTags',
        'timeout' => 'setTimeout',
        'username' => 'setUsername',
        'windows_password' => 'setWindowsPassword',
        'working_dir' => 'setWorkingDir'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'command_id' => 'getCommandId',
        'frequency' => 'getFrequency',
        'instance_ids' => 'getInstanceIds',
        'invocation_description' => 'getInvocationDescription',
        'invocation_name' => 'getInvocationName',
        'launch_time' => 'getLaunchTime',
        'parameters' => 'getParameters',
        'project_name' => 'getProjectName',
        'recurrence_end_time' => 'getRecurrenceEndTime',
        'repeat_mode' => 'getRepeatMode',
        'tags' => 'getTags',
        'timeout' => 'getTimeout',
        'username' => 'getUsername',
        'windows_password' => 'getWindowsPassword',
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
        $this->container['command_id'] = isset($data['command_id']) ? $data['command_id'] : null;
        $this->container['frequency'] = isset($data['frequency']) ? $data['frequency'] : null;
        $this->container['instance_ids'] = isset($data['instance_ids']) ? $data['instance_ids'] : null;
        $this->container['invocation_description'] = isset($data['invocation_description']) ? $data['invocation_description'] : null;
        $this->container['invocation_name'] = isset($data['invocation_name']) ? $data['invocation_name'] : null;
        $this->container['launch_time'] = isset($data['launch_time']) ? $data['launch_time'] : null;
        $this->container['parameters'] = isset($data['parameters']) ? $data['parameters'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['recurrence_end_time'] = isset($data['recurrence_end_time']) ? $data['recurrence_end_time'] : null;
        $this->container['repeat_mode'] = isset($data['repeat_mode']) ? $data['repeat_mode'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['timeout'] = isset($data['timeout']) ? $data['timeout'] : null;
        $this->container['username'] = isset($data['username']) ? $data['username'] : null;
        $this->container['windows_password'] = isset($data['windows_password']) ? $data['windows_password'] : null;
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

        if ($this->container['command_id'] === null) {
            $invalidProperties[] = "'command_id' can't be null";
        }
        if ($this->container['invocation_name'] === null) {
            $invalidProperties[] = "'invocation_name' can't be null";
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
     * Gets instance_ids
     *
     * @return string[]
     */
    public function getInstanceIds()
    {
        return $this->container['instance_ids'];
    }

    /**
     * Sets instance_ids
     *
     * @param string[] $instance_ids instance_ids
     *
     * @return $this
     */
    public function setInstanceIds($instance_ids)
    {
        $this->container['instance_ids'] = $instance_ids;

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
     * Gets tags
     *
     * @return \Volcengine\Ecs\Model\TagForInvokeCommandInput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Ecs\Model\TagForInvokeCommandInput[] $tags tags
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
     * Gets windows_password
     *
     * @return string
     */
    public function getWindowsPassword()
    {
        return $this->container['windows_password'];
    }

    /**
     * Sets windows_password
     *
     * @param string $windows_password windows_password
     *
     * @return $this
     */
    public function setWindowsPassword($windows_password)
    {
        $this->container['windows_password'] = $windows_password;

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

