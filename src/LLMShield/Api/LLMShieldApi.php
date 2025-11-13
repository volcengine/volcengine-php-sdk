<?php

namespace Volcengine\LLMShield\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Volcengine\LLMShield\Common\ApiException;
use Volcengine\LLMShield\Common\Utils;
use Volcengine\LLMShield\Model\GenerateStreamV2Request;
use Volcengine\LLMShield\Model\GenerateStreamV2Response;
use Volcengine\LLMShield\Model\ModerateV2Request;
use Volcengine\LLMShield\Model\ModerateV2Response;

const Service = "llmshield";
const Version = "2025-08-31";
const ContentType = "application/json";
const Method = "POST";
const StreamBaseWindow = 10;
const WindowExpansionFactor = 2;

class LLMShieldApi
{
    protected $endpoint;
    protected $ak;
    protected $sk;
    protected $appid;
    protected $region;
    protected $client;
    protected $timeout;
    protected $service;
    private $proxy; // 代理地址（格式：http://ip:port 或 socks5://ip:port）

    function __construct($endpoint, $ak, $sk, $appid, $region, $timeout = 60, $service = Service, ?string $proxy = null)
    {
        $this->endpoint = $endpoint;
        $this->ak = $ak;
        $this->sk = $sk;
        $this->appid = $appid;
        $this->region = $region;
        $this->timeout = $timeout;
        $this->service = $service;
        $this->proxy = $proxy;

        $config = [
            'timeout' => $timeout,
        ];

        if ($this->proxy) {
            if ($this->isProxyValid($this->proxy)) {
                $config['proxy'] = $this->formatProxyConfig($this->proxy);
                echo "SetProxy Succ: $this->proxy\n";
            }
        }

        $this->client = new Client($config);
    }

    private function formatProxyConfig(string $proxy): array {
        $proxyParts = parse_url($proxy);
        $proxyUrl = "{$proxyParts['scheme']}://{$proxyParts['host']}:{$proxyParts['port']}";
        echo "ProxAddr: $proxyUrl";
        return [
            'http' => $proxyUrl,
            'https' => $proxyUrl,
        ];
    }

    private function isProxyValid(string $proxy): bool {
        // 1. 解析代理 URL（使用 PHP 内置的 parse_url 函数）
        $proxyParts = parse_url($proxy);

        // 2. 基础格式校验：必须包含协议（scheme）、主机（host）、端口（port）
        if (empty($proxyParts['scheme']) || empty($proxyParts['host']) || empty($proxyParts['port'])) {
            return false;
        }

        // 3. 校验协议是否支持（如 http、https、socks5 等）
        $supportedSchemes = ['http', 'https', 'socks5', 'socks5h'];
        if (!in_array(strtolower($proxyParts['scheme']), $supportedSchemes, true)) {
            return false;
        }

        // 4. 校验主机是否为合法 IP 或域名（简单校验）
        if (!filter_var($proxyParts['host'], FILTER_VALIDATE_IP) && !preg_match('/^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $proxyParts['host'])) {
            return false;
        }

        // 5. 校验端口是否在有效范围（1-65535）
        if ($proxyParts['port'] < 1 || $proxyParts['port'] > 65535) {
            return false;
        }

        return true;
    }

    protected function getRequest(
        string $path,
        string $action,
        string $requestBody
    )
    {
        $query = "Action=" . $action . "&Version=" . Version;
        $url = $this->endpoint . $path . ($query ? "?$query" : "");
        $headers = [
            "Content-type" => ContentType,
        ];
        $headers = Utils::signv4(
            $this->ak,
            $this->sk,
            $this->region,
            $this->service,
            $requestBody,
            $query,
            Method,
            $path,
            $headers
        );
        $request = new Request(Method, $url, $headers, $requestBody);
        return $request;
    }

    protected function sendAsync(
        string $returnType,
        string $path,
        string $action,
        string $requestBody
    )
    {
        $request = $this->getRequest($path, $action, $requestBody);
        $url = $request->getUri()->__toString();
        return $this->client
            ->sendAsync($request, [
                'timeout' => $this->timeout,
            ])
            ->then(
                function ($response) use ($url, $returnType) {
                    $responseContent = $response->getBody()->getContents();
                    $content = json_decode($responseContent);
                    $statusCode = $response->getStatusCode();

                    if ($statusCode < 200 || $statusCode > 299) {
                        throw new ApiException(
                            sprintf(
                                '[%d] Error connecting to the API (%s)',
                                $statusCode,
                                $url
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $response->getBody()
                        );
                    }

                    if (isset($content->{'ResponseMetadata'}->{'Error'})) {
                        throw new ApiException(
                            sprintf(
                                '[%d] Return Error From the API (%s)',
                                $statusCode,
                                $url
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $responseContent);
                    }
                    $content = $content->{'Result'};
                    return [
                        new $returnType(json_decode(json_encode($content), true)),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($e) {
                    throw new ApiException(
                        "[{$e->getCode()}] {$e->getMessage()}",
                        $e->getCode(),
                        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                    );
                }
            );
    }

    protected function requestStreamAsync(
        string   $returnType,
        string   $path,
        string   $action,
        string   $requestBody,
        callable $callback
    )
    {
        $request = $this->getRequest($path, $action, $requestBody);
        $url = $request->getUri()->__toString();
        $method = $request->getMethod();
        return $this->client
            ->requestAsync($method, $url, [
                'headers' => $request->getHeaders(),
                'body' => $request->getBody()->getContents(),
                'stream' => true,
                'timeout' => $this->timeout,
            ])
            ->then(
                function ($response) use ($url, $returnType, $callback) {
                    $stream = $response->getBody();
                    $buffer = "";
                    while (!$stream->eof()) {
                        $buffer .= $stream->read(1);
                        $lines = explode("\n\n", $buffer);
                        foreach ($lines as $key => $line) {
                            $buffer = $line;
                            if (count($lines) === $key + 1) {
                                break;
                            }
                            if ($line === "data:[DONE]") {
                                break;
                            }
                            $responseContent = substr($line, 5);
                            $content = json_decode($responseContent);
                            $statusCode = $response->getStatusCode();

                            if ($statusCode < 200 || $statusCode > 299) {
                                throw new ApiException(
                                    sprintf(
                                        '[%d] Error connecting to the API (%s)',
                                        $statusCode,
                                        $url
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $response->getBody()
                                );
                            }

                            if (isset($content->{'ResponseMetadata'}->{'Error'})) {
                                throw new ApiException(
                                    sprintf(
                                        '[%d] Return Error From the API (%s)',
                                        $statusCode,
                                        $url
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $responseContent);
                            }
                            $content = $content->{'Result'};
                            $callback([
                                new $returnType(json_decode(json_encode($content), true)),
                                $response->getStatusCode(),
                                $response->getHeaders()
                            ]);
                        }
                    }
                    return $response;
                },
                function ($e) {
                    throw new ApiException(
                        "[{$e->getCode()}] {$e->getMessage()}",
                        $e->getCode(),
                        $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                        $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                    );
                }
            );
    }

    function Moderate(ModerateV2Request $request)
    {
        return $this->sendAsync(
            ModerateV2Response::class,
            "/v2/moderate",
            "Moderate",
            json_encode($request->jsonSerialize())
        );
    }

    function ModerateV2Stream()
    {
        $msgID = "";
        $buffer = "";
        $streamWindow = StreamBaseWindow;
        $previousResponse = null;
        return function (ModerateV2Request $request) use (&$msgID, &$buffer, &$streamWindow, &$previousResponse) {
            if ($msgID) {
                $request->MsgID = $msgID;
            }
            if ($request->Message && $request->Message->Content) {
                $buffer .= $request->Message->Content;
            }
            $isFirstRequest = $previousResponse === null;
            $isLastRequest = $request->UseStream === 2;
            $isBufferFull = mb_strlen($buffer) >= $streamWindow;
            $needSendToRequest = $isFirstRequest || $isLastRequest || $isBufferFull;
            if ($needSendToRequest) {
                $request->Message->Content = $buffer;
                $buffer = "";
                $streamWindow = $streamWindow * WindowExpansionFactor;
                $previousResponse = $this->Moderate($request)
                    ->then(function ($response) use (&$msgID) {
                        $msgID = $response[0]->MsgID;
                        return $response;
                    });
            }
            return $previousResponse;
        };
    }

    function GenerateV2Stream(GenerateStreamV2Request $request, callable $callback)
    {
        return $this->requestStreamAsync(
            GenerateStreamV2Response::class,
            "/v2/generate",
            "Generate",
            json_encode($request->jsonSerialize()),
            $callback
        );
    }
}
