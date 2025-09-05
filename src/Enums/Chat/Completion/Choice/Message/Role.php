<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Chat\Completion\Choice\Message;

enum Role: string
{
    case SYSTEM = 'system';
    case USER = 'user';
    case ASSISTANT = 'assistant';
}
