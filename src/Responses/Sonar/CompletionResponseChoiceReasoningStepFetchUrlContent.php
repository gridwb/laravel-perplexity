<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CompletionResponseChoiceReasoningStepFetchUrlContent extends Data
{
    /**
     * @param  Collection<int, CompletionResponseSearchResult>  $contents
     */
    public function __construct(
        #[DataCollectionOf(CompletionResponseSearchResult::class)]
        public Collection $contents,
    ) {}
}
