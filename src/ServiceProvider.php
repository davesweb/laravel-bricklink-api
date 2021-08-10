<?php

namespace Davesweb\LaravelBricklinkApi;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/bricklink.php' => config_path('bricklink.php'),
        ]);
    }
    
    public function register()
    {
        // todo once the other package is public
        //$this->app->bind();
    }
}