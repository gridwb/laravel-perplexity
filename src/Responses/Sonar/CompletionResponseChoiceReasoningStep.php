<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CompletionResponseChoiceReasoningStep extends Data
{
    public function __construct(
        public string $thought,
        public CompletionResponseChoiceReasoningStepWebSearch $webSearch,
        public CompletionResponseChoiceReasoningStepFetchUrlContent $fetchUrlContent,
        public CompletionResponseChoiceReasoningStepExecutePython $executePython,
        public ?string $type = null,
    ) {}
}
