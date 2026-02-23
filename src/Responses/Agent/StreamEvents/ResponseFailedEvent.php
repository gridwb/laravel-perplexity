<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents;

use Gridwb\LaravelPerplexity\Enums\Agent\StreamEvent\Type;
use Gridwb\LaravelPerplexity\Responses\Agent\AgentResponseError;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ResponseFailedEvent extends AbstractStreamEvent
{
    public function __construct(
        public AgentResponseError $error,
        public int $sequenceNumber,
        public Type $type,
    ) {}
}
