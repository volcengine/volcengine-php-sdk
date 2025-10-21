<?php

namespace Volcengine\Common\Interceptor\Interceptors;

use GuzzleHttp\RequestOptions;
use Volcengine\Common\Utils;

class SignRequestInterceptor extends Interceptor
{
    public $credentialProvider;

    public function __construct($credentialProvider)
    {
        $this->credentialProvider = $credentialProvider;
    }

    public function intercept(Context $context)
    {
        /**
         * @var Request $request
         */
        $request = $context->request;
        $request->headers = Utils::signv4($request->ak, $request->sk, $request->region, $request->service,
            $request->httpBody, $request->query, $request->method, '/', $request->headers, $request->sessionToken);
        $realRequest = new \GuzzleHttp\Psr7\Request($request->method,
            $request->schema . '://' . $request->host . '/' . ($request->query ? "?{$request->query}" : ''),
            $request->headers, $request->httpBody);

        $request->realRequest = $realRequest;

        //配置options添加
        $options = [];
        if ($request->getDebug) {
            $options[RequestOptions::DEBUG] = fopen($request->getDebugFile, 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $request->getDebugFile);
            }
        }

        $request->options = $options;
        return $context;
    }
}

?>
