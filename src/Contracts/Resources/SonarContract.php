<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Contracts\Resources;

use Gridwb\LaravelPerplexity\Responses\Sonar\AsyncChatCompletionResponse;
use Gridwb\LaravelPerplexity\Responses\Sonar\AsyncChatCompletionsResponse;
use Gridwb\LaravelPerplexity\Responses\Sonar\ChatCompletionResponse;
use Gridwb\LaravelPerplexity\Responses\StreamResponse;
use GuzzleHttp\Exception\GuzzleException;

interface SonarContract
{
    /**
     * @param  array<string, mixed>  $parameters
     *
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/chat-completions-post
     */
    public function createChatCompletion(array $parameters): ChatCompletionResponse;

    /**
     * @param  array<string, mixed>  $parameters
     * @return StreamResponse<ChatCompletionResponse>
     *
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/chat-completions-post
     */
    public function createStreamedChatCompletion(array $parameters): StreamResponse;

    /**
     * @param  array<string, mixed>  $parameters
     *
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/async-chat-completions-post
     */
    public function createAsyncChatCompletion(array $parameters): AsyncChatCompletionResponse;

    /**
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/async-chat-completions-get
     */
    public function listAsyncChatCompletions(?int $limit = null, ?string $nextToken = null): AsyncChatCompletionsResponse;

    /**
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/async-chat-completions-request_id-get
     */
    public function getAsyncChatCompletion(string $requestId): AsyncChatCompletionResponse;
}
