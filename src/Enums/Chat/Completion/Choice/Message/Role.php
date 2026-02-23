<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Chat\Completion\Choice\Message;

enum Role: string
{
    case System = 'system';
    case User = 'user';
    case Assistant = 'assistant';
    case Tool = 'tool';
}
