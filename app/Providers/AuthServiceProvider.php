<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
/*         $this->registerTripPolicies();

        //
    }

    public function registerTripPolicies()
    {
        Gate::define('create-trip', function($user){
            $user->hasAccess(['create-trip']);
        });

        Gate::define('see-all-autos', function($user){
            return $user->inRole('editor');
        });
    } */
}
}
