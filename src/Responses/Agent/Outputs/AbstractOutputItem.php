<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Responses\Agent\Outputs;

use Gridwb\LaravelPerplexity\Enums\Agent\Output\Type;
use Spatie\LaravelData\Data;

abstract class AbstractOutputItem extends Data
{
    public Type $type;
}
