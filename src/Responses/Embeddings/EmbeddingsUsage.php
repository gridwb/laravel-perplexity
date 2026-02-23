<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Embeddings;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class EmbeddingsUsage extends Data
{
    public function __construct(
        public int $promptTokens,
        public int $totalTokens,
        public EmbeddingsUsageCost $cost,
    ) {}
}
