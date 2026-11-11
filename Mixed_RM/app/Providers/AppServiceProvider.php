<?php

namespace App\Providers;

use App\Interface\SiswaRepositoriesInterface;
use App\Interface\AkunRepositoriesInterface;
use App\Repositories\AkunRepository;
use App\Repositories\SiswaRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            AkunRepositoriesInterface::class,
            AkunRepository::class
        );
        $this->app->bind(
            SiswaRepositoriesInterface::class,
            SiswaRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
