<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Volcengine\Vms\Model;

use ArrayAccess;
use Volcengine\Common\ObjectSerializer;
use Volcengine\Common\ModelInterface;

class QualificationAdminInfoVOForQueryQualificationOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'QualificationAdminInfoVOForQueryQualificationOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'contact_number' => 'string',
        'id_card_front_photo_url' => 'string',
        'id_card_number' => 'string',
        'id_card_photo_with_people_url' => 'string',
        'name' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'contact_number' => null,
        'id_card_front_photo_url' => null,
        'id_card_number' => null,
        'id_card_photo_with_people_url' => null,
        'name' => null
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
        'contact_number' => 'ContactNumber',
        'id_card_front_photo_url' => 'IdCardFrontPhotoURL',
        'id_card_number' => 'IdCardNumber',
        'id_card_photo_with_people_url' => 'IdCardPhotoWithPeopleURL',
        'name' => 'Name'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'contact_number' => 'setContactNumber',
        'id_card_front_photo_url' => 'setIdCardFrontPhotoUrl',
        'id_card_number' => 'setIdCardNumber',
        'id_card_photo_with_people_url' => 'setIdCardPhotoWithPeopleUrl',
        'name' => 'setName'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'contact_number' => 'getContactNumber',
        'id_card_front_photo_url' => 'getIdCardFrontPhotoUrl',
        'id_card_number' => 'getIdCardNumber',
        'id_card_photo_with_people_url' => 'getIdCardPhotoWithPeopleUrl',
        'name' => 'getName'
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
        $this->container['contact_number'] = isset($data['contact_number']) ? $data['contact_number'] : null;
        $this->container['id_card_front_photo_url'] = isset($data['id_card_front_photo_url']) ? $data['id_card_front_photo_url'] : null;
        $this->container['id_card_number'] = isset($data['id_card_number']) ? $data['id_card_number'] : null;
        $this->container['id_card_photo_with_people_url'] = isset($data['id_card_photo_with_people_url']) ? $data['id_card_photo_with_people_url'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
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
     * Gets contact_number
     *
     * @return string
     */
    public function getContactNumber()
    {
        return $this->container['contact_number'];
    }

    /**
     * Sets contact_number
     *
     * @param string $contact_number contact_number
     *
     * @return $this
     */
    public function setContactNumber($contact_number)
    {
        $this->container['contact_number'] = $contact_number;

        return $this;
    }

    /**
     * Gets id_card_front_photo_url
     *
     * @return string
     */
    public function getIdCardFrontPhotoUrl()
    {
        return $this->container['id_card_front_photo_url'];
    }

    /**
     * Sets id_card_front_photo_url
     *
     * @param string $id_card_front_photo_url id_card_front_photo_url
     *
     * @return $this
     */
    public function setIdCardFrontPhotoUrl($id_card_front_photo_url)
    {
        $this->container['id_card_front_photo_url'] = $id_card_front_photo_url;

        return $this;
    }

    /**
     * Gets id_card_number
     *
     * @return string
     */
    public function getIdCardNumber()
    {
        return $this->container['id_card_number'];
    }

    /**
     * Sets id_card_number
     *
     * @param string $id_card_number id_card_number
     *
     * @return $this
     */
    public function setIdCardNumber($id_card_number)
    {
        $this->container['id_card_number'] = $id_card_number;

        return $this;
    }

    /**
     * Gets id_card_photo_with_people_url
     *
     * @return string
     */
    public function getIdCardPhotoWithPeopleUrl()
    {
        return $this->container['id_card_photo_with_people_url'];
    }

    /**
     * Sets id_card_photo_with_people_url
     *
     * @param string $id_card_photo_with_people_url id_card_photo_with_people_url
     *
     * @return $this
     */
    public function setIdCardPhotoWithPeopleUrl($id_card_photo_with_people_url)
    {
        $this->container['id_card_photo_with_people_url'] = $id_card_photo_with_people_url;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

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

