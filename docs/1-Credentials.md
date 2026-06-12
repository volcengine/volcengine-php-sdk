[← Overview](0-Overview.md) | Credentials[(中文)](1-Credentials-zh.md) | [Endpoint →](2-Endpoint.md)

---

## Credentials

The Volcengine PHP SDK supports explicit credentials and `CredentialProvider`-based automatic resolution.

### Credential Providers Overview

| Provider | Purpose | Refresh Support | Typical Scenario |
| --- | --- | --- | --- |
| Direct `Configuration` (`AK/SK` or `AK/SK/Token`) | Explicit static or temporary credentials | No | Simple server-side integration |
| `StsProvider` | STS AssumeRole | Yes | Role-based temporary credentials |
| `StaticCredentialProvider` | Wrap static `AK/SK(/Token)` as a provider | No | Reusable provider chain input |
| `OidcCredentialProvider` | STS AssumeRoleWithOIDC | Yes | OIDC federation |
| `SamlCredentialProvider` | STS AssumeRoleWithSAML | Yes | SAML federation |
| `EnvironmentVariableCredentialProvider` | Read from env vars | No | CI/CD and container env injection |
| `CLIConfigCredentialProvider` | Read from `~/.volcengine/config.json` | Depends on mode | Reuse CLI login/profile |
| `EcsRoleCredentialProvider` | Read from ECS IMDS | Yes | ECS instance role credentials |
| `DefaultCredentialProvider` | Chain wrapper | Depends on delegated provider | No AK/SK in application code |

`DefaultCredentialProvider` caches the last successful provider by default and
tries it first on the next resolution. When the chain still fails, the thrown
error includes provider-by-provider failure details to help diagnose credential
setup problems.

### AK/SK

AK/SK is a pair of permanent access keys created in the Volcengine console. The SDK signs each request to authenticate.

> ⚠️ **Notes**
>
> 1. Do not embed or expose AK/SK in client-side applications.
> 2. Use a configuration center or environment variables.
> 3. Follow least privilege principles.

**Example:**

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
    $responseMetaData = $result->offsetGet('ResponseMetadata');
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VPCApi->createVpc: ', $e->getMessage(), PHP_EOL;
}

?>
```

### STS Token

STS (Security Token Service) provides temporary credentials (temporary AK/SK and Token).

> ⚠️ **Notes**
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

### Static Credential Provider

```php
<?php
$provider = new \Volcengine\Common\Auth\Providers\StaticCredentialProvider(
    'Your AK',
    'Your SK',
    'Optional session token'
);

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion('cn-beijing')
    ->setCredentialProvider($provider);
```

### Process Credential Provider

`ProcessCredentialsProvider` executes an external command, parses JSON from
stdout, and caches the returned credentials until `Expiration`.

Expected JSON shape:

```json
{
  "AccessKeyId": "AK...",
  "SecretAccessKey": "SK...",
  "SessionToken": "token",
  "Expiration": "2026-06-12T12:00:00Z"
}
```

```php
<?php
$provider = new \Volcengine\Common\Auth\Providers\ProcessCredentialsProvider(
    'volc-credential-helper --profile prod',
    30
);

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion('cn-beijing')
    ->setCredentialProvider($provider);
```

### Endpoint Credential Provider

`EndpointCredentialsProvider` pulls credentials from a custom HTTP endpoint and
reuses them until expiry.

```php
<?php
$provider = new \Volcengine\Common\Auth\Providers\EndpointCredentialsProvider(
    'http://127.0.0.1:8080/credentials',
    'Bearer token',
    ['X-Source' => 'volcengine-php-sdk']
);

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion('cn-beijing')
    ->setCredentialProvider($provider);
```

### AssumeRole

AssumeRole provides dynamic credentials. `StsProvider::getCredentials()` calls STS `AssumeRole` on every invocation and returns `Result.Credentials`; it does not maintain a local cache or refresh window. This provider handles HTTP status and STS `ResponseMetadata.Error`, but it does not perform additional client-side validation for the completeness of the `Credentials` fields in the JSON response.

> ⚠️ **Notes**
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

// Optional: use the shared retryer or dedicated transport tuning
// $sts->setRetryer(
//         \Volcengine\Common\Configuration::getDefaultConfiguration()->getRetryer()
//     )
//     ->setConnectTimeout(3)
//     ->setReadTimeout(30);

try {
    $result = $sts->getCredentials();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}

?>
```

### OIDC Credential Provider

`OidcCredentialProvider` obtains temporary credentials via STS AssumeRoleWithOIDC, caches them and refreshes before expiry. The expiry prefers the `Expiration` returned by STS; if the response does not include that field, it falls back to the local `durationSeconds` estimate. We recommend setting `durationSeconds` slightly shorter than your actual STS TTL to absorb network latency and clock skew.

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

### SAML Credential Provider

`SamlCredentialProvider` exchanges a SAML 2.0 assertion (returned by your IdP) for temporary STS credentials via `AssumeRoleWithSAML`. Credentials are cached and auto-refreshed before expiry. The expiry is estimated from the local `durationSeconds`; we recommend setting `durationSeconds` slightly shorter than your STS TTL to absorb network latency and clock skew.

> ⚠️ **Notes**
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

### Environment Variable Credential Provider

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

### CLI Config Credential Provider

`CLIConfigCredentialProvider` reads `~/.volcengine/config.json` by default.

- Config path priority: constructor `configPath` > `VOLCENGINE_CLI_CONFIG_FILE` > `~/.volcengine/config.json`
- Profile priority: constructor `profileName` > `VOLCENGINE_PROFILE` / `VOLCSTACK_PROFILE` > `current` in config > `default`

Supported profile modes:

- `ak` or empty (also accepts `session-token` for static STS credentials)
- `ramrolearn` (delegates to `StsProvider`; supports `access-key`, `secret-key`, `role-name`, `account-id`, and optional `region`)
- `oidc` (delegates to `OidcCredentialProvider`)
- `ecsrole` (delegates to `EcsRoleCredentialProvider`)
- `sso` (reads STS credentials from the CLI sso cache; auto-refreshes the access token via OAuth when expired, delegates to `SsoCredentialProvider`)
- `console-login` (reads STS credentials from the CLI console-login cache; auto-refreshes via OAuth `refresh_token` when expired, delegates to `ConsoleLoginCredentialProvider`)

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

#### Runtime Refresh Behavior (sso / console-login)

For `sso` and `console-login` modes the SDK auto-refreshes credentials in the
current PHP process when the cached access token enters its expiry window (60 s
before its TTL). Because PHP processes are short-lived, the refresh contract
differs slightly from the Go / Java / Python SDKs:

- **Per-object in-memory cache**: a single `CLIConfigCredentialProvider` instance
  caches the parsed credentials for the lifetime of the object (within a single
  PHP request), so repeated API calls inside one request reuse the same STS.
- **Disk-backed cross-process refresh**: the SDK *does* write the refreshed
  token back to the cache file (`~/.volcengine/sso/cache/<sha1>.json` or
  `~/.volcengine/login/cache/<sha1(login_session)>.json`) via atomic rename,
  so concurrent PHP processes — and the `ve` CLI itself — can share the
  refreshed `refresh_token`. This is the opposite of the long-running Go /
  Java / Python SDKs (which keep refresh state purely in memory) and is the
  correct trade-off for PHP's short request lifecycle.
- **`refresh_token` rotation**: when the server returns HTTP 400
  `invalid_grant`, the SDK reloads the cache file once, compares the disk
  `refresh_token` against the in-memory copy, and retries the refresh
  exactly once with the disk state. This recovers the case where a
  concurrent `ve login` (or another PHP process) rotated the token under us
  without colliding writes. If the disk also yields no fresher token, the
  SDK raises an `ApiException` containing `please run 've login'` /
  `'ve sso login'` so the user knows the remedy.
- **Actionable error messages**: every error path that requires
  re-authentication contains `'ve login'` (console-login) or `'ve sso login'`
  (sso) so the caller can present a clear next step.

### ECS Role Credential Provider

`EcsRoleCredentialProvider` reads temporary credentials from ECS IMDS.

- `roleName` priority: constructor arg > `VOLCENGINE_ECS_METADATA` > auto-detect from IMDS
- disable switch: `VOLCENGINE_ECS_METADATA_DISABLED=true`

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Omit the argument to read VOLCENGINE_ECS_METADATA or auto-detect the role name from IMDS.
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

### Default Credential Provider

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
