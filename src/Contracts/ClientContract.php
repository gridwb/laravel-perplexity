<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity\Contracts;

use Gridwb\LaravelPerplexity\Contracts\Resources\AuthenticationContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\SearchContract;
use Gridwb\LaravelPerplexity\Contracts\Resources\SonarContract;

interface ClientContract
{
    public function authentication(): AuthenticationContract;

    public function search(): SearchContract;

    public function sonar(): SonarContract;
}
