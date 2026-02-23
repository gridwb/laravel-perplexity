<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Agent\StreamEvent;

enum Type: string
{
    case ResponseCreated = 'response.created';
    case ResponseInProgress = 'response.in_progress';
    case ResponseCompleted = 'response.completed';
    case ResponseFailed = 'response.failed';
    case ResponseOutputItemAdded = 'response.output_item.added';
    case ResponseOutputItemDone = 'response.output_item.done';
    case ResponseOutputTextDelta = 'response.output_text.delta';
    case ResponseOutputTextDone = 'response.output_text.done';
    case ResponseReasoningStarted = 'response.reasoning.started';
    case ResponseReasoningSearchQueries = 'response.reasoning.search_queries';
    case ResponseReasoningSearchResults = 'response.reasoning.search_results';
    case ResponseReasoningFetchUrlQueries = 'response.reasoning.fetch_url_queries';
    case ResponseReasoningFetchUrlResults = 'response.reasoning.fetch_url_results';
    case ResponseReasoningStopped = 'response.reasoning.stopped';
}
