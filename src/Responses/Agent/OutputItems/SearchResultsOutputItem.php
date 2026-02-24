<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\OutputItems;

use Gridwb\LaravelPerplexity\Enums\Agent\OutputItem\Type;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class SearchResultsOutputItem extends AbstractOutputItem
{
    /**
     * @param  Collection<int, SearchResultsOutputItemResult>|null  $results
     * @param  array<int, string>|null  $queries
     */
    public function __construct(
        public Type $type,
        #[DataCollectionOf(SearchResultsOutputItemResult::class)]
        public ?Collection $results = null,
        public ?array $queries = null,
    ) {}
}
