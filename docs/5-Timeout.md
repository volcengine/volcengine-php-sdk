[← Proxy](4-Proxy.md) | Timeout[(中文)](5-Timeout-zh.md) | [Retry →](6-Retry.md)

---

## Timeout

The PHP SDK supports global transport timeouts through `Configuration`.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing')
    ->setConnectTimeout(3)
    ->setReadTimeout(30);
```

When you pass a custom `GuzzleHttp\Client` to a generated API, timeout values
set directly on that client take precedence. If the custom client does not set
`timeout` or `connect_timeout`, the SDK uses `Configuration::setReadTimeout()`
and `Configuration::setConnectTimeout()`.

`StsProvider` and `EcsRoleCredentialProvider` also expose dedicated timeout
setters for credential-fetching flows.

---

[← Proxy](4-Proxy.md) | Timeout[(中文)](5-Timeout-zh.md) | [Retry →](6-Retry.md)
