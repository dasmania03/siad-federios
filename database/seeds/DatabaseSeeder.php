<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTable(array(
            'users',
            'password_resets',
            'sport',
            'cv17_agents',
            'cv17_athletes',
            'cv17_products',
            'cv17_inscriptions',
            'cv17_codes'
        ));

        $this->call(UserTableSeeder::class);
        $this->call(SportTableSeeder::class);
        $this->call(AgentTableSeeder::class);
        $this->call(AthleteTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(InscriptionTableSeeder::class);
        $this->call(CodesTableSeeder::class);
    }

    private function truncateTable(array $tables) {
        $this->checkForeignKeys(false);

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        $this->checkForeignKeys(true);
    }

    private function checkForeignKeys($check) {
        $check = $check ? '1' : '0';
        DB::statement("SET FOREIGN_KEY_CHECKS = $check;");
    }
}
