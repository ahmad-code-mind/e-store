<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'SuperAdmin']); 
        $roleAdmin = Role::create(['name' => 'Admin']); 
        $roleSubAdmin = Role::create(['name' => 'SubAdmin']); 
        $roleEmployee = Role::create(['name' => 'Employee']); 
        
        // Permission List as Array
        $permissions = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                ]
            ],
            [
                'group_name' => 'category',
                'permissions' => [
                   // Categories
                    'category.add',
                    'category.view',
                    'category.edit',
                    'category.delete',
                ]
            ],
            [
                'group_name' => 'product',
                'permissions' => [
                    // Products
                    'product.add',
                    'product.view',
                    'product.edit',
                    'product.delete',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    // Admin Permissions
                    'admin.add',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    // Profile Permissions
                    'profile.view',
                    'profile.edit',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // Role Permissions
                    'role.add',
                    'role.view',
                    'role.edit',
                    'role.delete',
                ]
            ],
            [
                'group_name' => 'user',
                'permissions' => [
                    // User Permissions
                    'user.add',
                    'user.view',
                    'user.edit',
                    'user.delete',
                ]
            ],
            [
                'group_name' => 'order',
                'permissions' => [
                    // Order Permissions
                    'order.view',
                    'order.history',
                    'order.viewdetail',
                    'order.update',
                ]
            ],
        ];
        
        // Create and Assign Permissions
        for ($i=0; $i < count($permissions); $i++) { 
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j=0; $j < count($permissions[$i]['permissions']); $j++) { 
                // Create Permissions
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}