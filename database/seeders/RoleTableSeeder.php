<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;

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
                'view-dashboard',
            ],

            'users' => [
                'view-users',
                'alter-users',
                'delete-users',
            ],

            'folders' => [
                'view-folders',
                'alter-folders',
                'delete-folders',
            ]
        ];

        $allperms = collect([]);

        foreach ($permissions as $key => $data) {
            foreach ($data as $permission) {
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
