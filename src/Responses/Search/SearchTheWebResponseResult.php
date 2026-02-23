<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Search;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class SearchTheWebResponseResult extends Data
{
    public function __construct(
        public string $title,
        public string $url,
        public string $snippet,
        public ?string $date = null,
        public ?string $lastUpdated = null,
    ) {}
}
