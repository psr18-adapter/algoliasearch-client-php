<?php

declare(strict_types=1);

namespace Psr18Adapter\Algolia;

use Algolia\AlgoliaSearch\Http\HttpClientInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AlgoliaPsr18Client implements HttpClientInterface
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param int $timeout
     * @param int $connectTimeout
     */
    public function sendRequest(RequestInterface $request, $timeout, $connectTimeout): ResponseInterface
    {
        return $this->httpClient->sendRequest($request);
    }
}