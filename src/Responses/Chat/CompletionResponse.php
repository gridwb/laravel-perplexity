<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Chat;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;

class CompletionResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, CompletionResponseChoice>  $choices
     * @param  Collection<int, CompletionResponseSearchResult>|null  $searchResults
     */
    public function __construct(
        public string $id,
        public string $model,
        public int $created,
        public CompletionResponseUsage $usage,
        public string $object,
        #[DataCollectionOf(CompletionResponseChoice::class)]
        public Collection $choices,
        #[MapInputName('search_results')]
        #[MapOutputName('search_results')]
        #[DataCollectionOf(CompletionResponseSearchResult::class)]
        public ?Collection $searchResults = null,
    ) {}
}
