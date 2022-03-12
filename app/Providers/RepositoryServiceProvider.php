<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\BestaRepository::class, \App\Repositories\BestaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PacienteRepository::class, \App\Repositories\PacienteRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ConsultaRepository::class, \App\Repositories\ConsultaRepositoryEloquent::class);
        //:end-bindings:
    }
}
