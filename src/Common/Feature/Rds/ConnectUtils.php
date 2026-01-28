<?php

namespace Volcengine\Common\Feature\Rds;

use Volcengine\Common\Utils;

/**
 * RDS MySQL authentication utilities
 *
 * Provides methods to generate authentication tokens for RDS MySQL database connections
 */
class ConnectUtils
{
    /**
     * Build authentication token for RDS MySQL database connection
     *
     * Generates a pre-signed URL that can be used as an authentication token
     * to connect to RDS MySQL database instances.
     *
     * @param string $accessKeyId Access Key ID from credentials
     * @param string $secretAccessKey Secret Access Key from credentials
     * @param string $region Region where the RDS instance is located (e.g., 'cn-beijing')
     * @param string $dbUser Database username
     * @param string $instanceId RDS instance ID
     * @param int $expires Token expiration time in seconds (default: 900, i.e., 15 minutes)
     * @param string|null $securityToken Optional security token for temporary credentials
     * @return string Authentication token (pre-signed URL)
     * @throws \InvalidArgumentException If required parameters are missing or invalid
     */
    public static function buildAuthToken(
        $accessKeyId,
        $secretAccessKey,
        $region,
        $dbUser,
        $instanceId,
        $expires = 900,
        $securityToken = null
    ) {
        // Validate credentials
        if (empty($accessKeyId) || empty($secretAccessKey) || empty($region)) {
            throw new \InvalidArgumentException('Access key ID, secret access key, and region must not be empty');
        }

        // Validate required parameters
        if (empty($dbUser) || empty($instanceId)) {
            throw new \InvalidArgumentException('DBUser and InstanceId must not be empty');
        }

        // Validate expires parameter
        if (!is_int($expires) || $expires <= 0) {
            throw new \InvalidArgumentException('Expires must be a positive integer');
        }

        // Set service name for RDS MySQL
        $service = 'rds_mysql';

        // Build query parameters
        $query = [
            'Action' => 'ConnectDatabase',
            'Version' => '2022-01-01',
            'X-Expires' => (string)$expires,
            'DBUser' => $dbUser,
            'InstanceId' => $instanceId
        ];

        // Generate pre-signed URL using signature v4
        $signedUrl = Utils::signRequestToUrl(
            $accessKeyId,
            $secretAccessKey,
            $region,
            $service,
            'GET',
            '/',
            $query,
            $securityToken
        );

        return ltrim($signedUrl, '/?');
    }
}
