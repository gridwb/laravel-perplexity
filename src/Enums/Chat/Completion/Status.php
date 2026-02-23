<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Chat\Completion;

enum Status: string
{
    case Pending = 'PENDING';
    case Completed = 'COMPLETED';
}
