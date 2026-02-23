<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Chat\Completion\Choice;

enum FinishReason: string
{
    case Stop = 'stop';
    case Length = 'length';
}
