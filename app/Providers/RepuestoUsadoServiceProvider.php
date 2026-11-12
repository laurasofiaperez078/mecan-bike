<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\RepuestoUsadoRepositoryInterface;
use App\Repositories\RepuestoUsadoRepository;

class RepuestoUsadoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            RepuestoUsadoRepositoryInterface::class,
            RepuestoUsadoRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}
