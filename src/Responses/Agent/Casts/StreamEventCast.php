<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\Casts;

use Gridwb\LaravelPerplexity\Enums\Agent\StreamEvent\Type;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\AbstractStreamEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\FetchUrlQueriesEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\FetchUrlResultsEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\OutputItemAddedEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\OutputItemDoneEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\ReasoningStartedEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\ReasoningStoppedEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\ResponseCompletedEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\ResponseCreatedEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\ResponseFailedEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\ResponseInProgressEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\SearchQueriesEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\SearchResultsEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\TextDeltaEvent;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\TextDoneEvent;
use InvalidArgumentException;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class StreamEventCast implements Cast
{
    /**
     * @param  array<string, mixed>  $properties
     * @param  CreationContext<AbstractStreamEvent>  $context
     */
    public function cast(
        DataProperty $property,
        mixed $value,
        array $properties,
        CreationContext $context
    ): AbstractStreamEvent {
        /** @phpstan-ignore-next-line */
        $type = Type::tryFrom($value['type'] ?? null);

        if (is_null($type)) {
            throw new InvalidArgumentException('Unknown stream event type.');
        }

        return match ($type) {
            Type::ResponseCreated => ResponseCreatedEvent::from($value),
            Type::ResponseInProgress => ResponseInProgressEvent::from($value),
            Type::ResponseCompleted => ResponseCompletedEvent::from($value),
            Type::ResponseFailed => ResponseFailedEvent::from($value),
            Type::ResponseOutputItemAdded => OutputItemAddedEvent::from($value),
            Type::ResponseOutputItemDone => OutputItemDoneEvent::from($value),
            Type::ResponseOutputTextDelta => TextDeltaEvent::from($value),
            Type::ResponseOutputTextDone => TextDoneEvent::from($value),
            Type::ResponseReasoningStarted => ReasoningStartedEvent::from($value),
            Type::ResponseReasoningSearchQueries => SearchQueriesEvent::from($value),
            Type::ResponseReasoningSearchResults => SearchResultsEvent::from($value),
            Type::ResponseReasoningFetchUrlQueries => FetchUrlQueriesEvent::from($value),
            Type::ResponseReasoningFetchUrlResults => FetchUrlResultsEvent::from($value),
            Type::ResponseReasoningStopped => ReasoningStoppedEvent::from($value),
        };
    }
}
