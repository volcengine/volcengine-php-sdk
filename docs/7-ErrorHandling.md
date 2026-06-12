[← Retry](6-Retry.md) | Error Handling[(中文)](7-ErrorHandling-zh.md) | [Debugging →](8-Debugging.md)

---

## Error Handling

Service API calls raise typed subclasses of `Volcengine\Common\ApiException`.

### Error Categories

- `ClientException`: HTTP `4xx` responses and service-side client errors.
- `ServerException`: HTTP `5xx` responses and service-side server errors.
- `ReadException`: network read failures and transport-level errors.
- `ResponseTimeoutException`: timeout-specific read errors.
- `RequestCanceledException`: locally canceled requests.
- `SerializationException`: response deserialization failures.
- `ServiceException`: shared base class for service-returned errors.

All `ApiException` variants expose structured helpers including
`getStatusCode()`, `getErrorCode()`, `getErrorMessage()`, and
`getOriginalError()`, in addition to `getResponseHeaders()` and
`getResponseBody()`.

When you prefer shorter service-side messages, enable simple error formatting:

```php
<?php
$config->setSimpleError(true);
```

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

[← Retry](6-Retry.md) | Error Handling[(中文)](7-ErrorHandling-zh.md) | [Debugging →](8-Debugging.md)
