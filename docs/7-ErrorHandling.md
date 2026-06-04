[← Retry](6-Retry.md) | Error Handling[(中文)](7-ErrorHandling-zh.md) | [Debugging →](8-Debugging.md)

---

## Error Handling

Service API calls throw `Volcengine\Common\ApiException` for HTTP errors,
transport request failures wrapped by Guzzle, and API responses that contain
`ResponseMetadata.Error`.

`ApiException` exposes the HTTP status code through `getCode()`, response
headers through `getResponseHeaders()`, and the raw response body through
`getResponseBody()`.

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
} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}
```

---

[← Retry](6-Retry.md) | Error Handling[(中文)](7-ErrorHandling-zh.md) | [Debugging →](8-Debugging.md)
