English | [中文](README.md)

# Volcengine SDK for PHP

## Requirements

PHP 5.5 and later

## Installation & Usage

### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "require": {
    "volcengine/volcengine-php-sdk": "v1.0.94"
  }
}
```

Then run `composer install`.

## Getting Started

Please follow the [installation procedure](#installation--usage).

##### Endpoint Configuration

If you want to customize the SDK endpoint, use the following example:

```php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your AK")
    ->setSk("Your SK")
    ->setRegion("cn-beijing")
    ->setHost("ecs.cn-beijing-autodriving.volcengineapi.com");
```

Standard endpoint rules:

| Regional Service | Global Service |
|---|---|
| `{service}.{region}.volcengineapi.com` <br> e.g. `ecs.cn-beijing-autodriving.volcengineapi.com` | `{service}.volcengineapi.com` <br> e.g. `iam.volcengineapi.com` |

Note:

- If the service name contains `_`, it should be converted to `-` in the endpoint. Use lowercase for all characters.

##### SDK Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your AK")
    ->setSk("Your SK")
    ->setRegion("cn-beijing");

$apiInstance = new \Volcengine\Vpc\Api\VPCApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\\ClientInterface`.
    // This is optional, `GuzzleHttp\\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$body = new \Volcengine\Vpc\Model\CreateVpcRequest();
$body->setClientToken("token-123456789")
    ->setCidrBlock("192.168.0.0/16")
    ->setDnsServers(array("10.0.0.1", "10.1.1.2"));

try {
    $result = $apiInstance->createVpc($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->createVpc: ', $e->getMessage(), PHP_EOL;
}

?>
```
