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

        Permission::create(['name' => 'delete_teams']);
        Permission::create(['name' => 'update_teams']);
        Permission::create(['name' => 'delete_games']);
        Permission::create(['name' => 'update_games']);

        $role1->givePermissionTo('delete_teams');
        $role1->givePermissionTo('update_teams');
        $role1->givePermissionTo('delete_games');
        $role1->givePermissionTo('update_games');

        $user1 = new User();
        $user1->name = "DaniOliva";
        $user1->email = "danielolivagomez@gmail.com";
        $user1->password = bcrypt('holamundo');
        $user1->role = "Administrador";
        $user1->assignRole('Administrador');

        $user1->save();

        $user2 = new User();
        $user2->name = "UserProfile";
        $user2->email = "userprofile@gmail.com";
        $user2->password = bcrypt('holamundo');
        $user2->role = "Usuario";
        $user2->assignRole('Usuario');

        $user2->save();
    }
}
