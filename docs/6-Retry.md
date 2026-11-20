[← Timeout](5-Timeout.md) | Retry[(中文)](6-Retry-zh.md) | [Error Handling →](7-ErrorHandling.md)

---

## Retry

STS exchanges do not retry credential-expiry codes alone because the same exchange cannot refresh its AK/SK, OIDC token or SAML assertion. This does not change business-request credential refresh, transient status/network/throttling rules, or VE's extra-attempt budget.

Default/Lazy requests keep the original provider object and capture routing state separately, including customer subclasses and nested chains. Customer overrides run on the original object without invoking `__clone`; routing state is restored in `finally`.

For transport failures with an HTTP response, the diagnostic code does not itself widen the retry policy. Retry decisions still use the acquired status and service code, with cancellation/TLS taking precedence; HTTP200 cURL truncation, decoding and HTTP/2 stream failures remain non-retryable by default.

Retry recognition follows `getPrevious()` and SDK causes, including wrapped TOP and root business codes, up to 64 exception objects. Cancellation and TLS certificate or handshake failures stop retries before status/code matching. Business API `setRetryErrorCodes()` supports additional codes. Old signature and security token headers are removed case-insensitively before rebuilding and signing each attempt.

Wrapped native Guzzle `RequestException` can also expose HTTP403 throttling or expired-credential codes through a seekable response body; inspection restores the stream position. Retry checks do not consume nonseekable customer bodies, which require customer-provided error codes. cURL errno takes precedence over message text; URL action names do not identify cancellation or TLS failures. OIDC/SAML form STS retains HTTP429 and all 5xx retries; business API/AssumeRole keep the status whitelist above.

Without errno, message classification applies only to Guzzle transport failures without a response. Server bodies embedded in HTTP exceptions and customer wrapper text do not establish cancellation/TLS failures. Retry callback or credential-refresh failures retain the existing `fromRetryError` wrapper contract, with the original customer cause preserved.

On credential expiry, the request calls its provider's optional `invalidateCredentials()` before `getCredentials()`. Built-in Default chains freeze their successful source for each request, including nested Default/Lazy chains, while sharing leaf caches. This preserves the correct source with reuse disabled or interleaved asynchronous requests. CLI delegates to its actual source. Custom providers still need only the original `getCredentials()` contract. Refresh, signing or backoff failures stop the request; new diagnostics keep the current response null and the previous response under causes.

The PHP SDK now provides global retry control for business API requests and
credential flows.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing')
    ->setAutoRetry(true)
    ->setNumMaxRetries(3)
    ->setMinRetryDelayMs(300)
    ->setMaxRetryDelayMs(3000)
    ->setRetryErrorCodes(['Throttling', 'TooManyRequests']);
```

`StsProvider` exposes dedicated timeout setters through `setConnectTimeout()`
and `setReadTimeout()`.

Use `setAutoRetry(false)` to disable business API retries.

Default retry behavior covers transient network failures and HTTP `429/500/502/503/504`.

If the service returns `Retry-After`, the SDK honors that delay when it is
longer than the computed backoff. Credential-expiry style service errors such as
`ExpiredToken` and `RequestExpired` also trigger a credential refresh and retry
when the request was built from a credential provider.

---

[← Timeout](5-Timeout.md) | Retry[(中文)](6-Retry-zh.md) | [Error Handling →](7-ErrorHandling.md)
