<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role = Role::create(['name' => 'admin']);

        $permission = [
            ['name' => 'User List'],
            ['name' => 'User Create'],
            ['name' => 'User Edit'],
            ['name' => 'User Delete'],
            ['name' => 'Role List'],
            ['name' => 'Role Create'],
            ['name' => 'Role Edit'],
            ['name' => 'Role Delete']
        ];

        foreach ($permission as $key => $item) {
            Permission::create($item);
        }

        $role->syncPermissions(Permission::all());


        $user = User::first();
        $user->assignRole($role);

    }
}
