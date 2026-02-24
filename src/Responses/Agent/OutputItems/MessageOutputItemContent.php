<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\OutputItems;

use Gridwb\LaravelPerplexity\Enums\Agent\OutputItem\Content\Type;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class MessageOutputItemContent extends Data
{
    /**
     * @param  Collection<int, MessageOutputItemContentAnnotation>|null  $annotations
     */
    public function __construct(
        public string $text,
        public Type $type,
        #[DataCollectionOf(MessageOutputItemContentAnnotation::class)]
        public ?Collection $annotations = null,
    ) {}
}
