<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses;

use Generator;
use Gridwb\LaravelPerplexity\Contracts\Responses\StreamResponseContract;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @template TResponse
 *
 * @implements StreamResponseContract<TResponse>
 */
readonly class StreamResponse implements StreamResponseContract
{
    /**
     * @param  class-string<TResponse>  $responseClass
     */
    public function __construct(
        private string $responseClass,
        private ResponseInterface $response,
    ) {}

    public function getIterator(): Generator
    {
        $stream = $this->response->getBody();

        while (! $stream->eof()) {
            $line = $this->readLine($stream);

            if (! str_starts_with($line, 'data:')) {
                continue;
            }

            $data = trim(substr($line, strlen('data:')));

            if ($data === '[DONE]') {
                break;
            }

            yield $this->responseClass::from($data);
        }
    }

    private function readLine(StreamInterface $stream): string
    {
        $buffer = '';

        while (! $stream->eof()) {
            if ('' === ($byte = $stream->read(1))) {
                return $buffer;
            }

            $buffer .= $byte;

            if ($byte === "\n") {
                break;
            }
        }

        return $buffer;
    }
}
