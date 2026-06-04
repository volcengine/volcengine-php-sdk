[← Timeout](5-Timeout.md) | Retry[(中文)](6-Retry-zh.md) | [Error Handling →](7-ErrorHandling.md)

---

## Retry

The PHP SDK does not currently provide a global retry policy for business API
requests sent through service clients such as `VPCApi`.

Credential acquisition has targeted retry support:

- `EcsRoleCredentialProvider` retries IMDS requests and supports
  `setMaxRetries()` and `setRetryInterval()`.
- OIDC and SAML STS credential providers retry transient STS failures such as
  network errors, HTTP 429, and HTTP 5xx.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$provider = \Volcengine\Common\Auth\Providers\EcsRoleCredentialProvider::create("YourRoleName")
    ->setMaxRetries(3)
    ->setRetryInterval(1);

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setCredentialProvider($provider)
    ->setRegion('cn-beijing');
```

---

[← Timeout](5-Timeout.md) | Retry[(中文)](6-Retry-zh.md) | [Error Handling →](7-ErrorHandling.md)
