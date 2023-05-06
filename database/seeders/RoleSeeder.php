<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'crud master']);
        Permission::create(['name' => 'crud user']);
        Permission::create(['name' => 'akses member']);

        // this can be done as separate statements
        $role = Role::create(['name' => 'teknisi']);
        $role->givePermissionTo('crud master');

        // or may be done by chaining
        $role = Role::create(['name' => 'member']);
        $role->givePermissionTo('akses member');

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
