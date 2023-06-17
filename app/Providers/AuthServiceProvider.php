<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // ...
    ];

    public function boot()
    {
        $this->registerPolicies();
    

            Gate::define('userAccess', function (User $user) {
                return $user->role === 'user' || $user->role === 'admin';
            });
      
    
        Gate::define('adminAccess', function (User $user) {
            return $user->role === 'admin'; // Periksa jika role adalah 1 (admin)
        });
    }
}
