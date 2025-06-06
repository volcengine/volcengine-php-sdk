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

class OrderInfoForGetOrderOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'OrderInfoForGetOrderOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'buyer_customer_name' => 'string',
        'buyer_id' => 'int',
        'coupon_amount' => 'string',
        'create_time' => 'string',
        'discount_amount' => 'string',
        'order_fail_refund_info' => '\Volcengine\Billing\Model\OrderFailRefundInfoForGetOrderOutput',
        'order_id' => 'string',
        'order_type' => 'string',
        'original_amount' => 'string',
        'paid_amount' => 'string',
        'payable_amount' => 'string',
        'payer_customer_name' => 'string',
        'payer_id' => 'int',
        'seller_customer_name' => 'string',
        'seller_id' => 'int',
        'status' => 'string',
        'subject_no' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'buyer_customer_name' => null,
        'buyer_id' => 'int32',
        'coupon_amount' => null,
        'create_time' => null,
        'discount_amount' => null,
        'order_fail_refund_info' => null,
        'order_id' => null,
        'order_type' => null,
        'original_amount' => null,
        'paid_amount' => null,
        'payable_amount' => null,
        'payer_customer_name' => null,
        'payer_id' => 'int32',
        'seller_customer_name' => null,
        'seller_id' => 'int32',
        'status' => null,
        'subject_no' => null
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
        'buyer_customer_name' => 'BuyerCustomerName',
        'buyer_id' => 'BuyerID',
        'coupon_amount' => 'CouponAmount',
        'create_time' => 'CreateTime',
        'discount_amount' => 'DiscountAmount',
        'order_fail_refund_info' => 'OrderFailRefundInfo',
        'order_id' => 'OrderID',
        'order_type' => 'OrderType',
        'original_amount' => 'OriginalAmount',
        'paid_amount' => 'PaidAmount',
        'payable_amount' => 'PayableAmount',
        'payer_customer_name' => 'PayerCustomerName',
        'payer_id' => 'PayerID',
        'seller_customer_name' => 'SellerCustomerName',
        'seller_id' => 'SellerID',
        'status' => 'Status',
        'subject_no' => 'SubjectNo'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'buyer_customer_name' => 'setBuyerCustomerName',
        'buyer_id' => 'setBuyerId',
        'coupon_amount' => 'setCouponAmount',
        'create_time' => 'setCreateTime',
        'discount_amount' => 'setDiscountAmount',
        'order_fail_refund_info' => 'setOrderFailRefundInfo',
        'order_id' => 'setOrderId',
        'order_type' => 'setOrderType',
        'original_amount' => 'setOriginalAmount',
        'paid_amount' => 'setPaidAmount',
        'payable_amount' => 'setPayableAmount',
        'payer_customer_name' => 'setPayerCustomerName',
        'payer_id' => 'setPayerId',
        'seller_customer_name' => 'setSellerCustomerName',
        'seller_id' => 'setSellerId',
        'status' => 'setStatus',
        'subject_no' => 'setSubjectNo'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'buyer_customer_name' => 'getBuyerCustomerName',
        'buyer_id' => 'getBuyerId',
        'coupon_amount' => 'getCouponAmount',
        'create_time' => 'getCreateTime',
        'discount_amount' => 'getDiscountAmount',
        'order_fail_refund_info' => 'getOrderFailRefundInfo',
        'order_id' => 'getOrderId',
        'order_type' => 'getOrderType',
        'original_amount' => 'getOriginalAmount',
        'paid_amount' => 'getPaidAmount',
        'payable_amount' => 'getPayableAmount',
        'payer_customer_name' => 'getPayerCustomerName',
        'payer_id' => 'getPayerId',
        'seller_customer_name' => 'getSellerCustomerName',
        'seller_id' => 'getSellerId',
        'status' => 'getStatus',
        'subject_no' => 'getSubjectNo'
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
        $this->container['buyer_customer_name'] = isset($data['buyer_customer_name']) ? $data['buyer_customer_name'] : null;
        $this->container['buyer_id'] = isset($data['buyer_id']) ? $data['buyer_id'] : null;
        $this->container['coupon_amount'] = isset($data['coupon_amount']) ? $data['coupon_amount'] : null;
        $this->container['create_time'] = isset($data['create_time']) ? $data['create_time'] : null;
        $this->container['discount_amount'] = isset($data['discount_amount']) ? $data['discount_amount'] : null;
        $this->container['order_fail_refund_info'] = isset($data['order_fail_refund_info']) ? $data['order_fail_refund_info'] : null;
        $this->container['order_id'] = isset($data['order_id']) ? $data['order_id'] : null;
        $this->container['order_type'] = isset($data['order_type']) ? $data['order_type'] : null;
        $this->container['original_amount'] = isset($data['original_amount']) ? $data['original_amount'] : null;
        $this->container['paid_amount'] = isset($data['paid_amount']) ? $data['paid_amount'] : null;
        $this->container['payable_amount'] = isset($data['payable_amount']) ? $data['payable_amount'] : null;
        $this->container['payer_customer_name'] = isset($data['payer_customer_name']) ? $data['payer_customer_name'] : null;
        $this->container['payer_id'] = isset($data['payer_id']) ? $data['payer_id'] : null;
        $this->container['seller_customer_name'] = isset($data['seller_customer_name']) ? $data['seller_customer_name'] : null;
        $this->container['seller_id'] = isset($data['seller_id']) ? $data['seller_id'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['subject_no'] = isset($data['subject_no']) ? $data['subject_no'] : null;
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
     * Gets buyer_customer_name
     *
     * @return string
     */
    public function getBuyerCustomerName()
    {
        return $this->container['buyer_customer_name'];
    }

    /**
     * Sets buyer_customer_name
     *
     * @param string $buyer_customer_name buyer_customer_name
     *
     * @return $this
     */
    public function setBuyerCustomerName($buyer_customer_name)
    {
        $this->container['buyer_customer_name'] = $buyer_customer_name;

        return $this;
    }

    /**
     * Gets buyer_id
     *
     * @return int
     */
    public function getBuyerId()
    {
        return $this->container['buyer_id'];
    }

    /**
     * Sets buyer_id
     *
     * @param int $buyer_id buyer_id
     *
     * @return $this
     */
    public function setBuyerId($buyer_id)
    {
        $this->container['buyer_id'] = $buyer_id;

        return $this;
    }

    /**
     * Gets coupon_amount
     *
     * @return string
     */
    public function getCouponAmount()
    {
        return $this->container['coupon_amount'];
    }

    /**
     * Sets coupon_amount
     *
     * @param string $coupon_amount coupon_amount
     *
     * @return $this
     */
    public function setCouponAmount($coupon_amount)
    {
        $this->container['coupon_amount'] = $coupon_amount;

        return $this;
    }

    /**
     * Gets create_time
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->container['create_time'];
    }

    /**
     * Sets create_time
     *
     * @param string $create_time create_time
     *
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->container['create_time'] = $create_time;

        return $this;
    }

    /**
     * Gets discount_amount
     *
     * @return string
     */
    public function getDiscountAmount()
    {
        return $this->container['discount_amount'];
    }

    /**
     * Sets discount_amount
     *
     * @param string $discount_amount discount_amount
     *
     * @return $this
     */
    public function setDiscountAmount($discount_amount)
    {
        $this->container['discount_amount'] = $discount_amount;

        return $this;
    }

    /**
     * Gets order_fail_refund_info
     *
     * @return \Volcengine\Billing\Model\OrderFailRefundInfoForGetOrderOutput
     */
    public function getOrderFailRefundInfo()
    {
        return $this->container['order_fail_refund_info'];
    }

    /**
     * Sets order_fail_refund_info
     *
     * @param \Volcengine\Billing\Model\OrderFailRefundInfoForGetOrderOutput $order_fail_refund_info order_fail_refund_info
     *
     * @return $this
     */
    public function setOrderFailRefundInfo($order_fail_refund_info)
    {
        $this->container['order_fail_refund_info'] = $order_fail_refund_info;

        return $this;
    }

    /**
     * Gets order_id
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->container['order_id'];
    }

    /**
     * Sets order_id
     *
     * @param string $order_id order_id
     *
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->container['order_id'] = $order_id;

        return $this;
    }

    /**
     * Gets order_type
     *
     * @return string
     */
    public function getOrderType()
    {
        return $this->container['order_type'];
    }

    /**
     * Sets order_type
     *
     * @param string $order_type order_type
     *
     * @return $this
     */
    public function setOrderType($order_type)
    {
        $this->container['order_type'] = $order_type;

        return $this;
    }

    /**
     * Gets original_amount
     *
     * @return string
     */
    public function getOriginalAmount()
    {
        return $this->container['original_amount'];
    }

    /**
     * Sets original_amount
     *
     * @param string $original_amount original_amount
     *
     * @return $this
     */
    public function setOriginalAmount($original_amount)
    {
        $this->container['original_amount'] = $original_amount;

        return $this;
    }

    /**
     * Gets paid_amount
     *
     * @return string
     */
    public function getPaidAmount()
    {
        return $this->container['paid_amount'];
    }

    /**
     * Sets paid_amount
     *
     * @param string $paid_amount paid_amount
     *
     * @return $this
     */
    public function setPaidAmount($paid_amount)
    {
        $this->container['paid_amount'] = $paid_amount;

        return $this;
    }

    /**
     * Gets payable_amount
     *
     * @return string
     */
    public function getPayableAmount()
    {
        return $this->container['payable_amount'];
    }

    /**
     * Sets payable_amount
     *
     * @param string $payable_amount payable_amount
     *
     * @return $this
     */
    public function setPayableAmount($payable_amount)
    {
        $this->container['payable_amount'] = $payable_amount;

        return $this;
    }

    /**
     * Gets payer_customer_name
     *
     * @return string
     */
    public function getPayerCustomerName()
    {
        return $this->container['payer_customer_name'];
    }

    /**
     * Sets payer_customer_name
     *
     * @param string $payer_customer_name payer_customer_name
     *
     * @return $this
     */
    public function setPayerCustomerName($payer_customer_name)
    {
        $this->container['payer_customer_name'] = $payer_customer_name;

        return $this;
    }

    /**
     * Gets payer_id
     *
     * @return int
     */
    public function getPayerId()
    {
        return $this->container['payer_id'];
    }

    /**
     * Sets payer_id
     *
     * @param int $payer_id payer_id
     *
     * @return $this
     */
    public function setPayerId($payer_id)
    {
        $this->container['payer_id'] = $payer_id;

        return $this;
    }

    /**
     * Gets seller_customer_name
     *
     * @return string
     */
    public function getSellerCustomerName()
    {
        return $this->container['seller_customer_name'];
    }

    /**
     * Sets seller_customer_name
     *
     * @param string $seller_customer_name seller_customer_name
     *
     * @return $this
     */
    public function setSellerCustomerName($seller_customer_name)
    {
        $this->container['seller_customer_name'] = $seller_customer_name;

        return $this;
    }

    /**
     * Gets seller_id
     *
     * @return int
     */
    public function getSellerId()
    {
        return $this->container['seller_id'];
    }

    /**
     * Sets seller_id
     *
     * @param int $seller_id seller_id
     *
     * @return $this
     */
    public function setSellerId($seller_id)
    {
        $this->container['seller_id'] = $seller_id;

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
     * Gets subject_no
     *
     * @return string
     */
    public function getSubjectNo()
    {
        return $this->container['subject_no'];
    }

    /**
     * Sets subject_no
     *
     * @param string $subject_no subject_no
     *
     * @return $this
     */
    public function setSubjectNo($subject_no)
    {
        $this->container['subject_no'] = $subject_no;

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

