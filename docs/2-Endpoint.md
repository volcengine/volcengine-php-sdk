[← Credentials](1-Credentials.md) | Endpoint[(中文)](2-Endpoint-zh.md) | [Transport →](3-Transport.md)

---

## Endpoint Configuration

The PHP SDK supports three endpoint paths:

1. Direct `setHost()`
2. `HostEndpointProvider` for a fixed host
3. `DefaultEndpointProvider` / `StandardEndpointProvider` for automatic resolution

### Fixed Host

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setHost('https://open.volcengineapi.com');
```

### Host Endpoint Provider

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setEndpointProvider(
        new \Volcengine\Common\Endpoint\Providers\HostEndpointProvider('custom.volcengineapi.com')
    );
```

### Standard Endpoint Provider

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion('cn-beijing')
    ->setUseDualStack(true)
    ->setEndpointProvider(new \Volcengine\Common\Endpoint\Providers\StandardEndpointProvider());
```

`StandardEndpointProvider` validates regions and throws `StandProviderError`
with typed codes such as `InvalidRegion`, `ServiceNotFound`, and
`TemplateExecuteError`.

### Endpoint Resolver Options

`Configuration` exposes the common resolver options directly:

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion('ap-singapore-1')
    ->setStrictEndpointMatching(true)
    ->setResolveUnknownService(false)
    ->setEndpointSite('volcengine-api')
    ->setEndpointIpVersion('DualStack');
```

- `setStrictEndpointMatching(true)` requires the region to exist in the built-in rules.
- `setResolveUnknownService(true)` allows fallback host generation for services not in the built-in table.
- `setEndpointSite()` overrides the suffix segment such as `volcengineapi` or `volcengine-api`.
- `setEndpointIpVersion('IPv4'|'DualStack')` controls IPv4 vs dual-stack host generation.

### File-Based Endpoint Rules

Enable file-based endpoint rules when you need to patch service or region hosts
without upgrading the SDK:

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion('cn-beijing')
    ->setEndpointConfigState(true)
    ->setEndpointConfigPath('/path/to/endpoints.json');
```

Supported JSON shapes:

```json
{
  "services": {
    "ecs": {
      "regions": {
        "cn-beijing": "ecs-cn-beijing.example.com"
      },
      "global": "ecs.example.com",
      "template": "{service}.{region}.{site}.example.com"
    }
  }
}
```

When file rules return a host, they take precedence over the built-in standard
resolver.

---

[← Credentials](1-Credentials.md) | Endpoint[(中文)](2-Endpoint-zh.md) | [Transport →](3-Transport.md)
