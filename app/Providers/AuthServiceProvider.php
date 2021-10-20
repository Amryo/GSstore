<?php

namespace App\Providers;

use App\Models\Role;
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
        /*  Gate::before(function ($user) {
            return $user->isSuperAdmin($user) ?? null;
        });*/
        foreach (config('abilities') as $key => $value) {
            Gate::define($key, function ($user) use ($key) {
                $roles = Role::whereRaw('id IN (SELECT role_id FROM role_user WHERE user_id = ?)', [
                    $user->id,
                ])->get();
                foreach ($roles as $role) {

                    if (in_array($key, $role->abilities)) {
                        return true;
                    }
                }
                return false;
            });
        }
    }
}
