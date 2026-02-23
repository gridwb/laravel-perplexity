<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class AsyncChatCompletionsResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, AsyncChatCompletionResponse>  $requests
     */
    public function __construct(
        #[DataCollectionOf(AsyncChatCompletionResponse::class)]
        public Collection $requests,
        public ?string $nextToken = null,
    ) {}
}
