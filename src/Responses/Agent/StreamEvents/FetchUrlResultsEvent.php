<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents;

use Gridwb\LaravelPerplexity\Enums\Agent\StreamEvent\Type;
use Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\FetchUrlResultsOutputItemContent;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class FetchUrlResultsEvent extends AbstractStreamEvent
{
    /**
     * @param  Collection<int, FetchUrlResultsOutputItemContent>  $contents
     */
    public function __construct(
        #[DataCollectionOf(FetchUrlResultsOutputItemContent::class)]
        public Collection $contents,
        public int $sequenceNumber,
        public Type $type,
        public ?string $thought = null,
    ) {}
}
