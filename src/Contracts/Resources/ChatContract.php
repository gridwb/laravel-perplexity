<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Contracts\Resources;

use Gridwb\LaravelPerplexity\Responses\Chat\AsyncCompletionResponse;
use Gridwb\LaravelPerplexity\Responses\Chat\AuthTokenResponse;
use Gridwb\LaravelPerplexity\Responses\Chat\CompletionResponse;
use Gridwb\LaravelPerplexity\Responses\Chat\ListAsyncCompletionsResponse;
use Gridwb\LaravelPerplexity\Responses\StreamResponse;
use GuzzleHttp\Exception\GuzzleException;

interface ChatContract
{
    /**
     * @param  array<string, mixed>  $parameters
     *
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/chat-completions-post
     */
    public function completions(array $parameters): CompletionResponse;

    /**
     * @param  array<string, mixed>  $parameters
     * @return StreamResponse<CompletionResponse>
     *
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/chat-completions-post
     */
    public function completionsStreamed(array $parameters): StreamResponse;

    /**
     * @param  array<string, mixed>  $parameters
     *
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/async-chat-completions-post
     */
    public function createAsyncCompletion(array $parameters): AsyncCompletionResponse;

    /**
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/async-chat-completions-get
     */
    public function listAsyncCompletions(?int $limit = null, ?string $nextToken = null): ListAsyncCompletionsResponse;

    /**
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/async-chat-completions-request_id-get
     */
    public function getAsyncCompletion(string $requestId): AsyncCompletionResponse;

    /**
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/generate-auth-token-post
     */
    public function generateAuthToken(string $tokenName): AuthTokenResponse;

    /**
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/revoke-auth-token-post
     */
    public function revokeAuthToken(string $authToken): void;
}
