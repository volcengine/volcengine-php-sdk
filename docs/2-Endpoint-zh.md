[← 访问凭据](1-Credentials-zh.md) | Endpoint 配置[(English)](2-Endpoint.md) | [Transport →](3-Transport-zh.md)

---

## EndPoint 配置

> **默认**
>
> 不指定 Endpoint 时，走 [自动化 Endpoint 寻址](#自动化-endpoint-寻址)。

### 自定义 Endpoint

用户可以通过在初始化客户端时指定 Endpoint：

`setHost()` 支持域名（可带端口）或 HTTP(S) 源站 URL。URL 显式协议优先于配置中的协议，允许尾部 `/`。
按最终协议移除默认端口（HTTPS 的 `443`、HTTP 的 `80`），非默认端口保留。
该规则同时适用于域名和源站 URL，实际请求、签名 `Host` 和预签名 URL 使用相同的规范化地址。
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

#### region 首尾空白与兼容性

默认自动寻址按原始 region 校验，不会先 `trim()`。`" cn-beijing"`、`"cn-beijing "`、`"\tcn-beijing"`、`"cn-beijing\n"` 和纯空白字符串都会抛出 `Volcengine\Common\ApiException`，`getErrorCode()` 为 `InvalidRegion`，状态码为 400。

- 直接调用 `DefaultEndpointProvider::endpointFor(...)` 时同样拒绝首尾空白。
- 未显式设置 `host` 时，客户端在调用任何 Endpoint Provider、签名和发送请求之前校验 region。`Configuration::setRegion(...)` 只保存原值，不会自动 trim，也不会在设置时立即执行这项校验。
- `null` 和空字符串仍沿用各入口原有的空值处理；纯空白字符串不属于空字符串。

**与旧版本不同：** 现在带首尾空白的 region 会在本地以 `InvalidRegion` 失败。旧版本只在判断是否属于自动寻址 Region 列表时忽略首尾空白，签名使用的仍是原始 region；寻址能够返回结果并不代表带空白的 region 可以正常完成客户端请求。

如果业务需要容忍文本输入的首尾空白，应在调用 `setRegion(...)` 或直接解析接口之前自行 `trim()`，并将处理后的同一个 region 用于客户端配置和寻址。不要只清理传给 Endpoint Provider 的值而保留签名使用的原值；trim 后的值仍须通过合法性校验。

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

非空的 service 或 region 若不是合法的 endpoint 标签（只能包含 ASCII 字母、数字、`-` 和 `_`，以字母开头，且不以 `-` 或 `_` 结尾），会在拼接 host 之前抛出 `Volcengine\Common\ApiException`，通过 `getErrorCode()` 获取错误码 `InvalidService`/`InvalidRegion`，状态码 400；默认和标准 Provider 都会执行这项校验；未显式设置 host 时，客户端请求路径也会在调用任何 endpoint Provider 之前执行这项校验。
其他非法参数抛出 `InvalidArgumentException`：service 或 region 非字符串/纯空白（客户端请求路径上，`' '`、`1` 这类非空值会先抛出上述 `ApiException`）、区域格式不支持（消息包含 `InvalidRegion`）、服务未注册（`ServiceNotFound`）或自定义条目形态不支持。
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
