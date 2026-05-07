[← Endpoint 配置](2-Endpoint-zh.md) | Transport[(English)](3-Transport.md) | [超时配置 →](4-Timeout-zh.md)

---

## HTTPS 请求配置

## 指定 scheme

> **默认**
>
> - `scheme` - `https`

**代码示例：**

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setSchema('https');  # 非必填，默认为https，可以定义为http
```

## 忽略 SSL 验证

> **默认**
>
> - `verifySsl` - `True`

**代码示例：**

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setVerifySsl(false); #非必填，默认为true需要验证ssl，false为不需要验证
```

## 指定 TLS 协议版本

> **默认**
>
> >=TLS 1.2

目前只支持自定义HTTPClient的方式实现；如果没有特殊要求，建议不要修改。

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
        'curl' => [
            CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_2, // 指定 TLS 1.2
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

[← Endpoint 配置](2-Endpoint-zh.md) | Transport[(English)](3-Transport.md) | [超时配置 →](4-Timeout-zh.md)
