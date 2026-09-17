[← Credentials](1-Credentials.md) | Endpoint[(中文)](2-Endpoint-zh.md) | [Transport →](3-Transport.md)

---

## Endpoint Configuration

> **Default**
>
> If endpoint is not specified, the SDK uses automatic endpoint resolution.

### Custom Endpoint

`setHost()` accepts a bare hostname (with an optional port) or an HTTP(S)
origin URL. An explicit URL scheme takes priority over the configured scheme.
A trailing `/` is accepted. User information, non-root paths, query strings and
fragments in an origin URL are rejected with `InvalidArgumentException`;
resource paths and API parameters are supplied separately.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setHost('https://open.volcengineapi.com');
```

### Custom RegionId

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion("cn-beijing");
```

### Automatic Endpoint Resolution

> **Default**
>
> Automatic resolution is enabled by default; no manual endpoint configuration required.

The SDK resolves the endpoint from service name and region. Global services use
`<service>.volcengineapi.com`; regional services use
`<service>.<region>.volcengineapi.com`. If the service or region is not covered
by the built-in rules, the SDK falls back to `open.volcengineapi.com`.

To enable DualStack (IPv4 + IPv6), call `setUseDualStack(true)`. The domain
suffix changes from `volcengineapi.com` to `volcengine-api.com`.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setUseDualStack(true);    // enable dual-stack, default false
```

#### Standard Endpoint Resolution

Standard endpoint resolution constructs endpoints according to whether the service is global:

| Global service | DualStack | Format |
|---|---|---|
| Yes | Yes | `{Service}.volcengine-api.com` |
| Yes | No | `{Service}.volcengineapi.com` |
| No | Yes | `{Service}.{region}.volcengine-api.com` |
| No | No | `{Service}.{region}.volcengineapi.com` |

Whether a service is global is determined by the [service information list](../src/Common/Endpoint/Providers/StandardEndpointProvider.php#L14) built into the SDK. Unlike default automatic resolution, standard resolution returns an error when the service is unknown or the region is invalid instead of falling back to `open.volcengineapi.com`.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Volcengine\Common\Configuration;
use Volcengine\Common\Endpoint\Providers\StandardEndpointProvider;

$config = Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setEndpointProvider(new StandardEndpointProvider()) // Configure standard resolution
    ->setRegion("cn-beijing")                             // Configure RegionId
    ->setUseDualStack(true);                              // Configure DualStack
```

##### Templates and Custom Services

Constructor: `new StandardEndpointProvider($format = null, $siteStack = null, $extension = [], $customServices = [])`.

| Parameter | Behavior |
|---|---|
| `$format` | Defaults to `{Service}{Region}.{SiteStack}.com` |
| `$siteStack` | Defaults to `volcengineapi`; retained when DualStack is off, overridden with `volcengine-api` when enabled |
| `$extension` | Extra template variables; non-arrays are ignored. Use string values and nonempty string keys without `{` or `}` |
| `$customServices` | Service name to global/regional classification map; non-arrays are ignored |

The three placeholder syntaxes `{Key}`, `${Key}` and `{{.Key}}` can be mixed.
The last is Go-style placeholder syntax, not a full Go template engine.
Built-in variables are:

- `Service`: lowercase service code with `_` replaced by `-`.
- `Region`: `.<region>` for regional services, empty for global services; includes the leading dot.
- `SiteStack`: the selected stack described above.

Every extension key is a first-level variable, for example `{Tenant}`,
`${Tenant}` or `{{.Tenant}}`. Built-in variables win on name collisions.
Replacement values are emitted literally, without recursive substitution.
Unlike BytePlus, there are no built-in `CNSuffix` or `Extension` variables.

Built-in service entries take priority over `$customServices`. Custom entries
support `false` (regional), `true` (global), arrays with `isGlobal` or `IsGlobal`,
and objects with a public `isGlobal` or `IsGlobal` property. For example:
`['mysvc' => false]`, `['mysvc' => ['isGlobal' => false]]`, or
`['mysvc' => (object) ['IsGlobal' => true]]`.

Invalid inputs throw `InvalidArgumentException`: non-string/blank service or
region, invalid region syntax (`InvalidRegion` in the message), unregistered
service (`ServiceNotFound`), or an unsupported custom entry. Missing template
variables now fail immediately with `TemplateExecuteError` in the message.
There is no `StandProviderError` or symbolic `getStandCode()` in this provider.
Literal template text and replacement values are not fully validated as hostnames.

Explicit DualStack `true`/`false` takes priority; `null` reads
`VOLC_ENABLE_DUALSTACK`. `customBootstrapRegion` has no effect on Standard resolution.

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

[← Credentials](1-Credentials.md) | Endpoint[(中文)](2-Endpoint-zh.md) | [Transport →](3-Transport.md)
