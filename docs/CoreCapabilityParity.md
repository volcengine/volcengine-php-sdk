# PHP Core Capability Parity

This document records the PHP SDK core surface after re-checking the local Go,
Python, and Java SDK source trees. Items that were struck through in the
requirement notes, or that are not present in all three SDKs, are intentionally
not implemented or documented as PHP public APIs.

Local source roots used as evidence:

- Go: `../volcengine-go-sdk`
- Python: `../volcengine-python-sdk`
- Java: `../volcengine-java-sdk`

## Implemented Public Surface

| Capability | PHP status | Go evidence | Python evidence | Java evidence |
| --- | --- | --- | --- | --- |
| Static credentials provider | Implemented as `Volcengine\Common\Auth\Providers\StaticCredentialProvider`; direct `setAk()` / `setSk()` remains the simple path. | `volcengine/credentials/static_provider.go` | `volcenginesdkcore/auth/providers/static_provider.py` | `volcengine-java-sdk-core/src/main/java/com/volcengine/auth/StaticCredentialProvider.java` |
| Retry for business API calls | Implemented through `Configuration::setAutoRetry()`, max retries, retry delay bounds, retry error codes, retryable HTTP status, transient transfer errors, and credential-expiry refresh. | `volcengine/request/retryer.go`, `volcengine/client/default_retryer.go` | `volcenginesdkcore/retryer/retryer.py`, `retry_condition.py`, `backoff_strategy.py` | `volcengine-java-sdk-core/src/main/java/com/volcengine/retryer/Retryer.java`, `DefaultRetryCondition.java`, `DefaultRetryerSetting.java` |
| Response interceptor pipeline | Implemented internally: PHP executes response interceptors and uses `DeserializedResponseInterceptor` for response parsing. No public custom interceptor API is exposed. | Request lifecycle handlers and interceptors: `volcengine/request/request.go`, `volcengine/custom/interceptor.go` | `volcenginesdkcore/interceptor/chain.py`, `api_client.py` | `volcengine-java-sdk-core/src/main/java/com/volcengine/interceptor/InterceptorChain.java`, `ApiClient.java` |
| HTTP request/response debug logging | Implemented internally via `HttpLoggingInterceptor` and `SdkLogger` bitmask. PHP intentionally logs method, URL, status, request ID, and elapsed time only; it does not log request or response body. | `volcengine/logger.go`, `volcengine/client/logger.go` | `volcenginesdkcore/observability/debugger.py`, `rest.py` | `volcengine-java-sdk-core/src/main/java/com/volcengine/interceptor/HttpLoggingInterceptor.java`, `observability/debugger/LogLevel.java` |
| Endpoint automatic resolution and DualStack | Implemented with default endpoint provider, region/custom endpoint settings, bootstrap regions, and `setUseDualStack()`. | `volcengine/endpoints/endpoints.go`, `standard_resolver.go` | `volcenginesdkcore/endpoint/providers/default_provider.py`, `standard_provider.py` | `volcengine-java-sdk-core/src/main/java/com/volcengine/endpoint/DefaultEndpointProvider.java`, `ResolveEndpointOption.java` |
| Proxy, SSL, timeout, and User-Agent configuration | Implemented with `setProxy()`, `setHttpProxy()`, `setHttpsProxy()`, SSL certificate setters, request timeouts, and `setUserAgent()`. | `volcengine/config.go` | `volcenginesdkcore/configuration.py` | `volcengine-java-sdk-core/src/main/java/com/volcengine/ApiClient.java` |
| Universal API helpers | Implemented as a thin wrapper over PHP `ApiClient::callApi()` with `UniversalInfo`, `UniversalRequest`, and `UniversalApi::doCall()` / `doCallWithHttpInfo()`. No runtime options, progress listener, or custom interceptor API is added. | `volcengine/universal/` | `volcenginesdkcore/universal.py` | `volcengine-java-sdk-core/src/main/java/com/volcengine/UniversalApi.java`, `UniversalRequest.java` |
| Shared default configuration instance | Fixed: `Configuration::getDefaultConfiguration()` now returns the cached default configuration instance. | Go uses explicit config/session objects: `volcengine/config.go`, `volcengine/session/session.go` | Python `Configuration()` returns a copy of the class default via `TypeWithDefault`: `volcenginesdkcore/configuration.py` | Java keeps a static default API client: `volcengine-java-sdk-core/src/main/java/com/volcengine/Configuration.java` |
| SDK version constant and user agent | Implemented in `Version::SDK_VERSION` and `Version::userAgent()`. | `volcengine/version.go` / config user-agent usage | Python generated user-agent in `volcenginesdkcore/api_client.py` | `volcengine-java-sdk-core/src/main/java/com/volcengine/version/Version.java` |

## Explicitly Not Implemented

| Capability | Reason | Source evidence |
| --- | --- | --- |
| `ProcessCredentialsProvider` | Only Go has a process credentials provider. | Go: `volcengine/credentials/processcreds/provider.go`; no equivalent provider in Python `volcenginesdkcore/auth/providers/` or Java `com/volcengine/auth/`. |
| `EndpointCredentialsProvider` | Only Go has arbitrary endpoint credentials. | Go: `volcengine/credentials/endpointcreds/provider.go`; no equivalent provider in Python or Java auth providers. |
| Runtime options interceptor | Python-only public capability. | Python: `volcenginesdkcore/interceptor/interceptors/runtime_options_interceptor.py`; no Go/Java equivalent public per-request runtime options API. |
| Public signer replacement API | All three SDKs have V4 signing implementations, but not a common public `setSigner()` style API. PHP keeps signing internal through `Utils::signv4()` and `Utils::signRequestToUrl()`. | Go: `volcengine/signer/volc/volc.go`; Python: `volcenginesdkcore/signv4.py`; Java: `com/volcengine/sign/VolcstackSign.java`. |
| Public custom request/response interceptor API | Go exposes `Config.AddInterceptor()`, but Python and Java expose chains internally without a stable client/config-level public API. PHP keeps the interceptor chain internal. | Go: `volcengine/config.go`; Python: `volcenginesdkcore/api_client.py`; Java: `com/volcengine/ApiClient.java`. |
| Gzip request interceptor | Java-only capability. | Java: `volcengine-java-sdk-core/src/main/java/com/volcengine/GzipRequestInterceptor.java`; no Go/Python equivalent public core API. |
| Rich endpoint options: endpoint config file, strict matching, unknown service resolution, site, IP version | Go-specific expanded endpoint resolver options. PHP only keeps automatic resolution, custom host, region, bootstrap region, and DualStack. | Go: `volcengine/endpoints/endpoint_config_resolver.go`, `volcengine/config.go`; no matching Python/Java public surface for the full option set. |
| Default credential chain cache of last successful provider | Struck through in the requirement notes, so PHP does not implement it even though current Go/Python/Java code contains similar reuse behavior. | Go: `volcengine/credentials/default_provider.go`; Python: `volcenginesdkcore/auth/providers/default_provider.py`; Java: `com/volcengine/auth/DefaultCredentialProvider.java`. |
| Session helper | Struck through and Go-only. | Go: `volcengine/session/session.go`; no Python/Java common equivalent. |
| Upload/download progress listener | Struck through and Java-only. | Java: `ProgressRequestBody`; no Go/Python common equivalent. |
| Waiter and pagination helpers | Not three-language common public PHP core requirements; Waiter is Go-only, pagination helper is Go-only. | Go: `volcengine/request/waiter.go`, `request_pagination.go`. |
| Rich typed error hierarchy | Not three-language common. PHP keeps `ApiException` with status, error code, error message, request id, response body, and original error helpers. | Go has `volcengineerr`; Java/Python use different exception models. |

## PHP Guardrails

- Do not add dependencies for logging integration.
- Do not log request or response body in PHP HTTP logging.
- Do not add public APIs copied from only one language SDK.
- Do not document capability that is not implemented by the PHP code.
