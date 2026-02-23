<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Gridwb\LaravelPerplexity\Enums\Chat\Completion\Choice\Message\Role;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CompletionResponseChoiceDelta extends Data
{
    /**
     * @param  Collection<int, CompletionResponseChoiceReasoningStep>|null  $reasoningSteps
     * @param  Collection<int, CompletionResponseChoiceToolCall>|null  $toolCalls
     */
    public function __construct(
        public Role $role,
        public string $content,
        #[DataCollectionOf(CompletionResponseChoiceReasoningStep::class)]
        public ?Collection $reasoningSteps = null,
        #[DataCollectionOf(CompletionResponseChoiceToolCall::class)]
        public ?Collection $toolCalls = null,
        public ?string $toolCallId = null,
    ) {}
}
