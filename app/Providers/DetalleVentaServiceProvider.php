<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\DetalleVentaRepositoryInterface;
use App\Repositories\DetalleVentaRepository;

class DetalleVentaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            DetalleVentaRepositoryInterface::class,
            DetalleVentaRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}