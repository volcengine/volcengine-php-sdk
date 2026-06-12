[← 访问凭据](1-Credentials-zh.md) | Endpoint 配置[(English)](2-Endpoint.md) | [Transport →](3-Transport-zh.md)

---

## Endpoint 配置

PHP SDK 当前支持三种 Endpoint 配置方式：

1. 直接 `setHost()`
2. 使用固定域名的 `HostEndpointProvider`
3. 使用自动解析的 `DefaultEndpointProvider` / `StandardEndpointProvider`

### 固定 Host

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

`StandardEndpointProvider` 会校验 region，并在失败时抛出带类型化错误码的
`StandProviderError`，例如 `InvalidRegion`、`ServiceNotFound`、
`TemplateExecuteError`。

### Endpoint 解析选项

`Configuration` 直接暴露了常用的解析选项：

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion('ap-singapore-1')
    ->setStrictEndpointMatching(true)
    ->setResolveUnknownService(false)
    ->setEndpointSite('volcengine-api')
    ->setEndpointIpVersion('DualStack');
```

- `setStrictEndpointMatching(true)` 要求 region 必须存在于内置规则中。
- `setResolveUnknownService(true)` 允许对未内置的 service 使用兜底 host 模板。
- `setEndpointSite()` 可覆盖 `volcengineapi` / `volcengine-api` 这类站点后缀片段。
- `setEndpointIpVersion('IPv4'|'DualStack')` 控制 IPv4 或双栈 host。

### 基于文件的 Endpoint 规则

当你需要在不升级 SDK 的情况下补充 service 或 region host 时，可以启用
文件规则：

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion('cn-beijing')
    ->setEndpointConfigState(true)
    ->setEndpointConfigPath('/path/to/endpoints.json');
```

支持的 JSON 结构：

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

一旦文件规则返回 host，会优先于内置标准解析器。

---

[← 访问凭据](1-Credentials-zh.md) | Endpoint 配置[(English)](2-Endpoint.md) | [Transport →](3-Transport-zh.md)
