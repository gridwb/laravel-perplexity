<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Contracts\Resources;

use Gridwb\LaravelPerplexity\Responses\Agent\AgentResponse;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamAgentResponse;
use Gridwb\LaravelPerplexity\Responses\StreamResponse;
use GuzzleHttp\Exception\GuzzleException;

interface AgentContract
{
    /**
     * @param  array<string, mixed>  $parameters
     *
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/responses-post
     */
    public function createResponse(array $parameters): AgentResponse;

    /**
     * @param  array<string, mixed>  $parameters
     * @return StreamResponse<StreamAgentResponse>
     *
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/responses-post
     */
    public function createStreamedResponse(array $parameters): StreamResponse;
}
