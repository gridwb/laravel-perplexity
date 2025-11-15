<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Search;

use Gridwb\LaravelPerplexity\Responses\AbstractResponse;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;

class SearchResponseResult extends AbstractResponse
{
    public function __construct(
        public string $title,
        public string $url,
        public string $snippet,
        public string $date,
        #[MapInputName('last_updated')]
        #[MapOutputName('last_updated')]
        public string $lastUpdated,
    ) {}
}
