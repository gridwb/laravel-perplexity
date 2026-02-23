<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent;

use Gridwb\LaravelPerplexity\Enums\Agent\ObjectType;
use Gridwb\LaravelPerplexity\Enums\Agent\Status;
use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Gridwb\LaravelPerplexity\Responses\Agent\Casts\OutputItemCast;
use Gridwb\LaravelPerplexity\Responses\Agent\Outputs\AbstractOutputItem;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class AgentResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, AbstractOutputItem>  $output
     */
    public function __construct(
        public string $id,
        public string $model,
        public ObjectType $object,
        #[DataCollectionOf(AbstractOutputItem::class)]
        #[WithCast(OutputItemCast::class)]
        public Collection $output,
        public Status $status,
        public ?AgentResponseError $error = null,
        public ?AgentResponseUsage $usage = null,
    ) {}
}
