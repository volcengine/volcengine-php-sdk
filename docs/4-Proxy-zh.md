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

凭证请求与业务 API 请求采用相同的空值语义：

- Provider 的 `setProxyUrl(null)` 或 `setProxyUrl('')` 不覆盖 Configuration。
- Configuration 的有效代理为 `null` 时不设置 Guzzle `proxy` 选项，允许标准代理
  环境变量生效。
- `Configuration::setProxy('')` 表示显式关闭代理。
- 代理映射原样传递。空映射或未包含当前请求协议的映射可使用该协议的环境代理；
  为某个协议显式配置空值则关闭该协议的代理。

该继承只作用于代理。STS 自定义 CA 或关闭证书校验仍需在 Provider 上分别调用
`setCaFile()` 或 `setInsecureSkipVerify()`。

对于上述内置 Provider 类本身，每个 `ApiClient` 会在首次请求时创建私有 Provider
快照，即使已配置 AK/SK 也不例外。快照独立持有代理/TLS 设置及已有的凭证缓存机制，
不继承源 Provider 的热缓存，也不回写源 Provider。后续请求复用该快照，尚未完成的
异步请求在重试时继续使用原快照。

更换配置中的 Provider，或修改 Configuration 的有效代理（包括清空），会在下次
请求时创建新快照。修改同一个源 Provider 的设置后，应调用
`ApiClient::setNewClientConfig()` 或创建新客户端，使后续请求采用新设置。
OIDC token 文件仍在刷新时读取。自定义 Provider、子类以及凭证链内部的 Provider
不会被自动克隆，也不具备上述隔离保证。

如果需要，也仍然可以传入自定义 Guzzle Client，但仅为了代理配置已经不再必需。

---

[← Transport](3-Transport-zh.md) | 代理配置[(English)](4-Proxy.md) | [超时配置 →](5-Timeout-zh.md)
