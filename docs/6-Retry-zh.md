[← 超时配置](5-Timeout-zh.md) | 重试机制[(English)](6-Retry.md) | [异常处理 →](7-ErrorHandling-zh.md)

---

## 重试机制

PHP SDK 目前没有为 `VPCApi` 等服务客户端发起的业务 API 请求提供
全局重试策略。

凭证获取链路已有针对性的重试支持：

- `EcsRoleCredentialProvider` 会重试 IMDS 请求，并支持
  `setMaxRetries()` 和 `setRetryInterval()`。
- OIDC 和 SAML STS 凭证 Provider 会重试网络错误、HTTP 429、HTTP 5xx
  等临时性 STS 失败。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$provider = \Volcengine\Common\Auth\Providers\EcsRoleCredentialProvider::create("YourRoleName")
    ->setMaxRetries(3)
    ->setRetryInterval(1);

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setCredentialProvider($provider)
    ->setRegion('cn-beijing');
```

---

[← 超时配置](5-Timeout-zh.md) | 重试机制[(English)](6-Retry.md) | [异常处理 →](7-ErrorHandling-zh.md)
