<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Facades;

use Gridwb\LaravelPerplexity\Contracts\Resources\ChatContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\SearchContract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static ChatContract chat()
 * @method static SearchContract search()
 */
final class Perplexity extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'perplexity';
    }
}
