<?php

namespace Volcengine\Common\Interceptor\Interceptors;

use Volcengine\Common\LogHelper;
use Volcengine\Common\SdkLogger;

class ResolveEndpointInterceptor extends Interceptor
{
    public $endpointProvider;

    public function __construct($endpointProvider)
    {
        $this->endpointProvider = $endpointProvider;
    }

    public function name()
    {
        return 'volcengine-resolve-endpoint-interceptor';
    }

    public function intercept(Context $context)
    {
        $host = $context->request->host;
        $schema = $context->request->schema;
        if (!$host) {
            $pathParts = explode('/', $context->request->resourcePath);
            $service = isset($pathParts[3]) ? $pathParts[3] : '';
            $endpointResolver = $context->request->endpointProvider->endpointFor(
                $service,
                $context->request->region,
                $context->request->customBootstrapRegion,
                $context->request->useDualStack
            );
            $context->request->host = $endpointResolver->host;
            $prefix = $endpointResolver->urlFor($schema);
        } else {
            $prefix = $schema . '://' . $host;
        }

        LogHelper::debug($context->request->logger, $context->request->logLevel, SdkLogger::LOG_ENDPOINT,
            'Endpoint service={service} region={region} host={host}', [
                'service' => $context->request->service ?: (isset($service) ? $service : ''),
                'region' => $context->request->region,
                'host' => $context->request->host,
            ]
        );

        $context->request->url = $prefix . $context->request->truePath;
        return $context;
    }
}
