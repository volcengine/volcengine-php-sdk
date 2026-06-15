[← Error Handling](7-ErrorHandling.md) | Debugging[(中文)](8-Debugging-zh.md) | [SDK Integration →](../SDK_Integration.md)

---

## Debugging

The PHP SDK supports Guzzle wire debug output.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing')
    ->setDebug(true)
    ->setDebugFile('/tmp/volcengine-php-sdk-debug.log');
```

You can also override the default SDK user agent:

```php
<?php
$config->setUserAgent('my-app/1.0 volcstack-php-sdk');
```

You can still use `Configuration::toDebugReport()` for environment diagnostics.

---

[← Error Handling](7-ErrorHandling.md) | Debugging[(中文)](8-Debugging-zh.md) | [SDK Integration →](../SDK_Integration.md)
