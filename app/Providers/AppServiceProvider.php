<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::define('isAdmin', function($user) {
            return $user->role_id == 1;
        });

        Gate::define('isGuru', function($user) {
            return $user->role_id == 2;
        });

        Gate::define('isWalikelas', function($user) {
            return $user->role_id == 3;
        });
    }
}
