<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission list
        Permission::create(['name' => 'permisos.*']);
        Permission::create(['name' => 'permiso_profesors.*']);
        Permission::create(['name' => 'import-form']);
        Permission::create(['name' => 'import']);


        //Inspector
        $inspector = Role::create(['name' => 'Inspector']);
        $profesor = Role::create(['name' => 'Profesor']);
        $admin = Role::create(['name' => 'Admin']);

        $inspector->givePermissionTo([
            'permiso_profesors.*',
        ]);

        $profesor->givePermissionTo([
            'permiso_profesors.*',
        ]);

        $admin->givePermissionTo([
            'import-form',
            'import',
        ]);
        //Guest
        $guest = Role::create(['name' => 'Guest']);

        $guest->givePermissionTo([

        ]);

        //Users
        $user = User::find(1); //Inspector1
        $user->assignRole('Inspector');

        $user = User::find(2); //Profesor1
        $user->assignRole('Profesor');

        $user = User::find(3); //Admin
        $user->assignRole('Admin');
    }
}
