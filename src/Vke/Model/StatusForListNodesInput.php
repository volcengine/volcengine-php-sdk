<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vke\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class StatusForListNodesInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'StatusForListNodesInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'conditions_type' => 'string',
        'phase' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'conditions_type' => null,
        'phase' => null
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
        'conditions_type' => 'Conditions.Type',
        'phase' => 'Phase'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'conditions_type' => 'setConditionsType',
        'phase' => 'setPhase'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'conditions_type' => 'getConditionsType',
        'phase' => 'getPhase'
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

    const CONDITIONS_TYPE_BALANCE = 'Balance';
    const CONDITIONS_TYPE_INITIALIZE_FAILED = 'InitializeFailed';
    const CONDITIONS_TYPE_NOT_READY = 'NotReady';
    const CONDITIONS_TYPE_OK = 'Ok';
    const CONDITIONS_TYPE_PROGRESSING = 'Progressing';
    const CONDITIONS_TYPE_RESOURCE_CLEANUP_FAILED = 'ResourceCleanupFailed';
    const CONDITIONS_TYPE_SECURITY = 'Security';
    const CONDITIONS_TYPE_UNKNOWN = 'Unknown';
    const CONDITIONS_TYPE_UNSCHEDULABLE = 'Unschedulable';
    const PHASE_CREATING = 'Creating';
    const PHASE_DELETING = 'Deleting';
    const PHASE_FAILED = 'Failed';
    const PHASE_RUNNING = 'Running';
    const PHASE_STARTING = 'Starting';
    const PHASE_STOPPED = 'Stopped';
    const PHASE_STOPPING = 'Stopping';
    const PHASE_UPDATING = 'Updating';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getConditionsTypeAllowableValues()
    {
        return [
            self::CONDITIONS_TYPE_BALANCE,
            self::CONDITIONS_TYPE_INITIALIZE_FAILED,
            self::CONDITIONS_TYPE_NOT_READY,
            self::CONDITIONS_TYPE_OK,
            self::CONDITIONS_TYPE_PROGRESSING,
            self::CONDITIONS_TYPE_RESOURCE_CLEANUP_FAILED,
            self::CONDITIONS_TYPE_SECURITY,
            self::CONDITIONS_TYPE_UNKNOWN,
            self::CONDITIONS_TYPE_UNSCHEDULABLE,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPhaseAllowableValues()
    {
        return [
            self::PHASE_CREATING,
            self::PHASE_DELETING,
            self::PHASE_FAILED,
            self::PHASE_RUNNING,
            self::PHASE_STARTING,
            self::PHASE_STOPPED,
            self::PHASE_STOPPING,
            self::PHASE_UPDATING,
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
        $this->container['conditions_type'] = isset($data['conditions_type']) ? $data['conditions_type'] : null;
        $this->container['phase'] = isset($data['phase']) ? $data['phase'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getConditionsTypeAllowableValues();
        if (!is_null($this->container['conditions_type']) && !in_array($this->container['conditions_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'conditions_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getPhaseAllowableValues();
        if (!is_null($this->container['phase']) && !in_array($this->container['phase'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'phase', must be one of '%s'",
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
     * Gets conditions_type
     *
     * @return string
     */
    public function getConditionsType()
    {
        return $this->container['conditions_type'];
    }

    /**
     * Sets conditions_type
     *
     * @param string $conditions_type conditions_type
     *
     * @return $this
     */
    public function setConditionsType($conditions_type)
    {
        $allowedValues = $this->getConditionsTypeAllowableValues();
        if (!is_null($conditions_type) && !in_array($conditions_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'conditions_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['conditions_type'] = $conditions_type;

        return $this;
    }

    /**
     * Gets phase
     *
     * @return string
     */
    public function getPhase()
    {
        return $this->container['phase'];
    }

    /**
     * Sets phase
     *
     * @param string $phase phase
     *
     * @return $this
     */
    public function setPhase($phase)
    {
        $allowedValues = $this->getPhaseAllowableValues();
        if (!is_null($phase) && !in_array($phase, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'phase', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['phase'] = $phase;

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

