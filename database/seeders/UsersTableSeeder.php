<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\User::truncate();

        $faker = \Faker\Factory::create();
        $password = bcrypt('secret');

        \App\Models\User::create([
            'name'     => $faker->name,
            'email'    => 'sanjay@gmail.com',
            'password' => $password,
        ]);

        for ($i = 0; $i < 10; ++$i) {
            \App\Models\User::create([
                'name'     => $faker->name,
                'email'    => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
