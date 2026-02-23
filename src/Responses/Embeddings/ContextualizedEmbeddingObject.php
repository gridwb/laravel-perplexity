<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Embeddings;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ContextualizedEmbeddingObject extends Data
{
    /**
     * @param  Collection<int, EmbeddingObject>  $data
     */
    public function __construct(
        public string $object,
        public int $index,
        #[DataCollectionOf(EmbeddingObject::class)]
        public Collection $data,
    ) {}
}
