<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Resources;

use Gridwb\LaravelPerplexity\Contracts\ApiClientContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\SearchContract;
use Gridwb\LaravelPerplexity\Responses\Search\SearchResponse;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;

readonly class Search implements SearchContract
{
    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function search(array $parameters): SearchResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_POST,
            'search',
            [
                RequestOptions::JSON => $parameters,
            ]
        );

        return SearchResponse::fromResponse($response);
    }
}
