Overview[(中文)](0-Overview-zh.md) | [Credentials →](1-Credentials.md)

---

## SDK Integration

When calling APIs, it is recommended to integrate the SDK in your project. Using the SDK simplifies development, speeds up integration, and reduces long-term maintenance costs. Volcengine SDK integration typically includes three steps: importing the SDK, configuring access credentials, and writing API call code.

## Requirements

1. PHP version **>= 5.5**.
2. It is recommended to use **Composer** for dependency management.

## Configuration Object

`Configuration::getDefaultConfiguration()` returns the shared default
configuration instance. If you need an isolated configuration for one client or
workflow, create a new `Configuration()` explicitly instead of mutating the
shared default in place.

## Table of Contents

1. [Credentials](1-Credentials.md) — AK/SK, STS, AssumeRole, OIDC, SAML, process/endpoint providers, default chain
2. [Endpoint Configuration](2-Endpoint.md) — Custom endpoint, region ID, automatic resolution, file-based rules
3. [Transport](3-Transport.md) — HTTPS Scheme, SSL Verification, TLS Version
4. [Proxy](4-Proxy.md) — HTTP(S) Proxy Configuration
5. [Timeout](5-Timeout.md) — Request Timeout Configuration
6. [Retry](6-Retry.md) — Retry Strategy
7. [Error Handling](7-ErrorHandling.md) — Exception Handling
8. [Debugging](8-Debugging.md) — Debug Mode, structured logging

## Additional Core Utilities

- `RuntimeOptions` can override region, credentials, endpoint provider, timeout,
  and retry behavior on a single request.
- `Session` shares `Configuration`, the underlying Guzzle client, and
  `ApiClient` across multiple generated service clients.
- `UniversalApi`, `UniversalInfo`, and `UniversalRequest` let you call services
  without generated API classes.
- `Paginator` provides `eachPage()` helpers for common page-number and
  next-token responses.
- `Waiter` provides polling with configurable delays and max attempts.
- Request gzip can be enabled with `setEnableRequestGzip(true)` and tuned with
  `setGzipMinLength()`.
- HTTP transport pooling can be tuned with `setNumPools()` and
  `setConnectionPoolMaxsize()`.
- `Version::SDK_VERSION` and `Version::userAgent()` expose the SDK version and
  default user agent string.

---

English | [中文](0-Overview-zh.md)
