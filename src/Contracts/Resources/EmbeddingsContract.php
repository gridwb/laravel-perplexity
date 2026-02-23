<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Contracts\Resources;

use Gridwb\LaravelPerplexity\Responses\Embeddings\ContextualizedEmbeddingsResponse;
use Gridwb\LaravelPerplexity\Responses\Embeddings\EmbeddingsResponse;
use GuzzleHttp\Exception\GuzzleException;

interface EmbeddingsContract
{
    /**
     * @param  array<string, mixed>  $parameters
     *
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/embeddings-post
     */
    public function createEmbeddings(array $parameters): EmbeddingsResponse;

    /**
     * @param  array<string, mixed>  $parameters
     *
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/contextualized-embeddings-post
     */
    public function createContextualizedEmbeddings(array $parameters): ContextualizedEmbeddingsResponse;
}
