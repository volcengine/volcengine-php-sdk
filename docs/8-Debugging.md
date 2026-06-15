[← Error Handling](7-ErrorHandling.md) | Debugging[(中文)](8-Debugging-zh.md) | [SDK Integration →](../SDK_Integration.md)

---

## Debugging

The PHP SDK now supports both Guzzle wire debug output and structured SDK logs.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing')
    ->setDebug(true)
    ->setDebugFile('/tmp/volcengine-php-sdk-debug.log')
    ->setLogLevel(
        \Volcengine\Common\SdkLogger::LOG_REQUEST
        | \Volcengine\Common\SdkLogger::LOG_RESPONSE
        | \Volcengine\Common\SdkLogger::LOG_RETRY
    );
```

Available bitmask categories include `LOG_REQUEST`, `LOG_REQUEST_BODY`,
`LOG_REQUEST_ID`, `LOG_ENDPOINT`, `LOG_CONFIG`, `LOG_SIGNING`, `LOG_RETRY`,
`LOG_RESPONSE`, `LOG_RESPONSE_BODY`, and `LOG_ERROR`.

`setLogger()` accepts the SDK's own `LoggerInterface`, `SdkLogger`, or a PSR-3
style object exposing `debug/info/warning/error` or `log()`.

```php
<?php
$config->setLogger(new Monolog\Logger('volcengine'));
```

You can also override the default SDK user agent:

```php
<?php
$config->setUserAgent('my-app/1.0 volcstack-php-sdk');
```

You can still use `Configuration::toDebugReport()` for environment diagnostics.

---

[← Error Handling](7-ErrorHandling.md) | Debugging[(中文)](8-Debugging-zh.md) | [SDK Integration →](../SDK_Integration.md)
