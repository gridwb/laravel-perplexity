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
class ChatCompletionResponseChoiceMessage extends Data
{
    /**
     * @param  Collection<int, ChatCompletionResponseChoiceReasoningStep>|null  $reasoningSteps
     * @param  Collection<int, ChatCompletionResponseChoiceToolCall>|null  $toolCalls
     */
    public function __construct(
        public Role $role,
        public string $content,
        #[DataCollectionOf(ChatCompletionResponseChoiceReasoningStep::class)]
        public ?Collection $reasoningSteps = null,
        #[DataCollectionOf(ChatCompletionResponseChoiceToolCall::class)]
        public ?Collection $toolCalls = null,
        public ?string $toolCallId = null,
    ) {}
}
