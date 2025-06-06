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

class DataForListBaselineCheckResOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DataForListBaselineCheckResOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'checklist_id' => 'int',
        'checklist_name' => 'string',
        'checklist_status' => 'string',
        'detect_status' => 'string',
        'failed_detail' => 'string',
        'level' => 'string',
        'whitelist_detail' => 'string',
        'whitelist_status' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'checklist_id' => 'int32',
        'checklist_name' => null,
        'checklist_status' => null,
        'detect_status' => null,
        'failed_detail' => null,
        'level' => null,
        'whitelist_detail' => null,
        'whitelist_status' => null
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
        'checklist_id' => 'ChecklistID',
        'checklist_name' => 'ChecklistName',
        'checklist_status' => 'ChecklistStatus',
        'detect_status' => 'DetectStatus',
        'failed_detail' => 'FailedDetail',
        'level' => 'Level',
        'whitelist_detail' => 'WhitelistDetail',
        'whitelist_status' => 'WhitelistStatus'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'checklist_id' => 'setChecklistId',
        'checklist_name' => 'setChecklistName',
        'checklist_status' => 'setChecklistStatus',
        'detect_status' => 'setDetectStatus',
        'failed_detail' => 'setFailedDetail',
        'level' => 'setLevel',
        'whitelist_detail' => 'setWhitelistDetail',
        'whitelist_status' => 'setWhitelistStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'checklist_id' => 'getChecklistId',
        'checklist_name' => 'getChecklistName',
        'checklist_status' => 'getChecklistStatus',
        'detect_status' => 'getDetectStatus',
        'failed_detail' => 'getFailedDetail',
        'level' => 'getLevel',
        'whitelist_detail' => 'getWhitelistDetail',
        'whitelist_status' => 'getWhitelistStatus'
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
        $this->container['checklist_id'] = isset($data['checklist_id']) ? $data['checklist_id'] : null;
        $this->container['checklist_name'] = isset($data['checklist_name']) ? $data['checklist_name'] : null;
        $this->container['checklist_status'] = isset($data['checklist_status']) ? $data['checklist_status'] : null;
        $this->container['detect_status'] = isset($data['detect_status']) ? $data['detect_status'] : null;
        $this->container['failed_detail'] = isset($data['failed_detail']) ? $data['failed_detail'] : null;
        $this->container['level'] = isset($data['level']) ? $data['level'] : null;
        $this->container['whitelist_detail'] = isset($data['whitelist_detail']) ? $data['whitelist_detail'] : null;
        $this->container['whitelist_status'] = isset($data['whitelist_status']) ? $data['whitelist_status'] : null;
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
     * Gets checklist_id
     *
     * @return int
     */
    public function getChecklistId()
    {
        return $this->container['checklist_id'];
    }

    /**
     * Sets checklist_id
     *
     * @param int $checklist_id checklist_id
     *
     * @return $this
     */
    public function setChecklistId($checklist_id)
    {
        $this->container['checklist_id'] = $checklist_id;

        return $this;
    }

    /**
     * Gets checklist_name
     *
     * @return string
     */
    public function getChecklistName()
    {
        return $this->container['checklist_name'];
    }

    /**
     * Sets checklist_name
     *
     * @param string $checklist_name checklist_name
     *
     * @return $this
     */
    public function setChecklistName($checklist_name)
    {
        $this->container['checklist_name'] = $checklist_name;

        return $this;
    }

    /**
     * Gets checklist_status
     *
     * @return string
     */
    public function getChecklistStatus()
    {
        return $this->container['checklist_status'];
    }

    /**
     * Sets checklist_status
     *
     * @param string $checklist_status checklist_status
     *
     * @return $this
     */
    public function setChecklistStatus($checklist_status)
    {
        $this->container['checklist_status'] = $checklist_status;

        return $this;
    }

    /**
     * Gets detect_status
     *
     * @return string
     */
    public function getDetectStatus()
    {
        return $this->container['detect_status'];
    }

    /**
     * Sets detect_status
     *
     * @param string $detect_status detect_status
     *
     * @return $this
     */
    public function setDetectStatus($detect_status)
    {
        $this->container['detect_status'] = $detect_status;

        return $this;
    }

    /**
     * Gets failed_detail
     *
     * @return string
     */
    public function getFailedDetail()
    {
        return $this->container['failed_detail'];
    }

    /**
     * Sets failed_detail
     *
     * @param string $failed_detail failed_detail
     *
     * @return $this
     */
    public function setFailedDetail($failed_detail)
    {
        $this->container['failed_detail'] = $failed_detail;

        return $this;
    }

    /**
     * Gets level
     *
     * @return string
     */
    public function getLevel()
    {
        return $this->container['level'];
    }

    /**
     * Sets level
     *
     * @param string $level level
     *
     * @return $this
     */
    public function setLevel($level)
    {
        $this->container['level'] = $level;

        return $this;
    }

    /**
     * Gets whitelist_detail
     *
     * @return string
     */
    public function getWhitelistDetail()
    {
        return $this->container['whitelist_detail'];
    }

    /**
     * Sets whitelist_detail
     *
     * @param string $whitelist_detail whitelist_detail
     *
     * @return $this
     */
    public function setWhitelistDetail($whitelist_detail)
    {
        $this->container['whitelist_detail'] = $whitelist_detail;

        return $this;
    }

    /**
     * Gets whitelist_status
     *
     * @return bool
     */
    public function getWhitelistStatus()
    {
        return $this->container['whitelist_status'];
    }

    /**
     * Sets whitelist_status
     *
     * @param bool $whitelist_status whitelist_status
     *
     * @return $this
     */
    public function setWhitelistStatus($whitelist_status)
    {
        $this->container['whitelist_status'] = $whitelist_status;

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

