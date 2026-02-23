<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Agent\Output;

enum Status: string
{
    case Completed = 'completed';
    case Failed = 'failed';
    case InProgress = 'in_progress';
    case RequiresAction = 'requires_action';
}
