<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\Casts;

use Gridwb\LaravelPerplexity\Responses\Agent\OutputItems\AbstractOutputItem;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class OutputItemCollectionCast implements Cast
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
        $outputItems = Collection::make();

        if (! is_array($value)) {
            return $outputItems;
        }

        $outputItemCast = new OutputItemCast;

        foreach ($value as $data) {
            $outputItems->push(
                $outputItemCast->cast($property, $data, $properties, $context)
            );
        }

        return $outputItems;
    }
}
