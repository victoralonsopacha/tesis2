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
        Permission::create(['name' => 'permisos.index']);
        Permission::create(['name' => 'permisos.create']);
        Permission::create(['name' => 'permisos.edit']);
        Permission::create(['name' => 'permisos.destroy']);
        Permission::create(['name' => 'permisos.update']);
        Permission::create(['name' => 'permisos.store']);
        Permission::create(['name' => 'permisos.show']);



        //Inspector
        $inspector = Role::create(['name' => 'Inspector']);
        $profesor = Role::create(['name' => 'Profesor']);

        $inspector->givePermissionTo([
            'permisos.index',
            'permisos.create',
            'permisos.edit',
            'permisos.destroy',
            'permisos.update',
            'permisos.store',
            'permisos.show'
        ]);

        $profesor->givePermissionTo([
        ]);
        //$admin->givePermissionTo('products.index');
        //$admin->givePermissionTo(Permission::all());

        //Guest
        $guest = Role::create(['name' => 'Guest']);

        $guest->givePermissionTo([

        ]);

        //Users
        $user = User::find(1); //Inspector1
        $user->assignRole('Inspector');

        $user = User::find(2); //Profesor1
        $user->assignRole('Profesor');
    }
}
