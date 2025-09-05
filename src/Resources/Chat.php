<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Resources;

use Gridwb\LaravelPerplexity\Contracts\ApiClientContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\ChatContract;
use Gridwb\LaravelPerplexity\Resources\Concerns\Streamable;
use Gridwb\LaravelPerplexity\Responses\Chat\AsyncCompletionResponse;
use Gridwb\LaravelPerplexity\Responses\Chat\CompletionResponse;
use Gridwb\LaravelPerplexity\Responses\Chat\ListAsyncCompletionsResponse;
use Gridwb\LaravelPerplexity\Responses\StreamResponse;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;

readonly class Chat implements ChatContract
{
    use Streamable;

    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function completions(array $parameters): CompletionResponse
    {
        $this->ensureNotStreamed($parameters);

        $response = $this->apiClient->request(
            Request::METHOD_POST,
            'chat/completions',
            [
                RequestOptions::JSON => $parameters,
            ]
        );

        return CompletionResponse::fromResponse($response);
    }

    public function completionsStreamed(array $parameters): StreamResponse
    {
        $parameters = $this->setStreamParameter($parameters);

        $response = $this->apiClient->request(
            Request::METHOD_POST,
            'chat/completions',
            [
                RequestOptions::STREAM => true,
                RequestOptions::JSON => $parameters,
            ]
        );

        return new StreamResponse(CompletionResponse::class, $response);
    }

    public function createAsyncCompletion(array $parameters): AsyncCompletionResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_POST,
            'async/chat/completions',
            [
                RequestOptions::JSON => $parameters,
            ]
        );

        return AsyncCompletionResponse::fromResponse($response);
    }

    public function listAsyncCompletions(?int $limit = null, ?string $nextToken = null): ListAsyncCompletionsResponse
    {
        $parameters = [];

        if (! is_null($limit)) {
            $parameters['limit'] = $limit;
        }
        if (! is_null($nextToken)) {
            $parameters['next_token'] = $nextToken;
        }

        $response = $this->apiClient->request(
            Request::METHOD_GET,
            'async/chat/completions',
            [
                RequestOptions::QUERY => $parameters,
            ]
        );

        return ListAsyncCompletionsResponse::fromResponse($response);
    }

    public function getAsyncCompletion(string $requestId): AsyncCompletionResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_GET,
            "async/chat/completions/$requestId"
        );

        return AsyncCompletionResponse::fromResponse($response);
    }
}
