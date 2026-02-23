<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ChatCompletionResponseChoiceReasoningStepFetchUrlContent extends Data
{
    /**
     * @param  Collection<int, ChatCompletionResponseSearchResult>  $contents
     */
    public function __construct(
        #[DataCollectionOf(ChatCompletionResponseSearchResult::class)]
        public Collection $contents,
    ) {}
}
