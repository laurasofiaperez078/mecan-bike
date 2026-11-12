<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\OrdenServicioRepositoryInterface;
use App\Repositories\OrdenServicioRepository;

class OrdenServicioServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            OrdenServicioRepositoryInterface::class,
            OrdenServicioRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}