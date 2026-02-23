<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Gridwb\LaravelPerplexity\Responses\Agent\Casts\StreamEventCast;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\AbstractStreamEvent;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class StreamAgentResponse extends AbstractResponse
{
    public function __construct(
        #[WithCast(StreamEventCast::class)]
        public AbstractStreamEvent $event,
    ) {}
}
