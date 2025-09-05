<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Chat;

use Spatie\LaravelData\Data;

class CompletionResponseSearchResult extends Data
{
    public function __construct(
        public string $title,
        public string $url,
        public ?string $date = null,
    ) {}
}
