<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Search;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class SearchTheWebResponseResult extends AbstractResponse
{
    public function __construct(
        public string $title,
        public string $url,
        public string $snippet,
        public ?string $date = null,
        public ?string $lastUpdated = null,
    ) {}
}
