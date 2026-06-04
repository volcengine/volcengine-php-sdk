[← Proxy](4-Proxy.md) | Timeout[(中文)](5-Timeout-zh.md) | [Retry →](6-Retry.md)

---

## Timeout

Business API request timeout can be configured through a custom Guzzle client.
Set `timeout` for the total request timeout and `connect_timeout` for the
connection timeout.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing');

$apiInstance = new \Volcengine\Vpc\Api\VPCApi(
    new GuzzleHttp\Client([
        'connect_timeout' => 3,
        'timeout' => 30,
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

Credential providers that make their own HTTP calls can expose separate timeout
setters. For example, `EcsRoleCredentialProvider` supports
`setConnectTimeout()` and `setReadTimeout()` for IMDS requests.

---

[← Proxy](4-Proxy.md) | Timeout[(中文)](5-Timeout-zh.md) | [Retry →](6-Retry.md)
