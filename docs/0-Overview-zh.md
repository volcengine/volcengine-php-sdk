概览[(English)](0-Overview.md) | [访问凭据 →](1-Credentials-zh.md)

---

## 集成 SDK

在调用接口时，推荐在项目中集成 SDK 的方式进行接入。通过使用 SDK，不仅可以简化开发流程、加快功能集成速度，还能有效降低后期的维护成本。火山引擎 SDK 的集成主要包括以下三个步骤：引入 SDK、配置访问凭证，以及编写接口调用代码。

## 环境要求

1. PHP环境版本>=5.5
2. 建议使用composer的方式进行包管理

## 配置对象

`Configuration::getDefaultConfiguration()` 返回的是共享的默认配置实例。
如果某个 client 或调用链需要独立配置，请显式创建新的
`Configuration()`，不要直接在共享默认配置上互相覆盖。

## 目录

1. [访问凭据](1-Credentials-zh.md) — AK/SK、STS、AssumeRole、OIDC、SAML、进程/端点 provider、默认凭证链
2. [Endpoint 配置](2-Endpoint-zh.md) — 自定义 Endpoint、RegionId、自动化寻址、文件规则
3. [Transport](3-Transport-zh.md) — HTTPS Scheme、SSL 验证、TLS 版本
4. [代理配置](4-Proxy-zh.md) — HTTP(S) 代理配置
5. [超时配置](5-Timeout-zh.md) — 请求超时配置
6. [重试策略](6-Retry-zh.md) — 重试策略
7. [错误处理](7-ErrorHandling-zh.md) — 异常处理
8. [调试模式](8-Debugging-zh.md) — Debug 模式、结构化日志

## 其他核心工具

- `RuntimeOptions` 可在单次请求上覆盖 region、凭证、endpoint provider、
  超时和重试行为。
- `Session` 可在多个生成的服务 client 之间共享 `Configuration`、底层
  Guzzle client 和 `ApiClient`。
- `UniversalApi`、`UniversalInfo` 与 `UniversalRequest` 支持绕过生成代码
  直接调用任意服务。
- `Paginator` 为常见的页码分页和 next-token 分页提供 `eachPage()` 辅助。
- `Waiter` 提供可配置延迟和最大尝试次数的轮询等待。
- 可通过 `setEnableRequestGzip(true)` 开启请求压缩，并通过
  `setGzipMinLength()` 调整阈值。
- 可通过 `setNumPools()` 和 `setConnectionPoolMaxsize()` 调整 HTTP
  连接池行为。
- `Version::SDK_VERSION` 与 `Version::userAgent()` 暴露 SDK 版本和默认
  User-Agent。

---

中文 | [English](0-Overview.md)
