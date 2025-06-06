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

class GetHostAssetOverviewResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetHostAssetOverviewResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'alarm' => 'int',
        'baseline' => 'int',
        'cpu' => 'int',
        'host_num' => 'int',
        'offline' => 'int',
        'protecting' => 'int',
        'protection_exception' => 'int',
        'risk' => 'int',
        'unprotected' => 'int',
        'unprotected_cpu' => 'int',
        'virus' => 'int',
        'vuln' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'alarm' => 'int32',
        'baseline' => 'int32',
        'cpu' => 'int32',
        'host_num' => 'int32',
        'offline' => 'int32',
        'protecting' => 'int32',
        'protection_exception' => 'int32',
        'risk' => 'int32',
        'unprotected' => 'int32',
        'unprotected_cpu' => 'int32',
        'virus' => 'int32',
        'vuln' => 'int32'
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
        'alarm' => 'Alarm',
        'baseline' => 'Baseline',
        'cpu' => 'Cpu',
        'host_num' => 'HostNum',
        'offline' => 'Offline',
        'protecting' => 'Protecting',
        'protection_exception' => 'ProtectionException',
        'risk' => 'Risk',
        'unprotected' => 'Unprotected',
        'unprotected_cpu' => 'UnprotectedCpu',
        'virus' => 'Virus',
        'vuln' => 'Vuln'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'alarm' => 'setAlarm',
        'baseline' => 'setBaseline',
        'cpu' => 'setCpu',
        'host_num' => 'setHostNum',
        'offline' => 'setOffline',
        'protecting' => 'setProtecting',
        'protection_exception' => 'setProtectionException',
        'risk' => 'setRisk',
        'unprotected' => 'setUnprotected',
        'unprotected_cpu' => 'setUnprotectedCpu',
        'virus' => 'setVirus',
        'vuln' => 'setVuln'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'alarm' => 'getAlarm',
        'baseline' => 'getBaseline',
        'cpu' => 'getCpu',
        'host_num' => 'getHostNum',
        'offline' => 'getOffline',
        'protecting' => 'getProtecting',
        'protection_exception' => 'getProtectionException',
        'risk' => 'getRisk',
        'unprotected' => 'getUnprotected',
        'unprotected_cpu' => 'getUnprotectedCpu',
        'virus' => 'getVirus',
        'vuln' => 'getVuln'
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
        $this->container['alarm'] = isset($data['alarm']) ? $data['alarm'] : null;
        $this->container['baseline'] = isset($data['baseline']) ? $data['baseline'] : null;
        $this->container['cpu'] = isset($data['cpu']) ? $data['cpu'] : null;
        $this->container['host_num'] = isset($data['host_num']) ? $data['host_num'] : null;
        $this->container['offline'] = isset($data['offline']) ? $data['offline'] : null;
        $this->container['protecting'] = isset($data['protecting']) ? $data['protecting'] : null;
        $this->container['protection_exception'] = isset($data['protection_exception']) ? $data['protection_exception'] : null;
        $this->container['risk'] = isset($data['risk']) ? $data['risk'] : null;
        $this->container['unprotected'] = isset($data['unprotected']) ? $data['unprotected'] : null;
        $this->container['unprotected_cpu'] = isset($data['unprotected_cpu']) ? $data['unprotected_cpu'] : null;
        $this->container['virus'] = isset($data['virus']) ? $data['virus'] : null;
        $this->container['vuln'] = isset($data['vuln']) ? $data['vuln'] : null;
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
     * Gets alarm
     *
     * @return int
     */
    public function getAlarm()
    {
        return $this->container['alarm'];
    }

    /**
     * Sets alarm
     *
     * @param int $alarm alarm
     *
     * @return $this
     */
    public function setAlarm($alarm)
    {
        $this->container['alarm'] = $alarm;

        return $this;
    }

    /**
     * Gets baseline
     *
     * @return int
     */
    public function getBaseline()
    {
        return $this->container['baseline'];
    }

    /**
     * Sets baseline
     *
     * @param int $baseline baseline
     *
     * @return $this
     */
    public function setBaseline($baseline)
    {
        $this->container['baseline'] = $baseline;

        return $this;
    }

    /**
     * Gets cpu
     *
     * @return int
     */
    public function getCpu()
    {
        return $this->container['cpu'];
    }

    /**
     * Sets cpu
     *
     * @param int $cpu cpu
     *
     * @return $this
     */
    public function setCpu($cpu)
    {
        $this->container['cpu'] = $cpu;

        return $this;
    }

    /**
     * Gets host_num
     *
     * @return int
     */
    public function getHostNum()
    {
        return $this->container['host_num'];
    }

    /**
     * Sets host_num
     *
     * @param int $host_num host_num
     *
     * @return $this
     */
    public function setHostNum($host_num)
    {
        $this->container['host_num'] = $host_num;

        return $this;
    }

    /**
     * Gets offline
     *
     * @return int
     */
    public function getOffline()
    {
        return $this->container['offline'];
    }

    /**
     * Sets offline
     *
     * @param int $offline offline
     *
     * @return $this
     */
    public function setOffline($offline)
    {
        $this->container['offline'] = $offline;

        return $this;
    }

    /**
     * Gets protecting
     *
     * @return int
     */
    public function getProtecting()
    {
        return $this->container['protecting'];
    }

    /**
     * Sets protecting
     *
     * @param int $protecting protecting
     *
     * @return $this
     */
    public function setProtecting($protecting)
    {
        $this->container['protecting'] = $protecting;

        return $this;
    }

    /**
     * Gets protection_exception
     *
     * @return int
     */
    public function getProtectionException()
    {
        return $this->container['protection_exception'];
    }

    /**
     * Sets protection_exception
     *
     * @param int $protection_exception protection_exception
     *
     * @return $this
     */
    public function setProtectionException($protection_exception)
    {
        $this->container['protection_exception'] = $protection_exception;

        return $this;
    }

    /**
     * Gets risk
     *
     * @return int
     */
    public function getRisk()
    {
        return $this->container['risk'];
    }

    /**
     * Sets risk
     *
     * @param int $risk risk
     *
     * @return $this
     */
    public function setRisk($risk)
    {
        $this->container['risk'] = $risk;

        return $this;
    }

    /**
     * Gets unprotected
     *
     * @return int
     */
    public function getUnprotected()
    {
        return $this->container['unprotected'];
    }

    /**
     * Sets unprotected
     *
     * @param int $unprotected unprotected
     *
     * @return $this
     */
    public function setUnprotected($unprotected)
    {
        $this->container['unprotected'] = $unprotected;

        return $this;
    }

    /**
     * Gets unprotected_cpu
     *
     * @return int
     */
    public function getUnprotectedCpu()
    {
        return $this->container['unprotected_cpu'];
    }

    /**
     * Sets unprotected_cpu
     *
     * @param int $unprotected_cpu unprotected_cpu
     *
     * @return $this
     */
    public function setUnprotectedCpu($unprotected_cpu)
    {
        $this->container['unprotected_cpu'] = $unprotected_cpu;

        return $this;
    }

    /**
     * Gets virus
     *
     * @return int
     */
    public function getVirus()
    {
        return $this->container['virus'];
    }

    /**
     * Sets virus
     *
     * @param int $virus virus
     *
     * @return $this
     */
    public function setVirus($virus)
    {
        $this->container['virus'] = $virus;

        return $this;
    }

    /**
     * Gets vuln
     *
     * @return int
     */
    public function getVuln()
    {
        return $this->container['vuln'];
    }

    /**
     * Sets vuln
     *
     * @param int $vuln vuln
     *
     * @return $this
     */
    public function setVuln($vuln)
    {
        $this->container['vuln'] = $vuln;

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

