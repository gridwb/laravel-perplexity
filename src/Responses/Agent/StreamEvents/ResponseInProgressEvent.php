<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents;

use Gridwb\LaravelPerplexity\Enums\Agent\StreamEvent\Type;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ResponseInProgressEvent extends AbstractStreamEvent
{
    /**
     * @param  array<string, mixed>|null  $response
     */
    public function __construct(
        public int $sequenceNumber,
        public Type $type,
        public ?array $response = null,
    ) {}
}
