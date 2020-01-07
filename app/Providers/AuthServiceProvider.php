<?php

namespace App\Providers;
use Bouncer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('administration', function ($user) {
            if(Bouncer::is($user)->an('administration'))
            {
                return true;
            }
            return false;
        });

        Gate::define('usermanager', function ($user) {
            if(Bouncer::is($user)->an('user-manager'))
            {
                return true;
            }
            return false;
        });


        Gate::define('shopmanager', function ($user) {
            if(Bouncer::is($user)->an('shop-manager'))
            {
                return true;
            }
            return false;
        });
    }
}
