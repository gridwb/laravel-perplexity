<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\Casts;

use Gridwb\LaravelPerplexity\Enums\Agent\OutputItem\Type;
use Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\AbstractOutputItem;
use Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\FetchUrlResultsOutputItem;
use Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\FunctionCallOutputItem;
use Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\MessageOutputItem;
use Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\SearchResultsOutputItem;
use InvalidArgumentException;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class OutputItemCast implements Cast
{
    /**
     * @param  array<string, mixed>  $properties
     * @param  CreationContext<AbstractOutputItem>  $context
     */
    public function cast(
        DataProperty $property,
        mixed $value,
        array $properties,
        CreationContext $context
    ): AbstractOutputItem {
        /** @phpstan-ignore-next-line */
        $type = Type::tryFrom($value['type'] ?? null);

        if (is_null($type)) {
            throw new InvalidArgumentException('Unknown output item type.');
        }

        return match ($type) {
            Type::Message => MessageOutputItem::from($value),
            Type::SearchResults => SearchResultsOutputItem::from($value),
            Type::FetchUrlResults => FetchUrlResultsOutputItem::from($value),
            Type::FunctionCall => FunctionCallOutputItem::from($value),
        };
    }
}
