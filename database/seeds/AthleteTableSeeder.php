<?php

use Siad\CV2017\Athlete;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AthleteTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create('es_ES');

        for ($i=1; $i<=20; $i++) {
            Athlete::create([
                'identification' => $faker->dni,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'full_name' => $faker->lastName." ".$faker->firstName,
                'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'age' => rand(4,30),
                'address' => $faker->address,
                'telephone' => $faker->phoneNumber,
                'email' => $faker->email,
                'size' => rand(24, 48),
                'gender' => $faker->randomElement(['M', 'F']),
                'type_disability' => '',
                'agent_id' => rand(1,20),
                'user_id' => rand(1,5)
            ]);
        }
    }
}
