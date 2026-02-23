<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ChatCompletionResponseChoiceReasoningStepWebSearch extends Data
{
    /**
     * @param  Collection<int, ChatCompletionResponseSearchResult>  $searchResults
     * @param  array<int, string>  $searchKeywords
     */
    public function __construct(
        #[DataCollectionOf(ChatCompletionResponseSearchResult::class)]
        public Collection $searchResults,
        public array $searchKeywords,
    ) {}
}
