<?php

namespace Database\Seeders;

use App\Models\Telefono;
use Illuminate\Database\Seeder;

class TelefonoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tel = [
            [
                'numero' => 76237232,
                'localidad_id' => 1
            ],
            [
                'numero' => 76237232,
                'localidad_id' => 1
            ],
            [
                'numero' => 76237232,
                'localidad_id' => 2
            ],
            [
                'numero' => 76237232,
                'localidad_id' => 2
            ]
        ];
        foreach ($tel as $t) {
            Telefono::create($t);
        }
    }
}
