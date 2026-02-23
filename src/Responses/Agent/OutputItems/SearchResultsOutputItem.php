<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\OutputItems;

use Gridwb\LaravelPerplexity\Enums\Agent\Output\Type;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class SearchResultsOutputItem extends AbstractOutputItem
{
    /**
     * @param  Collection<int, SearchResultsOutputItemResult>  $results
     * @param  array<int, string>|null  $queries
     */
    public function __construct(
        #[DataCollectionOf(SearchResultsOutputItemResult::class)]
        public Collection $results,
        public Type $type,
        public ?array $queries,
    ) {}
}
