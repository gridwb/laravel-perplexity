<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CompletionResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, CompletionResponseChoice>  $choices
     * @param  Collection<int, CompletionResponseSearchResult>|null  $searchResults
     * @param  Collection<int, CompletionResponseVideo>|null  $videos
     */
    public function __construct(
        public string $id,
        public string $model,
        public int $created,
        public CompletionResponseUsage $usage,
        public string $object,
        #[DataCollectionOf(CompletionResponseChoice::class)]
        public Collection $choices,
        #[DataCollectionOf(CompletionResponseSearchResult::class)]
        public ?Collection $searchResults = null,
        #[DataCollectionOf(CompletionResponseVideo::class)]
        public ?Collection $videos = null,
    ) {}
}
