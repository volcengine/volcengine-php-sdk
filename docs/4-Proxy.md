[← Transport](3-Transport.md) | Proxy[(中文)](4-Proxy-zh.md) | [Timeout →](5-Timeout.md)

---

## HTTP(S) Proxy

The PHP SDK supports proxy configuration directly on `Configuration`.

### Configure Proxy

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing')
    ->setHttpProxy('http://127.0.0.1:8888')
    ->setHttpsProxy('http://127.0.0.1:8889');
```

### Configure Unified Guzzle Proxy Map

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setProxy([
        'http' => 'http://user:password@127.0.0.1:8888',
        'https' => 'http://127.0.0.1:8889',
        'no' => ['127.0.0.1', 'localhost'],
    ]);
```

Proxy credentials in URL userinfo are sent with Basic authentication. Percent-encode
special characters in the username or password as required by RFC 3986.

### Credential Requests

When `StsProvider`, `OidcCredentialProvider` or `SamlCredentialProvider` is set
directly through `setCredentialProvider()`, these Configuration proxy settings
also apply while obtaining STS credentials. A provider-specific
`setProxyUrl()` takes precedence. When neither is configured, Guzzle/curl uses
the standard `HTTP_PROXY`, `HTTPS_PROXY` and `NO_PROXY` environment variables.

This inheritance applies only to the proxy. Configure a custom STS CA or disable
STS certificate verification explicitly on the provider with `setCaFile()` or
`setInsecureSkipVerify()`.

Custom Guzzle clients remain supported, but the SDK no longer requires users to
inject one just to apply proxy settings.

---

[← Transport](3-Transport.md) | Proxy[(中文)](4-Proxy-zh.md) | [Timeout →](5-Timeout.md)
