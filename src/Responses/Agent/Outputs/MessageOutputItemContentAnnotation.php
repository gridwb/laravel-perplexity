<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\Outputs;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class MessageOutputItemContentAnnotation extends Data
{
    public function __construct(
        public ?int $endIndex = null,
        public ?int $startIndex = null,
        public ?string $title = null,
        public ?string $type = null,
        public ?string $url = null,
    ) {}
}
