[← Retry](6-Retry.md) | Error Handling[(中文)](7-ErrorHandling-zh.md) | [Debugging →](8-Debugging.md)

---

## Error Handling

Service API failures throw `Volcengine\Common\ApiException`.

`ApiException` exposes `getStatusCode()`, `getErrorCode()`,
`getErrorMessage()`, and `getOriginalError()`, in addition to
`getResponseHeaders()` and `getResponseBody()`.

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
    echo 'Status code: ', $e->getStatusCode(), PHP_EOL;
    echo 'Service code: ', $e->getErrorCode(), PHP_EOL;
    echo 'Service message: ', $e->getErrorMessage(), PHP_EOL;
    echo 'Response body: ', $e->getResponseBody(), PHP_EOL;
} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}
```

---

[← Retry](6-Retry.md) | Error Handling[(中文)](7-ErrorHandling-zh.md) | [Debugging →](8-Debugging.md)
