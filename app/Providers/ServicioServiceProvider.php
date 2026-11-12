<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ServicioRepositoryInterface;
use App\Repositories\ServicioRepository;

class ServicioServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ServicioRepositoryInterface::class,
            ServicioRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}