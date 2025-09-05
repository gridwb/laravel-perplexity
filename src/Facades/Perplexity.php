<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Facades;

use Gridwb\LaravelPerplexity\Contracts\Resources\ChatContract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ChatContract chat()
 */
final class Perplexity extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'perplexity';
    }
}
