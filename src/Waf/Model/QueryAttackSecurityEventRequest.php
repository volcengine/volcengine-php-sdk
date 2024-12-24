<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Waf\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class QueryAttackSecurityEventRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'QueryAttackSecurityEventRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'all_host' => 'bool',
        'all_host_details' => 'string[]',
        'end_time' => 'int',
        'event_type' => 'string',
        'filter_all' => 'bool',
        'host' => 'string',
        'ip' => 'string',
        'page' => 'int',
        'page_size' => 'int',
        'path' => 'string',
        'project_name' => 'string',
        'security_level' => 'string',
        'sort_flag' => 'string',
        'start_time' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'all_host' => null,
        'all_host_details' => null,
        'end_time' => 'int32',
        'event_type' => null,
        'filter_all' => null,
        'host' => null,
        'ip' => null,
        'page' => 'int32',
        'page_size' => 'int32',
        'path' => null,
        'project_name' => null,
        'security_level' => null,
        'sort_flag' => null,
        'start_time' => 'int32'
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
        'all_host' => 'AllHost',
        'all_host_details' => 'AllHostDetails',
        'end_time' => 'EndTime',
        'event_type' => 'EventType',
        'filter_all' => 'FilterAll',
        'host' => 'Host',
        'ip' => 'Ip',
        'page' => 'Page',
        'page_size' => 'PageSize',
        'path' => 'Path',
        'project_name' => 'ProjectName',
        'security_level' => 'SecurityLevel',
        'sort_flag' => 'SortFlag',
        'start_time' => 'StartTime'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'all_host' => 'setAllHost',
        'all_host_details' => 'setAllHostDetails',
        'end_time' => 'setEndTime',
        'event_type' => 'setEventType',
        'filter_all' => 'setFilterAll',
        'host' => 'setHost',
        'ip' => 'setIp',
        'page' => 'setPage',
        'page_size' => 'setPageSize',
        'path' => 'setPath',
        'project_name' => 'setProjectName',
        'security_level' => 'setSecurityLevel',
        'sort_flag' => 'setSortFlag',
        'start_time' => 'setStartTime'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'all_host' => 'getAllHost',
        'all_host_details' => 'getAllHostDetails',
        'end_time' => 'getEndTime',
        'event_type' => 'getEventType',
        'filter_all' => 'getFilterAll',
        'host' => 'getHost',
        'ip' => 'getIp',
        'page' => 'getPage',
        'page_size' => 'getPageSize',
        'path' => 'getPath',
        'project_name' => 'getProjectName',
        'security_level' => 'getSecurityLevel',
        'sort_flag' => 'getSortFlag',
        'start_time' => 'getStartTime'
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
        $this->container['all_host'] = isset($data['all_host']) ? $data['all_host'] : null;
        $this->container['all_host_details'] = isset($data['all_host_details']) ? $data['all_host_details'] : null;
        $this->container['end_time'] = isset($data['end_time']) ? $data['end_time'] : null;
        $this->container['event_type'] = isset($data['event_type']) ? $data['event_type'] : null;
        $this->container['filter_all'] = isset($data['filter_all']) ? $data['filter_all'] : null;
        $this->container['host'] = isset($data['host']) ? $data['host'] : null;
        $this->container['ip'] = isset($data['ip']) ? $data['ip'] : null;
        $this->container['page'] = isset($data['page']) ? $data['page'] : null;
        $this->container['page_size'] = isset($data['page_size']) ? $data['page_size'] : null;
        $this->container['path'] = isset($data['path']) ? $data['path'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['security_level'] = isset($data['security_level']) ? $data['security_level'] : null;
        $this->container['sort_flag'] = isset($data['sort_flag']) ? $data['sort_flag'] : null;
        $this->container['start_time'] = isset($data['start_time']) ? $data['start_time'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['end_time'] === null) {
            $invalidProperties[] = "'end_time' can't be null";
        }
        if ($this->container['page'] === null) {
            $invalidProperties[] = "'page' can't be null";
        }
        if ($this->container['page_size'] === null) {
            $invalidProperties[] = "'page_size' can't be null";
        }
        if ($this->container['start_time'] === null) {
            $invalidProperties[] = "'start_time' can't be null";
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
     * Gets all_host
     *
     * @return bool
     */
    public function getAllHost()
    {
        return $this->container['all_host'];
    }

    /**
     * Sets all_host
     *
     * @param bool $all_host all_host
     *
     * @return $this
     */
    public function setAllHost($all_host)
    {
        $this->container['all_host'] = $all_host;

        return $this;
    }

    /**
     * Gets all_host_details
     *
     * @return string[]
     */
    public function getAllHostDetails()
    {
        return $this->container['all_host_details'];
    }

    /**
     * Sets all_host_details
     *
     * @param string[] $all_host_details all_host_details
     *
     * @return $this
     */
    public function setAllHostDetails($all_host_details)
    {
        $this->container['all_host_details'] = $all_host_details;

        return $this;
    }

    /**
     * Gets end_time
     *
     * @return int
     */
    public function getEndTime()
    {
        return $this->container['end_time'];
    }

    /**
     * Sets end_time
     *
     * @param int $end_time end_time
     *
     * @return $this
     */
    public function setEndTime($end_time)
    {
        $this->container['end_time'] = $end_time;

        return $this;
    }

    /**
     * Gets event_type
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->container['event_type'];
    }

    /**
     * Sets event_type
     *
     * @param string $event_type event_type
     *
     * @return $this
     */
    public function setEventType($event_type)
    {
        $this->container['event_type'] = $event_type;

        return $this;
    }

    /**
     * Gets filter_all
     *
     * @return bool
     */
    public function getFilterAll()
    {
        return $this->container['filter_all'];
    }

    /**
     * Sets filter_all
     *
     * @param bool $filter_all filter_all
     *
     * @return $this
     */
    public function setFilterAll($filter_all)
    {
        $this->container['filter_all'] = $filter_all;

        return $this;
    }

    /**
     * Gets host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->container['host'];
    }

    /**
     * Sets host
     *
     * @param string $host host
     *
     * @return $this
     */
    public function setHost($host)
    {
        $this->container['host'] = $host;

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
     * Gets page
     *
     * @return int
     */
    public function getPage()
    {
        return $this->container['page'];
    }

    /**
     * Sets page
     *
     * @param int $page page
     *
     * @return $this
     */
    public function setPage($page)
    {
        $this->container['page'] = $page;

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
     * Gets security_level
     *
     * @return string
     */
    public function getSecurityLevel()
    {
        return $this->container['security_level'];
    }

    /**
     * Sets security_level
     *
     * @param string $security_level security_level
     *
     * @return $this
     */
    public function setSecurityLevel($security_level)
    {
        $this->container['security_level'] = $security_level;

        return $this;
    }

    /**
     * Gets sort_flag
     *
     * @return string
     */
    public function getSortFlag()
    {
        return $this->container['sort_flag'];
    }

    /**
     * Sets sort_flag
     *
     * @param string $sort_flag sort_flag
     *
     * @return $this
     */
    public function setSortFlag($sort_flag)
    {
        $this->container['sort_flag'] = $sort_flag;

        return $this;
    }

    /**
     * Gets start_time
     *
     * @return int
     */
    public function getStartTime()
    {
        return $this->container['start_time'];
    }

    /**
     * Sets start_time
     *
     * @param int $start_time start_time
     *
     * @return $this
     */
    public function setStartTime($start_time)
    {
        $this->container['start_time'] = $start_time;

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

