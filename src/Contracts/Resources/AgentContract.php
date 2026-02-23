<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Contracts\Resources;

use Gridwb\LaravelPerplexity\Responses\Agent\AgentResponse;
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
}
