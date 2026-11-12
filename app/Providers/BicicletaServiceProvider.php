<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\BicicletaRepositoryInterface;
use App\Repositories\BicicletaRepository;

class BicicletaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            BicicletaRepositoryInterface::class,
            BicicletaRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}