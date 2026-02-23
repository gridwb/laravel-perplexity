<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class AgentResponseUsageInputTokensDetails extends Data
{
    public function __construct(
        public ?int $cacheCreationInputTokens = null,
        public ?int $cacheReadInputTokens = null,
    ) {}
}
