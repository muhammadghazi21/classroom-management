<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        $user->assignRole('Admin');

        $profesor = User::create([
            'name' => 'hi',
            'email' => 'hi@gmail.com',
            'password' => bcrypt('hi'),
        ]);

        $profesor->assignRole('Profesor');

        $profesor = User::create([
            'name' => 'hi2',
            'email' => 'hi2@gmail.com',
            'password' => bcrypt('hi2'),
        ]);

        $profesor->assignRole('Profesor');


        // \App\Models\User::factory(10)->create();

    }
}
