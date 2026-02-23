<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Gridwb\LaravelPerplexity\Enums\Chat\AsyncCompletion\Status;
use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class AsyncChatCompletionResponse extends AbstractResponse
{
    public function __construct(
        public string $id,
        public string $model,
        public Status $status,
        public int $createdAt,
        public ?int $startedAt = null,
        public ?int $completedAt = null,
        public ?int $failedAt = null,
        public ?string $errorMessage = null,
        public ?ChatCompletionResponse $response = null,
    ) {}
}
