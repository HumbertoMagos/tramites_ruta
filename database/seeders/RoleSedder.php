<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $role1 = Role::create(['name' => 'director']);
        $role2 = Role::create(['name' => 'subdirector']);
        $role3 = Role::create(['name' => 'jud']);


        Permission::create(['name' => 'admin'])->syncRoles([$admin]);
        Permission::create(['name' => 'solicitudes.director'])->syncRoles([$role1]);
        Permission::create(['name' => 'solicitudes.subdirector'])->syncRoles([$role2]);
        Permission::create(['name' => 'solicitudes.jud'])->syncRoles([$role3]);
        Permission::create(['name' => 'reportes.admin'])->syncRoles([$admin]);
    }
}
