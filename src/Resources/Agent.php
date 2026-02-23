<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Resources;

use Gridwb\LaravelPerplexity\Contracts\ApiClientContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\AgentContract;
use Gridwb\LaravelPerplexity\Resources\Concerns\Streamable;
use Gridwb\LaravelPerplexity\Responses\Agent\AgentResponse;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;

readonly class Agent implements AgentContract
{
    use Streamable;

    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function createResponse(array $parameters): AgentResponse
    {
        $this->ensureNotStreamed($parameters);

        $response = $this->apiClient->request(
            Request::METHOD_POST,
            'v1/responses',
            [
                RequestOptions::JSON => $parameters,
            ]
        );

        return AgentResponse::fromResponse($response);
    }
}
