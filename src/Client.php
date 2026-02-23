<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity;

use Gridwb\LaravelPerplexity\Contracts\ApiClientContract;
use Gridwb\LaravelPerplexity\Contracts\ClientContract;
use Gridwb\LaravelPerplexity\Resources\Agent;
use Gridwb\LaravelPerplexity\Resources\Authentication;
use Gridwb\LaravelPerplexity\Resources\Embeddings;
use Gridwb\LaravelPerplexity\Resources\Search;
use Gridwb\LaravelPerplexity\Resources\Sonar;

readonly class Client implements ClientContract
{
    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function agent(): Agent
    {
        return new Agent($this->apiClient);
    }

    public function authentication(): Authentication
    {
        return new Authentication($this->apiClient);
    }

    public function embeddings(): Embeddings
    {
        return new Embeddings($this->apiClient);
    }

    public function sonar(): Sonar
    {
        return new Sonar($this->apiClient);
    }

    public function search(): Search
    {
        return new Search($this->apiClient);
    }
}
