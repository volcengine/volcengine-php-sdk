<?php

namespace Volcengine\Common;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class Session
{
    private $configuration;
    private $client;
    private $apiClient;

    public function __construct(Configuration $configuration = null, ClientInterface $client = null, ApiClient $apiClient = null)
    {
        $this->configuration = $configuration ?: new Configuration();
        $this->client = $client ?: $this->configuration->createHttpClient();
        $this->apiClient = $apiClient ?: new ApiClient($this->configuration, $this->client);
    }

    public function getConfiguration()
    {
        return $this->configuration;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getApiClient()
    {
        return $this->apiClient;
    }

    public function createService($apiClass, $selector = null)
    {
        if (!class_exists($apiClass)) {
            throw new \InvalidArgumentException('API class not found: ' . $apiClass);
        }

        return new $apiClass($this->client, $this->configuration, $selector, $this->apiClient);
    }
}
