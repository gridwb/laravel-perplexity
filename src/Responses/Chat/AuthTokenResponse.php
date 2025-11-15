<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Chat;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;

class AuthTokenResponse extends AbstractResponse
{
    public function __construct(
        #[MapInputName('auth_token')]
        #[MapOutputName('auth_token')]
        public string $authToken,
        #[MapInputName('created_at_epoch_seconds')]
        #[MapOutputName('created_at_epoch_seconds')]
        public int $createdAtEpochSeconds,
        #[MapInputName('token_name')]
        #[MapOutputName('token_name')]
        public string $tokenName,
    ) {}
}
