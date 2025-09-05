<?php

declare(strict_types=1);

namespace Gridwb\LaravelPerplexity;

use Gridwb\LaravelPerplexity\Contracts\ApiClientContract;
use Gridwb\LaravelPerplexity\Contracts\ClientContract;
use Illuminate\Support\Facades\Config;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelPerplexityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-perplexity')
            ->hasConfigFile();
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(ApiClientContract::class, function (): ApiClient {
            /** @var string $apiUrl */
            $apiUrl = Config::get('perplexity.api_url');
            /** @var string $apiKey */
            $apiKey = Config::get('perplexity.api_key');

            return new ApiClient($apiUrl, $apiKey);
        });

        $this->app->singleton(ClientContract::class, Client::class);
        $this->app->alias(ClientContract::class, 'perplexity');
    }
}
