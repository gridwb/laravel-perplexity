<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class AgentResponseError extends Data
{
    public function __construct(
        public string $message,
        public ?string $code = null,
        public ?string $type = null,
    ) {}
}
