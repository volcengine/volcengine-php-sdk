[← 访问凭据](1-Credentials-zh.md) | Endpoint 配置[(English)](2-Endpoint.md) | [Transport →](3-Transport-zh.md)

---

## EndPoint 配置

> **默认**
>
> 不指定 Endpoint 时，走 [自动化 Endpoint 寻址](#自动化-endpoint-寻址)。

### 自定义 Endpoint

用户可以通过在初始化客户端时指定 Endpoint：

`setHost()` 支持域名（可带端口）或 HTTP(S) 源站 URL。URL 显式协议优先于配置中的协议，允许尾部 `/`。
源站 URL 中的用户信息、非根路径、查询参数和片段会抛出 `InvalidArgumentException`，资源路径和 API 参数应单独传入。

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

##### 模板与自定义服务

构造方法：`new StandardEndpointProvider($format = null, $siteStack = null, $extension = [], $customServices = [])`。

| 参数 | 行为 |
|---|---|
| `$format` | 默认 `{Service}{Region}.{SiteStack}.com` |
| `$siteStack` | 默认 `volcengineapi`；DualStack 关闭时保留自定义值，启用时覆盖为 `volcengine-api` |
| `$extension` | 额外模板变量，非数组会被忽略；使用字符串值，以及不含 `{`、`}` 的非空字符串键 |
| `$customServices` | 服务名到全局/区域级分类的映射数组，非数组会被忽略 |

支持混用 `{Key}`、`${Key}`、`{{.Key}}` 三种占位符，后者只是 Go 风格的占位符语法，不提供完整的 Go 模板引擎。内置变量为：

- `Service`：服务代码转小写，`_` 替换为 `-`。
- `Region`：区域级服务为 `.<region>`，全局服务为空；包含前导点。
- `SiteStack`：按上表规则选定的 stack。

每个扩展键都是一级变量，例如 `{Tenant}`、`${Tenant}` 或 `{{.Tenant}}`。同名时内置变量优先；替换值按字面输出，不再递归替换。
与 BytePlus 不同，本 Provider 没有内置 `CNSuffix`、`Extension` 变量。

内置服务条目优先于 `$customServices`。自定义条目支持 `false`（区域级）、`true`（全局）、带 `isGlobal` 或 `IsGlobal` 的数组，以及带公开 `isGlobal` 或 `IsGlobal` 属性的对象。
例如 `['mysvc' => false]`、`['mysvc' => ['isGlobal' => false]]`、`['mysvc' => (object) ['IsGlobal' => true]]`。

非法参数抛出 `InvalidArgumentException`：service 或 region 非字符串/纯空白、区域格式不支持（消息包含 `InvalidRegion`）、服务未注册（`ServiceNotFound`）或自定义条目形态不支持。
引用不存在的模板变量现在会立即报错，消息包含 `TemplateExecuteError`。
本 Provider 不提供 `StandProviderError` 或符号错误码方法 `getStandCode()`。模板字面量和替换值不做完整域名合法性校验。

DualStack 显式 `true`/`false` 优先，`null` 时读取 `VOLC_ENABLE_DUALSTACK`。`customBootstrapRegion` 不参与 Standard 寻址。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Volcengine\Common\Configuration;
use Volcengine\Common\Endpoint\Providers\StandardEndpointProvider;

$provider = new StandardEndpointProvider(
    '${Service}{{.Region}}.{Tenant}.{SiteStack}.com',
    null,
    ['Tenant' => 'tenant-a'],
    ['mysvc' => ['isGlobal' => false]]
);
$host = $provider->endpointFor('mysvc', 'cn-beijing', null, false)->host;
// mysvc.cn-beijing.tenant-a.volcengineapi.com
$config = (new Configuration())
    ->setEndpointProvider($provider)
    ->setRegion('cn-beijing')
    ->setUseDualStack(false);
```

---

[← 访问凭据](1-Credentials-zh.md) | Endpoint 配置[(English)](2-Endpoint.md) | [Transport →](3-Transport-zh.md)
