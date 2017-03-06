<?php

use Siad\Sport;
use Illuminate\Database\Seeder;

class SportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sports = [
            'AJEDREZ',
            'ATLETISMO',
            'BALONCESTO',
            'BOXEO',
            'CICLISMO',
            'ESCALADA',
            'FUTBOL',
            'GIMNASIA',
            'JUDO',
            'KARATE DO',
            'LUCHA OLIMPICA',
            'LEVANTAMIENTO DE PESAS',
            'LEVANTAMIENTO DE POTENCIA',
            'NATACION',
            'TAEKWON DO',
            'TENIS DE MESA'
        ];

        $this->createSport($sports);
    }

    private function createSport($sports) {
        foreach ($sports as $sport) {
            Sport::create([
                'name' => $sport
            ]);
        }
    }
}
