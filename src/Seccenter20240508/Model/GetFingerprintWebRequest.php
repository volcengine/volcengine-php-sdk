<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Seccenter20240508\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class GetFingerprintWebRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetFingerprintWebRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'agent_id' => 'string',
        'app_name' => 'string',
        'app_version' => 'string',
        'cloud_providers' => 'string[]',
        'exe' => 'string',
        'hostname' => 'string',
        'ip' => 'string',
        'leaf_group_ids' => 'string[]',
        'name' => 'string',
        'page_number' => 'int',
        'page_size' => 'int',
        'path' => 'string',
        'pid' => 'string',
        'sort_by' => 'string',
        'sort_order' => 'string',
        'start_time_end' => 'int',
        'start_time_start' => 'int',
        'tags' => 'string[]',
        'top_group_id' => 'string',
        'version' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'agent_id' => null,
        'app_name' => null,
        'app_version' => null,
        'cloud_providers' => null,
        'exe' => null,
        'hostname' => null,
        'ip' => null,
        'leaf_group_ids' => null,
        'name' => null,
        'page_number' => 'int32',
        'page_size' => 'int32',
        'path' => null,
        'pid' => null,
        'sort_by' => null,
        'sort_order' => null,
        'start_time_end' => 'int32',
        'start_time_start' => 'int32',
        'tags' => null,
        'top_group_id' => null,
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
        'agent_id' => 'AgentId',
        'app_name' => 'AppName',
        'app_version' => 'AppVersion',
        'cloud_providers' => 'CloudProviders',
        'exe' => 'Exe',
        'hostname' => 'Hostname',
        'ip' => 'Ip',
        'leaf_group_ids' => 'LeafGroupIDs',
        'name' => 'Name',
        'page_number' => 'PageNumber',
        'page_size' => 'PageSize',
        'path' => 'Path',
        'pid' => 'Pid',
        'sort_by' => 'SortBy',
        'sort_order' => 'SortOrder',
        'start_time_end' => 'StartTimeEnd',
        'start_time_start' => 'StartTimeStart',
        'tags' => 'Tags',
        'top_group_id' => 'TopGroupID',
        'version' => 'Version'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'agent_id' => 'setAgentId',
        'app_name' => 'setAppName',
        'app_version' => 'setAppVersion',
        'cloud_providers' => 'setCloudProviders',
        'exe' => 'setExe',
        'hostname' => 'setHostname',
        'ip' => 'setIp',
        'leaf_group_ids' => 'setLeafGroupIds',
        'name' => 'setName',
        'page_number' => 'setPageNumber',
        'page_size' => 'setPageSize',
        'path' => 'setPath',
        'pid' => 'setPid',
        'sort_by' => 'setSortBy',
        'sort_order' => 'setSortOrder',
        'start_time_end' => 'setStartTimeEnd',
        'start_time_start' => 'setStartTimeStart',
        'tags' => 'setTags',
        'top_group_id' => 'setTopGroupId',
        'version' => 'setVersion'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'agent_id' => 'getAgentId',
        'app_name' => 'getAppName',
        'app_version' => 'getAppVersion',
        'cloud_providers' => 'getCloudProviders',
        'exe' => 'getExe',
        'hostname' => 'getHostname',
        'ip' => 'getIp',
        'leaf_group_ids' => 'getLeafGroupIds',
        'name' => 'getName',
        'page_number' => 'getPageNumber',
        'page_size' => 'getPageSize',
        'path' => 'getPath',
        'pid' => 'getPid',
        'sort_by' => 'getSortBy',
        'sort_order' => 'getSortOrder',
        'start_time_end' => 'getStartTimeEnd',
        'start_time_start' => 'getStartTimeStart',
        'tags' => 'getTags',
        'top_group_id' => 'getTopGroupId',
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
        $this->container['agent_id'] = isset($data['agent_id']) ? $data['agent_id'] : null;
        $this->container['app_name'] = isset($data['app_name']) ? $data['app_name'] : null;
        $this->container['app_version'] = isset($data['app_version']) ? $data['app_version'] : null;
        $this->container['cloud_providers'] = isset($data['cloud_providers']) ? $data['cloud_providers'] : null;
        $this->container['exe'] = isset($data['exe']) ? $data['exe'] : null;
        $this->container['hostname'] = isset($data['hostname']) ? $data['hostname'] : null;
        $this->container['ip'] = isset($data['ip']) ? $data['ip'] : null;
        $this->container['leaf_group_ids'] = isset($data['leaf_group_ids']) ? $data['leaf_group_ids'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['page_number'] = isset($data['page_number']) ? $data['page_number'] : null;
        $this->container['page_size'] = isset($data['page_size']) ? $data['page_size'] : null;
        $this->container['path'] = isset($data['path']) ? $data['path'] : null;
        $this->container['pid'] = isset($data['pid']) ? $data['pid'] : null;
        $this->container['sort_by'] = isset($data['sort_by']) ? $data['sort_by'] : null;
        $this->container['sort_order'] = isset($data['sort_order']) ? $data['sort_order'] : null;
        $this->container['start_time_end'] = isset($data['start_time_end']) ? $data['start_time_end'] : null;
        $this->container['start_time_start'] = isset($data['start_time_start']) ? $data['start_time_start'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['top_group_id'] = isset($data['top_group_id']) ? $data['top_group_id'] : null;
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

        if ($this->container['page_number'] === null) {
            $invalidProperties[] = "'page_number' can't be null";
        }
        if ($this->container['page_size'] === null) {
            $invalidProperties[] = "'page_size' can't be null";
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
     * Gets agent_id
     *
     * @return string
     */
    public function getAgentId()
    {
        return $this->container['agent_id'];
    }

    /**
     * Sets agent_id
     *
     * @param string $agent_id agent_id
     *
     * @return $this
     */
    public function setAgentId($agent_id)
    {
        $this->container['agent_id'] = $agent_id;

        return $this;
    }

    /**
     * Gets app_name
     *
     * @return string
     */
    public function getAppName()
    {
        return $this->container['app_name'];
    }

    /**
     * Sets app_name
     *
     * @param string $app_name app_name
     *
     * @return $this
     */
    public function setAppName($app_name)
    {
        $this->container['app_name'] = $app_name;

        return $this;
    }

    /**
     * Gets app_version
     *
     * @return string
     */
    public function getAppVersion()
    {
        return $this->container['app_version'];
    }

    /**
     * Sets app_version
     *
     * @param string $app_version app_version
     *
     * @return $this
     */
    public function setAppVersion($app_version)
    {
        $this->container['app_version'] = $app_version;

        return $this;
    }

    /**
     * Gets cloud_providers
     *
     * @return string[]
     */
    public function getCloudProviders()
    {
        return $this->container['cloud_providers'];
    }

    /**
     * Sets cloud_providers
     *
     * @param string[] $cloud_providers cloud_providers
     *
     * @return $this
     */
    public function setCloudProviders($cloud_providers)
    {
        $this->container['cloud_providers'] = $cloud_providers;

        return $this;
    }

    /**
     * Gets exe
     *
     * @return string
     */
    public function getExe()
    {
        return $this->container['exe'];
    }

    /**
     * Sets exe
     *
     * @param string $exe exe
     *
     * @return $this
     */
    public function setExe($exe)
    {
        $this->container['exe'] = $exe;

        return $this;
    }

    /**
     * Gets hostname
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->container['hostname'];
    }

    /**
     * Sets hostname
     *
     * @param string $hostname hostname
     *
     * @return $this
     */
    public function setHostname($hostname)
    {
        $this->container['hostname'] = $hostname;

        return $this;
    }

    /**
     * Gets ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->container['ip'];
    }

    /**
     * Sets ip
     *
     * @param string $ip ip
     *
     * @return $this
     */
    public function setIp($ip)
    {
        $this->container['ip'] = $ip;

        return $this;
    }

    /**
     * Gets leaf_group_ids
     *
     * @return string[]
     */
    public function getLeafGroupIds()
    {
        return $this->container['leaf_group_ids'];
    }

    /**
     * Sets leaf_group_ids
     *
     * @param string[] $leaf_group_ids leaf_group_ids
     *
     * @return $this
     */
    public function setLeafGroupIds($leaf_group_ids)
    {
        $this->container['leaf_group_ids'] = $leaf_group_ids;

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
     * Gets page_number
     *
     * @return int
     */
    public function getPageNumber()
    {
        return $this->container['page_number'];
    }

    /**
     * Sets page_number
     *
     * @param int $page_number page_number
     *
     * @return $this
     */
    public function setPageNumber($page_number)
    {
        $this->container['page_number'] = $page_number;

        return $this;
    }

    /**
     * Gets page_size
     *
     * @return int
     */
    public function getPageSize()
    {
        return $this->container['page_size'];
    }

    /**
     * Sets page_size
     *
     * @param int $page_size page_size
     *
     * @return $this
     */
    public function setPageSize($page_size)
    {
        $this->container['page_size'] = $page_size;

        return $this;
    }

    /**
     * Gets path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->container['path'];
    }

    /**
     * Sets path
     *
     * @param string $path path
     *
     * @return $this
     */
    public function setPath($path)
    {
        $this->container['path'] = $path;

        return $this;
    }

    /**
     * Gets pid
     *
     * @return string
     */
    public function getPid()
    {
        return $this->container['pid'];
    }

    /**
     * Sets pid
     *
     * @param string $pid pid
     *
     * @return $this
     */
    public function setPid($pid)
    {
        $this->container['pid'] = $pid;

        return $this;
    }

    /**
     * Gets sort_by
     *
     * @return string
     */
    public function getSortBy()
    {
        return $this->container['sort_by'];
    }

    /**
     * Sets sort_by
     *
     * @param string $sort_by sort_by
     *
     * @return $this
     */
    public function setSortBy($sort_by)
    {
        $this->container['sort_by'] = $sort_by;

        return $this;
    }

    /**
     * Gets sort_order
     *
     * @return string
     */
    public function getSortOrder()
    {
        return $this->container['sort_order'];
    }

    /**
     * Sets sort_order
     *
     * @param string $sort_order sort_order
     *
     * @return $this
     */
    public function setSortOrder($sort_order)
    {
        $this->container['sort_order'] = $sort_order;

        return $this;
    }

    /**
     * Gets start_time_end
     *
     * @return int
     */
    public function getStartTimeEnd()
    {
        return $this->container['start_time_end'];
    }

    /**
     * Sets start_time_end
     *
     * @param int $start_time_end start_time_end
     *
     * @return $this
     */
    public function setStartTimeEnd($start_time_end)
    {
        $this->container['start_time_end'] = $start_time_end;

        return $this;
    }

    /**
     * Gets start_time_start
     *
     * @return int
     */
    public function getStartTimeStart()
    {
        return $this->container['start_time_start'];
    }

    /**
     * Sets start_time_start
     *
     * @param int $start_time_start start_time_start
     *
     * @return $this
     */
    public function setStartTimeStart($start_time_start)
    {
        $this->container['start_time_start'] = $start_time_start;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return string[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param string[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets top_group_id
     *
     * @return string
     */
    public function getTopGroupId()
    {
        return $this->container['top_group_id'];
    }

    /**
     * Sets top_group_id
     *
     * @param string $top_group_id top_group_id
     *
     * @return $this
     */
    public function setTopGroupId($top_group_id)
    {
        $this->container['top_group_id'] = $top_group_id;

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

