<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents;

use Gridwb\LaravelPerplexity\Enums\Agent\StreamEvent\Type;
use Gridwb\LaravelPerplexity\Responses\Agent\Casts\OutputItemCollectionCast;
use Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\AbstractOutputItem;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class OutputItemDoneEvent extends AbstractStreamEvent
{
    public function __construct(
        #[WithCast(OutputItemCollectionCast::class)]
        public AbstractOutputItem $item,
        public int $outputIndex,
        public int $sequenceNumber,
        public Type $type,
    ) {}
}
