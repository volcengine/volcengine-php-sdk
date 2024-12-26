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

class CreateScheduledInstancesRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CreateScheduledInstancesRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'auto_release_at' => 'string',
        'client_token' => 'string',
        'count' => 'int',
        'delivery_type' => 'string',
        'description' => 'string',
        'dry_run' => 'bool',
        'eip_address' => '\Volcengine\Ecs\Model\EipAddressForCreateScheduledInstancesInput',
        'elastic_scheduled_instance_type' => 'string',
        'end_delivery_at' => 'string',
        'hostname' => 'string',
        'hpc_cluster_id' => 'string',
        'image_id' => 'string',
        'install_run_command_agent' => 'bool',
        'instance_name' => 'string',
        'instance_type_id' => 'string',
        'keep_image_credential' => 'bool',
        'key_pair_name' => 'string',
        'network_interfaces' => '\Volcengine\Ecs\Model\NetworkInterfaceForCreateScheduledInstancesInput[]',
        'password' => 'string',
        'project_name' => 'string',
        'scheduled_instance_description' => 'string',
        'scheduled_instance_name' => 'string',
        'security_enhancement_strategy' => 'string',
        'start_delivery_at' => 'string',
        'suffix_index' => 'int',
        'tags' => '\Volcengine\Ecs\Model\TagForCreateScheduledInstancesInput[]',
        'unique_suffix' => 'bool',
        'user_data' => 'string',
        'volumes' => '\Volcengine\Ecs\Model\VolumeForCreateScheduledInstancesInput[]',
        'zone_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'auto_release_at' => null,
        'client_token' => null,
        'count' => 'int32',
        'delivery_type' => null,
        'description' => null,
        'dry_run' => null,
        'eip_address' => null,
        'elastic_scheduled_instance_type' => null,
        'end_delivery_at' => null,
        'hostname' => null,
        'hpc_cluster_id' => null,
        'image_id' => null,
        'install_run_command_agent' => null,
        'instance_name' => null,
        'instance_type_id' => null,
        'keep_image_credential' => null,
        'key_pair_name' => null,
        'network_interfaces' => null,
        'password' => null,
        'project_name' => null,
        'scheduled_instance_description' => null,
        'scheduled_instance_name' => null,
        'security_enhancement_strategy' => null,
        'start_delivery_at' => null,
        'suffix_index' => 'int32',
        'tags' => null,
        'unique_suffix' => null,
        'user_data' => null,
        'volumes' => null,
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
        'auto_release_at' => 'AutoReleaseAt',
        'client_token' => 'ClientToken',
        'count' => 'Count',
        'delivery_type' => 'DeliveryType',
        'description' => 'Description',
        'dry_run' => 'DryRun',
        'eip_address' => 'EipAddress',
        'elastic_scheduled_instance_type' => 'ElasticScheduledInstanceType',
        'end_delivery_at' => 'EndDeliveryAt',
        'hostname' => 'Hostname',
        'hpc_cluster_id' => 'HpcClusterId',
        'image_id' => 'ImageId',
        'install_run_command_agent' => 'InstallRunCommandAgent',
        'instance_name' => 'InstanceName',
        'instance_type_id' => 'InstanceTypeId',
        'keep_image_credential' => 'KeepImageCredential',
        'key_pair_name' => 'KeyPairName',
        'network_interfaces' => 'NetworkInterfaces',
        'password' => 'Password',
        'project_name' => 'ProjectName',
        'scheduled_instance_description' => 'ScheduledInstanceDescription',
        'scheduled_instance_name' => 'ScheduledInstanceName',
        'security_enhancement_strategy' => 'SecurityEnhancementStrategy',
        'start_delivery_at' => 'StartDeliveryAt',
        'suffix_index' => 'SuffixIndex',
        'tags' => 'Tags',
        'unique_suffix' => 'UniqueSuffix',
        'user_data' => 'UserData',
        'volumes' => 'Volumes',
        'zone_id' => 'ZoneId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'auto_release_at' => 'setAutoReleaseAt',
        'client_token' => 'setClientToken',
        'count' => 'setCount',
        'delivery_type' => 'setDeliveryType',
        'description' => 'setDescription',
        'dry_run' => 'setDryRun',
        'eip_address' => 'setEipAddress',
        'elastic_scheduled_instance_type' => 'setElasticScheduledInstanceType',
        'end_delivery_at' => 'setEndDeliveryAt',
        'hostname' => 'setHostname',
        'hpc_cluster_id' => 'setHpcClusterId',
        'image_id' => 'setImageId',
        'install_run_command_agent' => 'setInstallRunCommandAgent',
        'instance_name' => 'setInstanceName',
        'instance_type_id' => 'setInstanceTypeId',
        'keep_image_credential' => 'setKeepImageCredential',
        'key_pair_name' => 'setKeyPairName',
        'network_interfaces' => 'setNetworkInterfaces',
        'password' => 'setPassword',
        'project_name' => 'setProjectName',
        'scheduled_instance_description' => 'setScheduledInstanceDescription',
        'scheduled_instance_name' => 'setScheduledInstanceName',
        'security_enhancement_strategy' => 'setSecurityEnhancementStrategy',
        'start_delivery_at' => 'setStartDeliveryAt',
        'suffix_index' => 'setSuffixIndex',
        'tags' => 'setTags',
        'unique_suffix' => 'setUniqueSuffix',
        'user_data' => 'setUserData',
        'volumes' => 'setVolumes',
        'zone_id' => 'setZoneId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'auto_release_at' => 'getAutoReleaseAt',
        'client_token' => 'getClientToken',
        'count' => 'getCount',
        'delivery_type' => 'getDeliveryType',
        'description' => 'getDescription',
        'dry_run' => 'getDryRun',
        'eip_address' => 'getEipAddress',
        'elastic_scheduled_instance_type' => 'getElasticScheduledInstanceType',
        'end_delivery_at' => 'getEndDeliveryAt',
        'hostname' => 'getHostname',
        'hpc_cluster_id' => 'getHpcClusterId',
        'image_id' => 'getImageId',
        'install_run_command_agent' => 'getInstallRunCommandAgent',
        'instance_name' => 'getInstanceName',
        'instance_type_id' => 'getInstanceTypeId',
        'keep_image_credential' => 'getKeepImageCredential',
        'key_pair_name' => 'getKeyPairName',
        'network_interfaces' => 'getNetworkInterfaces',
        'password' => 'getPassword',
        'project_name' => 'getProjectName',
        'scheduled_instance_description' => 'getScheduledInstanceDescription',
        'scheduled_instance_name' => 'getScheduledInstanceName',
        'security_enhancement_strategy' => 'getSecurityEnhancementStrategy',
        'start_delivery_at' => 'getStartDeliveryAt',
        'suffix_index' => 'getSuffixIndex',
        'tags' => 'getTags',
        'unique_suffix' => 'getUniqueSuffix',
        'user_data' => 'getUserData',
        'volumes' => 'getVolumes',
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
        $this->container['auto_release_at'] = isset($data['auto_release_at']) ? $data['auto_release_at'] : null;
        $this->container['client_token'] = isset($data['client_token']) ? $data['client_token'] : null;
        $this->container['count'] = isset($data['count']) ? $data['count'] : null;
        $this->container['delivery_type'] = isset($data['delivery_type']) ? $data['delivery_type'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['dry_run'] = isset($data['dry_run']) ? $data['dry_run'] : null;
        $this->container['eip_address'] = isset($data['eip_address']) ? $data['eip_address'] : null;
        $this->container['elastic_scheduled_instance_type'] = isset($data['elastic_scheduled_instance_type']) ? $data['elastic_scheduled_instance_type'] : null;
        $this->container['end_delivery_at'] = isset($data['end_delivery_at']) ? $data['end_delivery_at'] : null;
        $this->container['hostname'] = isset($data['hostname']) ? $data['hostname'] : null;
        $this->container['hpc_cluster_id'] = isset($data['hpc_cluster_id']) ? $data['hpc_cluster_id'] : null;
        $this->container['image_id'] = isset($data['image_id']) ? $data['image_id'] : null;
        $this->container['install_run_command_agent'] = isset($data['install_run_command_agent']) ? $data['install_run_command_agent'] : null;
        $this->container['instance_name'] = isset($data['instance_name']) ? $data['instance_name'] : null;
        $this->container['instance_type_id'] = isset($data['instance_type_id']) ? $data['instance_type_id'] : null;
        $this->container['keep_image_credential'] = isset($data['keep_image_credential']) ? $data['keep_image_credential'] : null;
        $this->container['key_pair_name'] = isset($data['key_pair_name']) ? $data['key_pair_name'] : null;
        $this->container['network_interfaces'] = isset($data['network_interfaces']) ? $data['network_interfaces'] : null;
        $this->container['password'] = isset($data['password']) ? $data['password'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['scheduled_instance_description'] = isset($data['scheduled_instance_description']) ? $data['scheduled_instance_description'] : null;
        $this->container['scheduled_instance_name'] = isset($data['scheduled_instance_name']) ? $data['scheduled_instance_name'] : null;
        $this->container['security_enhancement_strategy'] = isset($data['security_enhancement_strategy']) ? $data['security_enhancement_strategy'] : null;
        $this->container['start_delivery_at'] = isset($data['start_delivery_at']) ? $data['start_delivery_at'] : null;
        $this->container['suffix_index'] = isset($data['suffix_index']) ? $data['suffix_index'] : null;
        $this->container['tags'] = isset($data['tags']) ? $data['tags'] : null;
        $this->container['unique_suffix'] = isset($data['unique_suffix']) ? $data['unique_suffix'] : null;
        $this->container['user_data'] = isset($data['user_data']) ? $data['user_data'] : null;
        $this->container['volumes'] = isset($data['volumes']) ? $data['volumes'] : null;
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

        if ($this->container['image_id'] === null) {
            $invalidProperties[] = "'image_id' can't be null";
        }
        if ($this->container['instance_name'] === null) {
            $invalidProperties[] = "'instance_name' can't be null";
        }
        if ($this->container['instance_type_id'] === null) {
            $invalidProperties[] = "'instance_type_id' can't be null";
        }
        if ($this->container['scheduled_instance_name'] === null) {
            $invalidProperties[] = "'scheduled_instance_name' can't be null";
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
     * Gets auto_release_at
     *
     * @return string
     */
    public function getAutoReleaseAt()
    {
        return $this->container['auto_release_at'];
    }

    /**
     * Sets auto_release_at
     *
     * @param string $auto_release_at auto_release_at
     *
     * @return $this
     */
    public function setAutoReleaseAt($auto_release_at)
    {
        $this->container['auto_release_at'] = $auto_release_at;

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
     * Gets delivery_type
     *
     * @return string
     */
    public function getDeliveryType()
    {
        return $this->container['delivery_type'];
    }

    /**
     * Sets delivery_type
     *
     * @param string $delivery_type delivery_type
     *
     * @return $this
     */
    public function setDeliveryType($delivery_type)
    {
        $this->container['delivery_type'] = $delivery_type;

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
     * Gets eip_address
     *
     * @return \Volcengine\Ecs\Model\EipAddressForCreateScheduledInstancesInput
     */
    public function getEipAddress()
    {
        return $this->container['eip_address'];
    }

    /**
     * Sets eip_address
     *
     * @param \Volcengine\Ecs\Model\EipAddressForCreateScheduledInstancesInput $eip_address eip_address
     *
     * @return $this
     */
    public function setEipAddress($eip_address)
    {
        $this->container['eip_address'] = $eip_address;

        return $this;
    }

    /**
     * Gets elastic_scheduled_instance_type
     *
     * @return string
     */
    public function getElasticScheduledInstanceType()
    {
        return $this->container['elastic_scheduled_instance_type'];
    }

    /**
     * Sets elastic_scheduled_instance_type
     *
     * @param string $elastic_scheduled_instance_type elastic_scheduled_instance_type
     *
     * @return $this
     */
    public function setElasticScheduledInstanceType($elastic_scheduled_instance_type)
    {
        $this->container['elastic_scheduled_instance_type'] = $elastic_scheduled_instance_type;

        return $this;
    }

    /**
     * Gets end_delivery_at
     *
     * @return string
     */
    public function getEndDeliveryAt()
    {
        return $this->container['end_delivery_at'];
    }

    /**
     * Sets end_delivery_at
     *
     * @param string $end_delivery_at end_delivery_at
     *
     * @return $this
     */
    public function setEndDeliveryAt($end_delivery_at)
    {
        $this->container['end_delivery_at'] = $end_delivery_at;

        return $this;
    }

    /**
     * Gets hostname
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->container['hostname'];
    }

    /**
     * Sets hostname
     *
     * @param string $hostname hostname
     *
     * @return $this
     */
    public function setHostname($hostname)
    {
        $this->container['hostname'] = $hostname;

        return $this;
    }

    /**
     * Gets hpc_cluster_id
     *
     * @return string
     */
    public function getHpcClusterId()
    {
        return $this->container['hpc_cluster_id'];
    }

    /**
     * Sets hpc_cluster_id
     *
     * @param string $hpc_cluster_id hpc_cluster_id
     *
     * @return $this
     */
    public function setHpcClusterId($hpc_cluster_id)
    {
        $this->container['hpc_cluster_id'] = $hpc_cluster_id;

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
     * Gets install_run_command_agent
     *
     * @return bool
     */
    public function getInstallRunCommandAgent()
    {
        return $this->container['install_run_command_agent'];
    }

    /**
     * Sets install_run_command_agent
     *
     * @param bool $install_run_command_agent install_run_command_agent
     *
     * @return $this
     */
    public function setInstallRunCommandAgent($install_run_command_agent)
    {
        $this->container['install_run_command_agent'] = $install_run_command_agent;

        return $this;
    }

    /**
     * Gets instance_name
     *
     * @return string
     */
    public function getInstanceName()
    {
        return $this->container['instance_name'];
    }

    /**
     * Sets instance_name
     *
     * @param string $instance_name instance_name
     *
     * @return $this
     */
    public function setInstanceName($instance_name)
    {
        $this->container['instance_name'] = $instance_name;

        return $this;
    }

    /**
     * Gets instance_type_id
     *
     * @return string
     */
    public function getInstanceTypeId()
    {
        return $this->container['instance_type_id'];
    }

    /**
     * Sets instance_type_id
     *
     * @param string $instance_type_id instance_type_id
     *
     * @return $this
     */
    public function setInstanceTypeId($instance_type_id)
    {
        $this->container['instance_type_id'] = $instance_type_id;

        return $this;
    }

    /**
     * Gets keep_image_credential
     *
     * @return bool
     */
    public function getKeepImageCredential()
    {
        return $this->container['keep_image_credential'];
    }

    /**
     * Sets keep_image_credential
     *
     * @param bool $keep_image_credential keep_image_credential
     *
     * @return $this
     */
    public function setKeepImageCredential($keep_image_credential)
    {
        $this->container['keep_image_credential'] = $keep_image_credential;

        return $this;
    }

    /**
     * Gets key_pair_name
     *
     * @return string
     */
    public function getKeyPairName()
    {
        return $this->container['key_pair_name'];
    }

    /**
     * Sets key_pair_name
     *
     * @param string $key_pair_name key_pair_name
     *
     * @return $this
     */
    public function setKeyPairName($key_pair_name)
    {
        $this->container['key_pair_name'] = $key_pair_name;

        return $this;
    }

    /**
     * Gets network_interfaces
     *
     * @return \Volcengine\Ecs\Model\NetworkInterfaceForCreateScheduledInstancesInput[]
     */
    public function getNetworkInterfaces()
    {
        return $this->container['network_interfaces'];
    }

    /**
     * Sets network_interfaces
     *
     * @param \Volcengine\Ecs\Model\NetworkInterfaceForCreateScheduledInstancesInput[] $network_interfaces network_interfaces
     *
     * @return $this
     */
    public function setNetworkInterfaces($network_interfaces)
    {
        $this->container['network_interfaces'] = $network_interfaces;

        return $this;
    }

    /**
     * Gets password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->container['password'];
    }

    /**
     * Sets password
     *
     * @param string $password password
     *
     * @return $this
     */
    public function setPassword($password)
    {
        $this->container['password'] = $password;

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
     * Gets scheduled_instance_description
     *
     * @return string
     */
    public function getScheduledInstanceDescription()
    {
        return $this->container['scheduled_instance_description'];
    }

    /**
     * Sets scheduled_instance_description
     *
     * @param string $scheduled_instance_description scheduled_instance_description
     *
     * @return $this
     */
    public function setScheduledInstanceDescription($scheduled_instance_description)
    {
        $this->container['scheduled_instance_description'] = $scheduled_instance_description;

        return $this;
    }

    /**
     * Gets scheduled_instance_name
     *
     * @return string
     */
    public function getScheduledInstanceName()
    {
        return $this->container['scheduled_instance_name'];
    }

    /**
     * Sets scheduled_instance_name
     *
     * @param string $scheduled_instance_name scheduled_instance_name
     *
     * @return $this
     */
    public function setScheduledInstanceName($scheduled_instance_name)
    {
        $this->container['scheduled_instance_name'] = $scheduled_instance_name;

        return $this;
    }

    /**
     * Gets security_enhancement_strategy
     *
     * @return string
     */
    public function getSecurityEnhancementStrategy()
    {
        return $this->container['security_enhancement_strategy'];
    }

    /**
     * Sets security_enhancement_strategy
     *
     * @param string $security_enhancement_strategy security_enhancement_strategy
     *
     * @return $this
     */
    public function setSecurityEnhancementStrategy($security_enhancement_strategy)
    {
        $this->container['security_enhancement_strategy'] = $security_enhancement_strategy;

        return $this;
    }

    /**
     * Gets start_delivery_at
     *
     * @return string
     */
    public function getStartDeliveryAt()
    {
        return $this->container['start_delivery_at'];
    }

    /**
     * Sets start_delivery_at
     *
     * @param string $start_delivery_at start_delivery_at
     *
     * @return $this
     */
    public function setStartDeliveryAt($start_delivery_at)
    {
        $this->container['start_delivery_at'] = $start_delivery_at;

        return $this;
    }

    /**
     * Gets suffix_index
     *
     * @return int
     */
    public function getSuffixIndex()
    {
        return $this->container['suffix_index'];
    }

    /**
     * Sets suffix_index
     *
     * @param int $suffix_index suffix_index
     *
     * @return $this
     */
    public function setSuffixIndex($suffix_index)
    {
        $this->container['suffix_index'] = $suffix_index;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return \Volcengine\Ecs\Model\TagForCreateScheduledInstancesInput[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Volcengine\Ecs\Model\TagForCreateScheduledInstancesInput[] $tags tags
     *
     * @return $this
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets unique_suffix
     *
     * @return bool
     */
    public function getUniqueSuffix()
    {
        return $this->container['unique_suffix'];
    }

    /**
     * Sets unique_suffix
     *
     * @param bool $unique_suffix unique_suffix
     *
     * @return $this
     */
    public function setUniqueSuffix($unique_suffix)
    {
        $this->container['unique_suffix'] = $unique_suffix;

        return $this;
    }

    /**
     * Gets user_data
     *
     * @return string
     */
    public function getUserData()
    {
        return $this->container['user_data'];
    }

    /**
     * Sets user_data
     *
     * @param string $user_data user_data
     *
     * @return $this
     */
    public function setUserData($user_data)
    {
        $this->container['user_data'] = $user_data;

        return $this;
    }

    /**
     * Gets volumes
     *
     * @return \Volcengine\Ecs\Model\VolumeForCreateScheduledInstancesInput[]
     */
    public function getVolumes()
    {
        return $this->container['volumes'];
    }

    /**
     * Sets volumes
     *
     * @param \Volcengine\Ecs\Model\VolumeForCreateScheduledInstancesInput[] $volumes volumes
     *
     * @return $this
     */
    public function setVolumes($volumes)
    {
        $this->container['volumes'] = $volumes;

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
