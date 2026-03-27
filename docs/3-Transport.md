[← Endpoint](2-Endpoint.md) | Transport[(中文)](3-Transport-zh.md) | [Timeout →](4-Timeout.md)

---

# HTTPS Request Configuration

## Specify Scheme

> **Default**: `https`

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setSchema('https');
```

## Ignore SSL Verification

> **Default**: `verifySsl=true`

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setVerifySsl(false);
```

## Specify TLS Version

Use a custom HTTP client to set TLS version.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing');

$apiInstance = new \Volcengine\Vpc\Api\VPCApi(
    new GuzzleHttp\Client([
        'curl' => [
            CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2,
        ],
    ]),
    $config
);
```

# HTTP(S) Proxy

## Configure HTTP(S) Proxy

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing');

$apiInstance = new \Volcengine\Vpc\Api\VPCApi(
    new GuzzleHttp\Client([
         'proxy' => [
            'http'  => 'http://127.0.0.1:8888',
            'https' => 'http://127.0.0.1:8889'
        ],
    ]),
    $config
);
```

---

[← Endpoint](2-Endpoint.md) | Transport[(中文)](3-Transport-zh.md) | [Timeout →](4-Timeout.md)
