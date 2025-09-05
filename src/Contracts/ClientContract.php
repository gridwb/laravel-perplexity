<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Contracts;

use Gridwb\LaravelPerplexity\Contracts\Resources\ChatContract;

interface ClientContract
{
    public function chat(): ChatContract;
}
