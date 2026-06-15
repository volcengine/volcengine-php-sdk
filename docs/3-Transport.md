[← Endpoint](2-Endpoint.md) | Transport[(中文)](3-Transport-zh.md) | [Proxy →](4-Proxy.md)

---

## HTTPS Request Configuration

### Specify Scheme

> **Default**
>
> - `scheme` - `https`

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setSchema('https');
```

### Ignore SSL Verification

> **Default**
>
> - `verifySsl` - `true`

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setVerifySsl(false);
```

### Configure Custom CA and Client Certificates

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setSslCaCert('/etc/ssl/certs/ca-bundle.crt')
    ->setCertFile('/path/to/client.crt')
    ->setKeyFile('/path/to/client.key')
    ->setAssertHostname(true);
```

### Specify TLS Version

> **Default**
>
> >= TLS 1.2

Use a custom HTTP client to set TLS version. Unless you have specific requirements, it is recommended not to modify this.

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
            CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2, // TLS 1.2
        ],
    ]),
    $config
);

$body = new \Volcengine\Vpc\Model\CreateVpcRequest();
$body->setCidrBlock("192.168.0.0/16");

try {
    $result = $apiInstance->createVpc($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->createVpc: ', $e->getMessage(), PHP_EOL;
}
```

---

[← Endpoint](2-Endpoint.md) | Transport[(中文)](3-Transport-zh.md) | [Proxy →](4-Proxy.md)
