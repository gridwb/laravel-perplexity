<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Embeddings;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class EmbeddingsResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, EmbeddingObject>  $data
     */
    public function __construct(
        public string $object,
        #[DataCollectionOf(EmbeddingObject::class)]
        public Collection $data,
        public string $model,
        public EmbeddingsUsage $usage,
    ) {}
}
