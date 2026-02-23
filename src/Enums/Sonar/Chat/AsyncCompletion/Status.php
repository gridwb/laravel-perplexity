<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Sonar\Chat\AsyncCompletion;

enum Status: string
{
    case Created = 'CREATED';
    case InProgress = 'IN_PROGRESS';
    case Completed = 'COMPLETED';
    case Failed = 'FAILED';
}
