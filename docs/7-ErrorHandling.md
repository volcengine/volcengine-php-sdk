[← Retry](6-Retry.md) | Error Handling[(中文)](7-ErrorHandling-zh.md) | [Debugging →](8-Debugging.md)

---

## Error Handling

### Structured diagnostics and HTTP snapshots

The standard entry point is `Volcengine\Common\Utils::printError($writer, $error)`. The writer is a writable PHP stream resource; success returns no value, while encoding or output failures throw an exception. A null error produces no output. Use the same entry point for synchronous calls and asynchronous `wait()`.

```php
use Volcengine\Common\Utils;

try {
    // Call a service API or wait for its promise.
} catch (\Exception $e) {
    Utils::printError(STDERR, $e);
} catch (\Throwable $e) {
    // PHP 7+ Error/TypeError.
    Utils::printError(STDERR, $e);
}
```

The JSON shape is `{type, error, code?, message?, response, causes?}`, followed by a newline. `Utils::getErrorDetails($error)` returns the same structure as an array. Ordinary customer exceptions retain their identity and message and expose at least type, error and response. Optional `getResponseDetails()`, `getErrorCode()` and `getErrorMessage()` methods support custom diagnostics without changing existing interfaces. Previous exceptions, SDK original causes and previous attempts are deduplicated, with limits of 64 objects and 32 levels to avoid cycles.

Built-in `ApiException::getDiagnosticCode()` / `getDiagnosticMessage()` expose the new fields while preserving existing `getErrorCode()`, `getMessage()` and `__toString()` behavior. TOP `ResponseMetadata.Error.Code/Message` takes priority, followed by Go's root `errorcode`, with `error_code` / `ErrorCode` also accepted. Unknown HTTP errors use `UnknownError`, body read failures use `ReadError`, deserialization failures use `SerializationError`, and transport failures use `RequestError`, `RequestTimeout`, `RequestCanceled` or `TLSError` according to the cause.

`getResponseDetails()` returns an independent array; editing it does not change the exception. The response contains real `status_code`, known `status` / `proto`, `request_id`, headers, body, `body_captured` and `body_complete`, or is null when no HTTP response exists. An empty body can still be captured and complete. Printing never rereads a closed response stream and does not truncate the body. UTF-8 bodies use `body_encoding=utf-8`; other bytes are preserved losslessly as Base64.

A nonseekable stream captured from a nonzero or unknown position has `body_complete=false`; only actually read remaining bytes are retained. When a Guzzle transport exception also encounters a body-read failure, `getPrevious()` retains the read cause and `getOriginalError()` retains the transport exception. Both participate in cause traversal, preserving cancellation/TLS precedence.

A failure while refreshing or signing a retry has `response=null` in the new diagnostics, with the previous response under `causes`. Legacy status, body and business getters keep their previous-attempt contract. AssumeRole/OIDC/SAML also preserve HTTP200 business errors, RequestId and snapshots; invalid credentials or supplied invalid timestamps cause `SerializationError` before the cache is updated.

| Scenario | Diagnostic code | HTTP snapshot | Retry behavior |
| --- | --- | --- | --- |
| HTTP200 TOP / root business error | Service code | Complete response | Throttling, configured or expiry code |
| HTTP429 / 500 / 502 / 503 / 504, HTML error | Service code or UnknownError | Original body | Retry within the limit |
| Timeout / transient connection failure | RequestTimeout / RequestError | null | Retry within the limit |
| Cancellation / TLS certificate or handshake failure | RequestCanceled / TLSError | null or received response | Stop |
| Body read / JSON, TOP or model failure | ReadError / SerializationError | Unread, partial or complete body | Known status and configuration |
| Wrapped credential expiry | ExpiredToken etc. under causes | On the corresponding cause | Invalidate optional cache, reacquire and sign |
| Refresh, signing or backoff failure | RequestError | Current null; previous under causes | Stop |
| Ordinary customer exception | Customer fields | Optional snapshot or null | Preserve identity; no retry by default |

The Common service response path throws `Volcengine\Common\ApiException` for HTTP/TOP service errors, body-read failures, JSON/TOP validation failures, model conversion failures, and metadata assignment failures. PHP 7+ `Error` and `TypeError` are wrapped at these specific boundaries. Synchronous calls and asynchronous Promises expose the same diagnostic fields.

A nonempty successful body must be a JSON TOP envelope with an object-valued `ResponseMetadata`. Invalid JSON, top-level null/arrays/scalars, and missing metadata produce `SerializationError`. Empty bodies and missing or null `Result` values in valid envelopes retain the existing result contract and may return an empty model.

| Information | Accessor | Meaning |
| --- | --- | --- |
| HTTP status | `getStatusCode()` / `getCode()` | Keeps the actual response status, including 200; a transport code without a response is not a server status |
| Request ID | `getRequestId()` | A valid nonempty body string takes precedence, followed by header fallback; null if unavailable |
| Service/SDK error code | `getErrorCode()` | A string-valued service Error.Code, `ReadError`, or `SerializationError`; nonstandard HTTP errors may have no code |
| Error messages | `getErrorMessage()` / `getMessage()` | The service/SDK field and current exception description are independent |
| Response | `getResponseHeaders()` / `getResponseBody()` | Original headers and the complete acquired body or actual partial bytes; null when no response or no bytes were acquired |
| Current cause | `getOriginalError()` / `getPrevious()` | Usually the same cause; transport exceptions with body-read failures retain the transport and read causes separately |
| Previous attempt | `getPreviousAttemptError()` | The previous ApiException when a retry stage fails; otherwise null |

Request ID header fallback checks `X-Top-Requestid`, `X-Top-Request-Id`, then `X-Tt-Logid`, ignoring header-name case. For array-valued headers, only the first value is checked; an unusable candidate falls through to the next header. Body RequestId must be a nonempty string, and Error.Code/Message must be strings. Invalid values remain in the original body instead of standard diagnostic fields.

A body-read failure produces `ReadError` with only the bytes actually acquired. JSON/TOP validation, model conversion, and metadata assignment failures produce `SerializationError` with the original envelope, actual status, headers, and cause.

Retry-condition, backoff, logging, waiting, credential-refresh, or request-rebuild failures terminate retries with ApiException. `getMessage()` describes the current retry failure, and `getOriginalError()` / `getPrevious()` identify its current cause. Status, headers, body, RequestId, service fields, and `getErrorMessage()` retain the previous attempt's diagnostics; `getPreviousAttemptError()` retains that exception separately. These fields do not represent a newly received response. Only the current attempt's response is passed to retry policies; it is null when no response was received.

Printing the exception includes `httpStatus`, `requestId`, `errorCode`, `errorMessage`, `message`, and `responseBody`. Read stack traces through `getTraceAsString()` and the cause object.

```php
<?php
require 'vendor/autoload.php';

use Volcengine\Common\ApiException;
use Volcengine\Common\Configuration;
use Volcengine\Vpc\Api\VPCApi;
use Volcengine\Vpc\Model\DescribeVpcsRequest;

function printSdkDiagnostics(ApiException $e)
{
    $cause = $e->getOriginalError();
    $previousAttempt = $e->getPreviousAttemptError();
    print_r(array(
        'httpStatus' => $e->getStatusCode(),
        'requestId' => $e->getRequestId(),
        'errorCode' => $e->getErrorCode(),
        'errorMessage' => $e->getErrorMessage(),
        'message' => $e->getMessage(),
        'responseHeaders' => $e->getResponseHeaders(),
        'responseBody' => $e->getResponseBody(),
        'originalErrorType' => $cause ? get_class($cause) : null,
        'originalErrorMessage' => $cause ? $cause->getMessage() : null,
        'previousAttemptMessage' => $previousAttempt ? $previousAttempt->getMessage() : null
    ));
    echo (string) $e, PHP_EOL;
    // Read the exception and cause stack traces separately.
}

$config = new Configuration();
$config->setAk('Your AK')->setSk('Your SK')->setRegion('cn-beijing');
$api = new VPCApi(null, $config);

try {
    $response = $api->describeVpcs(new DescribeVpcsRequest());
    print_r($response);
} catch (ApiException $e) {
    printSdkDiagnostics($e);
} catch (\Exception $e) {
    echo get_class($e), ': ', $e->getMessage(), PHP_EOL;
} catch (\Throwable $e) {
    // PHP 7+ initial-request or customer-defined errors.
    echo get_class($e), ': ', $e->getMessage(), PHP_EOL;
}
```

For asynchronous calls, reuse the diagnostic helper and put both the method invocation and `wait()` in the same try block:

```php
try {
    $promise = $api->describeVpcsAsync(new DescribeVpcsRequest());
    $response = $promise->wait();
    print_r($response);
} catch (ApiException $e) {
    printSdkDiagnostics($e);
} catch (\Exception $e) {
    echo get_class($e), ': ', $e->getMessage(), PHP_EOL;
} catch (\Throwable $e) {
    echo get_class($e), ': ', $e->getMessage(), PHP_EOL;
}
```

Initial argument, credential, signing, request-building, and customer-defined failures retain their existing types. Network failures without a response do not invent server diagnostics. The four-argument constructor remains compatible, with an optional fifth previous-cause argument; directly constructing ApiException does not parse RequestId or service fields. Independent clients may not use the Common path.

---

[← Retry](6-Retry.md) | Error Handling[(中文)](7-ErrorHandling-zh.md) | [Debugging →](8-Debugging.md)
