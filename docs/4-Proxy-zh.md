[← Transport](3-Transport-zh.md) | 代理配置[(English)](4-Proxy.md) | [超时配置 →](5-Timeout-zh.md)

---

## HTTP(S) 代理配置

> **默认**
>
> 无代理。

### 配置 HTTP(S) 代理

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing');
$apiInstance = new \Volcengine\Vpc\Api\VPCApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client([
        'proxy' => [
            'http'  => 'http://127.0.0.1:8888',  // HTTP 请求用此代理
            'https' => 'http://127.0.0.1:8889'   // HTTPS 请求用此代理
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

[← Transport](3-Transport-zh.md) | 代理配置[(English)](4-Proxy.md) | [超时配置 →](5-Timeout-zh.md)
