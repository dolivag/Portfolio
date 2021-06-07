<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        //Solo el administrador podrá ver las páginas de ganador y perdedor por separado del ranking general
        Permission::create(['name' => 'check_winner']);
        Permission::create(['name' => 'check_looser']);

        $role1->givePermissionTo('check_winner');
        $role1->givePermissionTo('check_looser');

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

        $users = User::factory(5)->create();
        foreach ($users as $user) {
            $user->assignRole('Usuario');
        }
    }
}
