<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Search;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class SearchTheWebResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, SearchTheWebResponseResult>  $results
     */
    public function __construct(
        public string $id,
        #[DataCollectionOf(SearchTheWebResponseResult::class)]
        public Collection $results,
        public ?string $serverTime = null,
    ) {}
}
