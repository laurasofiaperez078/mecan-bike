<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ProductoRepositoryInterface;
use App\Repositories\ProductoRepository;

class ProductoServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ProductoRepositoryInterface::class,
            ProductoRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}