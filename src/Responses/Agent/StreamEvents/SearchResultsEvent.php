<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents;

use Gridwb\LaravelPerplexity\Enums\Agent\StreamEvent\Type;
use Gridwb\LaravelPerplexity\Responses\Agent\AgentResponseUsage;
use Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\SearchResultsOutputItemResult;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class SearchResultsEvent extends AbstractStreamEvent
{
    /**
     * @param  Collection<int, SearchResultsOutputItemResult>  $results
     */
    public function __construct(
        #[DataCollectionOf(SearchResultsOutputItemResult::class)]
        public Collection $results,
        public int $sequenceNumber,
        public Type $type,
        public ?string $thought = null,
        public ?AgentResponseUsage $usage = null,
    ) {}
}
