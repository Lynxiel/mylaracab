<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Order;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('dashboard', function (User $user) {
            return (bool)$user->is_admin;
        });

        Gate::define('order-edit', function (User $user, Order $order) {
            return ($user->is_admin || $user->id==$order->user_id);
        });

        Gate::define('cable-order-edit', function (User $user,Order $order) {
            return !$order->status;
        });
        //
    }
}
