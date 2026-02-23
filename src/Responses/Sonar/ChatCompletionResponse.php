<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Gridwb\LaravelPerplexity\Enums\Sonar\Chat\Completion\Status;
use Gridwb\LaravelPerplexity\Enums\Sonar\Chat\Completion\Type;
use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ChatCompletionResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, ChatCompletionResponseChoice>  $choices
     * @param  array<int, string>|null  $citations
     * @param  Collection<int, ChatCompletionResponseSearchResult>|null  $searchResults
     */
    public function __construct(
        public string $id,
        public string $model,
        public int $created,
        #[DataCollectionOf(ChatCompletionResponseChoice::class)]
        public Collection $choices,
        public ChatCompletionResponseUsage $usage,
        public string $object,
        public ?array $citations = null,
        #[DataCollectionOf(ChatCompletionResponseSearchResult::class)]
        public ?Collection $searchResults = null,
        public ?Type $type = null,
        public ?Status $status = null,
    ) {}
}
