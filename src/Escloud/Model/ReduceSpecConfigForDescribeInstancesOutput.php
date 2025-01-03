<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Escloud\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class ReduceSpecConfigForDescribeInstancesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ReduceSpecConfigForDescribeInstancesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'cold_node_num' => 'int',
        'data_node_num' => 'int',
        'enable_pure_master' => 'bool',
        'master_node_num' => 'int',
        'warm_node_num' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'cold_node_num' => 'int32',
        'data_node_num' => 'int32',
        'enable_pure_master' => null,
        'master_node_num' => 'int32',
        'warm_node_num' => 'int32'
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
        'cold_node_num' => 'ColdNodeNum',
        'data_node_num' => 'DataNodeNum',
        'enable_pure_master' => 'EnablePureMaster',
        'master_node_num' => 'MasterNodeNum',
        'warm_node_num' => 'WarmNodeNum'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cold_node_num' => 'setColdNodeNum',
        'data_node_num' => 'setDataNodeNum',
        'enable_pure_master' => 'setEnablePureMaster',
        'master_node_num' => 'setMasterNodeNum',
        'warm_node_num' => 'setWarmNodeNum'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cold_node_num' => 'getColdNodeNum',
        'data_node_num' => 'getDataNodeNum',
        'enable_pure_master' => 'getEnablePureMaster',
        'master_node_num' => 'getMasterNodeNum',
        'warm_node_num' => 'getWarmNodeNum'
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
        $this->container['cold_node_num'] = isset($data['cold_node_num']) ? $data['cold_node_num'] : null;
        $this->container['data_node_num'] = isset($data['data_node_num']) ? $data['data_node_num'] : null;
        $this->container['enable_pure_master'] = isset($data['enable_pure_master']) ? $data['enable_pure_master'] : null;
        $this->container['master_node_num'] = isset($data['master_node_num']) ? $data['master_node_num'] : null;
        $this->container['warm_node_num'] = isset($data['warm_node_num']) ? $data['warm_node_num'] : null;
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
     * Gets cold_node_num
     *
     * @return int
     */
    public function getColdNodeNum()
    {
        return $this->container['cold_node_num'];
    }

    /**
     * Sets cold_node_num
     *
     * @param int $cold_node_num cold_node_num
     *
     * @return $this
     */
    public function setColdNodeNum($cold_node_num)
    {
        $this->container['cold_node_num'] = $cold_node_num;

        return $this;
    }

    /**
     * Gets data_node_num
     *
     * @return int
     */
    public function getDataNodeNum()
    {
        return $this->container['data_node_num'];
    }

    /**
     * Sets data_node_num
     *
     * @param int $data_node_num data_node_num
     *
     * @return $this
     */
    public function setDataNodeNum($data_node_num)
    {
        $this->container['data_node_num'] = $data_node_num;

        return $this;
    }

    /**
     * Gets enable_pure_master
     *
     * @return bool
     */
    public function getEnablePureMaster()
    {
        return $this->container['enable_pure_master'];
    }

    /**
     * Sets enable_pure_master
     *
     * @param bool $enable_pure_master enable_pure_master
     *
     * @return $this
     */
    public function setEnablePureMaster($enable_pure_master)
    {
        $this->container['enable_pure_master'] = $enable_pure_master;

        return $this;
    }

    /**
     * Gets master_node_num
     *
     * @return int
     */
    public function getMasterNodeNum()
    {
        return $this->container['master_node_num'];
    }

    /**
     * Sets master_node_num
     *
     * @param int $master_node_num master_node_num
     *
     * @return $this
     */
    public function setMasterNodeNum($master_node_num)
    {
        $this->container['master_node_num'] = $master_node_num;

        return $this;
    }

    /**
     * Gets warm_node_num
     *
     * @return int
     */
    public function getWarmNodeNum()
    {
        return $this->container['warm_node_num'];
    }

    /**
     * Sets warm_node_num
     *
     * @param int $warm_node_num warm_node_num
     *
     * @return $this
     */
    public function setWarmNodeNum($warm_node_num)
    {
        $this->container['warm_node_num'] = $warm_node_num;

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

