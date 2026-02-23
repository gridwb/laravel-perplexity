<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Sonar\Chat\Completion;

enum Type: string
{
    case Message = 'message';
    case Info = 'info';
    case EndOfStream = 'end_of_stream';
}
