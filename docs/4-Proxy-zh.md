[← Transport](3-Transport-zh.md) | 代理配置[(English)](4-Proxy.md) | [超时配置 →](5-Timeout-zh.md)

---

## HTTP(S) 代理

PHP SDK 现在支持直接通过 `Configuration` 配置代理。

### 配置 HTTP/HTTPS 代理

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

### 配置统一代理映射

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setProxy([
        'http' => 'http://127.0.0.1:8888',
        'https' => 'http://127.0.0.1:8889',
    ]);
```

如果需要，也仍然可以传入自定义 Guzzle Client，但仅为了代理配置已经不再必需。

---

[← Transport](3-Transport-zh.md) | 代理配置[(English)](4-Proxy.md) | [超时配置 →](5-Timeout-zh.md)
