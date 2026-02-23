<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Gridwb\LaravelPerplexity\Enums\Chat\Completion\Status;
use Gridwb\LaravelPerplexity\Enums\Chat\Completion\Type;
use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class CompletionResponse extends AbstractResponse
{
    /**
     * @param  Collection<int, CompletionResponseChoice>  $choices
     * @param  array<int, string>|null  $citations
     * @param  Collection<int, CompletionResponseSearchResult>|null  $searchResults
     */
    public function __construct(
        public string $id,
        public string $model,
        public int $created,
        #[DataCollectionOf(CompletionResponseChoice::class)]
        public Collection $choices,
        public CompletionResponseUsage $usage,
        public string $object,
        public ?array $citations = null,
        #[DataCollectionOf(CompletionResponseSearchResult::class)]
        public ?Collection $searchResults = null,
        public ?Type $type = null,
        public ?Status $status = null,
    ) {}
}
