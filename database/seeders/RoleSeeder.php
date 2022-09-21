<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'admin']);
        $role2 = Role::create(['name'=>'nuevo']);
        $role3 = Role::create(['name'=>'usser']);

        $permission1 = Permission::create(['name' => 'permitirAcceso'])->syncRoles([$role1]);
        $permission2 = Permission::create(['name' => 'buscar'])->syncRoles([$role1,$role3]);
        $permission3 = Permission::create(['name' => 'subirArchivo'])->syncRoles([$role1]);
        $permission3 = Permission::create(['name' => 'subirVariable'])->syncRoles([$role1]);
        
        
    }
}
