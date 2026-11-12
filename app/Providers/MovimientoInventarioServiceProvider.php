<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\MovimientoInventarioRepositoryInterface;
use App\Repositories\MovimientoInventarioRepository;

class MovimientoInventarioServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            MovimientoInventarioRepositoryInterface::class,
            MovimientoInventarioRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}