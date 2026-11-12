<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\DetalleServicioRepositoryInterface;
use App\Repositories\DetalleServicioRepository;

class DetalleServicioServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            DetalleServicioRepositoryInterface::class,
            DetalleServicioRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}