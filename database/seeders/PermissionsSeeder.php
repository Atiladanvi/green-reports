<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    static $UPLOAD_REPORT = 'upload_report';

    static $LIST_REPORTS = 'list_reports';

    static $CREATE_MEMBER = 'create_member';

    static $LIST_MEMBERS = 'list_members';

    public function run()
    {
        $role = Role::create(['name' => User::$ADMIN]);
        $role2 = Role::create(['name' => User::$ANALYST]);

        $permission1 = Permission::create(['name' => self::$UPLOAD_REPORT]);
        $permission2 = Permission::create(['name' => self::$LIST_REPORTS]);
        $permission3 = Permission::create(['name' => self::$CREATE_MEMBER]);
        $permission4 = Permission::create(['name' => self::$LIST_MEMBERS]);

        $role->givePermissionTo($permission1);
        $role->givePermissionTo($permission2);
        $role->givePermissionTo($permission3);
        $role->givePermissionTo($permission4);

        $role2->givePermissionTo($permission2);
        $role2->givePermissionTo($permission4);
    }
}
