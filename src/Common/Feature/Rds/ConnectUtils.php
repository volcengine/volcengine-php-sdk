<?php

namespace Volcengine\Common\Feature\Rds;

use Volcengine\Common\Utils;

class ConnectUtils
{
    const SERVICE = 'rds_mysql';
    const API_VERSION = '2022-01-01';
    const ACTION = 'ConnectDatabase';
    const DEFAULT_EXPIRES = 900;

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
     * @param int $expires Token expiration time in seconds (default: 900, i.e., 15 minutes). If <= 0, uses default 900.
     * @param string|null $securityToken Optional security token for temporary credentials
     * @param bool $disableSSL Whether to use http instead of https (default: false)
     * @return string Authentication token (full pre-signed URL)
     * @throws \InvalidArgumentException If required parameters are missing or invalid
     */
    public static function buildAuthToken(
        $accessKeyId,
        $secretAccessKey,
        $region,
        $dbUser,
        $instanceId,
        $expires = self::DEFAULT_EXPIRES,
        $securityToken = null,
        $disableSSL = false
    ) {
        // Validate credentials
        if (empty($accessKeyId) || empty($secretAccessKey)) {
            throw new \InvalidArgumentException('Access key ID and secret access key must not be empty');
        }

        // Validate region
        if (empty($region)) {
            throw new \InvalidArgumentException('Region must not be empty');
        }

        // Validate required parameters
        if (empty($dbUser)) {
            throw new \InvalidArgumentException('DBUser must not be empty');
        }

        if (empty($instanceId)) {
            throw new \InvalidArgumentException('InstanceId must not be empty');
        }

        // Use default expires if <= 0
        if (!is_int($expires) || $expires <= 0) {
            $expires = self::DEFAULT_EXPIRES;
        }

        // Build regional endpoint
        $host = Utils::getRegionalEndpoint(self::SERVICE, $region);

        // Determine scheme
        $scheme = $disableSSL ? 'http' : 'https';

        // Build query parameters
        $query = [
            'Action' => self::ACTION,
            'Version' => self::API_VERSION,
            'X-Expires' => (string)$expires,
            'DBUser' => $dbUser,
            'InstanceId' => $instanceId,
        ];

        // Generate pre-signed URL using signature v4 with host signing
        $signedPath = Utils::signRequestToUrl(
            $accessKeyId,
            $secretAccessKey,
            $region,
            self::SERVICE,
            'GET',
            '/',
            $query,
            $securityToken,
            $host
        );

        return $scheme . '://' . $host . $signedPath;
    }
}
