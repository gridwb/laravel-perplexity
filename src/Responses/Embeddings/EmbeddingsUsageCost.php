<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Embeddings;

use Gridwb\LaravelPerplexity\Enums\Embeddings\Cost\Currency;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class EmbeddingsUsageCost extends Data
{
    public function __construct(
        public int $inputCost,
        public int $totalCost,
        public Currency $currency,
    ) {}
}
