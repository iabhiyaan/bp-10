<?php

namespace App\Constants;

class PermissionConstant
{
    const DASHBOARD = [
        'view-dashboard' => 'view-dashboard'
    ];

    const USERS = [
        'view-users' => 'view-users',
        'alter-users' => 'alter-users',
        'delete-users' => 'delete-users',
    ];

    const FOLDERS = [
        'view-folders' => 'view-folders',
        'alter-folders' => 'alter-folders',
        'delete-folders' => 'delete-folders',
    ];

    const ROLES = [
        'view-roles' => 'view-roles',
        'alter-roles' => 'alter-roles',
        'delete-roles' => 'delete-roles',
    ];
}
