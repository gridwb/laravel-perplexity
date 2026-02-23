<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\Outputs;

use Gridwb\LaravelPerplexity\Enums\Agent\Output\Type;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class FetchUrlResultsOutputItem extends AbstractOutputItem
{
    /**
     * @param  Collection<int, FetchUrlResultsOutputItemContent>  $contents
     */
    public function __construct(
        #[DataCollectionOf(FetchUrlResultsOutputItemContent::class)]
        public Collection $contents,
        public Type $type,
    ) {}
}
