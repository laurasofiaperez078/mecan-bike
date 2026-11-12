<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\VentaRepositoryInterface;
use App\Repositories\VentaRepository;

class VentaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            VentaRepositoryInterface::class,
            VentaRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}