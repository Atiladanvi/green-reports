<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    static $IMPORT_REPORT = 'import_report';

    static $EXPORT_REPORT = 'export_report';

    static $CREATE_USER = 'create_user';

    static $LIST_USERS = 'list_users';

    public function run()
    {
        $role = Role::create(['name' => User::$ADMIN]);
        $role2 = Role::create(['name' => User::$ANALYST]);

        $permission1 = Permission::create(['name' => self::$IMPORT_REPORT]);
        $permission2 = Permission::create(['name' => self::$EXPORT_REPORT]);
        $permission3 = Permission::create(['name' => self::$CREATE_USER]);
        $permission4 = Permission::create(['name' => self::$LIST_USERS]);

        $role->givePermissionTo($permission1);
        $role->givePermissionTo($permission2);
        $role->givePermissionTo($permission3);
        $role->givePermissionTo($permission4);

        $role2->givePermissionTo($permission2);
        $role2->givePermissionTo($permission4);
    }
}
