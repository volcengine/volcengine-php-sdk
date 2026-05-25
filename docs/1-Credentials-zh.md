[← 概览](0-Overview-zh.md) | 访问凭据[(English)](1-Credentials.md) | [Endpoint 配置 →](2-Endpoint-zh.md)

---

## 访问凭据

火山引擎 PHP SDK 同时支持显式凭证配置，以及基于 `CredentialProvider` 的自动凭证解析。

### 凭证提供者概览

| Provider | 用途 | 是否自动刷新 | 典型场景 |
| --- | --- | --- | --- |
| 直接在 `Configuration` 中设置 `AK/SK` 或 `AK/SK/Token` | 显式传入固定或临时凭证 | 否 | 简单服务端接入 |
| `StsProvider` | STS AssumeRole | 否 | 基于角色的临时凭证（每次调用都请求 STS，需调用方自行缓存） |
| `OidcCredentialProvider` | STS AssumeRoleWithOIDC | 是 | OIDC 联邦身份 |
| `SamlCredentialProvider` | STS AssumeRoleWithSAML | 是 | SAML 联邦身份 |
| `EnvironmentVariableCredentialProvider` | 从环境变量读取 | 否 | CI/CD、容器注入 |
| `CLIConfigCredentialProvider` | 从 `~/.volcengine/config.json` 读取 | 视 mode 而定 | 复用 CLI 登录态或 profile |
| `EcsRoleCredentialProvider` | 从 ECS IMDS 读取 | 是 | ECS 实例角色凭证 |
| `DefaultCredentialProvider` | 默认凭证链封装 | 取决于实际命中的 provider | 业务代码不显式写 AK/SK |

### AK、SK 设置

AK/SK 是由火山引擎用户在控制台创建的一对永久访问密钥。SDK 使用该密钥对每次请求进行签名，从而完成身份验证。

> ⚠️ **注意事项**
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

### STS Token 设置

STS（Security Token Service）是火山引擎提供的临时访问凭证机制。开发者通过服务端调用 STS 接口获取临时凭证（临时 AK、SK 和 Token），有效期可配置，适用于安全要求较高的场景。

> ⚠️ **注意事项**
>
> 1. 最小权限：仅授予调用方访问所需资源的最小权限，避免使用 * 通配符授予全资源、全操作权限。
> 2. 设置合理的有效期: 请根据实际情况设置合理有效期，越短越安全，建议不要超过1小时。

```php
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

### AssumeRole

动态访问凭证信息。`StsProvider::getCredentials()` 每次调用都会请求 STS `AssumeRole` 并返回响应中的 `Result.Credentials`，自身不维护本地缓存或过期前刷新窗口。该 provider 只处理 HTTP 状态和 STS 返回的 `ResponseMetadata.Error`，不会额外校验响应 JSON 中的 `Credentials` 字段完整性。

> ⚠️ **注意事项**
>
> 1. 最小权限：仅授予调用方访问所需资源的最小权限，避免使用 * 通配符授予全资源、全操作权限。
> 2. 设置合理的有效期: 请根据实际情况设置合理有效期，越短越安全，最长不能超过12小时。
> 3. 细粒度角色: 角色应绑定精细的访问控制策略，仅允许访问特定服务、资源、操作，防止角色滥用。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$sts = new \Volcengine\Common\Auth\Providers\StsProvider(
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
    * )
    */
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->createVpc: ', $e->getMessage(), PHP_EOL;
}

```

### OIDC 凭证提供者

`OidcCredentialProvider` 通过 STS AssumeRoleWithOIDC 获取临时凭证并缓存复用，在到期前自动刷新。过期时间优先使用 STS 返回的 `Expiration`；若响应中未携带该字段，则按本地 `durationSeconds` 估算。建议把 `durationSeconds` 设得略短，留出网络与时钟漂移余量。

支持的 OIDC 环境变量：

- `VOLCENGINE_OIDC_ROLE_TRN`
- `VOLCENGINE_OIDC_TOKEN_FILE`
- `VOLCENGINE_OIDC_ROLE_SESSION_NAME`
- `VOLCENGINE_OIDC_ROLE_POLICY`
- `VOLCENGINE_OIDC_STS_ENDPOINT`

可以直接传参构造，也可以通过 `OidcCredentialProvider::fromEnvironment()` 从环境变量创建。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$provider = new \Volcengine\Common\Auth\Providers\OidcCredentialProvider(
    "trn:iam::1234567890:role/oidc-role",   // roleTrn（必填）
    "/var/run/secrets/oidc/token",           // oidcTokenFile（必填）
    "credentials-php-demo",                  // roleSessionName（可选）
    null,                                    // rolePolicy（可选）
    "sts.volcengineapi.com"                  // stsEndpoint（可选）
);

// 可选：通过 fluent setter 调整重试和传输参数
// $provider->setSchema('https')       // 'http' 或 'https'，默认 'https'
//          ->setMaxRetries(3)          // 额外重试次数；0 = 不重试，默认 3
//          ->setRetryInterval(1);      // 重试间隔秒数，默认 1

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider($provider);
```

基于环境变量的示例：

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

putenv("VOLCENGINE_OIDC_ROLE_TRN=trn:iam::1234567890:role/oidc-role");
putenv("VOLCENGINE_OIDC_TOKEN_FILE=/var/run/secrets/oidc/token");

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider(
        \Volcengine\Common\Auth\Providers\OidcCredentialProvider::fromEnvironment()
    );
```

### SAML 凭证提供者

`SamlCredentialProvider` 通过 SAML 2.0 IdP 返回的 SAML 断言调用 STS `AssumeRoleWithSAML` 接口换取临时凭证并缓存复用，在到期前自动刷新。过期时间按本地 `durationSeconds` 估算；建议把 `durationSeconds` 设得略短，留出网络与时钟漂移余量。

> ⚠️ **注意事项**
>
> 1. 最小权限原则。
> 2. 合理的有效期；建议不超过 1 小时。
> 3. `samlAssertion` 为 IdP 返回的 base64 编码的 SAML Response。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$provider = new \Volcengine\Common\Auth\Providers\SamlCredentialProvider(
    "YourRoleName",                            // roleName（必填）
    "1234567890",                              // account id（必填）
    "MyIdp",                                   // SAML provider 名称（必填）
    "BASE64_ENCODED_SAML_RESPONSE_FROM_IDP",   // SAML assertion（必填）
    null,                                      // role policy（可选）
    "sts.volcengineapi.com"                    // sts endpoint（可选）
);

// 可选：通过 fluent setter 调整重试和传输参数
// $provider->setSchema('https')       // 'http' 或 'https'，默认 'https'
//          ->setMaxRetries(3)          // 额外重试次数；0 = 不重试，默认 3
//          ->setRetryInterval(1);      // 重试间隔秒数，默认 1

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider($provider);
```

### 环境变量凭证提供者

`EnvironmentVariableCredentialProvider` 支持从以下环境变量读取凭证：

- `VOLCENGINE_ACCESS_KEY`
- `VOLCENGINE_SECRET_KEY`
- `VOLCENGINE_SESSION_TOKEN`，可选

实现中同时兼容以下历史环境变量：

- `VOLCSTACK_ACCESS_KEY_ID` / `VOLCSTACK_ACCESS_KEY`
- `VOLCSTACK_SECRET_ACCESS_KEY` / `VOLCSTACK_SECRET_KEY`
- `VOLCSTACK_SESSION_TOKEN`

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

putenv("VOLCENGINE_ACCESS_KEY=YourAK");
putenv("VOLCENGINE_SECRET_KEY=YourSK");

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider(
        new \Volcengine\Common\Auth\Providers\EnvironmentVariableCredentialProvider()
    );
```

### CLI 配置凭证提供者

`CLIConfigCredentialProvider` 默认读取 `~/.volcengine/config.json`。

- 配置文件路径优先级：构造函数 `configPath` > `VOLCENGINE_CLI_CONFIG_FILE` > `~/.volcengine/config.json`
- Profile 优先级：构造函数 `profileName` > `VOLCENGINE_PROFILE` / `VOLCSTACK_PROFILE` > 配置文件中的 `current` > `default`

支持的 profile mode：

- `ak` 或空（同时支持 `session-token` 字段以承载静态 STS 凭证）
- `ramrolearn`，内部委托给 `StsProvider`；支持 `access-key`、`secret-key`、`role-name`、`account-id`，可选 `region`
- `oidc`，内部委托给 `OidcCredentialProvider`
- `ecsrole`，内部委托给 `EcsRoleCredentialProvider`
- `sso`，从 CLI sso 缓存读取 STS 凭证, 内部委托给 `SsoCredentialProvider`
- `console-login`，从 CLI console-login 缓存读取 STS 凭证, 内部委托给 `ConsoleLoginCredentialProvider`

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider(
        new \Volcengine\Common\Auth\Providers\CLIConfigCredentialProvider(
            "prod",
            getenv("HOME") . "/.volcengine/config.json"
        )
    );
```

### ECS 角色凭证提供者

> 🚨 **当前版本限制**
>
> **当前版本暂不支持从 IMDS 自动探测角色名**，请通过构造参数或 `VOLCENGINE_ECS_METADATA` 环境变量显式传入角色名。后续版本将支持自动探测，敬请关注版本发布通知。

`EcsRoleCredentialProvider` 从 ECS IMDS 中读取临时凭证。

- `roleName` 优先级：构造参数 > `VOLCENGINE_ECS_METADATA` > 从 IMDS 自动探测
- 禁用开关：`VOLCENGINE_ECS_METADATA_DISABLED=true`

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$provider = \Volcengine\Common\Auth\Providers\EcsRoleCredentialProvider::create("your-ecs-role-name");

// 可选：通过 fluent setter 调整重试和超时参数
// $provider->setMaxRetries(3)            // 额外重试次数；0 = 不重试，默认 3
//          ->setRetryInterval(1)          // 重试间隔秒数，默认 1
//          ->setConnectTimeout(1)         // 连接超时秒数，默认 1
//          ->setReadTimeout(1)            // 读取超时秒数，默认 1
//          ->setExpireBufferSeconds(300); // 过期前提前刷新的缓冲秒数，默认 300

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider($provider);
```

### 默认凭证提供者

当 `ak`、`sk` 和 `credentialProvider` 都未设置时，SDK 会自动使用 `DefaultCredentialProvider`。通常不需要业务方手动拼默认凭证链，除非要自定义链路选项。

默认凭证链顺序：

1. `EnvironmentVariableCredentialProvider`
2. `OidcCredentialProvider`
3. `CLIConfigCredentialProvider`
4. `EcsRoleCredentialProvider`

默认开启 `reuseLastProviderEnabled=true`，后续请求会优先复用上一次成功解析的 provider。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider(
        new \Volcengine\Common\Auth\Providers\DefaultCredentialProvider()
    );
```

---

[← 概览](0-Overview-zh.md) | 访问凭据[(English)](1-Credentials.md) | [Endpoint 配置 →](2-Endpoint-zh.md)
