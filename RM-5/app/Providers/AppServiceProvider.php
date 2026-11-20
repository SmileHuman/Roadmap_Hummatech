<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\SiswaRepositoryInterface;
use App\Repositories\SiswaRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            SiswaRepositoryInterface::class,
            SiswaRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
