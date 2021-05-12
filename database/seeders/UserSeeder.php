<?php

namespace Database\Seeders;

use App\Models\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'delete_reservation']);
        Permission::create(['name' => 'update_reservation']);
        Permission::create(['name' => 'delete_rooms']);
        Permission::create(['name' => 'update_rooms']);

        $role1->givePermissionTo('delete_reservation');
        $role1->givePermissionTo('update_reservation');
        $role1->givePermissionTo('delete_rooms');
        $role1->givePermissionTo('update_rooms');

        $user1 = new User();
        $user1->name = "DaniOliva";
        $user1->email = "danielolivagomez@gmail.com";
        $user1->password = bcrypt('holamundo');
        $user1->assignRole('Administrador');

        $user1->save();

        $user2 = new User();
        $user2->name = "UserProfile";
        $user2->email = "userprofile@gmail.com";
        $user2->password = bcrypt('holamundo');
        $user2->assignRole('Usuario');

        $user2->save();
    }
}
