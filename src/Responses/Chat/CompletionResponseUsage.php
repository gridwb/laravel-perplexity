<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Chat;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class CompletionResponseUsage extends Data
{
    public function __construct(
        #[MapInputName('prompt_tokens')]
        #[MapOutputName('prompt_tokens')]
        public int $promptTokens,
        #[MapInputName('completion_tokens')]
        #[MapOutputName('completion_tokens')]
        public int $completionTokens,
        #[MapInputName('total_tokens')]
        #[MapOutputName('total_tokens')]
        public int $totalTokens,
        #[MapInputName('search_context_size')]
        #[MapOutputName('search_context_size')]
        public ?string $searchContextSize = null,
        #[MapInputName('citation_tokens')]
        #[MapOutputName('citation_tokens')]
        public ?int $citationTokens = null,
        #[MapInputName('num_search_queries')]
        #[MapOutputName('num_search_queries')]
        public ?int $numSearchQueries = null,
        #[MapInputName('reasoning_tokens')]
        #[MapOutputName('reasoning_tokens')]
        public ?int $reasoningTokens = null,
    ) {}
}
