[← 异常处理](7-ErrorHandling-zh.md) | Debug 机制[(English)](8-Debugging.md) | [SDK 集成 →](../SDK_Integration_zh.md)

---

## Debug 机制

PHP SDK 现在同时支持 Guzzle 线级调试输出和结构化 SDK 日志。

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

可用的 bitmask 日志类别包括 `LOG_REQUEST`、`LOG_REQUEST_BODY`、
`LOG_REQUEST_ID`、`LOG_ENDPOINT`、`LOG_CONFIG`、`LOG_SIGNING`、
`LOG_RETRY`、`LOG_RESPONSE`、`LOG_RESPONSE_BODY`、`LOG_ERROR`。

`setLogger()` 支持 SDK 自带的 `LoggerInterface` / `SdkLogger`，也支持暴露
`debug/info/warning/error` 或 `log()` 的 PSR-3 风格对象。

```php
<?php
$config->setLogger(new Monolog\Logger('volcengine'));
```

也可以覆盖默认 SDK User-Agent：

```php
<?php
$config->setUserAgent('my-app/1.0 volcstack-php-sdk');
```

同时仍然可以使用 `Configuration::toDebugReport()` 收集运行环境信息。

---

[← 异常处理](7-ErrorHandling-zh.md) | Debug 机制[(English)](8-Debugging.md) | [SDK 集成 →](../SDK_Integration_zh.md)
