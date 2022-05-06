<?php

namespace Davesweb\LaravelBricklinkApi;

use Davesweb\BrinklinkApi\Bricklink;
use Davesweb\BrinklinkApi\BricklinkConfig;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/bricklink.php' => config_path('bricklink.php'),
        ], 'bricklink-config');
    }
    
    public function register()
    {
        $this->app->bind(BricklinkConfig::class, function(Application $app) {
            /** @var Repository $config */
            $config = $app->make('config');
            
            return new BricklinkConfig(
                $config->get('bricklink.consumer_key'),
                $config->get('bricklink.consumer_secret'),
                $config->get('bricklink.token_value'),
                $config->get('bricklink.token_secret'),
            );
        });
    
        $this->app->bind(Bricklink::class, function(Application $app) {
            return new Bricklink($app->make(BricklinkConfig::class), null, null);
        });
    }
}