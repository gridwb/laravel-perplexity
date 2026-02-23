<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CompletionResponseChoiceToolCall extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?CompletionResponseChoiceToolCallFunction $function = null,
    ) {}
}
