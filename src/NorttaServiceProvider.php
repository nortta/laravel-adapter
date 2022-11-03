<?php

namespace Nortta\Laravel;

use Illuminate\Support\ServiceProvider;

class NorttaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([Connect::class]);

        $this->app->when(Nortta::class)
            ->needs('$config')
            ->giveConfig('nortta');
    }

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/config/nortta.php', 'nortta');

        $this->loadRoutesFrom(__DIR__.'/routes/nortta.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
