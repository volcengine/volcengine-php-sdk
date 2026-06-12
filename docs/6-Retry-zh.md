[← 超时配置](5-Timeout-zh.md) | 重试机制[(English)](6-Retry.md) | [异常处理 →](7-ErrorHandling-zh.md)

---

## 重试机制

PHP SDK 现在支持业务 API 请求和凭证流程的全局重试配置。

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

`StsProvider` 也支持通过 `setRetryer()`、`setConnectTimeout()` 和
`setReadTimeout()` 单独调整 AssumeRole 请求。

如果你需要显式传入一个“永不重试”的重试器，可使用 `NoOpRetryer`：

```php
<?php
$config->setRetryer(new \Volcengine\Common\Retry\NoOpRetryer());
```

默认重试条件覆盖瞬时网络错误，以及 HTTP `429/500/502/503/504`。

如果服务端返回 `Retry-After`，SDK 会在其大于本地退避延迟时优先采用该值。
对于 `ExpiredToken`、`RequestExpired` 等凭证过期类错误，只要请求使用的是
credential provider，SDK 也会在重试前刷新凭证并重新签名。

---

[← 超时配置](5-Timeout-zh.md) | 重试机制[(English)](6-Retry.md) | [异常处理 →](7-ErrorHandling-zh.md)
