<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Sonar;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class AuthTokenResponse extends AbstractResponse
{
    public function __construct(
        public string $authToken,
        public int $createdAtEpochSeconds,
        public string $tokenName,
    ) {}
}
