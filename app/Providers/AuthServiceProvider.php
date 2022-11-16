<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        // if (Schema::hasTable('permissions')) {
        //     $permissions = Permission::all();
        //     if($permissions) {
        //         foreach ($permissions as $permission){
        //             Gate::define($permission->name, function (User $user) use ($permission) {
        //                 $perms = $user->role->permissions()->get()->pluck('name')->toArray();
        //                 return in_array($permission->name, $perms);
        //             });
        //         }
        //     }
        // }
    }
}