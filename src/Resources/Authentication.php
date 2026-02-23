<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Resources;

use Gridwb\LaravelPerplexity\Contracts\ApiClientContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\AuthenticationContract;
use Gridwb\LaravelPerplexity\Responses\Authentication\AuthTokenResponse;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpFoundation\Request;

readonly class Authentication implements AuthenticationContract
{
    public function __construct(
        private ApiClientContract $apiClient,
    ) {}

    public function generateAuthToken(string $tokenName): AuthTokenResponse
    {
        $response = $this->apiClient->request(
            Request::METHOD_POST,
            'generate_auth_token',
            [
                RequestOptions::JSON => [
                    'token_name' => $tokenName,
                ],
            ]
        );

        return AuthTokenResponse::fromResponse($response);
    }

    public function revokeAuthToken(string $authToken): void
    {
        $this->apiClient->request(
            Request::METHOD_POST,
            'revoke_auth_token',
            [
                RequestOptions::JSON => [
                    'auth_token' => $authToken,
                ],
            ]
        );
    }
}
