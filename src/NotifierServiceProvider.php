<?php

namespace Betalectic\Notifier;

use Illuminate\Support\ServiceProvider;


class NotifierServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the application services.
     */
    
}
