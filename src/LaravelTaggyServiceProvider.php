<?php

namespace Owllog\LaravelTaggy;

use Illuminate\Support\ServiceProvider;

class LaravelTaggyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Load migrations from package migrations to laravel migrations dir.
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
