<?php

use Illuminate\Database\Seeder;
use Siad\CV2017\Inscription;

class InscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inscription::create([
            'athlete_id' => 2,
            'product_id' => 1,
            'horario' => '10h00',
            'dias' => 'LUNES, MIERCOLES Y VIERNES',
            'discount' => 0,
            'paid_total' => 20.00,
            'observations' => "",
            'code_exo' => "",
            'status' => 1,
            'user_id' => 1
        ]);
        Inscription::create([
            'athlete_id' => 5,
            'product_id' => 4,
            'horario' => '10h00',
            'dias' => 'LUNES A VIERNES',
            'discount' => 50,
            'paid_total' => 10.00,
            'observations' => "Descuento del 30%",
            'code_exo' => "",
            'status' => 1,
            'user_id' => 1
        ]);
    }
}
