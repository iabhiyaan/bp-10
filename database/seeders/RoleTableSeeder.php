<?php

namespace Database\Seeders;

use App\Constants\PermissionConstant;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

use function App\permissionConstant;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guard_name = 'super-admin';

        $role = Role::updateOrCreate([
            'name' => 'system_admin',
            'display_name' => 'System Admin',
            'guard_name' => $guard_name,
        ]);

        $permissions = [
            'dashboard' => [
                permissionConstant()::DASHBOARD['view-dashboard']
            ],

            'users' => [
                permissionConstant()::USERS['view-users'],
                permissionConstant()::USERS['alter-users'],
                permissionConstant()::USERS['delete-users'],
            ],

            'folders' => [
                permissionConstant()::FOLDERS['view-folders'],
                permissionConstant()::FOLDERS['alter-folders'],
                permissionConstant()::FOLDERS['delete-folders'],
            ]
        ];

        $allperms = collect([]);

        foreach ($permissions as $key => $permissionArr) {
            foreach ($permissionArr as $permission) {
                $perm = Permission::updateOrCreate([
                    'name' => $permission,
                    'guard_name' => $guard_name,
                ], [
                    'name' => $permission,
                    'guard_name' => $guard_name,
                    'group' => $key ? Str::replace('-', ' ', Str::ucfirst($key)) : NULL,
                ]);

                $allperms->push($perm->id);
                $role->givePermissionTo($allperms->toArray());
            }
        }

    }
}
