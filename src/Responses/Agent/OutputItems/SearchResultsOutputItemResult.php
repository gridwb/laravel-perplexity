<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\OutputItems;

use Gridwb\LaravelPerplexity\Enums\Agent\OutputItem\Result\Source;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class SearchResultsOutputItemResult extends Data
{
    public function __construct(
        public int $id,
        public string $snippet,
        public string $title,
        public string $url,
        public ?string $date = null,
        public ?string $lastUpdated = null,
        public ?Source $source = null,
    ) {}
}
