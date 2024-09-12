<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Billing\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class ListPackageUsageDetailsRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ListPackageUsageDetailsRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'deduct_begin_time' => 'string',
        'deduct_end_time' => 'string',
        'instance_no' => 'string',
        'max_results' => 'string',
        'next_token' => 'string',
        'resource_type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'deduct_begin_time' => null,
        'deduct_end_time' => null,
        'instance_no' => null,
        'max_results' => null,
        'next_token' => null,
        'resource_type' => null
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
        'deduct_begin_time' => 'DeductBeginTime',
        'deduct_end_time' => 'DeductEndTime',
        'instance_no' => 'InstanceNo',
        'max_results' => 'MaxResults',
        'next_token' => 'NextToken',
        'resource_type' => 'ResourceType'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'deduct_begin_time' => 'setDeductBeginTime',
        'deduct_end_time' => 'setDeductEndTime',
        'instance_no' => 'setInstanceNo',
        'max_results' => 'setMaxResults',
        'next_token' => 'setNextToken',
        'resource_type' => 'setResourceType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'deduct_begin_time' => 'getDeductBeginTime',
        'deduct_end_time' => 'getDeductEndTime',
        'instance_no' => 'getInstanceNo',
        'max_results' => 'getMaxResults',
        'next_token' => 'getNextToken',
        'resource_type' => 'getResourceType'
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

    const RESOURCE_TYPE_PACKAGE = 'Package';
    const RESOURCE_TYPE_RI = 'RI';
    const RESOURCE_TYPE_RSC = 'RSC';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getResourceTypeAllowableValues()
    {
        return [
            self::RESOURCE_TYPE_PACKAGE,
            self::RESOURCE_TYPE_RI,
            self::RESOURCE_TYPE_RSC,
        ];
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
        $this->container['deduct_begin_time'] = isset($data['deduct_begin_time']) ? $data['deduct_begin_time'] : null;
        $this->container['deduct_end_time'] = isset($data['deduct_end_time']) ? $data['deduct_end_time'] : null;
        $this->container['instance_no'] = isset($data['instance_no']) ? $data['instance_no'] : null;
        $this->container['max_results'] = isset($data['max_results']) ? $data['max_results'] : null;
        $this->container['next_token'] = isset($data['next_token']) ? $data['next_token'] : null;
        $this->container['resource_type'] = isset($data['resource_type']) ? $data['resource_type'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['deduct_begin_time'] === null) {
            $invalidProperties[] = "'deduct_begin_time' can't be null";
        }
        if ($this->container['deduct_end_time'] === null) {
            $invalidProperties[] = "'deduct_end_time' can't be null";
        }
        if ($this->container['max_results'] === null) {
            $invalidProperties[] = "'max_results' can't be null";
        }
        if ($this->container['resource_type'] === null) {
            $invalidProperties[] = "'resource_type' can't be null";
        }
        $allowedValues = $this->getResourceTypeAllowableValues();
        if (!is_null($this->container['resource_type']) && !in_array($this->container['resource_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'resource_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
     * Gets deduct_begin_time
     *
     * @return string
     */
    public function getDeductBeginTime()
    {
        return $this->container['deduct_begin_time'];
    }

    /**
     * Sets deduct_begin_time
     *
     * @param string $deduct_begin_time deduct_begin_time
     *
     * @return $this
     */
    public function setDeductBeginTime($deduct_begin_time)
    {
        $this->container['deduct_begin_time'] = $deduct_begin_time;

        return $this;
    }

    /**
     * Gets deduct_end_time
     *
     * @return string
     */
    public function getDeductEndTime()
    {
        return $this->container['deduct_end_time'];
    }

    /**
     * Sets deduct_end_time
     *
     * @param string $deduct_end_time deduct_end_time
     *
     * @return $this
     */
    public function setDeductEndTime($deduct_end_time)
    {
        $this->container['deduct_end_time'] = $deduct_end_time;

        return $this;
    }

    /**
     * Gets instance_no
     *
     * @return string
     */
    public function getInstanceNo()
    {
        return $this->container['instance_no'];
    }

    /**
     * Sets instance_no
     *
     * @param string $instance_no instance_no
     *
     * @return $this
     */
    public function setInstanceNo($instance_no)
    {
        $this->container['instance_no'] = $instance_no;

        return $this;
    }

    /**
     * Gets max_results
     *
     * @return string
     */
    public function getMaxResults()
    {
        return $this->container['max_results'];
    }

    /**
     * Sets max_results
     *
     * @param string $max_results max_results
     *
     * @return $this
     */
    public function setMaxResults($max_results)
    {
        $this->container['max_results'] = $max_results;

        return $this;
    }

    /**
     * Gets next_token
     *
     * @return string
     */
    public function getNextToken()
    {
        return $this->container['next_token'];
    }

    /**
     * Sets next_token
     *
     * @param string $next_token next_token
     *
     * @return $this
     */
    public function setNextToken($next_token)
    {
        $this->container['next_token'] = $next_token;

        return $this;
    }

    /**
     * Gets resource_type
     *
     * @return string
     */
    public function getResourceType()
    {
        return $this->container['resource_type'];
    }

    /**
     * Sets resource_type
     *
     * @param string $resource_type resource_type
     *
     * @return $this
     */
    public function setResourceType($resource_type)
    {
        $allowedValues = $this->getResourceTypeAllowableValues();
        if (!in_array($resource_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'resource_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['resource_type'] = $resource_type;

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
