<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ChatCompletionResponseChoiceReasoningStepExecutePython extends Data
{
    public function __construct(
        public string $code,
        public string $result,
    ) {}
}
