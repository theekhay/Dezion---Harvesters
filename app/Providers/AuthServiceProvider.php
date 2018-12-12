<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Laravel\Passport\Passport;

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

        //added for laravel passport.
        Passport::routes();

        /**
         * added to configure token lifetimes (by default, token are valid for a year)
         * This is to set the current expiry time to 1 hr
         */
        Passport::tokensExpireIn( now()->addDays(15) );
        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
