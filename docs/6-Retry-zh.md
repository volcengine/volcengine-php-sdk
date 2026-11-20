[← 超时配置](5-Timeout-zh.md) | 重试机制[(English)](6-Retry.md) | [异常处理 →](7-ErrorHandling-zh.md)

---

## 重试机制

PHP SDK 现在支持业务 API 请求和凭证流程的全局重试配置。

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$config = \Volcengine\Common\Configuration::getDefaultConfiguration()
    ->setAk("Your ak")
    ->setSk("Your sk")
    ->setRegion('cn-beijing')
    ->setAutoRetry(true)
    ->setNumMaxRetries(3)
    ->setMinRetryDelayMs(300)
    ->setMaxRetryDelayMs(3000)
    ->setRetryErrorCodes(['Throttling', 'TooManyRequests']);
```

`StsProvider` 也支持通过 `setConnectTimeout()` 和 `setReadTimeout()` 单独调整
AssumeRole 请求超时。

如果需要关闭业务 API 重试，直接调用 `setAutoRetry(false)`。

默认重试条件覆盖瞬时网络错误，以及 HTTP `429/500/502/503/504`。

STS 凭证交换不因过期码本身重试，因为当前交换无法刷新其 AK/SK、OIDC token 或 SAML assertion。业务请求的凭证刷新、瞬时状态／网络／限流规则及 VE 的额外重试次数语义保持不变。

Default／Lazy 请求保留原 Provider 对象，单独保存链路选择状态，包含客户子类及嵌套链。客户覆盖方法在原对象上执行，不调用 `__clone`；共享链路状态通过 `finally` 恢复。

已取得 HTTP 响应的传输失败不会仅因新诊断码扩大重试范围，仍按真实状态和服务错误码判断，取消／TLS 优先终止。HTTP200 下 cURL 截断、解码失败和 HTTP/2 流错误默认不重试。

上述响应无服务错误码时，重试匹配仍保留历史 `UnknownError` 兜底。因此显式设置的 `setRetryErrorCodes(['UnknownError'])` 继续生效，新诊断码及默认重试决定保持不变。

错误识别会沿 `getPrevious()` 和 SDK 原因遍历，支持包装后的 TOP／根级业务码；最多检查 64 个异常对象。取消和 TLS 证书／握手错误优先终止重试。业务 API 的 `setRetryErrorCodes()` 可补充自定义码。重试前按头名忽略大小写清理旧签名和安全 token，并重新构建、签名。

包装的原生 Guzzle `RequestException` 也可通过可 seek 正文识别 HTTP403 的限流或凭证过期码，检查后恢复流位置；不可 seek 的客户正文不被重试判断消耗，需由客户提供错误码。cURL errno 优先于消息文字，URL 中的 Action 名称不作为取消或 TLS 判断依据。OIDC／SAML 表单 STS 保留 HTTP429 和全部 5xx 重试范围，业务 API／AssumeRole 仍使用上述状态白名单。

没有 errno 时，只对无响应 Guzzle 传输异常按文字分类；HTTP 异常内嵌的服务端正文和客户包装消息不作为取消／TLS 证据。客户重试回调或刷新阶段报错沿用已有 `fromRetryError` 包装契约，原客户原因仍保存在原因链中。

凭证过期时，先调用当前请求 Provider 的可选 `invalidateCredentials()`，再获取凭证；内置 Default 链按请求冻结成功来源，嵌套 Default／Lazy 同样保留来源、共享叶 Provider 缓存，即使关闭成功 Provider 复用或交错异步调用仍可正确失效。CLI 向其实际来源委托。客户 Provider 仍只需实现原有 `getCredentials()`，也可选择实现失效方法。刷新、重签或退避失败终止请求，新诊断快照不复用前次 HTTP 响应；前次异常保留在原因中。

如果服务端返回 `Retry-After`，SDK 会在其大于本地退避延迟时优先采用该值。
对于 `ExpiredToken`、`RequestExpired` 等凭证过期类错误，只要请求使用的是
credential provider，SDK 也会在重试前刷新凭证并重新签名。

---

[← 超时配置](5-Timeout-zh.md) | 重试机制[(English)](6-Retry.md) | [异常处理 →](7-ErrorHandling-zh.md)
