<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nombre' => "Super-vip",
                'capacidad' => 100,
                'nivel' => 1,  //nivel 1=areas espacios grandes, nivel 4=espacios
            ],
            [
                'nombre' => "Vip",
                'capacidad' => 150,
                'nivel' => 1,  //nivel 1=areas espacios grandes, nivel 4=espacios
            ],
            [
                'nombre' => "General",
                'capacidad' => 200,
                'nivel' => 1,  //nivel 1=areas espacios grandes, nivel 4=espacios
            ],

            [
                'nombre' => "Mesa pareja",
                'capacidad' => 2,
                'nivel' => 4,  //nivel 1=areas espacios grandes, nivel 4=espacios
            ],
            [
                'nombre' => "Mesa grupal",
                'capacidad' => 6,
                'nivel' => 4,  //nivel 1=areas espacios grandes, nivel 4=espacios
            ],
            [
                'nombre' => "Butaca acolchonada",
                'capacidad' => 1,
                'nivel' => 4,  //nivel 1=areas espacios grandes, nivel 4=espacios
            ],
            [
                'nombre' => "Silla individual", //normal cuando es parado
                'capacidad' => 1,
                'nivel' => 4,  //nivel 1=areas espacios grandes, nivel 4=espacios
            ],
            [
                'nombre' => "Normal individual", //normal cuando es parado
                'capacidad' => 1,
                'nivel' => 4,  //nivel 1=areas espacios grandes, nivel 4=espacios
            ],
        ];
        foreach ($data as $d) {
            Area::create($d);
        }
    }
}
