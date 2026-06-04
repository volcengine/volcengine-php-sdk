[← 代理配置](4-Proxy-zh.md) | 超时配置[(English)](5-Timeout.md) | [重试机制 →](6-Retry-zh.md)

---

## 超时配置

业务 API 请求超时可以通过自定义 Guzzle client 配置。`timeout` 表示
总请求超时时间，`connect_timeout` 表示连接超时时间。

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

凭证 Provider 如果内部自行发起 HTTP 请求，会提供独立的超时配置。例如
`EcsRoleCredentialProvider` 支持 `setConnectTimeout()` 和
`setReadTimeout()`，用于配置 IMDS 请求超时。

---

[← 代理配置](4-Proxy-zh.md) | 超时配置[(English)](5-Timeout.md) | [重试机制 →](6-Retry-zh.md)
