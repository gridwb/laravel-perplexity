<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Resources;

use Gridwb\LaravelPerplexity\Contracts\ApiClientContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\EmbeddingsContract;
use Gridwb\LaravelPerplexity\Responses\Embeddings\ContextualizedEmbeddingsResponse;
use Gridwb\LaravelPerplexity\Responses\Embeddings\EmbeddingsResponse;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;

readonly class Embeddings implements EmbeddingsContract
{
    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function createEmbeddings(array $parameters): EmbeddingsResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_POST,
            'v1/embeddings',
            [
                RequestOptions::JSON => $parameters,
            ]
        );

        return EmbeddingsResponse::fromResponse($response);
    }

    public function createContextualizedEmbeddings(array $parameters): ContextualizedEmbeddingsResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_POST,
            'v1/contextualizedembeddings',
            [
                RequestOptions::JSON => $parameters,
            ]
        );

        return ContextualizedEmbeddingsResponse::fromResponse($response);
    }
}
