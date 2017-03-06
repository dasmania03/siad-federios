<?php

use Siad\CV2017\Agent;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AgentTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        for ($i=1; $i<=20; $i++) {
            Agent::create([
                'identification' => $faker->dni,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'full_name' => $faker->lastName." ".$faker->firstName,
                'telephone' => $faker->phoneNumber,
                'email' => $faker->email
            ]);
        }
    }
}
