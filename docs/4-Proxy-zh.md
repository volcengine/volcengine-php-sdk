[← Transport](3-Transport-zh.md) | 代理配置[(English)](4-Proxy.md) | [超时配置 →](5-Timeout-zh.md)

---

## HTTP(S) 代理

PHP SDK 现在支持直接通过 `Configuration` 配置代理。

### 配置 HTTP/HTTPS 代理

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing')
    ->setHttpProxy('http://127.0.0.1:8888')
    ->setHttpsProxy('http://127.0.0.1:8889');
```

### 配置统一代理映射

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setProxy([
        'http' => 'http://user:password@127.0.0.1:8888',
        'https' => 'http://127.0.0.1:8889',
        'no' => ['127.0.0.1', 'localhost'],
    ]);
```

代理 URL userinfo 中的账号密码会使用 Basic 认证发送。用户名或密码中的特殊字符需按
RFC 3986 进行百分号编码。

### 凭证请求

当 `StsProvider`、`OidcCredentialProvider` 或 `SamlCredentialProvider` 通过
`setCredentialProvider()` 直接配置时，上述 Configuration 代理也会用于获取 STS
凭证。Provider 自身的 `setProxyUrl()` 优先；两者均未配置时，Guzzle/curl 使用
标准 `HTTP_PROXY`、`HTTPS_PROXY` 和 `NO_PROXY` 环境变量。

该继承只作用于代理。STS 自定义 CA 或关闭证书校验仍需在 Provider 上分别调用
`setCaFile()` 或 `setInsecureSkipVerify()`。

如果需要，也仍然可以传入自定义 Guzzle Client，但仅为了代理配置已经不再必需。

---

[← Transport](3-Transport-zh.md) | 代理配置[(English)](4-Proxy.md) | [超时配置 →](5-Timeout-zh.md)
