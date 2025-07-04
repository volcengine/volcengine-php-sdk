<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Mlplatform20240701\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class ItemForListInstanceTypesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ItemForListInstanceTypesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'available_gpu_memory_mi_b' => 'int',
        'cpu' => 'double',
        'eni_count' => 'int',
        'eni_maximum_bandwidth_mbps' => 'int',
        'family' => 'string',
        'gpu_count' => 'int',
        'gpu_memory_mi_b' => 'int',
        'gpu_type' => 'string',
        'id' => 'string',
        'kind' => 'string',
        'memory_mi_b' => 'double',
        'nvme_ssd_count' => 'int',
        'price_by_day' => 'double',
        'price_by_hour' => 'double',
        'price_by_month' => 'double',
        'rdma_eni_count' => 'int',
        'rdma_eni_maximum_bandwidth_mbps' => 'int',
        'reservation_plan_price_by_hour' => 'double',
        'volume_maximum_bandwidth_mbps' => 'int',
        'volume_maximum_iops' => 'int',
        'volume_supported_types' => 'string[]',
        'zone_info' => '\Volcengine\Mlplatform20240701\Model\ZoneInfoForListInstanceTypesOutput[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'available_gpu_memory_mi_b' => 'int32',
        'cpu' => 'double',
        'eni_count' => 'int32',
        'eni_maximum_bandwidth_mbps' => 'int32',
        'family' => null,
        'gpu_count' => 'int32',
        'gpu_memory_mi_b' => 'int32',
        'gpu_type' => null,
        'id' => null,
        'kind' => null,
        'memory_mi_b' => 'double',
        'nvme_ssd_count' => 'int32',
        'price_by_day' => 'double',
        'price_by_hour' => 'double',
        'price_by_month' => 'double',
        'rdma_eni_count' => 'int32',
        'rdma_eni_maximum_bandwidth_mbps' => 'int32',
        'reservation_plan_price_by_hour' => 'double',
        'volume_maximum_bandwidth_mbps' => 'int32',
        'volume_maximum_iops' => 'int32',
        'volume_supported_types' => null,
        'zone_info' => null
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
        'available_gpu_memory_mi_b' => 'AvailableGPUMemoryMiB',
        'cpu' => 'Cpu',
        'eni_count' => 'EniCount',
        'eni_maximum_bandwidth_mbps' => 'EniMaximumBandwidthMbps',
        'family' => 'Family',
        'gpu_count' => 'GpuCount',
        'gpu_memory_mi_b' => 'GpuMemoryMiB',
        'gpu_type' => 'GpuType',
        'id' => 'Id',
        'kind' => 'Kind',
        'memory_mi_b' => 'MemoryMiB',
        'nvme_ssd_count' => 'NvmeSsdCount',
        'price_by_day' => 'PriceByDay',
        'price_by_hour' => 'PriceByHour',
        'price_by_month' => 'PriceByMonth',
        'rdma_eni_count' => 'RdmaEniCount',
        'rdma_eni_maximum_bandwidth_mbps' => 'RdmaEniMaximumBandwidthMbps',
        'reservation_plan_price_by_hour' => 'ReservationPlanPriceByHour',
        'volume_maximum_bandwidth_mbps' => 'VolumeMaximumBandwidthMbps',
        'volume_maximum_iops' => 'VolumeMaximumIops',
        'volume_supported_types' => 'VolumeSupportedTypes',
        'zone_info' => 'ZoneInfo'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'available_gpu_memory_mi_b' => 'setAvailableGpuMemoryMiB',
        'cpu' => 'setCpu',
        'eni_count' => 'setEniCount',
        'eni_maximum_bandwidth_mbps' => 'setEniMaximumBandwidthMbps',
        'family' => 'setFamily',
        'gpu_count' => 'setGpuCount',
        'gpu_memory_mi_b' => 'setGpuMemoryMiB',
        'gpu_type' => 'setGpuType',
        'id' => 'setId',
        'kind' => 'setKind',
        'memory_mi_b' => 'setMemoryMiB',
        'nvme_ssd_count' => 'setNvmeSsdCount',
        'price_by_day' => 'setPriceByDay',
        'price_by_hour' => 'setPriceByHour',
        'price_by_month' => 'setPriceByMonth',
        'rdma_eni_count' => 'setRdmaEniCount',
        'rdma_eni_maximum_bandwidth_mbps' => 'setRdmaEniMaximumBandwidthMbps',
        'reservation_plan_price_by_hour' => 'setReservationPlanPriceByHour',
        'volume_maximum_bandwidth_mbps' => 'setVolumeMaximumBandwidthMbps',
        'volume_maximum_iops' => 'setVolumeMaximumIops',
        'volume_supported_types' => 'setVolumeSupportedTypes',
        'zone_info' => 'setZoneInfo'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'available_gpu_memory_mi_b' => 'getAvailableGpuMemoryMiB',
        'cpu' => 'getCpu',
        'eni_count' => 'getEniCount',
        'eni_maximum_bandwidth_mbps' => 'getEniMaximumBandwidthMbps',
        'family' => 'getFamily',
        'gpu_count' => 'getGpuCount',
        'gpu_memory_mi_b' => 'getGpuMemoryMiB',
        'gpu_type' => 'getGpuType',
        'id' => 'getId',
        'kind' => 'getKind',
        'memory_mi_b' => 'getMemoryMiB',
        'nvme_ssd_count' => 'getNvmeSsdCount',
        'price_by_day' => 'getPriceByDay',
        'price_by_hour' => 'getPriceByHour',
        'price_by_month' => 'getPriceByMonth',
        'rdma_eni_count' => 'getRdmaEniCount',
        'rdma_eni_maximum_bandwidth_mbps' => 'getRdmaEniMaximumBandwidthMbps',
        'reservation_plan_price_by_hour' => 'getReservationPlanPriceByHour',
        'volume_maximum_bandwidth_mbps' => 'getVolumeMaximumBandwidthMbps',
        'volume_maximum_iops' => 'getVolumeMaximumIops',
        'volume_supported_types' => 'getVolumeSupportedTypes',
        'zone_info' => 'getZoneInfo'
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

    const KIND_GPU = 'GPU';
    const KIND_MEMORY = 'Memory';
    const KIND_COMPUTE = 'Compute';
    const KIND_GENERAL = 'General';
    const KIND_RDMA = 'Rdma';
    const KIND_HIGH_FREQUENCY = 'HighFrequency';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getKindAllowableValues()
    {
        return [
            self::KIND_GPU,
            self::KIND_MEMORY,
            self::KIND_COMPUTE,
            self::KIND_GENERAL,
            self::KIND_RDMA,
            self::KIND_HIGH_FREQUENCY,
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
        $this->container['available_gpu_memory_mi_b'] = isset($data['available_gpu_memory_mi_b']) ? $data['available_gpu_memory_mi_b'] : null;
        $this->container['cpu'] = isset($data['cpu']) ? $data['cpu'] : null;
        $this->container['eni_count'] = isset($data['eni_count']) ? $data['eni_count'] : null;
        $this->container['eni_maximum_bandwidth_mbps'] = isset($data['eni_maximum_bandwidth_mbps']) ? $data['eni_maximum_bandwidth_mbps'] : null;
        $this->container['family'] = isset($data['family']) ? $data['family'] : null;
        $this->container['gpu_count'] = isset($data['gpu_count']) ? $data['gpu_count'] : null;
        $this->container['gpu_memory_mi_b'] = isset($data['gpu_memory_mi_b']) ? $data['gpu_memory_mi_b'] : null;
        $this->container['gpu_type'] = isset($data['gpu_type']) ? $data['gpu_type'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['kind'] = isset($data['kind']) ? $data['kind'] : null;
        $this->container['memory_mi_b'] = isset($data['memory_mi_b']) ? $data['memory_mi_b'] : null;
        $this->container['nvme_ssd_count'] = isset($data['nvme_ssd_count']) ? $data['nvme_ssd_count'] : null;
        $this->container['price_by_day'] = isset($data['price_by_day']) ? $data['price_by_day'] : null;
        $this->container['price_by_hour'] = isset($data['price_by_hour']) ? $data['price_by_hour'] : null;
        $this->container['price_by_month'] = isset($data['price_by_month']) ? $data['price_by_month'] : null;
        $this->container['rdma_eni_count'] = isset($data['rdma_eni_count']) ? $data['rdma_eni_count'] : null;
        $this->container['rdma_eni_maximum_bandwidth_mbps'] = isset($data['rdma_eni_maximum_bandwidth_mbps']) ? $data['rdma_eni_maximum_bandwidth_mbps'] : null;
        $this->container['reservation_plan_price_by_hour'] = isset($data['reservation_plan_price_by_hour']) ? $data['reservation_plan_price_by_hour'] : null;
        $this->container['volume_maximum_bandwidth_mbps'] = isset($data['volume_maximum_bandwidth_mbps']) ? $data['volume_maximum_bandwidth_mbps'] : null;
        $this->container['volume_maximum_iops'] = isset($data['volume_maximum_iops']) ? $data['volume_maximum_iops'] : null;
        $this->container['volume_supported_types'] = isset($data['volume_supported_types']) ? $data['volume_supported_types'] : null;
        $this->container['zone_info'] = isset($data['zone_info']) ? $data['zone_info'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getKindAllowableValues();
        if (!is_null($this->container['kind']) && !in_array($this->container['kind'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'kind', must be one of '%s'",
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
     * Gets available_gpu_memory_mi_b
     *
     * @return int
     */
    public function getAvailableGpuMemoryMiB()
    {
        return $this->container['available_gpu_memory_mi_b'];
    }

    /**
     * Sets available_gpu_memory_mi_b
     *
     * @param int $available_gpu_memory_mi_b available_gpu_memory_mi_b
     *
     * @return $this
     */
    public function setAvailableGpuMemoryMiB($available_gpu_memory_mi_b)
    {
        $this->container['available_gpu_memory_mi_b'] = $available_gpu_memory_mi_b;

        return $this;
    }

    /**
     * Gets cpu
     *
     * @return double
     */
    public function getCpu()
    {
        return $this->container['cpu'];
    }

    /**
     * Sets cpu
     *
     * @param double $cpu cpu
     *
     * @return $this
     */
    public function setCpu($cpu)
    {
        $this->container['cpu'] = $cpu;

        return $this;
    }

    /**
     * Gets eni_count
     *
     * @return int
     */
    public function getEniCount()
    {
        return $this->container['eni_count'];
    }

    /**
     * Sets eni_count
     *
     * @param int $eni_count eni_count
     *
     * @return $this
     */
    public function setEniCount($eni_count)
    {
        $this->container['eni_count'] = $eni_count;

        return $this;
    }

    /**
     * Gets eni_maximum_bandwidth_mbps
     *
     * @return int
     */
    public function getEniMaximumBandwidthMbps()
    {
        return $this->container['eni_maximum_bandwidth_mbps'];
    }

    /**
     * Sets eni_maximum_bandwidth_mbps
     *
     * @param int $eni_maximum_bandwidth_mbps eni_maximum_bandwidth_mbps
     *
     * @return $this
     */
    public function setEniMaximumBandwidthMbps($eni_maximum_bandwidth_mbps)
    {
        $this->container['eni_maximum_bandwidth_mbps'] = $eni_maximum_bandwidth_mbps;

        return $this;
    }

    /**
     * Gets family
     *
     * @return string
     */
    public function getFamily()
    {
        return $this->container['family'];
    }

    /**
     * Sets family
     *
     * @param string $family family
     *
     * @return $this
     */
    public function setFamily($family)
    {
        $this->container['family'] = $family;

        return $this;
    }

    /**
     * Gets gpu_count
     *
     * @return int
     */
    public function getGpuCount()
    {
        return $this->container['gpu_count'];
    }

    /**
     * Sets gpu_count
     *
     * @param int $gpu_count gpu_count
     *
     * @return $this
     */
    public function setGpuCount($gpu_count)
    {
        $this->container['gpu_count'] = $gpu_count;

        return $this;
    }

    /**
     * Gets gpu_memory_mi_b
     *
     * @return int
     */
    public function getGpuMemoryMiB()
    {
        return $this->container['gpu_memory_mi_b'];
    }

    /**
     * Sets gpu_memory_mi_b
     *
     * @param int $gpu_memory_mi_b gpu_memory_mi_b
     *
     * @return $this
     */
    public function setGpuMemoryMiB($gpu_memory_mi_b)
    {
        $this->container['gpu_memory_mi_b'] = $gpu_memory_mi_b;

        return $this;
    }

    /**
     * Gets gpu_type
     *
     * @return string
     */
    public function getGpuType()
    {
        return $this->container['gpu_type'];
    }

    /**
     * Sets gpu_type
     *
     * @param string $gpu_type gpu_type
     *
     * @return $this
     */
    public function setGpuType($gpu_type)
    {
        $this->container['gpu_type'] = $gpu_type;

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
     * Gets kind
     *
     * @return string
     */
    public function getKind()
    {
        return $this->container['kind'];
    }

    /**
     * Sets kind
     *
     * @param string $kind kind
     *
     * @return $this
     */
    public function setKind($kind)
    {
        $allowedValues = $this->getKindAllowableValues();
        if (!is_null($kind) && !in_array($kind, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'kind', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['kind'] = $kind;

        return $this;
    }

    /**
     * Gets memory_mi_b
     *
     * @return double
     */
    public function getMemoryMiB()
    {
        return $this->container['memory_mi_b'];
    }

    /**
     * Sets memory_mi_b
     *
     * @param double $memory_mi_b memory_mi_b
     *
     * @return $this
     */
    public function setMemoryMiB($memory_mi_b)
    {
        $this->container['memory_mi_b'] = $memory_mi_b;

        return $this;
    }

    /**
     * Gets nvme_ssd_count
     *
     * @return int
     */
    public function getNvmeSsdCount()
    {
        return $this->container['nvme_ssd_count'];
    }

    /**
     * Sets nvme_ssd_count
     *
     * @param int $nvme_ssd_count nvme_ssd_count
     *
     * @return $this
     */
    public function setNvmeSsdCount($nvme_ssd_count)
    {
        $this->container['nvme_ssd_count'] = $nvme_ssd_count;

        return $this;
    }

    /**
     * Gets price_by_day
     *
     * @return double
     */
    public function getPriceByDay()
    {
        return $this->container['price_by_day'];
    }

    /**
     * Sets price_by_day
     *
     * @param double $price_by_day price_by_day
     *
     * @return $this
     */
    public function setPriceByDay($price_by_day)
    {
        $this->container['price_by_day'] = $price_by_day;

        return $this;
    }

    /**
     * Gets price_by_hour
     *
     * @return double
     */
    public function getPriceByHour()
    {
        return $this->container['price_by_hour'];
    }

    /**
     * Sets price_by_hour
     *
     * @param double $price_by_hour price_by_hour
     *
     * @return $this
     */
    public function setPriceByHour($price_by_hour)
    {
        $this->container['price_by_hour'] = $price_by_hour;

        return $this;
    }

    /**
     * Gets price_by_month
     *
     * @return double
     */
    public function getPriceByMonth()
    {
        return $this->container['price_by_month'];
    }

    /**
     * Sets price_by_month
     *
     * @param double $price_by_month price_by_month
     *
     * @return $this
     */
    public function setPriceByMonth($price_by_month)
    {
        $this->container['price_by_month'] = $price_by_month;

        return $this;
    }

    /**
     * Gets rdma_eni_count
     *
     * @return int
     */
    public function getRdmaEniCount()
    {
        return $this->container['rdma_eni_count'];
    }

    /**
     * Sets rdma_eni_count
     *
     * @param int $rdma_eni_count rdma_eni_count
     *
     * @return $this
     */
    public function setRdmaEniCount($rdma_eni_count)
    {
        $this->container['rdma_eni_count'] = $rdma_eni_count;

        return $this;
    }

    /**
     * Gets rdma_eni_maximum_bandwidth_mbps
     *
     * @return int
     */
    public function getRdmaEniMaximumBandwidthMbps()
    {
        return $this->container['rdma_eni_maximum_bandwidth_mbps'];
    }

    /**
     * Sets rdma_eni_maximum_bandwidth_mbps
     *
     * @param int $rdma_eni_maximum_bandwidth_mbps rdma_eni_maximum_bandwidth_mbps
     *
     * @return $this
     */
    public function setRdmaEniMaximumBandwidthMbps($rdma_eni_maximum_bandwidth_mbps)
    {
        $this->container['rdma_eni_maximum_bandwidth_mbps'] = $rdma_eni_maximum_bandwidth_mbps;

        return $this;
    }

    /**
     * Gets reservation_plan_price_by_hour
     *
     * @return double
     */
    public function getReservationPlanPriceByHour()
    {
        return $this->container['reservation_plan_price_by_hour'];
    }

    /**
     * Sets reservation_plan_price_by_hour
     *
     * @param double $reservation_plan_price_by_hour reservation_plan_price_by_hour
     *
     * @return $this
     */
    public function setReservationPlanPriceByHour($reservation_plan_price_by_hour)
    {
        $this->container['reservation_plan_price_by_hour'] = $reservation_plan_price_by_hour;

        return $this;
    }

    /**
     * Gets volume_maximum_bandwidth_mbps
     *
     * @return int
     */
    public function getVolumeMaximumBandwidthMbps()
    {
        return $this->container['volume_maximum_bandwidth_mbps'];
    }

    /**
     * Sets volume_maximum_bandwidth_mbps
     *
     * @param int $volume_maximum_bandwidth_mbps volume_maximum_bandwidth_mbps
     *
     * @return $this
     */
    public function setVolumeMaximumBandwidthMbps($volume_maximum_bandwidth_mbps)
    {
        $this->container['volume_maximum_bandwidth_mbps'] = $volume_maximum_bandwidth_mbps;

        return $this;
    }

    /**
     * Gets volume_maximum_iops
     *
     * @return int
     */
    public function getVolumeMaximumIops()
    {
        return $this->container['volume_maximum_iops'];
    }

    /**
     * Sets volume_maximum_iops
     *
     * @param int $volume_maximum_iops volume_maximum_iops
     *
     * @return $this
     */
    public function setVolumeMaximumIops($volume_maximum_iops)
    {
        $this->container['volume_maximum_iops'] = $volume_maximum_iops;

        return $this;
    }

    /**
     * Gets volume_supported_types
     *
     * @return string[]
     */
    public function getVolumeSupportedTypes()
    {
        return $this->container['volume_supported_types'];
    }

    /**
     * Sets volume_supported_types
     *
     * @param string[] $volume_supported_types volume_supported_types
     *
     * @return $this
     */
    public function setVolumeSupportedTypes($volume_supported_types)
    {
        $this->container['volume_supported_types'] = $volume_supported_types;

        return $this;
    }

    /**
     * Gets zone_info
     *
     * @return \Volcengine\Mlplatform20240701\Model\ZoneInfoForListInstanceTypesOutput[]
     */
    public function getZoneInfo()
    {
        return $this->container['zone_info'];
    }

    /**
     * Sets zone_info
     *
     * @param \Volcengine\Mlplatform20240701\Model\ZoneInfoForListInstanceTypesOutput[] $zone_info zone_info
     *
     * @return $this
     */
    public function setZoneInfo($zone_info)
    {
        $this->container['zone_info'] = $zone_info;

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

