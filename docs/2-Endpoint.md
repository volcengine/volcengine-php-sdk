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

To simplify configuration, the SDK provides a flexible automatic endpoint resolution mechanism. It constructs the access URL from the service name, region, and other information, with optional DualStack (IPv4 + IPv6) support.

#### Default Resolution Logic

##### Resolution Logic

1. **Region-based resolution**

    Built-in region list: [`./src/Common/Endpoint/Providers/DefaultEndpointProvider.php`](../src/Common/Endpoint/Providers/DefaultEndpointProvider.php).

    The SDK only performs automatic resolution for preset regions (e.g. `cn-beijing-autodriving`, `ap-southeast-2`) or user-configured regions; other regions default to `open.volcengineapi.com`.

    Users can extend the region list via the `VOLC_BOOTSTRAP_REGION_LIST_CONF` environment variable or the `customBootstrapRegion` option in code.

2. **DualStack support (IPv6)**

    The SDK supports dual-stack (IPv4 + IPv6) access URLs. In the regular `ApiClient` configuration path, the default `useDualStack=false` value is passed to the Endpoint Provider as an explicit setting. To enable DualStack, call `setUseDualStack(true)`. `VOLC_ENABLE_DUALSTACK=true` only takes effect when the Endpoint Provider receives `useDualStack` as `null`.

    When enabled, the domain suffix changes from `volcengineapi.com` to `volcengine-api.com`.

3. **Endpoint construction rules by service name and region**

    - **Global services (e.g. `CDN`, `IAM`)**: Use `<service>.volcengineapi.com` (or `volcengine-api.com` with DualStack). Example: `cdn.volcengineapi.com`.
    - **Regional services (e.g. `ECS`, `RDS`)**: Use `<service>.<region>.volcengineapi.com`. Example: `ecs.cn-beijing.volcengineapi.com`.

##### Code Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setUseDualStack(true)    // enable dual-stack (IPv4 + IPv6), default false
    ->setCustomBootstrapRegion([
        'custom_example_region1' => [],
        'custom_example_region2' => [],
    ]);  // custom auto-resolution region list
```

---

[← Credentials](1-Credentials.md) | Endpoint[(中文)](2-Endpoint-zh.md) | [Transport →](3-Transport.md)
