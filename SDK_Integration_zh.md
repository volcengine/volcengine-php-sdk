中文 | [English](SDK_Integration.md)

---

# SDK 接入文档已迁移

本文档已拆分并迁移至 [`docs/`](./docs/) 目录，请从下面的概览页进入：

➡️ **[SDK 接入文档概览（中文）](./docs/0-Overview-zh.md)**

## 章节索引

1. [访问凭据](./docs/1-Credentials-zh.md) — AK/SK、STS、AssumeRole、OIDC、SAML、进程/端点 provider、默认凭证链
2. [Endpoint 配置](./docs/2-Endpoint-zh.md) — 自定义 Endpoint、RegionId、自动化寻址、文件规则
3. [Transport](./docs/3-Transport-zh.md) — HTTP 连接池、HTTPS Scheme、SSL 验证
4. [代理配置](./docs/4-Proxy-zh.md) — HTTP(S) 代理配置
5. [超时配置](./docs/5-Timeout-zh.md) — 全局超时设置
6. [重试策略](./docs/6-Retry-zh.md) — 重试策略、退避策略、Retry-After
7. [错误处理](./docs/7-ErrorHandling-zh.md) — 异常处理
8. [调试模式](./docs/8-Debugging-zh.md) — Debug 模式、结构化日志
- [环境变量参考](./docs/EnvironmentVariables-zh.md) — 所有 SDK 支持的环境变量

`Configuration::getDefaultConfiguration()` 返回共享的默认配置实例；如果你
需要独立配置对象，请显式创建新的 `Configuration()`。

---

中文 | [English](SDK_Integration.md)
