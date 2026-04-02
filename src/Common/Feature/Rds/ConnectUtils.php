<?php

namespace Volcengine\Common\Feature\Rds;

use Volcengine\Common\ApiClient;
use Volcengine\Common\Endpoint\Providers\StandardEndpointProvider;
use Volcengine\Common\Interceptor\InterceptorChain;
use Volcengine\Common\Interceptor\Interceptors\Context;
use Volcengine\Common\Interceptor\Interceptors\Request;
use Volcengine\Common\Interceptor\Interceptors\ResolveEndpointInterceptor;
use Volcengine\Common\Interceptor\Interceptors\SignRequestInterceptor;

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
     * @param ApiClient $apiClient API client containing credentials, region, and schema settings
     * @param string $dbUser Database username
     * @param string $instanceId RDS instance ID
     * @param int $expires Token expiration time in seconds (default: 900, i.e., 15 minutes). If <= 0, uses default 900.
     * @return string Authentication token (query string only, without host)
     * @throws \InvalidArgumentException If required parameters are missing or invalid
     */
    public static function buildAuthToken(
        ApiClient $apiClient,
                  $dbUser,
                  $instanceId,
                  $expires = self::DEFAULT_EXPIRES
    )
    {
        $config = $apiClient->getConfig();

        // Validate credentials
        if (empty($config->getAk()) || empty($config->getSk())) {
            throw new \InvalidArgumentException('Access key ID and secret access key must not be empty');
        }

        // Validate region
        if (empty($config->getRegion())) {
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

        // Build request
        $request = new Request();
        $request->ak = $config->getAk();
        $request->sk = $config->getSk();
        $request->sessionToken = $config->getSessionToken();
        $request->region = $config->getRegion();
        $request->schema = $config->getSchema();
        $request->service = self::SERVICE;
        $request->method = 'GET';
        $request->truePath = '/' . self::ACTION . '/' . self::API_VERSION . '/' . self::SERVICE . '/get/text_plain/';
        $request->isPresigned = true;

        // Use custom host if set, otherwise StandardEndpointProvider will resolve it
        $request->host = $config->getHost() ?: null;
        $request->resourcePath = $request->truePath;
        $request->endpointProvider = new StandardEndpointProvider();
        $request->useDualStack = $config->getUseDualStack();

        // Set query params
        $request->queryParams = [
            'Action' => self::ACTION,
            'Version' => self::API_VERSION,
            'X-Expires' => (string)$expires,
            'DBUser' => $dbUser,
            'InstanceId' => $instanceId,
        ];

        // Resolve endpoint first
        $context = new Context();
        $context->setRequest($request);
        $resolveChain = new InterceptorChain();
        $resolveChain->appendRequestInterceptor(new ResolveEndpointInterceptor(null));
        $resolveChain->executeRequest($context);

        // Save resolved host for X-Host param, then clear host so it won't be signed
        $resolvedHost = $context->getRequest()->host;
        $context->getRequest()->queryParams['X-Host'] = $context->getRequest()->schema . '://' . $resolvedHost;
        $context->getRequest()->host = null;

        // Sign request (host is null, won't be included in signature)
        $signChain = new InterceptorChain();
        $signChain->appendRequestInterceptor(new SignRequestInterceptor(null));
        $signChain->executeRequest($context);

        return $context->getRequest()->presignedUrl;
    }
}
