<?php

namespace Westsoft\Acl\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class LoginEventServiceProvider extends ServiceProvider
{

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        'Westsoft\Acl\Listeners\LoginEventPermissions',
    ];
    
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
