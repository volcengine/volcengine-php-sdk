[← 重试机制](6-Retry-zh.md) | 异常处理[(English)](7-ErrorHandling.md) | [Debug 机制 →](8-Debugging-zh.md)

---

## 异常处理

### 结构化诊断与 HTTP 快照

Guzzle `RequestException` 同时带 HTTP 响应及非零 cURL errno 时，优先使用传输诊断：18（传输截断）、61（内容解码失败）为 `ReadError`，92（HTTP/2 流错误）为 `RequestError`；其他 errno 保留对应传输分类。即使缓存流已到 EOF，快照仍为 `body_complete=false`，同时保留真实 HTTP 状态、已取得字节、RequestId 和原因。旧 message 与服务错误码 getter 不变，新诊断码本身不为原先不符合条件的响应增加重试。

统一打印入口为 `Volcengine\Common\Utils::printError($writer, $error)`，`$writer` 是可写 PHP stream resource；成功无返回值，编码或写入失败抛出异常。`$error` 为 null 时不输出。同步调用与异步 `wait()` 可使用相同入口。

```php
use Volcengine\Common\Utils;

try {
    // 调用服务 API，或等待异步 Promise。
} catch (\Exception $e) {
    Utils::printError(STDERR, $e);
} catch (\Throwable $e) {
    // PHP 7+ Error/TypeError。
    Utils::printError(STDERR, $e);
}
```

输出 JSON 为 `{type, error, code?, message?, response, causes?}`，并附加换行。`Utils::getErrorDetails($error)` 返回同结构数组供程序读取；普通客户异常至少输出 type、error、response，保持原对象身份与错误文字。可选 `getResponseDetails()`、`getErrorCode()`、`getErrorMessage()` 方法支持客户自定义异常，无须修改既有接口。原因按 `getPrevious()`、SDK 原因和前次尝试去重遍历，限制 64 个对象和 32 层，避免循环。

内置 `ApiException::getDiagnosticCode()` / `getDiagnosticMessage()` 提供新诊断字段；保留旧 `getErrorCode()`、`getMessage()` 与 `__toString()` 的行为。优先识别 TOP `ResponseMetadata.Error.Code/Message`，同时识别 Go 对齐的根级 `errorcode`，兼容 `error_code` / `ErrorCode`；未知 HTTP 错误为 `UnknownError`，读体失败为 `ReadError`，反序列化失败为 `SerializationError`，无响应传输失败按原因识别 `RequestError`、`RequestTimeout`、`RequestCanceled` 或 `TLSError`。

`getResponseDetails()` 返回独立数组快照，修改返回值不会影响异常。`response` 包含真实 `status_code`、已知 `status` / `proto`、`request_id`、headers、body、`body_captured`、`body_complete`；未取得 HTTP 响应时为 null。正文是实际收到的完整字节或已读片段；空正文也可为 captured=true、complete=true。打印不会再次读取已关闭的响应流，不截断正文；UTF-8 正文使用 `body_encoding=utf-8`，其他字节无损 Base64 编码。

不可 seek 流从非零或未知位置开始采集时，`body_complete=false`；仅保存实际读取的剩余字节。Guzzle 传输异常伴随读体失败时，`getPrevious()` 保留读体原因，`getOriginalError()` 保留传输异常，两者都参与原因遍历，取消／TLS 的终止优先级仍有效。

重试刷新或重签失败时，新诊断的 `response=null`，前次响应位于 `causes`；旧状态、正文与业务 getter 仍保留其既有前次信息契约。三种 STS 请求（AssumeRole/OIDC/SAML）同样保留 HTTP200 业务错误、RequestId 和快照，非法凭证或已提供的非法时间字段在写入缓存前产生 `SerializationError`。

| 异常场景 | 新诊断码 | HTTP 快照 | 重试行为 |
| --- | --- | --- | --- |
| HTTP200 TOP / 根级业务错误 | 服务错误码 | 完整响应 | 按限流、配置码或过期码判断 |
| HTTP429 / 500 / 502 / 503 / 504，HTML 错误 | 服务码或 UnknownError | 原始正文 | 有剩余次数时重试 |
| 网络超时 / 瞬时连接错误 | RequestTimeout / RequestError | null | 有剩余次数时重试 |
| 取消 / TLS 证书或握手错误 | RequestCanceled / TLSError | null 或已取得响应 | 终止重试 |
| 读体 / JSON、TOP 或模型转换失败 | ReadError / SerializationError | 未读、片段或完整正文 | 按已知状态与配置判断 |
| 包装后的凭证过期 | ExpiredToken 等，位于原因 | 位于对应原因 | 失效可选缓存、获取凭证、重新签名 |
| 刷新、重签或退避失败 | RequestError | 当前 null，前次位于原因 | 终止 |
| 普通客户异常 | 保留客户字段 | 可选快照或 null | 保留原对象，默认不重试 |

服务 API 的 Common 响应链路在 HTTP／TOP 业务错误、读体、JSON／TOP 校验、模型转换或元数据回填失败时抛出 `Volcengine\Common\ApiException`。PHP 7+ 的 `Error`／`TypeError` 在这些转换边界内同样封装。同步调用和异步 Promise 使用相同诊断字段。

非空成功响应必须是包含对象类型 `ResponseMetadata` 的 JSON TOP envelope；非法 JSON、顶层 null／数组／标量或缺失元数据统一为 `SerializationError`。空正文、合法 envelope 的 `Result` 缺失或 null 保持既有返回契约，可能返回空模型。

| 信息 | 获取方式 | 含义 |
| --- | --- | --- |
| HTTP 状态 | `getStatusCode()`／`getCode()` | 响应错误保留真实状态，可能为 200；无响应数字 code 不代表服务端状态 |
| 请求 ID | `getRequestId()` | 合法非空正文字符串优先，再从响应头兜底，缺失时为 null |
| 业务／SDK 错误码 | `getErrorCode()` | 服务端字符串 Error.Code、`ReadError` 或 `SerializationError`；非标准 HTTP 错误可为 null |
| 错误信息 | `getErrorMessage()`／`getMessage()` | 服务端／SDK 字段和当前异常说明是独立字段 |
| 响应信息 | `getResponseHeaders()`／`getResponseBody()` | 原始 headers、完整已读正文或真实已读片段；无响应或读体零字节时正文为 null |
| 当前底层原因 | `getOriginalError()`／`getPrevious()` | 通常为同一底层原因；传输异常伴随读体失败时分别保留传输与读体原因 |
| 前次尝试异常 | `getPreviousAttemptError()` | 重试阶段失败时保存前次 ApiException，其他路径为 null |

RequestId 响应头兜底顺序为 `X-Top-Requestid`、`X-Top-Request-Id`、`X-Tt-Logid`，头名忽略大小写。数组头值只检查第一个元素；不可用时继续下一个候选头。正文 RequestId 必须为非空字符串，Error.Code／Message 必须为字符串；非法值仅保留在原始正文中。

读体失败使用 `ReadError`，只保存实际已取得字节；JSON／TOP 校验、模型转换与元数据回填失败使用 `SerializationError`，保留原始 envelope、真实状态、headers 和原因。

重试判断、退避、日志、等待、凭证刷新或请求重建报错时终止重试，抛出 ApiException。`getMessage()` 解释当前重试失败，`getOriginalError()`／`getPrevious()` 指向当前原因；状态、headers、正文、RequestId、业务字段和 `getErrorMessage()` 保留前次信息，`getPreviousAttemptError()` 单独保存前次异常。这些字段不表示又收到新响应。每次尝试只把当次 response 交给重试策略，无响应时为 null。

`ApiException` 继承 PHP 原生 `Exception::__toString()`；`(string) $e`、`echo $e`、`error_log($e)` 和默认未捕获异常输出保留类名、message、文件及行号、完整调用栈和 `previous` 异常链。HTTP 状态、RequestId、业务码及响应正文通过上述 getter 或 `Utils::printError($stream, $e)` 获取；`getTraceAsString()` 可单独读取当前异常的调用栈。

```php
<?php
require 'vendor/autoload.php';

use Volcengine\Common\ApiException;
use Volcengine\Common\Configuration;
use Volcengine\Vpc\Api\VPCApi;
use Volcengine\Vpc\Model\DescribeVpcsRequest;

function printSdkDiagnostics(ApiException $e)
{
    $cause = $e->getOriginalError();
    $previousAttempt = $e->getPreviousAttemptError();
    print_r(array(
        'httpStatus' => $e->getStatusCode(),
        'requestId' => $e->getRequestId(),
        'errorCode' => $e->getErrorCode(),
        'errorMessage' => $e->getErrorMessage(),
        'message' => $e->getMessage(),
        'responseHeaders' => $e->getResponseHeaders(),
        'responseBody' => $e->getResponseBody(),
        'originalErrorType' => $cause ? get_class($cause) : null,
        'originalErrorMessage' => $cause ? $cause->getMessage() : null,
        'previousAttemptMessage' => $previousAttempt ? $previousAttempt->getMessage() : null
    ));
    echo (string) $e, PHP_EOL;
    // 原生字符串化包含当前调用栈及 previous 异常链。
}

$config = new Configuration();
$config->setAk('Your AK')->setSk('Your SK')->setRegion('cn-beijing');
$api = new VPCApi(null, $config);

try {
    $response = $api->describeVpcs(new DescribeVpcsRequest());
    print_r($response);
} catch (ApiException $e) {
    printSdkDiagnostics($e);
} catch (\Exception $e) {
    echo get_class($e), ': ', $e->getMessage(), PHP_EOL;
} catch (\Throwable $e) {
    // PHP 7+ 请求前或客户自定义错误。
    echo get_class($e), ': ', $e->getMessage(), PHP_EOL;
}
```

异步调用可复用以上诊断函数，将方法调用和 `wait()` 放在同一个 try 内：

```php
try {
    $promise = $api->describeVpcsAsync(new DescribeVpcsRequest());
    $response = $promise->wait();
    print_r($response);
} catch (ApiException $e) {
    printSdkDiagnostics($e);
} catch (\Exception $e) {
    echo get_class($e), ': ', $e->getMessage(), PHP_EOL;
} catch (\Throwable $e) {
    echo get_class($e), ': ', $e->getMessage(), PHP_EOL;
}
```

首次参数、凭证、签名、请求构建及客户自定义链路错误保留原有类型；无响应网络错误不生成服务端诊断。旧四参构造器兼容，可选第五参传入 previous；直接 `new ApiException` 不自动解析 RequestId／业务字段。其他独立客户端不一定经过 Common 链路。

---

[← 重试机制](6-Retry-zh.md) | 异常处理[(English)](7-ErrorHandling.md) | [Debug 机制 →](8-Debugging-zh.md)
