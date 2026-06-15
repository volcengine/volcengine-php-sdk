<?php

namespace Volcengine\Common\Interceptor\Interceptors;

use Volcengine\Common\Retry\Retryer;

class RuntimeOptionsInterceptor extends Interceptor
{
    public function name()
    {
        return 'volcengine-runtime-options-interceptor';
    }

    public function intercept(Context $context)
    {
        $opt = $context->request->runtimeOptions;
        if (!$opt) {
            return $context;
        }

        $request = $context->request;

        $request->ak = $opt->ak !== null ? $opt->ak : $request->ak;
        $request->sk = $opt->sk !== null ? $opt->sk : $request->sk;
        $request->sessionToken = $opt->sessionToken !== null ? $opt->sessionToken : $request->sessionToken;
        $request->region = $opt->region !== null ? $opt->region : $request->region;
        $request->schema = $opt->schema !== null ? $opt->schema : $request->schema;
        $request->connectTimeout = $opt->connectTimeout !== null ? $opt->connectTimeout : $request->connectTimeout;
        $request->readTimeout = $opt->readTimeout !== null ? $opt->readTimeout : $request->readTimeout;

        if ($opt->endpointProvider !== null) {
            $request->endpointProvider = $opt->endpointProvider;
            $request->host = null;
        }

        if ($request->retryer === null && (
            $opt->numMaxRetries !== null
            || $opt->backoffStrategy !== null
            || $opt->retryCondition !== null
            || $opt->minRetryDelayMs !== null
            || $opt->maxRetryDelayMs !== null
            || $opt->retryErrorCodes !== null
        )) {
            $request->retryer = new Retryer();
        }

        if ($request->retryer !== null) {
            if ($opt->autoRetry !== null) {
                $request->autoRetry = $opt->autoRetry;
            }
            if ($opt->numMaxRetries !== null) {
                $request->retryer->setNumMaxRetries($opt->numMaxRetries);
            }
            if ($opt->backoffStrategy !== null) {
                $request->retryer->setBackoffStrategy($opt->backoffStrategy);
            }
            if ($opt->retryCondition !== null) {
                $request->retryer->setRetryCondition($opt->retryCondition);
            }

            $backoff = $request->retryer->getBackoffStrategy();
            if ($backoff !== null) {
                if ($opt->minRetryDelayMs !== null) {
                    $backoff->setMinRetryDelayMs($opt->minRetryDelayMs);
                }
                if ($opt->maxRetryDelayMs !== null) {
                    $backoff->setMaxRetryDelayMs($opt->maxRetryDelayMs);
                }
            }

            $condition = $request->retryer->getRetryCondition();
            if ($condition !== null && $opt->retryErrorCodes !== null) {
                $condition->setRetryErrorCodes($opt->retryErrorCodes);
            }
        }

        if ($opt->extraQueryParameters !== null) {
            $request->extraQueryParameters = array_merge($request->extraQueryParameters, $opt->extraQueryParameters);
        }
        if ($opt->extraJsonBody !== null) {
            $request->extraJsonBody = array_merge($request->extraJsonBody, $opt->extraJsonBody);
        }

        return $context;
    }
}
