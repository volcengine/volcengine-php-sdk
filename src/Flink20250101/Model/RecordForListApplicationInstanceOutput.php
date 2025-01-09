<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Flink20250101\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class RecordForListApplicationInstanceOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'RecordForListApplicationInstanceOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'account_id' => 'string',
        'application_id' => 'string',
        'args' => 'string',
        'complete_rest_url' => 'string',
        'conf' => 'string',
        'dependency' => '\Volcengine\Flink20250101\Model\DependencyForListApplicationInstanceOutput',
        'deploy_request' => '\Volcengine\Flink20250101\Model\DeployRequestForListApplicationInstanceOutput',
        'deployment_id' => 'string',
        'end_time' => 'string',
        'engine_version' => 'string',
        'id' => 'string',
        'jar' => 'string',
        'job_id' => 'string',
        'job_name' => 'string',
        'job_type' => 'string',
        'main_class' => 'string',
        'project_id' => 'string',
        'sql_text' => 'string',
        'start_time' => 'string',
        'state' => 'string',
        'user_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'account_id' => null,
        'application_id' => null,
        'args' => null,
        'complete_rest_url' => null,
        'conf' => null,
        'dependency' => null,
        'deploy_request' => null,
        'deployment_id' => null,
        'end_time' => null,
        'engine_version' => null,
        'id' => null,
        'jar' => null,
        'job_id' => null,
        'job_name' => null,
        'job_type' => null,
        'main_class' => null,
        'project_id' => null,
        'sql_text' => null,
        'start_time' => null,
        'state' => null,
        'user_id' => null
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
        'account_id' => 'AccountId',
        'application_id' => 'ApplicationId',
        'args' => 'Args',
        'complete_rest_url' => 'CompleteRestUrl',
        'conf' => 'Conf',
        'dependency' => 'Dependency',
        'deploy_request' => 'DeployRequest',
        'deployment_id' => 'DeploymentId',
        'end_time' => 'EndTime',
        'engine_version' => 'EngineVersion',
        'id' => 'Id',
        'jar' => 'Jar',
        'job_id' => 'JobId',
        'job_name' => 'JobName',
        'job_type' => 'JobType',
        'main_class' => 'MainClass',
        'project_id' => 'ProjectId',
        'sql_text' => 'SqlText',
        'start_time' => 'StartTime',
        'state' => 'State',
        'user_id' => 'UserId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account_id' => 'setAccountId',
        'application_id' => 'setApplicationId',
        'args' => 'setArgs',
        'complete_rest_url' => 'setCompleteRestUrl',
        'conf' => 'setConf',
        'dependency' => 'setDependency',
        'deploy_request' => 'setDeployRequest',
        'deployment_id' => 'setDeploymentId',
        'end_time' => 'setEndTime',
        'engine_version' => 'setEngineVersion',
        'id' => 'setId',
        'jar' => 'setJar',
        'job_id' => 'setJobId',
        'job_name' => 'setJobName',
        'job_type' => 'setJobType',
        'main_class' => 'setMainClass',
        'project_id' => 'setProjectId',
        'sql_text' => 'setSqlText',
        'start_time' => 'setStartTime',
        'state' => 'setState',
        'user_id' => 'setUserId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account_id' => 'getAccountId',
        'application_id' => 'getApplicationId',
        'args' => 'getArgs',
        'complete_rest_url' => 'getCompleteRestUrl',
        'conf' => 'getConf',
        'dependency' => 'getDependency',
        'deploy_request' => 'getDeployRequest',
        'deployment_id' => 'getDeploymentId',
        'end_time' => 'getEndTime',
        'engine_version' => 'getEngineVersion',
        'id' => 'getId',
        'jar' => 'getJar',
        'job_id' => 'getJobId',
        'job_name' => 'getJobName',
        'job_type' => 'getJobType',
        'main_class' => 'getMainClass',
        'project_id' => 'getProjectId',
        'sql_text' => 'getSqlText',
        'start_time' => 'getStartTime',
        'state' => 'getState',
        'user_id' => 'getUserId'
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
        $this->container['account_id'] = isset($data['account_id']) ? $data['account_id'] : null;
        $this->container['application_id'] = isset($data['application_id']) ? $data['application_id'] : null;
        $this->container['args'] = isset($data['args']) ? $data['args'] : null;
        $this->container['complete_rest_url'] = isset($data['complete_rest_url']) ? $data['complete_rest_url'] : null;
        $this->container['conf'] = isset($data['conf']) ? $data['conf'] : null;
        $this->container['dependency'] = isset($data['dependency']) ? $data['dependency'] : null;
        $this->container['deploy_request'] = isset($data['deploy_request']) ? $data['deploy_request'] : null;
        $this->container['deployment_id'] = isset($data['deployment_id']) ? $data['deployment_id'] : null;
        $this->container['end_time'] = isset($data['end_time']) ? $data['end_time'] : null;
        $this->container['engine_version'] = isset($data['engine_version']) ? $data['engine_version'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['jar'] = isset($data['jar']) ? $data['jar'] : null;
        $this->container['job_id'] = isset($data['job_id']) ? $data['job_id'] : null;
        $this->container['job_name'] = isset($data['job_name']) ? $data['job_name'] : null;
        $this->container['job_type'] = isset($data['job_type']) ? $data['job_type'] : null;
        $this->container['main_class'] = isset($data['main_class']) ? $data['main_class'] : null;
        $this->container['project_id'] = isset($data['project_id']) ? $data['project_id'] : null;
        $this->container['sql_text'] = isset($data['sql_text']) ? $data['sql_text'] : null;
        $this->container['start_time'] = isset($data['start_time']) ? $data['start_time'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['user_id'] = isset($data['user_id']) ? $data['user_id'] : null;
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
     * Gets account_id
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     *
     * @param string $account_id account_id
     *
     * @return $this
     */
    public function setAccountId($account_id)
    {
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets application_id
     *
     * @return string
     */
    public function getApplicationId()
    {
        return $this->container['application_id'];
    }

    /**
     * Sets application_id
     *
     * @param string $application_id application_id
     *
     * @return $this
     */
    public function setApplicationId($application_id)
    {
        $this->container['application_id'] = $application_id;

        return $this;
    }

    /**
     * Gets args
     *
     * @return string
     */
    public function getArgs()
    {
        return $this->container['args'];
    }

    /**
     * Sets args
     *
     * @param string $args args
     *
     * @return $this
     */
    public function setArgs($args)
    {
        $this->container['args'] = $args;

        return $this;
    }

    /**
     * Gets complete_rest_url
     *
     * @return string
     */
    public function getCompleteRestUrl()
    {
        return $this->container['complete_rest_url'];
    }

    /**
     * Sets complete_rest_url
     *
     * @param string $complete_rest_url complete_rest_url
     *
     * @return $this
     */
    public function setCompleteRestUrl($complete_rest_url)
    {
        $this->container['complete_rest_url'] = $complete_rest_url;

        return $this;
    }

    /**
     * Gets conf
     *
     * @return string
     */
    public function getConf()
    {
        return $this->container['conf'];
    }

    /**
     * Sets conf
     *
     * @param string $conf conf
     *
     * @return $this
     */
    public function setConf($conf)
    {
        $this->container['conf'] = $conf;

        return $this;
    }

    /**
     * Gets dependency
     *
     * @return \Volcengine\Flink20250101\Model\DependencyForListApplicationInstanceOutput
     */
    public function getDependency()
    {
        return $this->container['dependency'];
    }

    /**
     * Sets dependency
     *
     * @param \Volcengine\Flink20250101\Model\DependencyForListApplicationInstanceOutput $dependency dependency
     *
     * @return $this
     */
    public function setDependency($dependency)
    {
        $this->container['dependency'] = $dependency;

        return $this;
    }

    /**
     * Gets deploy_request
     *
     * @return \Volcengine\Flink20250101\Model\DeployRequestForListApplicationInstanceOutput
     */
    public function getDeployRequest()
    {
        return $this->container['deploy_request'];
    }

    /**
     * Sets deploy_request
     *
     * @param \Volcengine\Flink20250101\Model\DeployRequestForListApplicationInstanceOutput $deploy_request deploy_request
     *
     * @return $this
     */
    public function setDeployRequest($deploy_request)
    {
        $this->container['deploy_request'] = $deploy_request;

        return $this;
    }

    /**
     * Gets deployment_id
     *
     * @return string
     */
    public function getDeploymentId()
    {
        return $this->container['deployment_id'];
    }

    /**
     * Sets deployment_id
     *
     * @param string $deployment_id deployment_id
     *
     * @return $this
     */
    public function setDeploymentId($deployment_id)
    {
        $this->container['deployment_id'] = $deployment_id;

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
     * Gets engine_version
     *
     * @return string
     */
    public function getEngineVersion()
    {
        return $this->container['engine_version'];
    }

    /**
     * Sets engine_version
     *
     * @param string $engine_version engine_version
     *
     * @return $this
     */
    public function setEngineVersion($engine_version)
    {
        $this->container['engine_version'] = $engine_version;

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
     * Gets jar
     *
     * @return string
     */
    public function getJar()
    {
        return $this->container['jar'];
    }

    /**
     * Sets jar
     *
     * @param string $jar jar
     *
     * @return $this
     */
    public function setJar($jar)
    {
        $this->container['jar'] = $jar;

        return $this;
    }

    /**
     * Gets job_id
     *
     * @return string
     */
    public function getJobId()
    {
        return $this->container['job_id'];
    }

    /**
     * Sets job_id
     *
     * @param string $job_id job_id
     *
     * @return $this
     */
    public function setJobId($job_id)
    {
        $this->container['job_id'] = $job_id;

        return $this;
    }

    /**
     * Gets job_name
     *
     * @return string
     */
    public function getJobName()
    {
        return $this->container['job_name'];
    }

    /**
     * Sets job_name
     *
     * @param string $job_name job_name
     *
     * @return $this
     */
    public function setJobName($job_name)
    {
        $this->container['job_name'] = $job_name;

        return $this;
    }

    /**
     * Gets job_type
     *
     * @return string
     */
    public function getJobType()
    {
        return $this->container['job_type'];
    }

    /**
     * Sets job_type
     *
     * @param string $job_type job_type
     *
     * @return $this
     */
    public function setJobType($job_type)
    {
        $this->container['job_type'] = $job_type;

        return $this;
    }

    /**
     * Gets main_class
     *
     * @return string
     */
    public function getMainClass()
    {
        return $this->container['main_class'];
    }

    /**
     * Sets main_class
     *
     * @param string $main_class main_class
     *
     * @return $this
     */
    public function setMainClass($main_class)
    {
        $this->container['main_class'] = $main_class;

        return $this;
    }

    /**
     * Gets project_id
     *
     * @return string
     */
    public function getProjectId()
    {
        return $this->container['project_id'];
    }

    /**
     * Sets project_id
     *
     * @param string $project_id project_id
     *
     * @return $this
     */
    public function setProjectId($project_id)
    {
        $this->container['project_id'] = $project_id;

        return $this;
    }

    /**
     * Gets sql_text
     *
     * @return string
     */
    public function getSqlText()
    {
        return $this->container['sql_text'];
    }

    /**
     * Sets sql_text
     *
     * @param string $sql_text sql_text
     *
     * @return $this
     */
    public function setSqlText($sql_text)
    {
        $this->container['sql_text'] = $sql_text;

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
     * Gets state
     *
     * @return string
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param string $state state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets user_id
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->container['user_id'];
    }

    /**
     * Sets user_id
     *
     * @param string $user_id user_id
     *
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->container['user_id'] = $user_id;

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

