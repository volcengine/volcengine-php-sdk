[← 异常处理](7-ErrorHandling-zh.md) | Debug 机制[(English)](8-Debugging.md) | [SDK 集成 →](../SDK_Integration_zh.md)

---

## Debug 机制

PHP SDK 支持 Guzzle 线级调试输出。

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

SDK 结构化调试日志可以通过 bitmask 单独开启。HTTP 请求和响应日志不会记录请求体或响应体。

```php
<?php
$config->setLogLevel(
    \Volcengine\Common\SdkLogger::LOG_REQUEST |
    \Volcengine\Common\SdkLogger::LOG_RESPONSE |
    \Volcengine\Common\SdkLogger::LOG_RETRY |
    \Volcengine\Common\SdkLogger::LOG_ENDPOINT
);
```

也可以覆盖默认 SDK User-Agent：

```php
<?php
$config->setUserAgent('my-app/1.0 volcstack-php-sdk');
```

同时仍然可以使用 `Configuration::toDebugReport()` 收集运行环境信息。

---

[← 异常处理](7-ErrorHandling-zh.md) | Debug 机制[(English)](8-Debugging.md) | [SDK 集成 →](../SDK_Integration_zh.md)
