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

也可以覆盖默认 SDK User-Agent，或注入自定义 signer：

```php
<?php
$config->setUserAgent('my-app/1.0 volcstack-php-sdk')
    ->setSigner(new \Volcengine\Common\Sign\V4Signer());
```

`Configuration` 还提供了一组便于调试、埋点和协议扩展的高级 Hook：

- `setDynamicCredentials()` / `setDynamicCredentialsWithMeta()`
- `setExtendHttpRequest()` / `setExtendHttpRequestWithMeta()`
- `setExtraHttpParameters()` / `setExtraHttpJsonBody()`
- `setCustomUnmarshalError()` / `setCustomUnmarshalData()`
- `setExtendContextWithMeta()`
- `setLogSensitives()` 用于对 SDK 日志上下文中的敏感字段做脱敏
- `setLogAccount()` 用于为结构化日志附加账号标识
- `setForceJsonNumberDecode()` 用于更安全地处理大整数 JSON 解码

同时仍然可以使用 `Configuration::toDebugReport()` 收集运行环境信息。

---

[← 异常处理](7-ErrorHandling-zh.md) | Debug 机制[(English)](8-Debugging.md) | [SDK 集成 →](../SDK_Integration_zh.md)
