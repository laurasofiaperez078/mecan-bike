<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UsuarioRepositoryInterface;
use App\Repositories\UsuarioRepository;

class UsuarioServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UsuarioRepositoryInterface::class,
            UsuarioRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}