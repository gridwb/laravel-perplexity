<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Search;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;

class SearchResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, SearchResponseResult>  $results
     */
    public function __construct(
        #[DataCollectionOf(SearchResponseResult::class)]
        public Collection $results,
    ) {}
}
