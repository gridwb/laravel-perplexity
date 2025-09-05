<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Chat;

use Gridwb\LaravelPerplexity\Enums\Chat\Completion\Choice\Message\Role;
use Spatie\LaravelData\Data;

class CompletionResponseChoiceDelta extends Data
{
    public function __construct(
        public string $content,
        public Role $role,
    ) {}
}
