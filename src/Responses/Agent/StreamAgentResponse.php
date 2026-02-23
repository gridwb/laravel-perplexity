<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Gridwb\LaravelPerplexity\Responses\Agent\Casts\StreamEventCast;
use Gridwb\LaravelPerplexity\Responses\Agent\StreamEvents\AbstractStreamEvent;
use JsonException;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class StreamAgentResponse extends AbstractResponse
{
    public function __construct(
        #[WithCast(StreamEventCast::class)]
        public AbstractStreamEvent $event,
    ) {}

    /**
     * @throws JsonException
     */
    public static function from(mixed ...$payloads): static
    {
        $data = $payloads[0] ?? null;

        if (is_string($data)) {
            $data = json_decode($data, true, 512, JSON_THROW_ON_ERROR);
        }

        if (is_array($data)) {
            if (! array_key_exists('event', $data)) {
                $data = ['event' => $data];
            }

            $payloads = [$data];
        }

        return parent::from(...$payloads);
    }
}
