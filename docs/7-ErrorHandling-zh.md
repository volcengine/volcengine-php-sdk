[← 重试机制](6-Retry-zh.md) | 异常处理[(English)](7-ErrorHandling.md) | [Debug 机制 →](8-Debugging-zh.md)

---

## 异常处理

服务 API 调用在遇到 HTTP 错误、Guzzle `RequestException`，或响应中包含
`ResponseMetadata.Error` 时，会抛出 `Volcengine\Common\ApiException`。
DNS、连接超时等连接层 Guzzle `TransferException` 仍可能直接抛出。

`ApiException` 可以通过 `getCode()` 获取 HTTP 状态码，通过
`getResponseHeaders()` 获取响应头，通过 `getResponseBody()` 获取原始响应体。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing');

$apiInstance = new \Volcengine\Vpc\Api\VPCApi(null, $config);

try {
    $result = $apiInstance->describeVpcs(new \Volcengine\Vpc\Model\DescribeVpcsRequest());
    print_r($result);
} catch (\Volcengine\Common\ApiException $e) {
    echo 'Status code: ', $e->getCode(), PHP_EOL;
    echo 'Response body: ', $e->getResponseBody(), PHP_EOL;
} catch (\GuzzleHttp\Exception\TransferException $e) {
    echo 'Transport exception: ', $e->getMessage(), PHP_EOL;
} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}
```

---

[← 重试机制](6-Retry-zh.md) | 异常处理[(English)](7-ErrorHandling.md) | [Debug 机制 →](8-Debugging-zh.md)
