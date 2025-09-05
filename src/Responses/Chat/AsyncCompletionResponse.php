<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Chat;

use Gridwb\LaravelPerplexity\Enums\Chat\AsyncCompletion\Status;
use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;

class AsyncCompletionResponse extends AbstractResponse
{
    public function __construct(
        public string $id,
        public string $model,
        public Status $status,
        #[MapInputName('created_at')]
        #[MapOutputName('created_at')]
        public int $createdAt,
        #[MapInputName('started_at')]
        #[MapOutputName('started_at')]
        public ?int $startedAt = null,
        #[MapInputName('completed_at')]
        #[MapOutputName('completed_at')]
        public ?int $completedAt = null,
        #[MapInputName('failed_at')]
        #[MapOutputName('failed_at')]
        public ?int $failedAt = null,
        #[MapInputName('error_message')]
        #[MapOutputName('error_message')]
        public ?string $errorMessage = null,
        public ?CompletionResponse $response = null,
    ) {}
}
