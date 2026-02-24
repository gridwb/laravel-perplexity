<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\OutputItems;

use Gridwb\LaravelPerplexity\Enums\Agent\OutputItem\Status;
use Gridwb\LaravelPerplexity\Enums\Agent\OutputItem\Type;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class FunctionCallOutputItem extends AbstractOutputItem
{
    public function __construct(
        public string $arguments,
        public string $callId,
        public string $id,
        public string $name,
        public Status $status,
        public Type $type,
        public ?string $thoughtSignature = null,
    ) {}
}
