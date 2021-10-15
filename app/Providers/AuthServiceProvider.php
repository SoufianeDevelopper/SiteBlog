<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        //

        Gate::define('Admin', function($user) {

            return $user->role_id == '4fc28b2d-75c1-4640-8561-93b0dea2ed76';

        });
        Gate::define('Publisher', function($user) {

            return $user->role_id == '6865ce9a-45a0-449f-b389-96a2dd4ae9a1';

        });

    }
}
