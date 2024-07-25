<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Cdn\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class DescribeContentQuotaResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DescribeContentQuotaResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'block_limit' => 'int',
        'block_quota' => 'int',
        'block_remain' => 'int',
        'preload_limit' => 'int',
        'preload_quota' => 'int',
        'preload_remain' => 'int',
        'refresh_dir_limit' => 'int',
        'refresh_dir_quota' => 'int',
        'refresh_dir_remain' => 'int',
        'refresh_quota' => 'int',
        'refresh_quota_limit' => 'int',
        'refresh_regex_limit' => 'int',
        'refresh_regex_quota' => 'int',
        'refresh_regex_remain' => 'int',
        'refresh_remain' => 'int',
        'unblock_limit' => 'int',
        'unblock_quota' => 'int',
        'unblock_remain' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'block_limit' => 'int64',
        'block_quota' => 'int64',
        'block_remain' => 'int64',
        'preload_limit' => 'int64',
        'preload_quota' => 'int64',
        'preload_remain' => 'int64',
        'refresh_dir_limit' => 'int64',
        'refresh_dir_quota' => 'int64',
        'refresh_dir_remain' => 'int64',
        'refresh_quota' => 'int64',
        'refresh_quota_limit' => 'int64',
        'refresh_regex_limit' => 'int64',
        'refresh_regex_quota' => 'int64',
        'refresh_regex_remain' => 'int64',
        'refresh_remain' => 'int64',
        'unblock_limit' => 'int64',
        'unblock_quota' => 'int64',
        'unblock_remain' => 'int64'
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
        'block_limit' => 'BlockLimit',
        'block_quota' => 'BlockQuota',
        'block_remain' => 'BlockRemain',
        'preload_limit' => 'PreloadLimit',
        'preload_quota' => 'PreloadQuota',
        'preload_remain' => 'PreloadRemain',
        'refresh_dir_limit' => 'RefreshDirLimit',
        'refresh_dir_quota' => 'RefreshDirQuota',
        'refresh_dir_remain' => 'RefreshDirRemain',
        'refresh_quota' => 'RefreshQuota',
        'refresh_quota_limit' => 'RefreshQuotaLimit',
        'refresh_regex_limit' => 'RefreshRegexLimit',
        'refresh_regex_quota' => 'RefreshRegexQuota',
        'refresh_regex_remain' => 'RefreshRegexRemain',
        'refresh_remain' => 'RefreshRemain',
        'unblock_limit' => 'UnblockLimit',
        'unblock_quota' => 'UnblockQuota',
        'unblock_remain' => 'UnblockRemain'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'block_limit' => 'setBlockLimit',
        'block_quota' => 'setBlockQuota',
        'block_remain' => 'setBlockRemain',
        'preload_limit' => 'setPreloadLimit',
        'preload_quota' => 'setPreloadQuota',
        'preload_remain' => 'setPreloadRemain',
        'refresh_dir_limit' => 'setRefreshDirLimit',
        'refresh_dir_quota' => 'setRefreshDirQuota',
        'refresh_dir_remain' => 'setRefreshDirRemain',
        'refresh_quota' => 'setRefreshQuota',
        'refresh_quota_limit' => 'setRefreshQuotaLimit',
        'refresh_regex_limit' => 'setRefreshRegexLimit',
        'refresh_regex_quota' => 'setRefreshRegexQuota',
        'refresh_regex_remain' => 'setRefreshRegexRemain',
        'refresh_remain' => 'setRefreshRemain',
        'unblock_limit' => 'setUnblockLimit',
        'unblock_quota' => 'setUnblockQuota',
        'unblock_remain' => 'setUnblockRemain'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'block_limit' => 'getBlockLimit',
        'block_quota' => 'getBlockQuota',
        'block_remain' => 'getBlockRemain',
        'preload_limit' => 'getPreloadLimit',
        'preload_quota' => 'getPreloadQuota',
        'preload_remain' => 'getPreloadRemain',
        'refresh_dir_limit' => 'getRefreshDirLimit',
        'refresh_dir_quota' => 'getRefreshDirQuota',
        'refresh_dir_remain' => 'getRefreshDirRemain',
        'refresh_quota' => 'getRefreshQuota',
        'refresh_quota_limit' => 'getRefreshQuotaLimit',
        'refresh_regex_limit' => 'getRefreshRegexLimit',
        'refresh_regex_quota' => 'getRefreshRegexQuota',
        'refresh_regex_remain' => 'getRefreshRegexRemain',
        'refresh_remain' => 'getRefreshRemain',
        'unblock_limit' => 'getUnblockLimit',
        'unblock_quota' => 'getUnblockQuota',
        'unblock_remain' => 'getUnblockRemain'
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
        $this->container['block_limit'] = isset($data['block_limit']) ? $data['block_limit'] : null;
        $this->container['block_quota'] = isset($data['block_quota']) ? $data['block_quota'] : null;
        $this->container['block_remain'] = isset($data['block_remain']) ? $data['block_remain'] : null;
        $this->container['preload_limit'] = isset($data['preload_limit']) ? $data['preload_limit'] : null;
        $this->container['preload_quota'] = isset($data['preload_quota']) ? $data['preload_quota'] : null;
        $this->container['preload_remain'] = isset($data['preload_remain']) ? $data['preload_remain'] : null;
        $this->container['refresh_dir_limit'] = isset($data['refresh_dir_limit']) ? $data['refresh_dir_limit'] : null;
        $this->container['refresh_dir_quota'] = isset($data['refresh_dir_quota']) ? $data['refresh_dir_quota'] : null;
        $this->container['refresh_dir_remain'] = isset($data['refresh_dir_remain']) ? $data['refresh_dir_remain'] : null;
        $this->container['refresh_quota'] = isset($data['refresh_quota']) ? $data['refresh_quota'] : null;
        $this->container['refresh_quota_limit'] = isset($data['refresh_quota_limit']) ? $data['refresh_quota_limit'] : null;
        $this->container['refresh_regex_limit'] = isset($data['refresh_regex_limit']) ? $data['refresh_regex_limit'] : null;
        $this->container['refresh_regex_quota'] = isset($data['refresh_regex_quota']) ? $data['refresh_regex_quota'] : null;
        $this->container['refresh_regex_remain'] = isset($data['refresh_regex_remain']) ? $data['refresh_regex_remain'] : null;
        $this->container['refresh_remain'] = isset($data['refresh_remain']) ? $data['refresh_remain'] : null;
        $this->container['unblock_limit'] = isset($data['unblock_limit']) ? $data['unblock_limit'] : null;
        $this->container['unblock_quota'] = isset($data['unblock_quota']) ? $data['unblock_quota'] : null;
        $this->container['unblock_remain'] = isset($data['unblock_remain']) ? $data['unblock_remain'] : null;
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
     * Gets block_limit
     *
     * @return int
     */
    public function getBlockLimit()
    {
        return $this->container['block_limit'];
    }

    /**
     * Sets block_limit
     *
     * @param int $block_limit block_limit
     *
     * @return $this
     */
    public function setBlockLimit($block_limit)
    {
        $this->container['block_limit'] = $block_limit;

        return $this;
    }

    /**
     * Gets block_quota
     *
     * @return int
     */
    public function getBlockQuota()
    {
        return $this->container['block_quota'];
    }

    /**
     * Sets block_quota
     *
     * @param int $block_quota block_quota
     *
     * @return $this
     */
    public function setBlockQuota($block_quota)
    {
        $this->container['block_quota'] = $block_quota;

        return $this;
    }

    /**
     * Gets block_remain
     *
     * @return int
     */
    public function getBlockRemain()
    {
        return $this->container['block_remain'];
    }

    /**
     * Sets block_remain
     *
     * @param int $block_remain block_remain
     *
     * @return $this
     */
    public function setBlockRemain($block_remain)
    {
        $this->container['block_remain'] = $block_remain;

        return $this;
    }

    /**
     * Gets preload_limit
     *
     * @return int
     */
    public function getPreloadLimit()
    {
        return $this->container['preload_limit'];
    }

    /**
     * Sets preload_limit
     *
     * @param int $preload_limit preload_limit
     *
     * @return $this
     */
    public function setPreloadLimit($preload_limit)
    {
        $this->container['preload_limit'] = $preload_limit;

        return $this;
    }

    /**
     * Gets preload_quota
     *
     * @return int
     */
    public function getPreloadQuota()
    {
        return $this->container['preload_quota'];
    }

    /**
     * Sets preload_quota
     *
     * @param int $preload_quota preload_quota
     *
     * @return $this
     */
    public function setPreloadQuota($preload_quota)
    {
        $this->container['preload_quota'] = $preload_quota;

        return $this;
    }

    /**
     * Gets preload_remain
     *
     * @return int
     */
    public function getPreloadRemain()
    {
        return $this->container['preload_remain'];
    }

    /**
     * Sets preload_remain
     *
     * @param int $preload_remain preload_remain
     *
     * @return $this
     */
    public function setPreloadRemain($preload_remain)
    {
        $this->container['preload_remain'] = $preload_remain;

        return $this;
    }

    /**
     * Gets refresh_dir_limit
     *
     * @return int
     */
    public function getRefreshDirLimit()
    {
        return $this->container['refresh_dir_limit'];
    }

    /**
     * Sets refresh_dir_limit
     *
     * @param int $refresh_dir_limit refresh_dir_limit
     *
     * @return $this
     */
    public function setRefreshDirLimit($refresh_dir_limit)
    {
        $this->container['refresh_dir_limit'] = $refresh_dir_limit;

        return $this;
    }

    /**
     * Gets refresh_dir_quota
     *
     * @return int
     */
    public function getRefreshDirQuota()
    {
        return $this->container['refresh_dir_quota'];
    }

    /**
     * Sets refresh_dir_quota
     *
     * @param int $refresh_dir_quota refresh_dir_quota
     *
     * @return $this
     */
    public function setRefreshDirQuota($refresh_dir_quota)
    {
        $this->container['refresh_dir_quota'] = $refresh_dir_quota;

        return $this;
    }

    /**
     * Gets refresh_dir_remain
     *
     * @return int
     */
    public function getRefreshDirRemain()
    {
        return $this->container['refresh_dir_remain'];
    }

    /**
     * Sets refresh_dir_remain
     *
     * @param int $refresh_dir_remain refresh_dir_remain
     *
     * @return $this
     */
    public function setRefreshDirRemain($refresh_dir_remain)
    {
        $this->container['refresh_dir_remain'] = $refresh_dir_remain;

        return $this;
    }

    /**
     * Gets refresh_quota
     *
     * @return int
     */
    public function getRefreshQuota()
    {
        return $this->container['refresh_quota'];
    }

    /**
     * Sets refresh_quota
     *
     * @param int $refresh_quota refresh_quota
     *
     * @return $this
     */
    public function setRefreshQuota($refresh_quota)
    {
        $this->container['refresh_quota'] = $refresh_quota;

        return $this;
    }

    /**
     * Gets refresh_quota_limit
     *
     * @return int
     */
    public function getRefreshQuotaLimit()
    {
        return $this->container['refresh_quota_limit'];
    }

    /**
     * Sets refresh_quota_limit
     *
     * @param int $refresh_quota_limit refresh_quota_limit
     *
     * @return $this
     */
    public function setRefreshQuotaLimit($refresh_quota_limit)
    {
        $this->container['refresh_quota_limit'] = $refresh_quota_limit;

        return $this;
    }

    /**
     * Gets refresh_regex_limit
     *
     * @return int
     */
    public function getRefreshRegexLimit()
    {
        return $this->container['refresh_regex_limit'];
    }

    /**
     * Sets refresh_regex_limit
     *
     * @param int $refresh_regex_limit refresh_regex_limit
     *
     * @return $this
     */
    public function setRefreshRegexLimit($refresh_regex_limit)
    {
        $this->container['refresh_regex_limit'] = $refresh_regex_limit;

        return $this;
    }

    /**
     * Gets refresh_regex_quota
     *
     * @return int
     */
    public function getRefreshRegexQuota()
    {
        return $this->container['refresh_regex_quota'];
    }

    /**
     * Sets refresh_regex_quota
     *
     * @param int $refresh_regex_quota refresh_regex_quota
     *
     * @return $this
     */
    public function setRefreshRegexQuota($refresh_regex_quota)
    {
        $this->container['refresh_regex_quota'] = $refresh_regex_quota;

        return $this;
    }

    /**
     * Gets refresh_regex_remain
     *
     * @return int
     */
    public function getRefreshRegexRemain()
    {
        return $this->container['refresh_regex_remain'];
    }

    /**
     * Sets refresh_regex_remain
     *
     * @param int $refresh_regex_remain refresh_regex_remain
     *
     * @return $this
     */
    public function setRefreshRegexRemain($refresh_regex_remain)
    {
        $this->container['refresh_regex_remain'] = $refresh_regex_remain;

        return $this;
    }

    /**
     * Gets refresh_remain
     *
     * @return int
     */
    public function getRefreshRemain()
    {
        return $this->container['refresh_remain'];
    }

    /**
     * Sets refresh_remain
     *
     * @param int $refresh_remain refresh_remain
     *
     * @return $this
     */
    public function setRefreshRemain($refresh_remain)
    {
        $this->container['refresh_remain'] = $refresh_remain;

        return $this;
    }

    /**
     * Gets unblock_limit
     *
     * @return int
     */
    public function getUnblockLimit()
    {
        return $this->container['unblock_limit'];
    }

    /**
     * Sets unblock_limit
     *
     * @param int $unblock_limit unblock_limit
     *
     * @return $this
     */
    public function setUnblockLimit($unblock_limit)
    {
        $this->container['unblock_limit'] = $unblock_limit;

        return $this;
    }

    /**
     * Gets unblock_quota
     *
     * @return int
     */
    public function getUnblockQuota()
    {
        return $this->container['unblock_quota'];
    }

    /**
     * Sets unblock_quota
     *
     * @param int $unblock_quota unblock_quota
     *
     * @return $this
     */
    public function setUnblockQuota($unblock_quota)
    {
        $this->container['unblock_quota'] = $unblock_quota;

        return $this;
    }

    /**
     * Gets unblock_remain
     *
     * @return int
     */
    public function getUnblockRemain()
    {
        return $this->container['unblock_remain'];
    }

    /**
     * Sets unblock_remain
     *
     * @param int $unblock_remain unblock_remain
     *
     * @return $this
     */
    public function setUnblockRemain($unblock_remain)
    {
        $this->container['unblock_remain'] = $unblock_remain;

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

