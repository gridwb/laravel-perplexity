<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent;

use Gridwb\LaravelPerplexity\Enums\Agent\Usage\Cost\Currency;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class AgentResponseUsageCost extends Data
{
    public function __construct(
        public Currency $currency,
        public int $inputCost,
        public int $outputCost,
        public int $totalCost,
        public ?int $cacheCreationCost = null,
        public ?int $cacheReadCost = null,
        public ?int $toolCallsCost = null,
    ) {}
}
