[← 重试机制](6-Retry-zh.md) | 异常处理[(English)](7-ErrorHandling.md) | [Debug 机制 →](8-Debugging-zh.md)

---

## 异常处理

服务 API 调用现在会抛出 `Volcengine\Common\ApiException` 的类型化子类。

### 错误分类

- `ClientException`：HTTP `4xx` 响应以及服务端返回的客户端错误。
- `ServerException`：HTTP `5xx` 响应以及服务端返回的服务端错误。
- `ReadException`：网络读取失败和传输层错误。
- `ResponseTimeoutException`：超时类读取错误。
- `RequestCanceledException`：本地取消请求。
- `SerializationException`：响应反序列化失败。
- `ServiceException`：服务端错误的公共基类。

所有 `ApiException` 变体都支持结构化辅助方法，包括 `getStatusCode()`、
`getErrorCode()`、`getErrorMessage()`、`getOriginalError()`，同时仍可通过
`getResponseHeaders()` 获取响应头、通过 `getResponseBody()` 获取原始响应体。

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
} catch (\Volcengine\Common\Error\ClientException $e) {
    echo 'Client error: ', $e->getMessage(), PHP_EOL;
} catch (\Volcengine\Common\Error\ServerException $e) {
    echo 'Server error: ', $e->getMessage(), PHP_EOL;
} catch (\Volcengine\Common\Error\ResponseTimeoutException $e) {
    echo 'Timeout: ', $e->getMessage(), PHP_EOL;
} catch (\Volcengine\Common\Error\ReadException $e) {
    echo 'Transport error: ', $e->getMessage(), PHP_EOL;
} catch (\Volcengine\Common\Error\SerializationException $e) {
    echo 'Decode error: ', $e->getMessage(), PHP_EOL;
} catch (\Volcengine\Common\ApiException $e) {
    echo 'Status code: ', $e->getStatusCode(), PHP_EOL;
    echo 'Service code: ', $e->getErrorCode(), PHP_EOL;
    echo 'Service message: ', $e->getErrorMessage(), PHP_EOL;
    echo 'Response body: ', $e->getResponseBody(), PHP_EOL;
} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}
```

---

[← 重试机制](6-Retry-zh.md) | 异常处理[(English)](7-ErrorHandling.md) | [Debug 机制 →](8-Debugging-zh.md)
