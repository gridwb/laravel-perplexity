<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents;

use Gridwb\LaravelPerplexity\Enums\Agent\StreamEvent\Type;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class SearchQueriesEvent extends AbstractStreamEvent
{
    /**
     * @param  array<int, string>  $queries
     */
    public function __construct(
        public array $queries,
        public int $sequenceNumber,
        public Type $type,
        public ?string $thought = null,
    ) {}
}
