<?php

namespace Volcengine\Common\Auth\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Volcengine\Common\ApiException;
use Volcengine\Common\HeaderSelector;
use Volcengine\Common\Utils;

class StsProvider extends Provider
{
    private $ak;
    private $sk;
    private $roleName;
    private $accountId;
    private $durationSeconds;
    private $host;
    private $region;
    private $schema;
    private $policy;
    private $headerSelector;

    public function __construct(
        $ak,
        $sk,
        $roleName,
        $accountId,
        $region = 'cn-north-1',
        $durationSeconds = 3600,
        $schema = 'https',
        $host = 'sts.volcengineapi.com',
        $policy = null,
        HeaderSelector $selector = null
    )
    {
        $this->ak = $ak;
        $this->sk = $sk;
        $this->roleName = $roleName;
        $this->accountId = $accountId;
        $this->durationSeconds = $durationSeconds;
        $this->host = $host;
        $this->region = $region;
        $this->schema = $schema;
        $this->policy = $policy;
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    public function getCredentials()
    {
        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['text/plain']
        );
        $defaultHeaders = [];
        $defaultHeaders['User-Agent'] = "volcstack-php-sdk/1.0.72";
        $headers = array_merge(
            $defaultHeaders,
            $headers
        );
        $queryParams = [
            'Action' => "AssumeRole",
            'Version' => '2018-01-01',
            'DurationSeconds' => $this->durationSeconds,
            'RoleSessionName' => uniqid('', true),
            'RoleTrn' => 'trn:iam::' . $this->accountId . ':role/' . $this->roleName
        ];

        if ($this->policy !== null) {
            $queryParams['Policy'] = $this->policy;
        }

        $query = '';
        ksort($queryParams);  // sort query first
        foreach ($queryParams as $k => $v) {
            $query .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
        }
        $query = substr($query, 0, -1);

        $headers = Utils::signv4($this->ak, $this->sk, $this->region, 'sts',
            '', $query, 'GET', '/', $headers);

        $request = new Request('GET',
            $this->schema . '://' . $this->host . '/' . ($query ? "?{$query}" : ''),
            $headers, '');

        $client = new Client();
        try {
            $response = $client->send($request, []);
        } catch (RequestException $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                $e->getCode(),
                $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
            );
        }
        $statusCode = $response->getStatusCode();
        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf(
                    '[%d] Error connecting to the API (%s)(%s)',
                    $statusCode,
                    $request->getUri(),
                    $response->getBody()
                ),
                $statusCode,
                $response->getHeaders(),
                $response->getBody()
            );
        }
        $responseContent = $response->getBody()->getContents();
        $content = json_decode($responseContent);

        if (isset($content->{'ResponseMetadata'}->{'Error'})) {
            throw new ApiException(
                sprintf(
                    '[%d] Return Error From the API (%s)(%s)',
                    $statusCode,
                    $request->getUri(),
                    $response->getBody()
                ),
                $statusCode,
                $response->getHeaders(),
                $responseContent);
        }
        $content = $content->{'Result'};

        return (array)$content->Credentials;
    }
}

?>
