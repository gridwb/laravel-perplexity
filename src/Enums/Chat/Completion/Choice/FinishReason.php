<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Chat\Completion\Choice;

enum FinishReason: string
{
    case STOP = 'stop';
    case LENGTH = 'length';
}
