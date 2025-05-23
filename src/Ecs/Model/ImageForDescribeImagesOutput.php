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

class ImageForDescribeImagesOutput implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ImageForDescribeImagesOutput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'architecture' => 'string',
        'boot_mode' => 'string',
        'created_at' => 'string',
        'description' => 'string',
        'detection_results' => '\Volcengine\Ecs\Model\DetectionResultsForDescribeImagesOutput',
        'image_id' => 'string',
        'image_name' => 'string',
        'image_owner_id' => 'string',
        'is_install_run_command_agent' => 'bool',
        'is_lts' => 'bool',
        'is_support_cloud_init' => 'bool',
        'kernel' => 'string',
        'license_type' => 'string',
        'os_name' => 'string',
        'os_type' => 'string',
        'platform' => 'string',
        'platform_version' => 'string',
        'project_name' => 'string',
        'share_status' => 'string',
        'size' => 'int',
        'snapshots' => '\Volcengine\Ecs\Model\SnapshotForDescribeImagesOutput[]',
        'status' => 'string',
        'tags' => '\Volcengine\Ecs\Model\TagForDescribeImagesOutput[]',
        'updated_at' => 'string',
        'virtual_size' => 'string',
        'visibility' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'architecture' => null,
        'boot_mode' => null,
        'created_at' => null,
        'description' => null,
        'detection_results' => null,
        'image_id' => null,
        'image_name' => null,
        'image_owner_id' => null,
        'is_install_run_command_agent' => null,
        'is_lts' => null,
        'is_support_cloud_init' => null,
        'kernel' => null,
        'license_type' => null,
        'os_name' => null,
        'os_type' => null,
        'platform' => null,
        'platform_version' => null,
        'project_name' => null,
        'share_status' => null,
        'size' => 'int32',
        'snapshots' => null,
        'status' => null,
        'tags' => null,
        'updated_at' => null,
        'virtual_size' => 'json_number',
        'visibility' => null
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
        'architecture' => 'Architecture',
        'boot_mode' => 'BootMode',
        'created_at' => 'CreatedAt',
        'description' => 'Description',
        'detection_results' => 'DetectionResults',
        'image_id' => 'ImageId',
        'image_name' => 'ImageName',
        'image_owner_id' => 'ImageOwnerId',
        'is_install_run_command_agent' => 'IsInstallRunCommandAgent',
        'is_lts' => 'IsLTS',
        'is_support_cloud_init' => 'IsSupportCloudInit',
        'kernel' => 'Kernel',
        'license_type' => 'LicenseType',
        'os_name' => 'OsName',
        'os_type' => 'OsType',
        'platform' => 'Platform',
        'platform_version' => 'PlatformVersion',
        'project_name' => 'ProjectName',
        'share_status' => 'ShareStatus',
        'size' => 'Size',
        'snapshots' => 'Snapshots',
        'status' => 'Status',
        'tags' => 'Tags',
        'updated_at' => 'UpdatedAt',
        'virtual_size' => 'VirtualSize',
        'visibility' => 'Visibility'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'architecture' => 'setArchitecture',
        'boot_mode' => 'setBootMode',
        'created_at' => 'setCreatedAt',
        'description' => 'setDescription',
        'detection_results' => 'setDetectionResults',
        'image_id' => 'setImageId',
        'image_name' => 'setImageName',
        'image_owner_id' => 'setImageOwnerId',
        'is_install_run_command_agent' => 'setIsInstallRunCommandAgent',
        'is_lts' => 'setIsLts',
        'is_support_cloud_init' => 'setIsSupportCloudInit',
        'kernel' => 'setKernel',
        'license_type' => 'setLicenseType',
        'os_name' => 'setOsName',
        'os_type' => 'setOsType',
        'platform' => 'setPlatform',
        'platform_version' => 'setPlatformVersion',
        'project_name' => 'setProjectName',
        'share_status' => 'setShareStatus',
        'size' => 'setSize',
        'snapshots' => 'setSnapshots',
        'status' => 'setStatus',
        'tags' => 'setTags',
        'updated_at' => 'setUpdatedAt',
        'virtual_size' => 'setVirtualSize',
        'visibility' => 'setVisibility'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'architecture' => 'getArchitecture',
        'boot_mode' => 'getBootMode',
        'created_at' => 'getCreatedAt',
        'description' => 'getDescription',
        'detection_results' => 'getDetectionResults',
        'image_id' => 'getImageId',
        'image_name' => 'getImageName',
        'image_owner_id' => 'getImageOwnerId',
        'is_install_run_command_agent' => 'getIsInstallRunCommandAgent',
        'is_lts' => 'getIsLts',
        'is_support_cloud_init' => 'getIsSupportCloudInit',
        'kernel' => 'getKernel',
        'license_type' => 'getLicenseType',
        'os_name' => 'getOsName',
        'os_type' => 'getOsType',
        'platform' => 'getPlatform',
        'platform_version' => 'getPlatformVersion',
        'project_name' => 'getProjectName',
        'share_status' => 'getShareStatus',
        'size' => 'getSize',
        'snapshots' => 'getSnapshots',
        'status' => 'getStatus',
        'tags' => 'getTags',
        'updated_at' => 'getUpdatedAt',
        'virtual_size' => 'getVirtualSize',
        'visibility' => 'getVisibility'
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
        $this->container['architecture'] = isset($data['architecture']) ? $data['architecture'] : null;
        $this->container['boot_mode'] = isset($data['boot_mode']) ? $data['boot_mode'] : null;
        $this->container['created_at'] = isset($data['created_at']) ? $data['created_at'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['detection_results'] = isset($data['detection_results']) ? $data['detection_results'] : null;
        $this->container['image_id'] = isset($data['image_id']) ? $data['image_id'] : null;
        $this->container['image_name'] = isset($data['image_name']) ? $data['image_name'] : null;
        $this->container['image_owner_id'] = isset($data['image_owner_id']) ? $data['image_owner_id'] : null;
        $this->container['is_install_run_command_agent'] = isset($data['is_install_run_command_agent']) ? $data['is_install_run_command_agent'] : null;
        $this->container['is_lts'] = isset($data['is_lts']) ? $data['is_lts'] : null;
        $this->container['is_support_cloud_init'] = isset($data['is_support_cloud_init']) ? $data['is_support_cloud_init'] : null;
        $this->container['kernel'] = isset($data['kernel']) ? $data['kernel'] : null;
        $this->container['license_type'] = isset($data['license_type']) ? $data['license_type'] : null;
        $this->container['os_name'] = isset($data['os_name']) ? $data['os_name'] : null;
        $this->container['os_type'] = isset($data['os_type']) ? $data['os_type'] : null;
        $this->container['platform'] = isset($data['platform']) ? $data['platform'] : null;
        $this->container['platform_version'] = isset($data['platform_version']) ? $data['platform_version'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['share_status'] = isset($data['share_status']) ? $data['share_status'] : null;
        $this->container['size'] = isset($data['size']) ? $data['size'] : null;
        $this->container['snapshots'] = isset($data['snapshots']) ? $data['snapshots'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['updated_at'] = isset($data['updated_at']) ? $data['updated_at'] : null;
        $this->container['virtual_size'] = isset($data['virtual_size']) ? $data['virtual_size'] : null;
        $this->container['visibility'] = isset($data['visibility']) ? $data['visibility'] : null;
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
     * Gets architecture
     *
     * @return string
     */
    public function getArchitecture()
    {
        return $this->container['architecture'];
    }

    /**
     * Sets architecture
     *
     * @param string $architecture architecture
     *
     * @return $this
     */
    public function setArchitecture($architecture)
    {
        $this->container['architecture'] = $architecture;

        return $this;
    }

    /**
     * Gets boot_mode
     *
     * @return string
     */
    public function getBootMode()
    {
        return $this->container['boot_mode'];
    }

    /**
     * Sets boot_mode
     *
     * @param string $boot_mode boot_mode
     *
     * @return $this
     */
    public function setBootMode($boot_mode)
    {
        $this->container['boot_mode'] = $boot_mode;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string $created_at created_at
     *
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->container['created_at'] = $created_at;

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
     * Gets detection_results
     *
     * @return \Volcengine\Ecs\Model\DetectionResultsForDescribeImagesOutput
     */
    public function getDetectionResults()
    {
        return $this->container['detection_results'];
    }

    /**
     * Sets detection_results
     *
     * @param \Volcengine\Ecs\Model\DetectionResultsForDescribeImagesOutput $detection_results detection_results
     *
     * @return $this
     */
    public function setDetectionResults($detection_results)
    {
        $this->container['detection_results'] = $detection_results;

        return $this;
    }

    /**
     * Gets image_id
     *
     * @return string
     */
    public function getImageId()
    {
        return $this->container['image_id'];
    }

    /**
     * Sets image_id
     *
     * @param string $image_id image_id
     *
     * @return $this
     */
    public function setImageId($image_id)
    {
        $this->container['image_id'] = $image_id;

        return $this;
    }

    /**
     * Gets image_name
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->container['image_name'];
    }

    /**
     * Sets image_name
     *
     * @param string $image_name image_name
     *
     * @return $this
     */
    public function setImageName($image_name)
    {
        $this->container['image_name'] = $image_name;

        return $this;
    }

    /**
     * Gets image_owner_id
     *
     * @return string
     */
    public function getImageOwnerId()
    {
        return $this->container['image_owner_id'];
    }

    /**
     * Sets image_owner_id
     *
     * @param string $image_owner_id image_owner_id
     *
     * @return $this
     */
    public function setImageOwnerId($image_owner_id)
    {
        $this->container['image_owner_id'] = $image_owner_id;

        return $this;
    }

    /**
     * Gets is_install_run_command_agent
     *
     * @return bool
     */
    public function getIsInstallRunCommandAgent()
    {
        return $this->container['is_install_run_command_agent'];
    }

    /**
     * Sets is_install_run_command_agent
     *
     * @param bool $is_install_run_command_agent is_install_run_command_agent
     *
     * @return $this
     */
    public function setIsInstallRunCommandAgent($is_install_run_command_agent)
    {
        $this->container['is_install_run_command_agent'] = $is_install_run_command_agent;

        return $this;
    }

    /**
     * Gets is_lts
     *
     * @return bool
     */
    public function getIsLts()
    {
        return $this->container['is_lts'];
    }

    /**
     * Sets is_lts
     *
     * @param bool $is_lts is_lts
     *
     * @return $this
     */
    public function setIsLts($is_lts)
    {
        $this->container['is_lts'] = $is_lts;

        return $this;
    }

    /**
     * Gets is_support_cloud_init
     *
     * @return bool
     */
    public function getIsSupportCloudInit()
    {
        return $this->container['is_support_cloud_init'];
    }

    /**
     * Sets is_support_cloud_init
     *
     * @param bool $is_support_cloud_init is_support_cloud_init
     *
     * @return $this
     */
    public function setIsSupportCloudInit($is_support_cloud_init)
    {
        $this->container['is_support_cloud_init'] = $is_support_cloud_init;

        return $this;
    }

    /**
     * Gets kernel
     *
     * @return string
     */
    public function getKernel()
    {
        return $this->container['kernel'];
    }

    /**
     * Sets kernel
     *
     * @param string $kernel kernel
     *
     * @return $this
     */
    public function setKernel($kernel)
    {
        $this->container['kernel'] = $kernel;

        return $this;
    }

    /**
     * Gets license_type
     *
     * @return string
     */
    public function getLicenseType()
    {
        return $this->container['license_type'];
    }

    /**
     * Sets license_type
     *
     * @param string $license_type license_type
     *
     * @return $this
     */
    public function setLicenseType($license_type)
    {
        $this->container['license_type'] = $license_type;

        return $this;
    }

    /**
     * Gets os_name
     *
     * @return string
     */
    public function getOsName()
    {
        return $this->container['os_name'];
    }

    /**
     * Sets os_name
     *
     * @param string $os_name os_name
     *
     * @return $this
     */
    public function setOsName($os_name)
    {
        $this->container['os_name'] = $os_name;

        return $this;
    }

    /**
     * Gets os_type
     *
     * @return string
     */
    public function getOsType()
    {
        return $this->container['os_type'];
    }

    /**
     * Sets os_type
     *
     * @param string $os_type os_type
     *
     * @return $this
     */
    public function setOsType($os_type)
    {
        $this->container['os_type'] = $os_type;

        return $this;
    }

    /**
     * Gets platform
     *
     * @return string
     */
    public function getPlatform()
    {
        return $this->container['platform'];
    }

    /**
     * Sets platform
     *
     * @param string $platform platform
     *
     * @return $this
     */
    public function setPlatform($platform)
    {
        $this->container['platform'] = $platform;

        return $this;
    }

    /**
     * Gets platform_version
     *
     * @return string
     */
    public function getPlatformVersion()
    {
        return $this->container['platform_version'];
    }

    /**
     * Sets platform_version
     *
     * @param string $platform_version platform_version
     *
     * @return $this
     */
    public function setPlatformVersion($platform_version)
    {
        $this->container['platform_version'] = $platform_version;

        return $this;
    }

    /**
     * Gets project_name
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->container['project_name'];
    }

    /**
     * Sets project_name
     *
     * @param string $project_name project_name
     *
     * @return $this
     */
    public function setProjectName($project_name)
    {
        $this->container['project_name'] = $project_name;

        return $this;
    }

    /**
     * Gets share_status
     *
     * @return string
     */
    public function getShareStatus()
    {
        return $this->container['share_status'];
    }

    /**
     * Sets share_status
     *
     * @param string $share_status share_status
     *
     * @return $this
     */
    public function setShareStatus($share_status)
    {
        $this->container['share_status'] = $share_status;

        return $this;
    }

    /**
     * Gets size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->container['size'];
    }

    /**
     * Sets size
     *
     * @param int $size size
     *
     * @return $this
     */
    public function setSize($size)
    {
        $this->container['size'] = $size;

        return $this;
    }

    /**
     * Gets snapshots
     *
     * @return \Volcengine\Ecs\Model\SnapshotForDescribeImagesOutput[]
     */
    public function getSnapshots()
    {
        return $this->container['snapshots'];
    }

    /**
     * Sets snapshots
     *
     * @param \Volcengine\Ecs\Model\SnapshotForDescribeImagesOutput[] $snapshots snapshots
     *
     * @return $this
     */
    public function setSnapshots($snapshots)
    {
        $this->container['snapshots'] = $snapshots;

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
     * Gets tags
     *
     * @return \Volcengine\Ecs\Model\TagForDescribeImagesOutput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Ecs\Model\TagForDescribeImagesOutput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param string $updated_at updated_at
     *
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets virtual_size
     *
     * @return string
     */
    public function getVirtualSize()
    {
        return $this->container['virtual_size'];
    }

    /**
     * Sets virtual_size
     *
     * @param string $virtual_size virtual_size
     *
     * @return $this
     */
    public function setVirtualSize($virtual_size)
    {
        $this->container['virtual_size'] = $virtual_size;

        return $this;
    }

    /**
     * Gets visibility
     *
     * @return string
     */
    public function getVisibility()
    {
        return $this->container['visibility'];
    }

    /**
     * Sets visibility
     *
     * @param string $visibility visibility
     *
     * @return $this
     */
    public function setVisibility($visibility)
    {
        $this->container['visibility'] = $visibility;

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

