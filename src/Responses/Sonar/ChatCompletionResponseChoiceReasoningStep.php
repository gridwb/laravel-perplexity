<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ChatCompletionResponseChoiceReasoningStep extends Data
{
    public function __construct(
        public string $thought,
        public ChatCompletionResponseChoiceReasoningStepWebSearch $webSearch,
        public ChatCompletionResponseChoiceReasoningStepFetchUrlContent $fetchUrlContent,
        public ChatCompletionResponseChoiceReasoningStepExecutePython $executePython,
        public ?string $type = null,
    ) {}
}
