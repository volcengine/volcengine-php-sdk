[← Overview](0-Overview.md) | Credentials[(中文)](1-Credentials-zh.md) | [Endpoint →](2-Endpoint.md)

---

## Credentials

The Volcengine PHP SDK supports explicit credentials and `CredentialProvider`-based automatic resolution.

### Credential Providers Overview

| Provider | Purpose | Refresh Support | Typical Scenario |
| --- | --- | --- | --- |
| Direct `Configuration` (`AK/SK` or `AK/SK/Token`) | Explicit static or temporary credentials | No | Simple server-side integration |
| `StaticCredentialProvider` | Static credentials through the provider interface | No | Custom provider chains or provider-based client setup |
| `StsProvider` | STS AssumeRole | No | Role-based temporary credentials |
| `OidcCredentialProvider` | STS AssumeRoleWithOIDC | Yes | OIDC federation |
| `SamlCredentialProvider` | STS AssumeRoleWithSAML | Yes | SAML federation |
| `EnvironmentVariableCredentialProvider` | Read from env vars | No | CI/CD and container env injection |
| `CLIConfigCredentialProvider` | Read from `~/.volcengine/config.json` | Depends on mode | Reuse CLI login/profile |
| `EcsRoleCredentialProvider` | Read from ECS IMDS | Yes | ECS instance role credentials |
| `DefaultCredentialProvider` | Chain wrapper | Depends on delegated provider | No AK/SK in application code |

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

Direct `setAk()` / `setSk()` remains the simplest path. Use `StaticCredentialProvider` when your code expects a `CredentialProvider`.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider(
        new \Volcengine\Common\Auth\Providers\StaticCredentialProvider(
            "Your AK",
            "Your SK",
            "Your session token" // optional
        )
    );
```

### AssumeRole

AssumeRole provides dynamic credentials. `StsProvider::getCredentials()` calls STS `AssumeRole` on every invocation and returns `Result.Credentials`; it does not maintain a local cache or refresh window. This provider handles HTTP status and STS `ResponseMetadata.Error`, but it does not perform additional client-side validation for the completeness of the `Credentials` fields in the JSON response. Transient STS failures are retried by default: network/transport errors, HTTP `429`, and HTTP `5xx`.

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

// Optional: tune retry settings. maxRetries means extra retry attempts.
// $sts->setMaxRetries(3)
//     ->setRetryInterval(1);

// Optional: reach STS through a forward proxy and/or customize TLS trust.
// $sts->setProxyUrl('http://user:pass@10.0.0.1:8080') // forward proxy, scheme://[user:password@]host:port; proxy credentials sent via Basic auth; empty falls back to HTTP_PROXY / HTTPS_PROXY / NO_PROXY
//     ->setCaFile('/path/to/ca.pem')                  // custom CA bundle (PEM) to verify the STS server certificate; empty uses the system trust store
//     ->setInsecureSkipVerify(false);                 // set true to skip STS TLS verification (debugging only, never in production)

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

// Optional: tune retry settings via fluent setters
// $provider->setSchema('https')       // 'http' or 'https', default 'https'
//          ->setMaxRetries(3)          // extra retry attempts; 0 = no retry, default 3
//          ->setRetryInterval(1);      // seconds between retries, default 1

// Optional: reach STS through a forward proxy and/or customize TLS trust.
// $provider->setProxyUrl('http://user:pass@10.0.0.1:8080') // forward proxy; empty falls back to HTTP_PROXY / HTTPS_PROXY / NO_PROXY
//          ->setCaFile('/path/to/ca.pem')                  // custom CA bundle (PEM); empty uses the system trust store
//          ->setInsecureSkipVerify(false);                 // set true to skip STS TLS verification (debugging only)

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

// Optional: tune retry settings via fluent setters
// $provider->setSchema('https')       // 'http' or 'https', default 'https'
//          ->setMaxRetries(3)          // extra retry attempts; 0 = no retry, default 3
//          ->setRetryInterval(1);      // seconds between retries, default 1

// Optional: reach STS through a forward proxy and/or customize TLS trust.
// $provider->setProxyUrl('http://user:pass@10.0.0.1:8080') // forward proxy; empty falls back to HTTP_PROXY / HTTPS_PROXY / NO_PROXY
//          ->setCaFile('/path/to/ca.pem')                  // custom CA bundle (PEM); empty uses the system trust store
//          ->setInsecureSkipVerify(false);                 // set true to skip STS TLS verification (debugging only)

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setRegion("cn-beijing")
    ->setCredentialProvider($provider);
```

### STS Proxy and TLS (AssumeRole / OIDC / SAML)

`StsProvider`, `OidcCredentialProvider` and `SamlCredentialProvider` share three
optional fluent setters that control how the SDK reaches the STS endpoint. They
are useful when the client sits behind a corporate forward proxy, or when the
proxy performs TLS interception with a private CA.

| Setter | Purpose | Default |
| --- | --- | --- |
| `setProxyUrl($url)` | Forward proxy in the form `scheme://[user:password@]host:port`. Proxy credentials are sent with Basic auth. When empty, the SDK falls back to the standard `HTTP_PROXY` / `HTTPS_PROXY` / `NO_PROXY` environment variables (handled by curl). | unset (env fallback) |
| `setCaFile($path)` | Path to a custom CA bundle (PEM) used to verify the STS server certificate. Use it when the STS/proxy certificate is signed by a private CA that is not in the system trust store. | unset (system trust store) |
| `setInsecureSkipVerify($bool)` | When `true`, skips STS TLS certificate and hostname verification. | `false` |

> ⚠️ **Notes**
>
> 1. `setInsecureSkipVerify(true)` disables certificate validation and exposes the
>    connection to man-in-the-middle attacks. Use it only for debugging; in
>    production trust a private CA via `setCaFile()` instead.
> 2. `setInsecureSkipVerify(true)` takes precedence over `setCaFile()`.
> 3. An invalid proxy URL or an unreadable CA file raises an
>    `InvalidArgumentException` when credentials are fetched.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Example: AssumeRole through an HTTPS-intercepting corporate proxy that uses a
// private CA. Works the same way on OidcCredentialProvider / SamlCredentialProvider.
$sts = new \Volcengine\Common\Auth\Providers\StsProvider(
    "Your ak",
    "Your sk",
    "Your role name",
    "Your account id",
    "cn-beijing"
);
$sts->setProxyUrl('http://user:pass@10.0.0.1:8080')
    ->setCaFile('/etc/pki/corp-ca.pem');
    // ->setInsecureSkipVerify(true); // debugging only

$result = $sts->getCredentials();
print_r($result);
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

For `sso` and `console-login` modes, the SDK refreshes cached access tokens when
they are close to expiry. Refreshed tokens are written back to the CLI cache file
so later PHP requests can reuse them. If refresh fails because the login state is
invalid, the exception message includes `ve login` or `ve sso login`.

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
