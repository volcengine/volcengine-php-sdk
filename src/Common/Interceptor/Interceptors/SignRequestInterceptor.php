<?php

namespace Volcengine\Common\Interceptor\Interceptors;

use GuzzleHttp\RequestOptions;
use Volcengine\Common\LogHelper;
use Volcengine\Common\SdkLogger;
use Volcengine\Common\Sign\V4Signer;

class SignRequestInterceptor extends Interceptor
{
    public $credentialProvider;

    public function __construct($credentialProvider)
    {
        $this->credentialProvider = $credentialProvider;
    }

    public function name()
    {
        return 'volcengine-sign-request-interceptor';
    }

    public function intercept(Context $context)
    {
        /**
         * @var Request $request
         */
        $request = $context->request;
        if (strpos($request->host, 'http') !== false) {
            // 字符串包含"http"
            $a = explode('://', $request->host);
            $request->schema = $a[0];
            $request->host = $a[1];
            $request->headers['Host'] = $request->host;
        }

        if ($request->isPresigned) {
            $signer = $request->signer ?: new V4Signer();
            $signedPath = $signer->presign(
                $request->ak,
                $request->sk,
                $request->region,
                $request->service,
                $request->method,
                '/',
                $request->queryParams,
                $request->sessionToken,
                $request->host
            );
            if ($request->host) {
                $request->presignedUrl = $request->schema . '://' . $request->host . $signedPath;
            } else {
                // No host: return query string only
                $pos = strpos($signedPath, '?');
                $request->presignedUrl = $pos !== false ? substr($signedPath, $pos + 1) : $signedPath;
            }
        } else {
            if (!isset($request->headers['Host']) && !empty($request->host)) {
                $request->headers['Host'] = $request->host;
            }

            $signer = $request->signer ?: new V4Signer();
            $request->headers = $signer->sign($request->ak, $request->sk, $request->region, $request->service,
                $request->httpBody, $request->query, $request->method, '/', $request->headers, $request->sessionToken);
            LogHelper::debug($request->logger, SdkLogger::LOG_SIGNING, 'Sign',
                'service={service} region={region} signed_headers={headers}', [
                    'service' => $request->service,
                    'region' => $request->region,
                    'headers' => isset($request->headers['Authorization']) ? 'Authorization' : '',
                    '__log_account' => $request->logAccount,
                    '__log_sensitives' => $request->logSensitives,
                ]
            );
            $realRequest = new \GuzzleHttp\Psr7\Request($request->method,
                $request->schema . '://' . $request->host . '/' . ($request->query ? "?{$request->query}" : ''),
                $request->headers, $request->httpBody);

            if (is_callable($request->extendHttpRequest)) {
                $extended = call_user_func($request->extendHttpRequest, $realRequest, $context);
                if ($extended instanceof \Psr\Http\Message\RequestInterface) {
                    $realRequest = $extended;
                }
            }
            if (is_callable($request->extendHttpRequestWithMeta)) {
                $meta = [
                    'service' => $request->service,
                    'region' => $request->region,
                    'method' => $request->method,
                    'api_name' => $request->apiName,
                    'context_attributes' => $context->getAttributes(),
                ];
                $extended = call_user_func($request->extendHttpRequestWithMeta, $realRequest, $meta, $context);
                if ($extended instanceof \Psr\Http\Message\RequestInterface) {
                    $realRequest = $extended;
                }
            }

            $request->realRequest = $realRequest;

            //配置options添加
            $options = [];
            if ($request->getDebug) {
                if (isset($request->options[RequestOptions::DEBUG]) && is_resource($request->options[RequestOptions::DEBUG])) {
                    fclose($request->options[RequestOptions::DEBUG]);
                }
                $options[RequestOptions::DEBUG] = fopen($request->getDebugFile, 'a');
                if (!$options[RequestOptions::DEBUG]) {
                    throw new \RuntimeException('Failed to open the debug file: ' . $request->getDebugFile);
                }
            }

            $request->options = $options;
        }
        return $context;
    }
}
