<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Cv20240606\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class DataForHairStyleOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'dataForHairStyleOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'algorithm_base_resp' => '\Volcengine\Cv20240606\Model\AlgorithmBaseRespForHairStyleOutput',
        'binary_data_base64' => 'string[]',
        'image_urls' => 'string[]',
        'resp_data' => 'string',
        'response_data' => 'string',
        'status' => 'string',
        'task_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'algorithm_base_resp' => null,
        'binary_data_base64' => null,
        'image_urls' => null,
        'resp_data' => null,
        'response_data' => null,
        'status' => null,
        'task_id' => null
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
        'algorithm_base_resp' => 'algorithm_base_resp',
        'binary_data_base64' => 'binary_data_base64',
        'image_urls' => 'image_urls',
        'resp_data' => 'resp_data',
        'response_data' => 'response_data',
        'status' => 'status',
        'task_id' => 'task_id'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'algorithm_base_resp' => 'setAlgorithmBaseResp',
        'binary_data_base64' => 'setBinaryDataBase64',
        'image_urls' => 'setImageUrls',
        'resp_data' => 'setRespData',
        'response_data' => 'setResponseData',
        'status' => 'setStatus',
        'task_id' => 'setTaskId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'algorithm_base_resp' => 'getAlgorithmBaseResp',
        'binary_data_base64' => 'getBinaryDataBase64',
        'image_urls' => 'getImageUrls',
        'resp_data' => 'getRespData',
        'response_data' => 'getResponseData',
        'status' => 'getStatus',
        'task_id' => 'getTaskId'
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
        $this->container['algorithm_base_resp'] = isset($data['algorithm_base_resp']) ? $data['algorithm_base_resp'] : null;
        $this->container['binary_data_base64'] = isset($data['binary_data_base64']) ? $data['binary_data_base64'] : null;
        $this->container['image_urls'] = isset($data['image_urls']) ? $data['image_urls'] : null;
        $this->container['resp_data'] = isset($data['resp_data']) ? $data['resp_data'] : null;
        $this->container['response_data'] = isset($data['response_data']) ? $data['response_data'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['task_id'] = isset($data['task_id']) ? $data['task_id'] : null;
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
     * Gets algorithm_base_resp
     *
     * @return \Volcengine\Cv20240606\Model\AlgorithmBaseRespForHairStyleOutput
     */
    public function getAlgorithmBaseResp()
    {
        return $this->container['algorithm_base_resp'];
    }

    /**
     * Sets algorithm_base_resp
     *
     * @param \Volcengine\Cv20240606\Model\AlgorithmBaseRespForHairStyleOutput $algorithm_base_resp algorithm_base_resp
     *
     * @return $this
     */
    public function setAlgorithmBaseResp($algorithm_base_resp)
    {
        $this->container['algorithm_base_resp'] = $algorithm_base_resp;

        return $this;
    }

    /**
     * Gets binary_data_base64
     *
     * @return string[]
     */
    public function getBinaryDataBase64()
    {
        return $this->container['binary_data_base64'];
    }

    /**
     * Sets binary_data_base64
     *
     * @param string[] $binary_data_base64 binary_data_base64
     *
     * @return $this
     */
    public function setBinaryDataBase64($binary_data_base64)
    {
        $this->container['binary_data_base64'] = $binary_data_base64;

        return $this;
    }

    /**
     * Gets image_urls
     *
     * @return string[]
     */
    public function getImageUrls()
    {
        return $this->container['image_urls'];
    }

    /**
     * Sets image_urls
     *
     * @param string[] $image_urls image_urls
     *
     * @return $this
     */
    public function setImageUrls($image_urls)
    {
        $this->container['image_urls'] = $image_urls;

        return $this;
    }

    /**
     * Gets resp_data
     *
     * @return string
     */
    public function getRespData()
    {
        return $this->container['resp_data'];
    }

    /**
     * Sets resp_data
     *
     * @param string $resp_data resp_data
     *
     * @return $this
     */
    public function setRespData($resp_data)
    {
        $this->container['resp_data'] = $resp_data;

        return $this;
    }

    /**
     * Gets response_data
     *
     * @return string
     */
    public function getResponseData()
    {
        return $this->container['response_data'];
    }

    /**
     * Sets response_data
     *
     * @param string $response_data response_data
     *
     * @return $this
     */
    public function setResponseData($response_data)
    {
        $this->container['response_data'] = $response_data;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets task_id
     *
     * @return string
     */
    public function getTaskId()
    {
        return $this->container['task_id'];
    }

    /**
     * Sets task_id
     *
     * @param string $task_id task_id
     *
     * @return $this
     */
    public function setTaskId($task_id)
    {
        $this->container['task_id'] = $task_id;

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

