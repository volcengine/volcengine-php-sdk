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
        $pathParts = explode('/', $context->request->resourcePath);
        $service = isset($pathParts[3]) ? $pathParts[3] : '';
        if (!$host) {
            $options = $context->request->endpointOptions && method_exists($context->request->endpointOptions, 'toArray')
                ? $context->request->endpointOptions->toArray()
                : [];
            $endpointResolver = $context->request->endpointProvider->endpointFor(
                $service,
                $context->request->region,
                $context->request->customBootstrapRegion,
                $context->request->useDualStack,
                $options
            );
            $context->request->host = $endpointResolver->host;
            $prefix = $endpointResolver->urlFor($schema);
        } else {
            $prefix = $schema . '://' . $host;
        }

        LogHelper::debug($context->request->logger, SdkLogger::LOG_ENDPOINT, 'Endpoint',
            'service={service} region={region} host={host}', [
                'service' => $context->request->service ?: $service,
                'region' => $context->request->region,
                'host' => $context->request->host,
                '__log_account' => $context->request->logAccount,
                '__log_sensitives' => $context->request->logSensitives,
            ]
        );

        $context->request->url = $prefix . $context->request->truePath;
        return $context;
    }
}

?>
