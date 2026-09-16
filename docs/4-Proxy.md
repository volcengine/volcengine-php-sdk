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

For these exact built-in provider classes, each `ApiClient` creates a private
provider snapshot on its first request, even when AK/SK are supplied. The
snapshot owns its proxy/TLS settings and any credential cache; it does not
inherit a warm source cache or modify the source provider. Subsequent requests
reuse it, and pending async retries retain their original snapshot.

Changing the configured provider or effective Configuration proxy (including
clearing it) creates a new snapshot on the next request. After changing settings
on the same source provider, call `ApiClient::setNewClientConfig()` or create a
new client to apply them to future requests. OIDC token files are still read on
refresh. Custom providers, subclasses, and providers inside credential chains
are not automatically cloned and do not gain this isolation guarantee.

Custom Guzzle clients remain supported, but the SDK no longer requires users to
inject one just to apply proxy settings.

---

[← Transport](3-Transport.md) | Proxy[(中文)](4-Proxy-zh.md) | [Timeout →](5-Timeout.md)
