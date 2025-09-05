<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Chat;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;

class ListAsyncCompletionsResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, AsyncCompletionResponse>  $requests
     */
    public function __construct(
        #[DataCollectionOf(AsyncCompletionResponse::class)]
        public Collection $requests,
        #[MapInputName('next_token')]
        #[MapOutputName('next_token')]
        public ?int $nextToken = null,
    ) {}
}
