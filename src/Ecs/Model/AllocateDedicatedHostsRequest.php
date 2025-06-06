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

class AllocateDedicatedHostsRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'AllocateDedicatedHostsRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'auto_placement' => 'string',
        'auto_renew' => 'bool',
        'auto_renew_period' => 'int',
        'charge_type' => 'string',
        'client_token' => 'string',
        'count' => 'int',
        'cpu_overcommit_ratio' => 'double',
        'dedicated_host_cluster_id' => 'string',
        'dedicated_host_name' => 'string',
        'dedicated_host_recovery' => 'string',
        'dedicated_host_type_id' => 'string',
        'description' => 'string',
        'dry_run' => 'bool',
        'period' => 'int',
        'period_unit' => 'string',
        'zone_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'auto_placement' => null,
        'auto_renew' => null,
        'auto_renew_period' => 'int32',
        'charge_type' => null,
        'client_token' => null,
        'count' => 'int32',
        'cpu_overcommit_ratio' => 'double',
        'dedicated_host_cluster_id' => null,
        'dedicated_host_name' => null,
        'dedicated_host_recovery' => null,
        'dedicated_host_type_id' => null,
        'description' => null,
        'dry_run' => null,
        'period' => 'int32',
        'period_unit' => null,
        'zone_id' => null
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
        'auto_placement' => 'AutoPlacement',
        'auto_renew' => 'AutoRenew',
        'auto_renew_period' => 'AutoRenewPeriod',
        'charge_type' => 'ChargeType',
        'client_token' => 'ClientToken',
        'count' => 'Count',
        'cpu_overcommit_ratio' => 'CpuOvercommitRatio',
        'dedicated_host_cluster_id' => 'DedicatedHostClusterId',
        'dedicated_host_name' => 'DedicatedHostName',
        'dedicated_host_recovery' => 'DedicatedHostRecovery',
        'dedicated_host_type_id' => 'DedicatedHostTypeId',
        'description' => 'Description',
        'dry_run' => 'DryRun',
        'period' => 'Period',
        'period_unit' => 'PeriodUnit',
        'zone_id' => 'ZoneId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'auto_placement' => 'setAutoPlacement',
        'auto_renew' => 'setAutoRenew',
        'auto_renew_period' => 'setAutoRenewPeriod',
        'charge_type' => 'setChargeType',
        'client_token' => 'setClientToken',
        'count' => 'setCount',
        'cpu_overcommit_ratio' => 'setCpuOvercommitRatio',
        'dedicated_host_cluster_id' => 'setDedicatedHostClusterId',
        'dedicated_host_name' => 'setDedicatedHostName',
        'dedicated_host_recovery' => 'setDedicatedHostRecovery',
        'dedicated_host_type_id' => 'setDedicatedHostTypeId',
        'description' => 'setDescription',
        'dry_run' => 'setDryRun',
        'period' => 'setPeriod',
        'period_unit' => 'setPeriodUnit',
        'zone_id' => 'setZoneId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'auto_placement' => 'getAutoPlacement',
        'auto_renew' => 'getAutoRenew',
        'auto_renew_period' => 'getAutoRenewPeriod',
        'charge_type' => 'getChargeType',
        'client_token' => 'getClientToken',
        'count' => 'getCount',
        'cpu_overcommit_ratio' => 'getCpuOvercommitRatio',
        'dedicated_host_cluster_id' => 'getDedicatedHostClusterId',
        'dedicated_host_name' => 'getDedicatedHostName',
        'dedicated_host_recovery' => 'getDedicatedHostRecovery',
        'dedicated_host_type_id' => 'getDedicatedHostTypeId',
        'description' => 'getDescription',
        'dry_run' => 'getDryRun',
        'period' => 'getPeriod',
        'period_unit' => 'getPeriodUnit',
        'zone_id' => 'getZoneId'
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
        $this->container['auto_placement'] = isset($data['auto_placement']) ? $data['auto_placement'] : null;
        $this->container['auto_renew'] = isset($data['auto_renew']) ? $data['auto_renew'] : null;
        $this->container['auto_renew_period'] = isset($data['auto_renew_period']) ? $data['auto_renew_period'] : null;
        $this->container['charge_type'] = isset($data['charge_type']) ? $data['charge_type'] : null;
        $this->container['client_token'] = isset($data['client_token']) ? $data['client_token'] : null;
        $this->container['count'] = isset($data['count']) ? $data['count'] : null;
        $this->container['cpu_overcommit_ratio'] = isset($data['cpu_overcommit_ratio']) ? $data['cpu_overcommit_ratio'] : null;
        $this->container['dedicated_host_cluster_id'] = isset($data['dedicated_host_cluster_id']) ? $data['dedicated_host_cluster_id'] : null;
        $this->container['dedicated_host_name'] = isset($data['dedicated_host_name']) ? $data['dedicated_host_name'] : null;
        $this->container['dedicated_host_recovery'] = isset($data['dedicated_host_recovery']) ? $data['dedicated_host_recovery'] : null;
        $this->container['dedicated_host_type_id'] = isset($data['dedicated_host_type_id']) ? $data['dedicated_host_type_id'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['dry_run'] = isset($data['dry_run']) ? $data['dry_run'] : null;
        $this->container['period'] = isset($data['period']) ? $data['period'] : null;
        $this->container['period_unit'] = isset($data['period_unit']) ? $data['period_unit'] : null;
        $this->container['zone_id'] = isset($data['zone_id']) ? $data['zone_id'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['dedicated_host_name'] === null) {
            $invalidProperties[] = "'dedicated_host_name' can't be null";
        }
        if ($this->container['dedicated_host_type_id'] === null) {
            $invalidProperties[] = "'dedicated_host_type_id' can't be null";
        }
        if ($this->container['zone_id'] === null) {
            $invalidProperties[] = "'zone_id' can't be null";
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
     * Gets auto_placement
     *
     * @return string
     */
    public function getAutoPlacement()
    {
        return $this->container['auto_placement'];
    }

    /**
     * Sets auto_placement
     *
     * @param string $auto_placement auto_placement
     *
     * @return $this
     */
    public function setAutoPlacement($auto_placement)
    {
        $this->container['auto_placement'] = $auto_placement;

        return $this;
    }

    /**
     * Gets auto_renew
     *
     * @return bool
     */
    public function getAutoRenew()
    {
        return $this->container['auto_renew'];
    }

    /**
     * Sets auto_renew
     *
     * @param bool $auto_renew auto_renew
     *
     * @return $this
     */
    public function setAutoRenew($auto_renew)
    {
        $this->container['auto_renew'] = $auto_renew;

        return $this;
    }

    /**
     * Gets auto_renew_period
     *
     * @return int
     */
    public function getAutoRenewPeriod()
    {
        return $this->container['auto_renew_period'];
    }

    /**
     * Sets auto_renew_period
     *
     * @param int $auto_renew_period auto_renew_period
     *
     * @return $this
     */
    public function setAutoRenewPeriod($auto_renew_period)
    {
        $this->container['auto_renew_period'] = $auto_renew_period;

        return $this;
    }

    /**
     * Gets charge_type
     *
     * @return string
     */
    public function getChargeType()
    {
        return $this->container['charge_type'];
    }

    /**
     * Sets charge_type
     *
     * @param string $charge_type charge_type
     *
     * @return $this
     */
    public function setChargeType($charge_type)
    {
        $this->container['charge_type'] = $charge_type;

        return $this;
    }

    /**
     * Gets client_token
     *
     * @return string
     */
    public function getClientToken()
    {
        return $this->container['client_token'];
    }

    /**
     * Sets client_token
     *
     * @param string $client_token client_token
     *
     * @return $this
     */
    public function setClientToken($client_token)
    {
        $this->container['client_token'] = $client_token;

        return $this;
    }

    /**
     * Gets count
     *
     * @return int
     */
    public function getCount()
    {
        return $this->container['count'];
    }

    /**
     * Sets count
     *
     * @param int $count count
     *
     * @return $this
     */
    public function setCount($count)
    {
        $this->container['count'] = $count;

        return $this;
    }

    /**
     * Gets cpu_overcommit_ratio
     *
     * @return double
     */
    public function getCpuOvercommitRatio()
    {
        return $this->container['cpu_overcommit_ratio'];
    }

    /**
     * Sets cpu_overcommit_ratio
     *
     * @param double $cpu_overcommit_ratio cpu_overcommit_ratio
     *
     * @return $this
     */
    public function setCpuOvercommitRatio($cpu_overcommit_ratio)
    {
        $this->container['cpu_overcommit_ratio'] = $cpu_overcommit_ratio;

        return $this;
    }

    /**
     * Gets dedicated_host_cluster_id
     *
     * @return string
     */
    public function getDedicatedHostClusterId()
    {
        return $this->container['dedicated_host_cluster_id'];
    }

    /**
     * Sets dedicated_host_cluster_id
     *
     * @param string $dedicated_host_cluster_id dedicated_host_cluster_id
     *
     * @return $this
     */
    public function setDedicatedHostClusterId($dedicated_host_cluster_id)
    {
        $this->container['dedicated_host_cluster_id'] = $dedicated_host_cluster_id;

        return $this;
    }

    /**
     * Gets dedicated_host_name
     *
     * @return string
     */
    public function getDedicatedHostName()
    {
        return $this->container['dedicated_host_name'];
    }

    /**
     * Sets dedicated_host_name
     *
     * @param string $dedicated_host_name dedicated_host_name
     *
     * @return $this
     */
    public function setDedicatedHostName($dedicated_host_name)
    {
        $this->container['dedicated_host_name'] = $dedicated_host_name;

        return $this;
    }

    /**
     * Gets dedicated_host_recovery
     *
     * @return string
     */
    public function getDedicatedHostRecovery()
    {
        return $this->container['dedicated_host_recovery'];
    }

    /**
     * Sets dedicated_host_recovery
     *
     * @param string $dedicated_host_recovery dedicated_host_recovery
     *
     * @return $this
     */
    public function setDedicatedHostRecovery($dedicated_host_recovery)
    {
        $this->container['dedicated_host_recovery'] = $dedicated_host_recovery;

        return $this;
    }

    /**
     * Gets dedicated_host_type_id
     *
     * @return string
     */
    public function getDedicatedHostTypeId()
    {
        return $this->container['dedicated_host_type_id'];
    }

    /**
     * Sets dedicated_host_type_id
     *
     * @param string $dedicated_host_type_id dedicated_host_type_id
     *
     * @return $this
     */
    public function setDedicatedHostTypeId($dedicated_host_type_id)
    {
        $this->container['dedicated_host_type_id'] = $dedicated_host_type_id;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets dry_run
     *
     * @return bool
     */
    public function getDryRun()
    {
        return $this->container['dry_run'];
    }

    /**
     * Sets dry_run
     *
     * @param bool $dry_run dry_run
     *
     * @return $this
     */
    public function setDryRun($dry_run)
    {
        $this->container['dry_run'] = $dry_run;

        return $this;
    }

    /**
     * Gets period
     *
     * @return int
     */
    public function getPeriod()
    {
        return $this->container['period'];
    }

    /**
     * Sets period
     *
     * @param int $period period
     *
     * @return $this
     */
    public function setPeriod($period)
    {
        $this->container['period'] = $period;

        return $this;
    }

    /**
     * Gets period_unit
     *
     * @return string
     */
    public function getPeriodUnit()
    {
        return $this->container['period_unit'];
    }

    /**
     * Sets period_unit
     *
     * @param string $period_unit period_unit
     *
     * @return $this
     */
    public function setPeriodUnit($period_unit)
    {
        $this->container['period_unit'] = $period_unit;

        return $this;
    }

    /**
     * Gets zone_id
     *
     * @return string
     */
    public function getZoneId()
    {
        return $this->container['zone_id'];
    }

    /**
     * Sets zone_id
     *
     * @param string $zone_id zone_id
     *
     * @return $this
     */
    public function setZoneId($zone_id)
    {
        $this->container['zone_id'] = $zone_id;

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

