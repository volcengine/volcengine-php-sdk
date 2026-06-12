[← Timeout](5-Timeout.md) | Retry[(中文)](6-Retry-zh.md) | [Error Handling →](7-ErrorHandling.md)

---

## Retry

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

`StsProvider` also supports dedicated retry customization through
`setRetryer()`, `setConnectTimeout()`, and `setReadTimeout()`.

Use `NoOpRetryer` when you want a concrete retryer instance that always
disables retries:

```php
<?php
$config->setRetryer(new \Volcengine\Common\Retry\NoOpRetryer());
```

Default retry behavior covers transient network failures and HTTP `429/500/502/503/504`.

If the service returns `Retry-After`, the SDK honors that delay when it is
longer than the computed backoff. Credential-expiry style service errors such as
`ExpiredToken` and `RequestExpired` also trigger a credential refresh and retry
when the request was built from a credential provider.

---

[← Timeout](5-Timeout.md) | Retry[(中文)](6-Retry-zh.md) | [Error Handling →](7-ErrorHandling.md)
