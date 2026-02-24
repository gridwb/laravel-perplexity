<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents;

use Gridwb\LaravelPerplexity\Enums\Agent\StreamEvent\Type;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class TextDoneEvent extends AbstractStreamEvent
{
    public function __construct(
        public int $contentIndex,
        public string $itemId,
        public int $outputIndex,
        public int $sequenceNumber,
        public string $text,
        public Type $type,
    ) {}
}
