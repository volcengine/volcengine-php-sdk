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

为了简化用户配置，Volcengine 提供了灵活的 Endpoint 自动寻址机制。用户无需手动指定服务地址，SDK 会根据服务名称、区域（Region）等信息自动拼接出合理的访问地址，并支持用户自定义 DualStack（双栈）。

#### Endpoint 默认寻址

##### 寻址逻辑

1. **是否自动寻址 Region**

    内置自动寻址 Region 列表代码：[`./src/Common/Endpoint/Providers/DefaultEndpointProvider.php`](../src/Common/Endpoint/Providers/DefaultEndpointProvider.php)

    SDK 仅对部分预设区域（如 `cn-beijing-autodriving`、`ap-southeast-2`）或用户配置的区域执行自动寻址；其他区域默认返回 Endpoint：`open.volcengineapi.com`。

    用户可通过环境变量 `VOLC_BOOTSTRAP_REGION_LIST_CONF` 或代码中自定义 `customBootstrapRegion` 来扩展控制区域列表。

2. **DualStack 支持（IPv6）**

    SDK 支持双栈网络（IPv4 + IPv6）访问地址。在常规 `ApiClient` 配置路径中，默认 `useDualStack=false` 会作为显式配置传递给 Endpoint Provider；因此要启用 DualStack，请调用 `setUseDualStack(true)`。`VOLC_ENABLE_DUALSTACK=true` 仅在 Endpoint Provider 收到的 `useDualStack` 为 `null` 时生效。

    启用后，域名后缀将从 `volcengineapi.com` 切换为 `volcengine-api.com`。

3. **根据服务名和区域自动构造 Endpoint 地址**

    - **全局服务（如 `CDN`、`IAM`）**：使用 `<服务名>.volcengineapi.com`（或启用双栈时使用 `volcengine-api.com`）。示例：`cdn.volcengineapi.com`。
    - **区域服务（如 `ECS`、`RDS`）**：使用 `<服务名>.<区域名>.volcengineapi.com` 作为默认 Endpoint。示例：`ecs.cn-beijing.volcengineapi.com`。

##### 代码示例

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setUseDualStack(True)  # // 定义是否启用双栈网络（IPv4 + IPv6）访问地址，默认false
    ->setCustomBootstrapRegion([
        'custom_example_region1' => [],
        'custom_example_region2' => []
    ]);  # 自定义自动寻址Region列表
```

---

[← 访问凭据](1-Credentials-zh.md) | Endpoint 配置[(English)](2-Endpoint.md) | [Transport →](3-Transport-zh.md)
