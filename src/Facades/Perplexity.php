<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Facades;

use Gridwb\LaravelPerplexity\Contracts\Resources\AgentContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\AuthenticationContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\EmbeddingsContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\SearchContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\SonarContract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static AgentContract agent()
 * @method static AuthenticationContract authentication()
 * @method static EmbeddingsContract embeddings()
 * @method static SearchContract search()
 * @method static SonarContract sonar()
 */
final class Perplexity extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'perplexity';
    }
}
