<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\OutputItems;

use Gridwb\LaravelPerplexity\Enums\Agent\Output\Role;
use Gridwb\LaravelPerplexity\Enums\Agent\Output\Status;
use Gridwb\LaravelPerplexity\Enums\Agent\Output\Type;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class MessageOutputItem extends AbstractOutputItem
{
    /**
     * @param  Collection<int, MessageOutputItemContent>  $content
     */
    public function __construct(
        #[DataCollectionOf(MessageOutputItemContent::class)]
        public Collection $content,
        public string $id,
        public Role $role,
        public Status $status,
        public Type $type,
    ) {}
}
