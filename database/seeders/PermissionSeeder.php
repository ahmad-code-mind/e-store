<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name'=>'admin']);
        $permission = Permission::create(['name'=>'Edit Everything']);
        
        $role->givePermissionTo($permission);

        $role = Role::create(['name'=>'user']);
        $permission = Permission::create(['name'=>'Edit Product']);
        
        $role->givePermissionTo($permission);
    }
}