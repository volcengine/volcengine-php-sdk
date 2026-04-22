[← Overview](0-Overview.md) | Credentials[(中文)](1-Credentials-zh.md) | [Endpoint →](2-Endpoint.md)

---

# Credentials

The Volcengine PHP SDK supports explicit credentials and `CredentialProvider`-based automatic resolution.

## Credential Providers Overview

| Provider | Purpose | Refresh Support | Typical Scenario |
| --- | --- | --- | --- |
| Direct `Configuration` (`AK/SK` or `AK/SK/Token`) | Explicit static or temporary credentials | No | Simple server-side integration |
| `StsProvider` | STS AssumeRole | Yes | Role-based temporary credentials |
| `OidcCredentialProvider` | STS AssumeRoleWithOIDC | Yes | OIDC federation |
| `SamlCredentialProvider` | STS AssumeRoleWithSAML | Yes | SAML federation |
| `EnvironmentVariableCredentialProvider` | Read from env vars | No | CI/CD and container env injection |
| `CLIConfigCredentialProvider` | Read from `~/.volcengine/config.json` | Depends on mode | Reuse CLI login/profile |
| `EcsRoleCredentialProvider` | Read from ECS IMDS | Yes | ECS instance role credentials |
| `DefaultCredentialProvider` | Chain wrapper | Depends on delegated provider | No AK/SK in application code |

## AK/SK

AK/SK is a pair of permanent access keys created in the Volcengine console. The SDK signs each request to authenticate.

> ⚠️ Notes
>
> 1. Do not embed or expose AK/SK in client-side applications.
> 2. Use a configuration center or environment variables.
> 3. Follow least privilege principles.

**Example**

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your AK")
    ->setSk("Your SK")
    ->setRegion("cn-beijing")
    ->setVerifySsl(false)  # optional, default true
    ->setDebug(true)       # optional, default false
    ->setHost('open.volcengineapi.com') # optional, default open.volcengineapi.com
    ->setSchema('https');  # optional, default https

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
    $responseMetaData = $result->offsetGet('ResponseMetadata');
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->createVpc: ', $e->getMessage(), PHP_EOL;
}

?>
```

## STS Token

STS (Security Token Service) provides temporary credentials (temporary AK/SK and Token).

> ⚠️ Notes
>
> 1. Least privilege.
> 2. Use a reasonable TTL. Shorter is safer; avoid exceeding 1 hour.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk('Your AK')
    ->setSk('Your SK')
    ->setSessionToken('Your session token')
    ->setRegion("cn-beijing");

$apiInstance = new \Volcengine\Vpc\Api\VPCApi(
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

AssumeRole provides dynamic credentials with automatic refresh.

> ⚠️ Notes
>
> 1. Least privilege.
> 2. Choose a reasonable TTL; maximum is 12 hours.
> 3. Use fine-grained roles and policies.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$sts = new \Volcengine\Common\Auth\Providers\StsProvider(
    "Your ak", // required
    "Your sk", // required
    "Your role name",  // required
    "Your account id", // required
    "cn-beijing", // optional
    "3600", // optional
    "https", // optional
    "sts.volcengineapi.com", // optional
    '{"Statement":[{"Effect":"Allow","Action":["vpc:CreateVpc"],"Resource":["*"],"Condition":{"StringEquals":{"volc:RequestedRegion":["cn-beijing"]}}}]}' // optional
);

try {
    $result = $sts->getCredentials();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}

?>
```

## OIDC Credential Provider

`OidcCredentialProvider` obtains temporary credentials via STS AssumeRoleWithOIDC.

Supported OIDC env vars:

- `VOLCENGINE_OIDC_ROLE_TRN`
- `VOLCENGINE_OIDC_TOKEN_FILE`
- `VOLCENGINE_OIDC_ROLE_SESSION_NAME`
- `VOLCENGINE_OIDC_ROLE_POLICY`
- `VOLCENGINE_OIDC_STS_ENDPOINT`

You can either construct the provider explicitly, or build it from environment variables with `OidcCredentialProvider::fromEnvironment()`.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$provider = new \Volcengine\Common\Auth\Providers\OidcCredentialProvider(
    "trn:iam::1234567890:role/oidc-role",   // roleTrn (required)
    "/var/run/secrets/oidc/token",           // oidcTokenFile (required)
    "credentials-php-demo",                  // roleSessionName (optional)
    null,                                    // rolePolicy (optional)
    "sts.volcengineapi.com"                  // stsEndpoint (optional)
);

// Optional: tune retry and transport settings via fluent setters
// $provider->setSchema('https')       // 'http' or 'https', default 'https'
//          ->setMaxRetries(3)          // extra retry attempts; 0 = no retry, default 3
//          ->setRetryInterval(1);      // seconds between retries, default 1

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider($provider);
```

Environment-based example:

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

## SAML Credential Provider

`SamlCredentialProvider` exchanges a SAML 2.0 assertion (returned by your IdP) for temporary STS credentials via `AssumeRoleWithSAML`. Credentials are auto-refreshed before expiration.

> ⚠️ Notes
>
> 1. Least privilege.
> 2. Reasonable TTL; recommended ≤ 1 hour.
> 3. `samlAssertion` is the base64-encoded SAML Response returned by your IdP.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$provider = new \Volcengine\Common\Auth\Providers\SamlCredentialProvider(
    "YourRoleName",                            // roleName (required)
    "1234567890",                              // account id (required)
    "MyIdp",                                   // SAML provider name (required)
    "BASE64_ENCODED_SAML_RESPONSE_FROM_IDP",   // SAML assertion (required)
    null,                                      // role policy (optional)
    "sts.volcengineapi.com"                    // sts endpoint (optional)
);

// Optional: tune retry and transport settings via fluent setters
// $provider->setSchema('https')       // 'http' or 'https', default 'https'
//          ->setMaxRetries(3)          // extra retry attempts; 0 = no retry, default 3
//          ->setRetryInterval(1);      // seconds between retries, default 1

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider($provider);
```

## Environment Variable Credential Provider

`EnvironmentVariableCredentialProvider` reads credentials from:

- `VOLCENGINE_ACCESS_KEY`
- `VOLCENGINE_SECRET_KEY`
- `VOLCENGINE_SESSION_TOKEN` (optional)

It also accepts the legacy fallback env vars used in the implementation:

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

## CLI Config Credential Provider

`CLIConfigCredentialProvider` reads `~/.volcengine/config.json` by default.

- Config path priority: constructor `configPath` > `VOLCENGINE_CLI_CONFIG_FILE` > `~/.volcengine/config.json`
- Profile priority: constructor `profileName` > `VOLCENGINE_PROFILE` / `VOLCSTACK_PROFILE` > `current` in config > `default`

Supported profile modes:

- `AK` or empty
- `StsToken`
- `RamRoleArn` (delegates to `StsProvider`)
- `OIDC` (delegates to `OidcCredentialProvider`)
- `EcsRole` (delegates to `EcsRoleCredentialProvider`)
- `SSO` (delegates to `SsoCredentialProvider`)

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

## ECS Role Credential Provider

`EcsRoleCredentialProvider` reads temporary credentials from ECS IMDS.

- `roleName` priority: constructor arg > `VOLCENGINE_ECS_METADATA` > auto-detect from IMDS
- disable switch: `VOLCENGINE_ECS_METADATA_DISABLED=true`

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$provider = \Volcengine\Common\Auth\Providers\EcsRoleCredentialProvider::create("your-ecs-role-name");

// Optional: tune retry and timeout settings via fluent setters
// $provider->setMaxRetries(3)            // extra retry attempts; 0 = no retry, default 3
//          ->setRetryInterval(1)          // seconds between retries, default 1
//          ->setConnectTimeout(1)         // seconds, default 1
//          ->setReadTimeout(1)            // seconds, default 1
//          ->setExpireBufferSeconds(300); // refresh buffer before expiry, default 300

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider($provider);
```

## Default Credential Provider

When `ak`, `sk`, and `credentialProvider` are all unset, the SDK automatically uses `DefaultCredentialProvider`. You do not need to configure the chain manually unless you want custom options.

Default chain order:

1. `EnvironmentVariableCredentialProvider`
2. `OidcCredentialProvider`
3. `CLIConfigCredentialProvider`
4. `EcsRoleCredentialProvider`

By default, `reuseLastProviderEnabled=true`, so the last successful provider is reused first on later calls.

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

[← Overview](0-Overview.md) | Credentials[(中文)](1-Credentials-zh.md) | [Endpoint →](2-Endpoint.md)
