<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Chat\AsyncCompletion;

enum Status: string
{
    case CREATED = 'CREATED';
    case IN_PROGRESS = 'IN_PROGRESS';
    case COMPLETED = 'COMPLETED';
    case FAILED = 'FAILED';
}
