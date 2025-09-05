<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Chat;

use Gridwb\LaravelPerplexity\Enums\Chat\Completion\Choice\FinishReason;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class CompletionResponseChoice extends Data
{
    public function __construct(
        public int $index,
        public CompletionResponseChoiceMessage $message,
        public CompletionResponseChoiceDelta $delta,
        #[MapInputName('finish_reason')]
        #[MapOutputName('finish_reason')]
        public ?FinishReason $finishReason = null,
    ) {}
}
