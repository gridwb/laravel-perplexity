<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Contracts\Resources;

use Gridwb\LaravelPerplexity\Responses\Authentication\AuthTokenResponse;
use GuzzleHttp\Exception\GuzzleException;

interface AuthenticationContract
{
    /**
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/generate-auth-token-post
     */
    public function generateAuthToken(string $tokenName): AuthTokenResponse;

    /**
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/revoke-auth-token-post
     */
    public function revokeAuthToken(string $authToken): void;
}
