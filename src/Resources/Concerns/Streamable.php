<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Resources\Concerns;

use GuzzleHttp\RequestOptions;
use InvalidArgumentException;

trait Streamable
{
    /**
     * @param  array<string, mixed>  $parameters
     *
     * @throws InvalidArgumentException
     */
    private function ensureNotStreamed(array $parameters): void
    {
        if (($parameters[RequestOptions::STREAM] ?? false) === true) {
            throw new InvalidArgumentException('Stream option is not supported.');
        }
    }

    /**
     * @param  array<string, mixed>  $parameters
     * @return array<string, mixed>
     */
    private function setStreamParameter(array $parameters): array
    {
        $parameters[RequestOptions::STREAM] = true;

        return $parameters;
    }
}
