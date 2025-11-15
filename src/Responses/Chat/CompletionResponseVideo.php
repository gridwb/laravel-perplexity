<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Chat;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class CompletionResponseVideo extends Data
{
    public function __construct(
        public string $url,
        #[MapInputName('thumbnail_url')]
        #[MapOutputName('thumbnail_url')]
        public ?string $thumbnailUrl = null,
        #[MapInputName('thumbnail_width')]
        #[MapOutputName('thumbnail_width')]
        public ?string $thumbnailWidth = null,
        #[MapInputName('thumbnail_height')]
        #[MapOutputName('thumbnail_height')]
        public ?string $thumbnailHeight = null,
        public ?string $duration = null,
    ) {}
}
