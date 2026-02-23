<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Sonar\Chat\Completion\Choice;

enum FinishReason: string
{
    case Stop = 'stop';
    case Length = 'length';
}
