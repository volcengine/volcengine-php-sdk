[← 访问凭据](1-Credentials-zh.md) | Endpoint 配置[(English)](2-Endpoint.md) | [Transport →](3-Transport-zh.md)

---

## EndPoint 配置

> **默认**
>
> 不指定 Endpoint 时，走 [自动化 Endpoint 寻址](#自动化-endpoint-寻址)。

### 自定义 Endpoint

用户可以通过在初始化客户端时指定 Endpoint：

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setHost('https://open.volcengineapi.com');  # 自定义Endpoint，可填写带协议前缀的完整域名（如示例），也可仅填写域名主体（不含 http/https 前缀）
```

### 自定义 RegionId

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion("cn-beijing"); #自定义RegionId
```

### 自动化 Endpoint 寻址

> **默认**
>
> 默认支持自动寻址，无需手动指定 Endpoint。

SDK 会根据服务名和 Region 自动解析 Endpoint。全局服务使用
`<服务名>.volcengineapi.com`，区域服务使用
`<服务名>.<区域名>.volcengineapi.com`；未覆盖的服务或区域回退到
`open.volcengineapi.com`。

如需启用 DualStack（IPv4 + IPv6），调用 `setUseDualStack(true)`。启用后，
域名后缀从 `volcengineapi.com` 切换为 `volcengine-api.com`。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setUseDualStack(true);  # 启用双栈，默认 false
```

#### Endpoint 标准寻址

标准寻址会根据服务是否为 Global 服务，按以下规则拼接 Endpoint：

| Global 服务 | 双栈 | 格式 |
|---|---|---|
| 是 | 是 | `{Service}.volcengine-api.com` |
| 是 | 否 | `{Service}.volcengineapi.com` |
| 否 | 是 | `{Service}.{region}.volcengine-api.com` |
| 否 | 否 | `{Service}.{region}.volcengineapi.com` |

服务是否为 Global 服务由 SDK 内置的[服务信息列表](../src/Common/Endpoint/Providers/StandardEndpointProvider.php#L14)决定。与默认自动寻址不同，标准寻址在服务不存在或 Region 不合法时会直接报错，不会回退到 `open.volcengineapi.com`。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Volcengine\Common\Configuration;
use Volcengine\Common\Endpoint\Providers\StandardEndpointProvider;

$config = Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setEndpointProvider(new StandardEndpointProvider()) // 配置标准寻址
    ->setRegion("cn-beijing")                             // 配置 RegionId
    ->setUseDualStack(true);                              // 配置是否双栈
```

---

[← 访问凭据](1-Credentials-zh.md) | Endpoint 配置[(English)](2-Endpoint.md) | [Transport →](3-Transport-zh.md)
