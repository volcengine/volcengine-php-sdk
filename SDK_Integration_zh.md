# 目录

- [目录](#目录)
- [集成SDK](#集成sdk)
- [环境要求](#环境要求)
- [访问凭据](#访问凭据)
    - [AK、SK设置](#aksk设置)
    - [STS Token设置](#sts-token设置)
    - [AssumeRole](#assumerole)
- [EndPoint配置](#endpoint配置)
    - [自定义Endpoint](#自定义endpoint)
    - [自定义RegionId](#自定义regionid)
    - [自动化Endpoint寻址](#自动化endpoint寻址)
        - [Endpoint默认寻址](#endpoint默认寻址)
- [Http连接池配置](#http连接池配置)
- [Https请求配置](#https请求配置)
    - [指定scheme](#指定scheme)
    - [忽略SSL验证](#忽略ssl验证)
    - [指定TLS协议版本](#指定tls协议版本)
- [Http(s)代理配置](#https代理配置)
    - [配置Http(s)代理](#配置https代理)

# 集成SDK

在调用接口时，推荐在项目中集成 SDK 的方式进行接入。通过使用 SDK，不仅可以简化开发流程、加快功能集成速度，还能有效降低后期的维护成本。火山引擎
SDK 的集成主要包括以下三个步骤：引入 SDK、配置访问凭证，以及编写接口调用代码。本文将结合常见使用场景，详细说明各步骤的实现方法及注意事项。

# 环境要求

1. PHP环境版本>=5.5
2. 建议使用composer的方式进行包管理

# 访问凭据

为保障资源访问安全，火山引擎 PHP SDK 目前支持 `AK/SK`和 `STS Token` 认证设置。

## AK、SK设置

AK/SK 是由火山引擎用户在控制台创建的一对永久访问密钥。SDK 使用该密钥对每次请求进行签名，从而完成身份验证。

> ⚠️ 注意事项
>
> 1. 不得在客户端嵌入或暴露 AK/SK。
> 2. 推荐使用配置中心或环境变量存储密钥。
> 3. 配置合理的最小权限访问策略。

**代码示例：**

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your AK")
    ->setSk("Your SK")
    ->setRegion("cn-beijing")
    ->setVerifySsl(false)  #非必填，默认为true，是否验证ssl
    ->setDebug(true) #非必填，默认为false，是否开启debug模式
    ->setHost('open.volcengineapi.com') #非必填，默认为open.volcengineapi.com
    ->setSchema('https'); #非必填，默认为https，可选https或者http

$apiInstance = new \Volcengine\Vpc\API\VPCApi(
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
    $responseMetaData = $result->offsetGet('ResponseMetadata');  //包含了返回的请求信息，action + version + RequestId + service + Region
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->createVpc: ', $e->getMessage(), PHP_EOL;
}

?>
```

## STS Token设置

STS（Security Token Service）是火山引擎提供的临时访问凭证机制。开发者通过服务端调用 STS 接口获取临时凭证（临时 AK、SK 和
Token），有效期可配置，适用于安全要求较高的场景。

> ⚠️ 注意事项
>
> 1. 最小权限： 仅授予调用方访问所需资源的最小权限，避免使用 * 通配符授予全资源、全操作权限。
> 2. 设置合理的有效期: 请根据实际情况设置合理有效期，越短越安全，建议不要超过1小时。

```PHP
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk('Your AK')
    ->setSk('Your SK')
    ->setSessionToken('Your session token')
    ->setRegion("cn-beijing");

$apiInstance = new \Volcengine\Vpc\Api\VPCApi(
// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
// This is optional, `GuzzleHttp\Client` will be used as default.
    new \GuzzleHttp\Client(),
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

## AssumeRole

动态访问凭证信息，支持动态刷新，在STS临时Token过期前60S会进行自动的刷新，避免临界时间点Token过期

> ⚠️ 注意事项
>
> 1. 最小权限： 仅授予调用方访问所需资源的最小权限，避免使用 * 通配符授予全资源、全操作权限。
> 2. 设置合理的有效期: 请根据实际情况设置合理有效期，越短越安全，最长不能超过12小时。
> 3. 细粒度角色: 角色应绑定精细的访问控制策略，仅允许访问特定服务、资源、操作，防止角色滥用。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$sts = new \Volcengine\Common\auth\providers\StsProvider(
    "Your ak", # 必填，子账号的ak
    "Your sk", # 必填，子账号的sk
    "Your role name",  # 必填，子账号的角色TRN，如trn:iam::2110400000:role/role123  ,此处填写role123
    "Your account id",  # 必填，子账号的角色TRN，如trn:iam::2110400000:role/role123  ,此处填写2110400000
    "cn-beijing", # 非必填，请求服务器区域地址，默认cn-north-1
    "3600", # 非必填，有效期默认3600秒
    "https", # 非必填，域名前缀，默认https
    "sts.volcengineapi.com", # 非必填，请求域名，默认sts.volcengineapi.com
    '{"Statement":[{"Effect":"Allow","Action":["vpc:CreateVpc"],"Resource":["*"],"Condition":{"StringEquals":{"volc:RequestedRegion":["cn-beijing"]}}}]}' # 非必填，授权策略，默认为空
);

try {
    $result = $sts->getCredentials();
    print_r($result);
    /**
     * $result返回结果如下
     * Array
     * (
     * [ExpiredTime] => 2025-10-27T12:08:12+08:00   # 临时凭证的过期时间
     * [CurrentTime] => 2025-10-27T11:08:12+08:00   # 临时凭证的生成时间
     * [AccessKeyId] => ************  # 临时凭证的ak
     * [SecretAccessKey] => ************  #临时凭证的sk
     * [SessionToken] => ***************  #临时凭证的token
     * )*
     */
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->createVpc: ', $e->getMessage(), PHP_EOL;
}

```

# EndPoint配置

## 自定义Endpoint

> - **默认**  
    > 不指定endpoint时，走[自动化Endpoint寻址](#自动化Endpoint寻址)

用户可以通过在初始化客户端时指定Endpoint

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setHost('https://open.volcengineapi.com');  # 自定义Endpoint，可填写带协议前缀的完整域名（如示例），也可仅填写域名主体（不含 http/https 前缀）
```

## 自定义RegionId

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion("cn-beijing"); #自定义RegionId
```

## 自动化Endpoint寻址

> - **默认**  
    > 默认支持自动寻址，无需手动指定Endpoint

为了简化用户配置，Volcengine 提供了灵活的 Endpoint 自动寻址机制。用户无需手动指定服务地址，SDK
会根据服务名称、区域（Region）等信息自动拼接出合理的访问地址，并支持用户自定义DualStack（双栈）支持。

### Endpoint默认寻址

**Endpoint默认寻址逻辑**

1. 是否自动寻址Region  
   内置自动寻址Region列表代码:[./src/Common/endpoint/providers/DefaultEndpointProvider.php](src/Common/endpoint/providers/DefaultEndpointProvider.php#L24)  
   SDK 仅对部分预设区域（如
   cn-beijing-autodriving、ap-southeast-2）或用户配置的区域执行自动寻址；其他区域默认返回Endpoint：open.volcengineapi.com。  
   用户可通过环境变量 VOLC_BOOTSTRAP_REGION_LIST_CONF 或代码中自定义 customBootstrapRegion 来扩展控制区域列表。
2. DualStack 支持（IPv6）  
   SDK 支持双栈网络（IPv4 + IPv6）访问地址，自动启用条件如下：    
   显式传入参数 useDualStack = true，或设置环境变量 VOLC_ENABLE_DUALSTACK=true，优先级useDualStack>VOLC_ENABLE_DUALSTACK  
   启用后，域名后缀将从 volcengineapi.com 切换为 volcengine-api.com。
3. 根据服务名和区域自动构造 Endpoint 地址，规则如下：  
   **全局服务（如 CDN、IAM）**  
   使用 <服务名>.volcengineapi.com（或启用双栈时使用 volcengine-api.com）。  
   示例：cdn.volcengineapi.com  
   **区域服务（如 ECS、RDS）**  
   使用 <服务名>.<区域名>.volcengineapi.com 作为默认 Endpoint。  
   示例：ecs.cn-beijing.volcengineapi.com

**代码示例：**

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setUseDualStack(True)  # // 定义是否启用双栈网络（IPv4 + IPv6）访问地址，默认false
    ->setCustomBootstrapRegion([
        'custom_example_region1' => [],
        'custom_example_region2' => []
    ]);  # 自定义自动寻址Region列表
```

# Https请求配置

## 指定scheme

> **默认**
> * `scheme` - `https`

**代码示例：**

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setSchema('https');  # 非必填，默认为https，可以定义为http
```

## 忽略SSL验证

> **默认**
> * `verifySsl` - `True`

**代码示例：**

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setVerifySsl(false); #非必填，默认为true需要验证ssl，false为不需要验证
```

## 指定TLS协议版本

> - **默认**  
    > \>=TLS 1.2

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

# Http(s)代理配置

> - **默认**
    > 无代理

## 配置Http(s)代理

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