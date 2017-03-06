<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Siad\CV2017\Codes;

class CodesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for($i=1; $i<=300; $i++) {
            $code = $faker->ean8;
            Codes::create([
                'codes' => $code,
                'status' => false,
                'image' => $code.".png"
            ]);
        }
    }
}
