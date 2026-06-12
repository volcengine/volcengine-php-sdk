[← Endpoint 配置](2-Endpoint-zh.md) | Transport[(English)](3-Transport.md) | [代理配置 →](4-Proxy-zh.md)

---

## HTTPS 请求配置

### 指定 scheme

> **默认**
>
> - `scheme` - `https`

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setSchema('https');  # 非必填，默认为https，可以定义为http
```

### 忽略 SSL 验证

> **默认**
>
> - `verifySsl` - `true`

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setVerifySsl(false); #非必填，默认为true需要验证ssl，false为不需要验证
```

### 配置自定义 CA 与客户端证书

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setSslCaCert('/etc/ssl/certs/ca-bundle.crt')
    ->setCertFile('/path/to/client.crt')
    ->setKeyFile('/path/to/client.key')
    ->setAssertHostname(true);
```

### 指定 TLS 协议版本

> **默认**
>
> >= TLS 1.2

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

### 调整 HTTP 连接池

通过 `Configuration::createHttpClient()` 创建的默认 Guzzle client 支持
连接池调优：

```php
<?php
$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setNumPools(4)
    ->setConnectionPoolMaxsize(20);

$client = $config->createHttpClient();
```

- `setNumPools()` 用于控制 SDK 管理的 HTTP client 使用的 curl multi
  handle 数量。
- `setConnectionPoolMaxsize()` 会映射到 `CURLOPT_MAXCONNECTS`，限制可复用
  的 keep-alive 连接上限。
- `setProgressListener()` 会透传 Guzzle 的 `progress` 回调，可用于上传/
  下载进度监听。
- 如果你需要自己创建 `GuzzleHttp\Client`，可以通过 `toHttpClientConfig()`
  导出整理后的 Guzzle 配置。

---

[← Endpoint 配置](2-Endpoint-zh.md) | Transport[(English)](3-Transport.md) | [代理配置 →](4-Proxy-zh.md)
