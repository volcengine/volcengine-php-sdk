[← Credentials](1-Credentials.md) | Endpoint[(中文)](2-Endpoint-zh.md) | [Transport →](3-Transport.md)

---

## Endpoint Configuration

> **Default**
>
> If endpoint is not specified, the SDK uses automatic endpoint resolution.

### Custom Endpoint

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

---

[← Credentials](1-Credentials.md) | Endpoint[(中文)](2-Endpoint-zh.md) | [Transport →](3-Transport.md)
