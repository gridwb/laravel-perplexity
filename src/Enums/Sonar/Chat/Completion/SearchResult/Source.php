<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Enums\Sonar\Chat\Completion\SearchResult;

enum Source: string
{
    case Web = 'web';
    case Attachment = 'attachment';
}
