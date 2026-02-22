<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ListAsyncCompletionsResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, AsyncCompletionResponse>  $requests
     */
    public function __construct(
        #[DataCollectionOf(AsyncCompletionResponse::class)]
        public Collection $requests,
        public ?int $nextToken = null,
    ) {}
}
