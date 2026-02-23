<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Gridwb\LaravelPerplexity\Enums\Sonar\Chat\Completion\Choice\FinishReason;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ChatCompletionResponseChoice extends Data
{
    public function __construct(
        public int $index,
        public ChatCompletionResponseChoiceMessage $message,
        public ChatCompletionResponseChoiceDelta $delta,
        public ?FinishReason $finishReason = null,
    ) {}
}
