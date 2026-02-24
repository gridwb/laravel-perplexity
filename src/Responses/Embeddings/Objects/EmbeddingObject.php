<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Embeddings\Objects;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class EmbeddingObject extends Data
{
    public function __construct(
        public string $object,
        public int $index,
        public string $embedding,
    ) {}
}
