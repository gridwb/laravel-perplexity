<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class AgentResponseUsage extends Data
{
    /**
     * @param  array<string, array{invocation: int}>|null  $toolCallsDetails
     */
    public function __construct(
        public int $inputTokens,
        public int $outputTokens,
        public int $totalTokens,
        public ?AgentResponseUsageCost $cost = null,
        public ?AgentResponseUsageInputTokensDetails $inputTokensDetails = null,
        public ?array $toolCallsDetails = null,
    ) {}
}
