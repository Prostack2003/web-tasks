<?php

namespace services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EmailValidationService
{
    private string $baseUrl = 'https://api.emailable.com/v1/';
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function verify(string $email): array
    {
        $stack = HandlerStack::create();

        $maxRetries = 3;

        $stack->push($this->getRetryMiddleware($maxRetries));

        $client = new Client(
            [
                'base_uri' => $this->baseUrl,
                'timeout' => 5,
                'handler' => $stack,
            ]
        );

        $response = $client->request('GET', 'verify?email=' . $email . '&api_key=' . $this->apiKey);

        return json_decode($response->getBody()->getContents(), true);
    }

    private function getRetryMiddleware(int $maxRetries): callable
    {
        return Middleware::retry(
            function (
                int $retries,
                RequestInterface $request,
                ?ResponseInterface $response = null,
                ?\RuntimeException $exception = null
            ) use ($maxRetries) {
                if ($retries >= $maxRetries) {
                    return false;
                }

                if ($response && in_array($response->getStatusCode(), [249, 429, 503])) {
                    echo 'Retrying[' . $retries . '] Status:' . $response->getStatusCode() . '<br />';

                    return true;
                }

                if ($exception instanceof ConnectException) {
                    echo 'Retrying[' . $retries . '], Conntection Error <br />';

                    return true;
                }

                echo 'Not Retrying <br />';

                return false;
            }
        );
    }
}