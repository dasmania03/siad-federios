<?php

use Siad\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $this->createAdmin();
        $this->createUser(10);
    }

    private function createAdmin(){
        User::create([
            'username' => 'dasmania03',
            'first_name' => 'Diego Armando',
            'last_name' => 'Suarez Murillo',
            'avatar' => 'male.png',
            'email' => 'dasmania03@gmail.com',
            'password' => bcrypt('admin1234'),
            'role' => 'admin'
        ]);
    }

    private function createUser($total) {
        $faker = Faker::create();

        for($i=1; $i<= $total; $i++) {
            User::create([
                'username' => $faker->userName,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'avatar' => $faker->randomElement(['male.png', 'female.png  ']),
                'email' => $faker->email,
                'password' => bcrypt('user1234'),
                'role' => $faker->randomElement(['register', 'cashier'])
            ]);
        }
    }
}
