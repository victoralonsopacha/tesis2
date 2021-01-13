<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'      => 'Inspector1',
            'email'     => 'inspector1@gmail.com',
            'password'     => bcrypt('12345'),

        ]);
        User::create([
            'name'      => 'Profesor1',
            'email'     => 'profesor1@gmail.com',
            'password'     => bcrypt('12345'),

        ]);

        //User::factory()->count(7)->make();
    }
}
