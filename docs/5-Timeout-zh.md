[← 代理配置](4-Proxy-zh.md) | 超时配置[(English)](5-Timeout.md) | [重试机制 →](6-Retry-zh.md)

---

## 超时配置

PHP SDK 现在支持通过 `Configuration` 统一配置传输层超时。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing')
    ->setConnectTimeout(3)
    ->setReadTimeout(30);
```

`StsProvider` 和 `EcsRoleCredentialProvider` 也提供了各自的超时 setter，
用于凭证拉取流程。

---

[← 代理配置](4-Proxy-zh.md) | 超时配置[(English)](5-Timeout.md) | [重试机制 →](6-Retry-zh.md)
