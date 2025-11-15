<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Contracts\Resources;

use Gridwb\LaravelPerplexity\Responses\Search\SearchResponse;
use GuzzleHttp\Exception\GuzzleException;

interface SearchContract
{
    /**
     * @param  array<string, mixed>  $parameters
     *
     * @throws GuzzleException
     *
     * @see https://docs.perplexity.ai/api-reference/search-post
     */
    public function search(array $parameters): SearchResponse;
}
