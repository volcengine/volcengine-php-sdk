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

    function __construct($endpoint, $ak, $sk, $appid, $region, ?string $proxy = null, $timeout = 60, $service = Service)
    {
        $this->endpoint = $endpoint;
        $this->ak = $ak;
        $this->sk = $sk;
        $this->appid = $appid;
        $this->region = $region;
        $this->timeout = $timeout;
        $this->service = $service;
        $this->proxy = $proxy;

        // 若传入代理，检测有效性后添加到配置
        if ($this->proxy) {
            // 检测代理是否有效
            if ($this->isProxyValid($this->proxy)) {
                $config['proxy'] = $this->formatProxyConfig($this->proxy);
                $this->client = new Client($config);
            } else {
                trigger_error("proxy address invalid: {$this->proxy}, no use proxy", E_USER_WARNING);
                $this->proxy = null; // 标记代理无效
            }
        }

        if ($this->proxy) {
            $this->client = new Client();
        }
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
