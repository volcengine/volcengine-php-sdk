[← 异常处理](7-ErrorHandling-zh.md) | Debug 机制[(English)](8-Debugging.md) | [SDK 集成 →](../SDK_Integration_zh.md)

---

## Debug 机制

在 `Configuration` 上开启 debug 后，SDK 会把 Guzzle 的 debug 输出选项传给
HTTP 请求。默认输出到 `php://output`，也可以通过 `setDebugFile()` 写入文件。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing')
    ->setDebug(true)
    ->setDebugFile('/tmp/volcengine-php-sdk-debug.log');

$apiInstance = new \Volcengine\Vpc\Api\VPCApi(null, $config);

try {
    $result = $apiInstance->describeVpcs(new \Volcengine\Vpc\Model\DescribeVpcsRequest());
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->describeVpcs: ', $e->getMessage(), PHP_EOL;
}
```

排查问题时，也可以通过 `Configuration::toDebugReport()` 输出运行环境信息。

---

[← 异常处理](7-ErrorHandling-zh.md) | Debug 机制[(English)](8-Debugging.md) | [SDK 集成 →](../SDK_Integration_zh.md)
