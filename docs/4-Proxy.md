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
        'http' => 'http://127.0.0.1:8888',
        'https' => 'http://127.0.0.1:8889',
    ]);
```

Custom Guzzle clients remain supported, but the SDK no longer requires users to
inject one just to apply proxy settings.

---

[← Transport](3-Transport.md) | Proxy[(中文)](4-Proxy-zh.md) | [Timeout →](5-Timeout.md)
