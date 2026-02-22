<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CompletionResponseVideo extends Data
{
    public function __construct(
        public string $url,
        public ?string $thumbnailUrl = null,
        public ?string $thumbnailWidth = null,
        public ?string $thumbnailHeight = null,
        public ?string $duration = null,
    ) {}
}
