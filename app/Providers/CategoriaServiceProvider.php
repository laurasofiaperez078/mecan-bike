<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\CategoriaRepositoryInterface;
use App\Repositories\CategoriaRepository;

class CategoriaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            CategoriaRepositoryInterface::class,
            CategoriaRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}