<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Ark\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class TrainingSetForCreateModelCustomizationJobInput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'TrainingSetForCreateModelCustomizationJobInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'datasets' => '\Volcengine\Ark\Model\DatasetForCreateModelCustomizationJobInput[]',
        'preset_data' => 'string',
        'preset_data_percentage' => 'int',
        'preset_datasets' => '\Volcengine\Ark\Model\PresetDatasetForCreateModelCustomizationJobInput[]',
        'tos_bucket' => 'string',
        'tos_paths' => 'string[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'datasets' => null,
        'preset_data' => null,
        'preset_data_percentage' => 'int32',
        'preset_datasets' => null,
        'tos_bucket' => null,
        'tos_paths' => null
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
        'datasets' => 'Datasets',
        'preset_data' => 'PresetData',
        'preset_data_percentage' => 'PresetDataPercentage',
        'preset_datasets' => 'PresetDatasets',
        'tos_bucket' => 'TosBucket',
        'tos_paths' => 'TosPaths'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'datasets' => 'setDatasets',
        'preset_data' => 'setPresetData',
        'preset_data_percentage' => 'setPresetDataPercentage',
        'preset_datasets' => 'setPresetDatasets',
        'tos_bucket' => 'setTosBucket',
        'tos_paths' => 'setTosPaths'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'datasets' => 'getDatasets',
        'preset_data' => 'getPresetData',
        'preset_data_percentage' => 'getPresetDataPercentage',
        'preset_datasets' => 'getPresetDatasets',
        'tos_bucket' => 'getTosBucket',
        'tos_paths' => 'getTosPaths'
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
        $this->container['datasets'] = isset($data['datasets']) ? $data['datasets'] : null;
        $this->container['preset_data'] = isset($data['preset_data']) ? $data['preset_data'] : null;
        $this->container['preset_data_percentage'] = isset($data['preset_data_percentage']) ? $data['preset_data_percentage'] : null;
        $this->container['preset_datasets'] = isset($data['preset_datasets']) ? $data['preset_datasets'] : null;
        $this->container['tos_bucket'] = isset($data['tos_bucket']) ? $data['tos_bucket'] : null;
        $this->container['tos_paths'] = isset($data['tos_paths']) ? $data['tos_paths'] : null;
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
     * Gets datasets
     *
     * @return \Volcengine\Ark\Model\DatasetForCreateModelCustomizationJobInput[]
     */
    public function getDatasets()
    {
        return $this->container['datasets'];
    }

    /**
     * Sets datasets
     *
     * @param \Volcengine\Ark\Model\DatasetForCreateModelCustomizationJobInput[] $datasets datasets
     *
     * @return $this
     */
    public function setDatasets($datasets)
    {
        $this->container['datasets'] = $datasets;

        return $this;
    }

    /**
     * Gets preset_data
     *
     * @return string
     */
    public function getPresetData()
    {
        return $this->container['preset_data'];
    }

    /**
     * Sets preset_data
     *
     * @param string $preset_data preset_data
     *
     * @return $this
     */
    public function setPresetData($preset_data)
    {
        $this->container['preset_data'] = $preset_data;

        return $this;
    }

    /**
     * Gets preset_data_percentage
     *
     * @return int
     */
    public function getPresetDataPercentage()
    {
        return $this->container['preset_data_percentage'];
    }

    /**
     * Sets preset_data_percentage
     *
     * @param int $preset_data_percentage preset_data_percentage
     *
     * @return $this
     */
    public function setPresetDataPercentage($preset_data_percentage)
    {
        $this->container['preset_data_percentage'] = $preset_data_percentage;

        return $this;
    }

    /**
     * Gets preset_datasets
     *
     * @return \Volcengine\Ark\Model\PresetDatasetForCreateModelCustomizationJobInput[]
     */
    public function getPresetDatasets()
    {
        return $this->container['preset_datasets'];
    }

    /**
     * Sets preset_datasets
     *
     * @param \Volcengine\Ark\Model\PresetDatasetForCreateModelCustomizationJobInput[] $preset_datasets preset_datasets
     *
     * @return $this
     */
    public function setPresetDatasets($preset_datasets)
    {
        $this->container['preset_datasets'] = $preset_datasets;

        return $this;
    }

    /**
     * Gets tos_bucket
     *
     * @return string
     */
    public function getTosBucket()
    {
        return $this->container['tos_bucket'];
    }

    /**
     * Sets tos_bucket
     *
     * @param string $tos_bucket tos_bucket
     *
     * @return $this
     */
    public function setTosBucket($tos_bucket)
    {
        $this->container['tos_bucket'] = $tos_bucket;

        return $this;
    }

    /**
     * Gets tos_paths
     *
     * @return string[]
     */
    public function getTosPaths()
    {
        return $this->container['tos_paths'];
    }

    /**
     * Sets tos_paths
     *
     * @param string[] $tos_paths tos_paths
     *
     * @return $this
     */
    public function setTosPaths($tos_paths)
    {
        $this->container['tos_paths'] = $tos_paths;

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

