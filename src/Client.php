<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity;

use Gridwb\LaravelPerplexity\Contracts\ApiClientContract;
use Gridwb\LaravelPerplexity\Contracts\ClientContract;
use Gridwb\LaravelPerplexity\Resources\Chat;

readonly class Client implements ClientContract
{
    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function chat(): Chat
    {
        return new Chat($this->apiClient);
    }
}
