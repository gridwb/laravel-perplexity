<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\Casts;

use Gridwb\LaravelPerplexity\Enums\Agent\Output\Type;
use Gridwb\LaravelPerplexity\Responses\Agent\Outputs\AbstractOutputItem;
use Gridwb\LaravelPerplexity\Responses\Agent\Outputs\FetchUrlResultsOutputItem;
use Gridwb\LaravelPerplexity\Responses\Agent\Outputs\FunctionCallOutputItem;
use Gridwb\LaravelPerplexity\Responses\Agent\Outputs\MessageOutputItem;
use Gridwb\LaravelPerplexity\Responses\Agent\Outputs\SearchResultsOutputItem;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class OutputItemCast implements Cast
{
    /**
     * @param  array<string, mixed>  $properties
     * @param  CreationContext<AbstractOutputItem>  $context
     * @return Collection<int, AbstractOutputItem>
     */
    public function cast(
        DataProperty $property,
        mixed $value,
        array $properties,
        CreationContext $context
    ): Collection {
        if (! is_array($value)) {
            throw new InvalidArgumentException('Output items data must be an array.');
        }

        $outputItems = Collection::make();

        foreach ($value as $data) {
            /** @phpstan-ignore-next-line */
            $type = Type::tryFrom($data['type'] ?? null);

            if (is_null($type)) {
                throw new InvalidArgumentException('Unknown output item type.');
            }

            $outputItem = match ($type) {
                Type::Message => MessageOutputItem::from($data),
                Type::SearchResults => SearchResultsOutputItem::from($data),
                Type::FetchUrlResults => FetchUrlResultsOutputItem::from($data),
                Type::FunctionCall => FunctionCallOutputItem::from($data),
            };

            $outputItems->push($outputItem);
        }

        return $outputItems;
    }
}
