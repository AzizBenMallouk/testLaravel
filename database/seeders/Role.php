<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $routes = \Route::getRoutes();

        // foreach ($routes as $route) {
        //     $name = $route->getName();
        //     if ($name) {
        //     \DB::table('permissions')->insert([
        //         'name' => $name,
        //         'guard_name' => $name,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        //     }
        // }

        // $roles = ['admin', 'editor', 'user'];

        // foreach ($roles as $role) {
        //     \DB::table('roles')->insert([
        //     'name' => $role,
        //     'guard_name' => $role,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        //     ]);
        // }

        // $permissions = \DB::table('permissions')->pluck('id')->toArray();
        $roles = \DB::table('roles')->pluck('id')->toArray();

        $users = \DB::table('users')->pluck('id')->toArray();

        foreach ($users as $userId) {
            $assignedRoles = array_rand(array_flip($roles), rand(1, count($roles)));
            foreach ((array) $assignedRoles as $roleId) {
            \DB::table('model_has_roles')->insert([
                'role_id' => $roleId,
                'model_type' => 'App\\Models\\User',
                'model_id' => $userId,
            ]);
            }
        }

        // foreach ($roles as $roleId) {
        //     $assignedPermissions = array_rand(array_flip($permissions), rand(1, count($permissions)));
        //     foreach ((array) $assignedPermissions as $permissionId) {
        //     \DB::table('role_has_permissions')->insert([
        //         'role_id' => $roleId,
        //         'permission_id' => $permissionId,
        //         // 'created_at' => now(),
        //         // 'updated_at' => now(),
        //     ]);
        //     }
        // }
    }
}
