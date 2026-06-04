概览[(English)](0-Overview.md) | [访问凭据 →](1-Credentials-zh.md)

---

## 集成 SDK

在调用接口时，推荐在项目中集成 SDK 的方式进行接入。通过使用 SDK，不仅可以简化开发流程、加快功能集成速度，还能有效降低后期的维护成本。火山引擎 SDK 的集成主要包括以下三个步骤：引入 SDK、配置访问凭证，以及编写接口调用代码。

## 环境要求

1. PHP环境版本>=5.5
2. 建议使用composer的方式进行包管理

## 配置对象

文档示例中的 `Configuration::getDefaultConfiguration()` 当前按工厂方式使用，每次调用都会返回新的配置对象；如需复用配置，请保存该对象并传给 API Client 或继续链式配置。不要依赖 `setDefaultConfiguration()` 后再次调用 `getDefaultConfiguration()` 能取回同一个对象。

## 目录

1. [访问凭据](1-Credentials-zh.md) — AK/SK、STS、AssumeRole、OIDC、SAML、ECS 角色、默认凭证链
2. [Endpoint 配置](2-Endpoint-zh.md) — 自定义 Endpoint、RegionId、自动化寻址
3. [Transport](3-Transport-zh.md) — HTTPS Scheme、SSL 验证、TLS 版本
4. [代理配置](4-Proxy-zh.md) — HTTP(S) 代理配置
5. [超时配置](5-Timeout-zh.md) — 请求超时配置
6. [重试策略](6-Retry-zh.md) — 重试策略
7. [错误处理](7-ErrorHandling-zh.md) — 异常处理
8. [调试模式](8-Debugging-zh.md) — Debug 模式

---

中文 | [English](0-Overview.md)
