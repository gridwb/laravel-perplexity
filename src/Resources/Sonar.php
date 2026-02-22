<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Resources;

use Gridwb\LaravelPerplexity\Contracts\ApiClientContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\SonarContract;
use Gridwb\LaravelPerplexity\Resources\Concerns\Streamable;
use Gridwb\LaravelPerplexity\Responses\Sonar\AsyncCompletionResponse;
use Gridwb\LaravelPerplexity\Responses\Sonar\AuthTokenResponse;
use Gridwb\LaravelPerplexity\Responses\Sonar\CompletionResponse;
use Gridwb\LaravelPerplexity\Responses\Sonar\ListAsyncCompletionsResponse;
use Gridwb\LaravelPerplexity\Responses\StreamResponse;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;

readonly class Sonar implements SonarContract
{
    use Streamable;

    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function createCompletion(array $parameters): CompletionResponse
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

    public function createStreamedCompletion(array $parameters): StreamResponse
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

    public function generateAuthToken(string $tokenName): AuthTokenResponse
    {
        $parameters['token_name'] = $tokenName;

        $response = $this->apiClient->request(
            Request::METHOD_POST,
            'generate_auth_token',
            [
                RequestOptions::JSON => $parameters,
            ]
        );

        return AuthTokenResponse::fromResponse($response);
    }

    public function revokeAuthToken(string $authToken): void
    {
        $parameters['auth_token'] = $authToken;

        $this->apiClient->request(
            Request::METHOD_POST,
            'revoke_auth_token',
            [
                RequestOptions::JSON => $parameters,
            ]
        );
    }
}
