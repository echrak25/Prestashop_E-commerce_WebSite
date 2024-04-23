<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

class TidioApi
{
    /**
     * @var string
     */
    private $apiUrl;
    /**
     * @var \Symfony\Contracts\HttpClient\HttpClientInterface
     */
    private $client;
    /**
     * @var TidioLogger
     */
    private $logger;

    public function __construct(string $apiUrl, TidioLogger $logger)
    {
        $this->apiUrl = $apiUrl;
        $this->logger = $logger;
        $this->client = HttpClient::create([
            'headers' => [
                'Content-type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);
    }

    /**
     * @throws TidioApiException
     */
    public function sendGetRequest(string $path, array $queryData = []): TidioApiResponse
    {
        return $this->sendRequest('GET', $path, $queryData);
    }

    /**
     * @throws TidioApiException
     */
    public function sendPostRequest(string $path, array $queryData = [], array $bodyData = []): TidioApiResponse
    {
        return $this->sendRequest('POST', $path, $queryData, $bodyData);
    }

    /**
     * @throws TidioApiException
     */
    public function sendPutRequest(string $path, array $queryData = [], array $bodyData = []): TidioApiResponse
    {
        return $this->sendRequest('PUT', $path, $queryData, $bodyData);
    }

    /**
     * @throws TidioApiException
     */
    private function sendRequest(
        string $method,
        string $path,
        array $queryData = [],
        array $bodyData = []
    ): TidioApiResponse {
        $url = $this->prepareRequestUrl($path);
        $this->logRequest($method, $url);
        $response = $this->client->request($method, $url, [
            'query' => $queryData,
            'json' => $bodyData,
        ]);
        $this->validateResponse($response);

        return $this->createApiResponseDto($response);
    }

    private function prepareRequestUrl(string $path): string
    {
        return sprintf('%s/%s', $this->apiUrl, ltrim($path, '/'));
    }

    /**
     * @throws TidioApiException
     */
    private function validateResponse(ResponseInterface $response): void
    {
        $statusCode = $response->getStatusCode();
        if ($statusCode < 200 || $statusCode >= 300) {
            $this->logErrorResponse($response);

            $errorMessage = $response->toArray(false)['value'] ?? 'An error has occurred';
            throw new TidioApiException($errorMessage);
        }
    }

    private function logRequest(string $method, string $url): void
    {
        $logMessage = sprintf('API %s request %s', $method, $url);
        $this->logger->info($logMessage);
    }

    private function logErrorResponse(ResponseInterface $response): void
    {
        $method = $response->getInfo('http_method');
        $url = preg_replace('/\?.*/', '', $response->getInfo('url')); // remove query string
        $responseBody = $response->toArray(false);

        $logMessage = sprintf('API %s response %s | %d', $method, $url, $response->getStatusCode());
        $this->logger->error($logMessage, $responseBody);
    }

    private function createApiResponseDto(ResponseInterface $response): TidioApiResponse
    {
        if (empty($response->getContent(false))) {
            return new TidioApiResponse();
        }

        return new TidioApiResponse($response->toArray(false));
    }
}
