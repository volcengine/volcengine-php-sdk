中文 | [English](README.EN.MD)

# Volcengine SDK for PHP

## Requirements

PHP 5.5 and later

## Installation & Usage

### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "require": {
    "volcengine/volcengine-php-sdk": "v1.0.98"
  }
}
```

Then run `composer install`

## Getting Started

Please follow the [installation procedure](#installation--usage)

##### Endpoint 设置 #####

如果您要自定义SDK的Endpoint，可以按照以下示例代码设置：

```php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your AK")
    ->setSk("Your SK")
    ->setRegion("cn-beijing")
    ->setHost("ecs.cn-beijing-autodriving.volcengineapi.com");
```

火山引擎标准的Endpoint规则说明：

| Regional 服务                                                                                                                            | Global 服务                                                                          |
|----------------------------------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------|
| `{service}.{region}.volcengineapi.com` <br> 例如：云服务ecs在cn-beijing-autodriving Region域名为： `ecs.cn-beijing-autodriving.volcengineapi.com` | `{service}.volcengineapi.com` <br> 例如：访问控制iam为Global服务，域名为：`iam.volcengineapi.com` |

注：

- Service中存在_符号时，Endpoint时需转为-符号。存在大写字母时需转成小写。

##### SDK 示例 #####

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your AK")
    ->setSk("Your SK")
    ->setRegion("cn-beijing");

$apiInstance = new \Volcengine\Vpc\Api\VPCApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
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
