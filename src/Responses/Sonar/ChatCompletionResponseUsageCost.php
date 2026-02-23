<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ChatCompletionResponseUsageCost extends Data
{
    public function __construct(
        public int $inputTokensCost,
        public int $outputTokensCost,
        public int $totalCost,
        public ?int $reasoningTokensCost = null,
        public ?int $requestCost = null,
        public ?int $citationTokensCost = null,
        public ?int $searchQueriesCost = null,
    ) {}
}
