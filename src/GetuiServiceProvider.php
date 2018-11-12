<?php

namespace Panglishan\Gtpush;

use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

class GetuiServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if($this->app instanceof LumenApplication)
        {
            $this->app->configure('getui');
        }

        $this->mergeConfigFrom(__DIR__.'/config/getui.php','getui')
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(GetuiService::class, function ($app) {
            return new GetuiService($app->config->get('getui', []));
        });
        $this->app->alias(GetuiService::class, 'getui');
    }
}
