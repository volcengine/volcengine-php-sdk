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

class HandlingRecordForGetVirusAlarmSummaryInfoOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'HandlingRecordForGetVirusAlarmSummaryInfoOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'action' => 'string',
        'action_content' => '\Volcengine\Seccenter20240508\Model\ActionContentForGetVirusAlarmSummaryInfoOutput',
        'extra_description' => 'string',
        'handle_time' => 'int',
        'language' => 'string',
        'result' => '\Volcengine\Seccenter20240508\Model\ResultForGetVirusAlarmSummaryInfoOutput',
        'soar_name' => 'string',
        'user' => 'string',
        'white_list_id' => 'string',
        'white_list_name' => 'string',
        'white_list_status' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'action' => null,
        'action_content' => null,
        'extra_description' => null,
        'handle_time' => 'int32',
        'language' => null,
        'result' => null,
        'soar_name' => null,
        'user' => null,
        'white_list_id' => null,
        'white_list_name' => null,
        'white_list_status' => null
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
        'action' => 'Action',
        'action_content' => 'ActionContent',
        'extra_description' => 'ExtraDescription',
        'handle_time' => 'HandleTime',
        'language' => 'Language',
        'result' => 'Result',
        'soar_name' => 'SoarName',
        'user' => 'User',
        'white_list_id' => 'WhiteListID',
        'white_list_name' => 'WhiteListName',
        'white_list_status' => 'WhiteListStatus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'action' => 'setAction',
        'action_content' => 'setActionContent',
        'extra_description' => 'setExtraDescription',
        'handle_time' => 'setHandleTime',
        'language' => 'setLanguage',
        'result' => 'setResult',
        'soar_name' => 'setSoarName',
        'user' => 'setUser',
        'white_list_id' => 'setWhiteListId',
        'white_list_name' => 'setWhiteListName',
        'white_list_status' => 'setWhiteListStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'action' => 'getAction',
        'action_content' => 'getActionContent',
        'extra_description' => 'getExtraDescription',
        'handle_time' => 'getHandleTime',
        'language' => 'getLanguage',
        'result' => 'getResult',
        'soar_name' => 'getSoarName',
        'user' => 'getUser',
        'white_list_id' => 'getWhiteListId',
        'white_list_name' => 'getWhiteListName',
        'white_list_status' => 'getWhiteListStatus'
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
        $this->container['action'] = isset($data['action']) ? $data['action'] : null;
        $this->container['action_content'] = isset($data['action_content']) ? $data['action_content'] : null;
        $this->container['extra_description'] = isset($data['extra_description']) ? $data['extra_description'] : null;
        $this->container['handle_time'] = isset($data['handle_time']) ? $data['handle_time'] : null;
        $this->container['language'] = isset($data['language']) ? $data['language'] : null;
        $this->container['result'] = isset($data['result']) ? $data['result'] : null;
        $this->container['soar_name'] = isset($data['soar_name']) ? $data['soar_name'] : null;
        $this->container['user'] = isset($data['user']) ? $data['user'] : null;
        $this->container['white_list_id'] = isset($data['white_list_id']) ? $data['white_list_id'] : null;
        $this->container['white_list_name'] = isset($data['white_list_name']) ? $data['white_list_name'] : null;
        $this->container['white_list_status'] = isset($data['white_list_status']) ? $data['white_list_status'] : null;
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
     * Gets action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->container['action'];
    }

    /**
     * Sets action
     *
     * @param string $action action
     *
     * @return $this
     */
    public function setAction($action)
    {
        $this->container['action'] = $action;

        return $this;
    }

    /**
     * Gets action_content
     *
     * @return \Volcengine\Seccenter20240508\Model\ActionContentForGetVirusAlarmSummaryInfoOutput
     */
    public function getActionContent()
    {
        return $this->container['action_content'];
    }

    /**
     * Sets action_content
     *
     * @param \Volcengine\Seccenter20240508\Model\ActionContentForGetVirusAlarmSummaryInfoOutput $action_content action_content
     *
     * @return $this
     */
    public function setActionContent($action_content)
    {
        $this->container['action_content'] = $action_content;

        return $this;
    }

    /**
     * Gets extra_description
     *
     * @return string
     */
    public function getExtraDescription()
    {
        return $this->container['extra_description'];
    }

    /**
     * Sets extra_description
     *
     * @param string $extra_description extra_description
     *
     * @return $this
     */
    public function setExtraDescription($extra_description)
    {
        $this->container['extra_description'] = $extra_description;

        return $this;
    }

    /**
     * Gets handle_time
     *
     * @return int
     */
    public function getHandleTime()
    {
        return $this->container['handle_time'];
    }

    /**
     * Sets handle_time
     *
     * @param int $handle_time handle_time
     *
     * @return $this
     */
    public function setHandleTime($handle_time)
    {
        $this->container['handle_time'] = $handle_time;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string $language language
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets result
     *
     * @return \Volcengine\Seccenter20240508\Model\ResultForGetVirusAlarmSummaryInfoOutput
     */
    public function getResult()
    {
        return $this->container['result'];
    }

    /**
     * Sets result
     *
     * @param \Volcengine\Seccenter20240508\Model\ResultForGetVirusAlarmSummaryInfoOutput $result result
     *
     * @return $this
     */
    public function setResult($result)
    {
        $this->container['result'] = $result;

        return $this;
    }

    /**
     * Gets soar_name
     *
     * @return string
     */
    public function getSoarName()
    {
        return $this->container['soar_name'];
    }

    /**
     * Sets soar_name
     *
     * @param string $soar_name soar_name
     *
     * @return $this
     */
    public function setSoarName($soar_name)
    {
        $this->container['soar_name'] = $soar_name;

        return $this;
    }

    /**
     * Gets user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->container['user'];
    }

    /**
     * Sets user
     *
     * @param string $user user
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->container['user'] = $user;

        return $this;
    }

    /**
     * Gets white_list_id
     *
     * @return string
     */
    public function getWhiteListId()
    {
        return $this->container['white_list_id'];
    }

    /**
     * Sets white_list_id
     *
     * @param string $white_list_id white_list_id
     *
     * @return $this
     */
    public function setWhiteListId($white_list_id)
    {
        $this->container['white_list_id'] = $white_list_id;

        return $this;
    }

    /**
     * Gets white_list_name
     *
     * @return string
     */
    public function getWhiteListName()
    {
        return $this->container['white_list_name'];
    }

    /**
     * Sets white_list_name
     *
     * @param string $white_list_name white_list_name
     *
     * @return $this
     */
    public function setWhiteListName($white_list_name)
    {
        $this->container['white_list_name'] = $white_list_name;

        return $this;
    }

    /**
     * Gets white_list_status
     *
     * @return bool
     */
    public function getWhiteListStatus()
    {
        return $this->container['white_list_status'];
    }

    /**
     * Sets white_list_status
     *
     * @param bool $white_list_status white_list_status
     *
     * @return $this
     */
    public function setWhiteListStatus($white_list_status)
    {
        $this->container['white_list_status'] = $white_list_status;

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

