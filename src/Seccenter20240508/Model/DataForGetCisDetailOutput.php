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

class DataForGetCisDetailOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DataForGetCisDetailOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'audit' => 'string',
        'benchmark_type' => 'string',
        'check_type' => 'string',
        'remediation' => 'string',
        'rule_id' => 'string',
        'section_desc' => 'string',
        'section_id' => 'string',
        'severity' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'audit' => null,
        'benchmark_type' => null,
        'check_type' => null,
        'remediation' => null,
        'rule_id' => null,
        'section_desc' => null,
        'section_id' => null,
        'severity' => null
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
        'audit' => 'Audit',
        'benchmark_type' => 'BenchmarkType',
        'check_type' => 'CheckType',
        'remediation' => 'Remediation',
        'rule_id' => 'RuleID',
        'section_desc' => 'SectionDesc',
        'section_id' => 'SectionID',
        'severity' => 'Severity'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'audit' => 'setAudit',
        'benchmark_type' => 'setBenchmarkType',
        'check_type' => 'setCheckType',
        'remediation' => 'setRemediation',
        'rule_id' => 'setRuleId',
        'section_desc' => 'setSectionDesc',
        'section_id' => 'setSectionId',
        'severity' => 'setSeverity'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'audit' => 'getAudit',
        'benchmark_type' => 'getBenchmarkType',
        'check_type' => 'getCheckType',
        'remediation' => 'getRemediation',
        'rule_id' => 'getRuleId',
        'section_desc' => 'getSectionDesc',
        'section_id' => 'getSectionId',
        'severity' => 'getSeverity'
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
        $this->container['audit'] = isset($data['audit']) ? $data['audit'] : null;
        $this->container['benchmark_type'] = isset($data['benchmark_type']) ? $data['benchmark_type'] : null;
        $this->container['check_type'] = isset($data['check_type']) ? $data['check_type'] : null;
        $this->container['remediation'] = isset($data['remediation']) ? $data['remediation'] : null;
        $this->container['rule_id'] = isset($data['rule_id']) ? $data['rule_id'] : null;
        $this->container['section_desc'] = isset($data['section_desc']) ? $data['section_desc'] : null;
        $this->container['section_id'] = isset($data['section_id']) ? $data['section_id'] : null;
        $this->container['severity'] = isset($data['severity']) ? $data['severity'] : null;
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
     * Gets audit
     *
     * @return string
     */
    public function getAudit()
    {
        return $this->container['audit'];
    }

    /**
     * Sets audit
     *
     * @param string $audit audit
     *
     * @return $this
     */
    public function setAudit($audit)
    {
        $this->container['audit'] = $audit;

        return $this;
    }

    /**
     * Gets benchmark_type
     *
     * @return string
     */
    public function getBenchmarkType()
    {
        return $this->container['benchmark_type'];
    }

    /**
     * Sets benchmark_type
     *
     * @param string $benchmark_type benchmark_type
     *
     * @return $this
     */
    public function setBenchmarkType($benchmark_type)
    {
        $this->container['benchmark_type'] = $benchmark_type;

        return $this;
    }

    /**
     * Gets check_type
     *
     * @return string
     */
    public function getCheckType()
    {
        return $this->container['check_type'];
    }

    /**
     * Sets check_type
     *
     * @param string $check_type check_type
     *
     * @return $this
     */
    public function setCheckType($check_type)
    {
        $this->container['check_type'] = $check_type;

        return $this;
    }

    /**
     * Gets remediation
     *
     * @return string
     */
    public function getRemediation()
    {
        return $this->container['remediation'];
    }

    /**
     * Sets remediation
     *
     * @param string $remediation remediation
     *
     * @return $this
     */
    public function setRemediation($remediation)
    {
        $this->container['remediation'] = $remediation;

        return $this;
    }

    /**
     * Gets rule_id
     *
     * @return string
     */
    public function getRuleId()
    {
        return $this->container['rule_id'];
    }

    /**
     * Sets rule_id
     *
     * @param string $rule_id rule_id
     *
     * @return $this
     */
    public function setRuleId($rule_id)
    {
        $this->container['rule_id'] = $rule_id;

        return $this;
    }

    /**
     * Gets section_desc
     *
     * @return string
     */
    public function getSectionDesc()
    {
        return $this->container['section_desc'];
    }

    /**
     * Sets section_desc
     *
     * @param string $section_desc section_desc
     *
     * @return $this
     */
    public function setSectionDesc($section_desc)
    {
        $this->container['section_desc'] = $section_desc;

        return $this;
    }

    /**
     * Gets section_id
     *
     * @return string
     */
    public function getSectionId()
    {
        return $this->container['section_id'];
    }

    /**
     * Sets section_id
     *
     * @param string $section_id section_id
     *
     * @return $this
     */
    public function setSectionId($section_id)
    {
        $this->container['section_id'] = $section_id;

        return $this;
    }

    /**
     * Gets severity
     *
     * @return string
     */
    public function getSeverity()
    {
        return $this->container['severity'];
    }

    /**
     * Sets severity
     *
     * @param string $severity severity
     *
     * @return $this
     */
    public function setSeverity($severity)
    {
        $this->container['severity'] = $severity;

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

