<?php

use Illuminate\Database\Seeder;
use Siad\Cv2017\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            '0' => [
                'sport_id' => 1,
                'detail'=> 'VACACIONAL DE AJEDREZ',
                'age_min' => '5',
                'age_max' => '100',
                'horarys' => '09H00 A 10H00, 10H30 A 11H30',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 20
            ],
            '1' => [
                'sport_id' => 2,
                'detail'=> 'VACACIONAL DE ATLETISMO',
                'age_min' => '7',
                'age_max' => '100',
                'horarys' => '08H00 A 09H00, 09H00 A 10H00, 10H00 A 11H00, 11H00 A 12H00, 14H00 A 15H00, 16H00 A 17H00',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 0
            ],
            '2' => [
                'sport_id' => 3,
                'detail'=> 'VACACIONAL DE BALONCESTO',
                'age_min' => '7',
                'age_max' => '100',
                'horarys' => '09H00 A 10H00, 10H00 A 11H00, 11H00 A 12H00',
                'days' => 'LUNES MIERCOLES Y VIERNES (MUJERES), MARTES JUEVES Y SABADOS (VARONES)',
                'quotas' => 0,
                'price' => 40
            ],
            '3' => [
                'sport_id' => 4,
                'detail'=> 'VACACIONAL DE BOXEO',
                'age_min' => '8',
                'age_max' => '14',
                'horarys' => '08H00 A 12H00, 14H00 A 16H00',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 0
            ],
            '4' => [
                'sport_id' => 4,
                'detail'=> 'VACACIONAL DE BOXEO MAYORES DE 15',
                'age_min' => '15',
                'age_max' => '100',
                'horarys' => '08H00 A 12H00, 14H00 A 16H00',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 20
            ],
            '5' => [
                'sport_id' => 5,
                'detail'=> 'VACACIONAL DE CICLISMO',
                'age_min' => '11',
                'age_max' => '20',
                'horarys' => '14H00 A 17H00',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 20
            ],
            '6' => [
                'sport_id' => 6,
                'detail'=> 'VACACIONAL DE ESCALADA',
                'age_min' => '7',
                'age_max' => '18',
                'horarys' => '10H30 A 12H00, 14H00 A 15H00',
                'days' => 'LUNES MIERCOLES Y VIERNES',
                'quotas' => 0,
                'price' => 30
            ],
            '7' => [
                'sport_id' => 7,
                'detail'=> 'VACACIONAL DE FUTBOL',
                'age_min' => '4',
                'age_max' => '100',
                'horarys' => '09H00 A 11H00',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 40
            ],
            '8' => [
                'sport_id' => 8,
                'detail'=> 'VACACIONAL DE GIMNASIA',
                'age_min' => '3',
                'age_max' => '10',
                'horarys' => '08H30 A 09H30, 10H00 A 11H00',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 40
            ],
            '9' => [
                'sport_id' => 9,
                'detail'=> 'VACACIONAL DE JUDO',
                'age_min' => '7',
                'age_max' => '14',
                'horarys' => '09H00 A 10H30, 14H30 A 16H30',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 0
            ],
            '10' => [
                'sport_id' => 9,
                'detail'=> 'VACACIONAL DE JUDO MAYORES DE 15',
                'age_min' => '15',
                'age_max' => '100',
                'horarys' => '09H00 A 10H30, 14H30 A 16H30',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 20
            ],
            '11' => [
                'sport_id' => 10,
                'detail'=> 'VACACIONAL DE KARATE DO',
                'age_min' => '5',
                'age_max' => '100',
                'horarys' => '09H00 A 11H30',
                'days' => 'LUNES MIERCOLES Y VIERNES',
                'quotas' => 0,
                'price' => 40
            ],
            '12' => [
                'sport_id' => 11,
                'detail'=> 'VACACIONAL DE LUCHA OLIMPICA',
                'age_min' => '8',
                'age_max' => '100',
                'horarys' => '08H00 A 12H00, 14H00 A 17H00',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 0
            ],
            '13' => [
                'sport_id' => 12,
                'detail'=> 'VACACIONAL DE LEVANTAMIENTO DE PESAS',
                'age_min' => '9',
                'age_max' => '14',
                'horarys' => '09H00 A 10H30, 14H30 A 15H30',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 0
            ],
            '14' => [
                'sport_id' => 12,
                'detail'=> 'VACACIONAL DE LEVANTAMIENTO DE PESAS MAYORES DE 15',
                'age_min' => '15',
                'age_max' => '100',
                'horarys' => '09H00 A 10H30, 14H30 A 15H30',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 20
            ],
            '15' => [
                'sport_id' => 13,
                'detail'=> 'VACACIONAL DE LEVANTAMIENTO DE POTENCIA',
                'age_min' => '8',
                'age_max' => '100',
                'horarys' => '09H00 A 12H30, 14H30 A 17H30',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 40
            ],
            '16' => [
                'sport_id' => 14,
                'detail'=> 'VACACIONAL DE NATACION',
                'age_min' => '5',
                'age_max' => '15',
                'horarys' => '08H00 A 12H00',
                'days' => 'LUNES MIERCOLES Y VIERNES, MARTES JUEVES Y SABADO',
                'quotas' => 0,
                'price' => 60
            ],
            '17' => [
                'sport_id' => 14,
                'detail'=> 'VACACIONAL DE NATACION ADULTOS',
                'age_min' => '16',
                'age_max' => '100',
                'horarys' => 'POR LA NOCHE',
                'days' => 'LUNES MIERCOLES Y VIERNES, MARTES JUEVES Y SABADO',
                'quotas' => 0,
                'price' => 60
            ],
            '18' => [
                'sport_id' => 15,
                'detail'=> 'VACACIONAL DE TAEKWON DO',
                'age_min' => '5',
                'age_max' => '100',
                'horarys' => '09H30 A 10H30, 14H00 A 15H30',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 40
            ],
            '19' => [
                'sport_id' => 16,
                'detail'=> 'VACACIONAL DE TENIS DE MESA',
                'age_min' => '5',
                'age_max' => '100',
                'horarys' => '08H30 A 10H00',
                'days' => 'LUNES A VIERNES',
                'quotas' => 0,
                'price' => 20
            ]
        ];

        for($i=0; $i<count($products); $i++) {
            Product::create([
                'sport_id' => $products[$i]['sport_id'],
                'detail'=> $products[$i]['detail'],
                'age_min' => $products[$i]['age_min'],
                'age_max' => $products[$i]['age_max'],
                'horarys' => $products[$i]['horarys'],
                'days' => $products[$i]['days'],
                'quotas' => $products[$i]['quotas'],
                'price' => $products[$i]['price']
            ]);
        }
    }
}
