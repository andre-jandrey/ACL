<?php

namespace Westsoft\Acl;

use Illuminate\Support\ServiceProvider;

class ACLServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'acl');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/westsoft/acl'),
        ]);

        $this->publishes([
            __DIR__.'/migrations' => database_path('migrations/'),
        ]);

        /* $this->publishes([
            __DIR__.'/Listeners' => base_path('app/Listeners/'),
        ]); */

        $this->publishes([
            __DIR__.'/Providers' => base_path('app/Providers/'),
        ]);

        $this->publishes([
            __DIR__.'/public' => base_path('public/'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(Providers\LoginEventServiceProvider::class);
    }
}
