<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Gridwb\LaravelPerplexity\Enums\Sonar\Chat\Completion\SearchResult\Source;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ChatCompletionResponseSearchResult extends Data
{
    public function __construct(
        public string $title,
        public string $url,
        public ?string $date = null,
        public ?string $lastUpdated = null,
        public string $snippet = '',
        public Source $source = Source::Web,
    ) {}
}
