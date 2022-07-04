<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sector::create([
            'nombre' => "butacas",
            'capacidad' => 450,
            'localidad_id' => 1
        ]);
        Sector::create([
            'nombre' => "curva Oeste",
            'capacidad' => 7000,
            'localidad_id' => 2
        ]);
        Sector::create([
            'nombre' => "curva Este",
            'capacidad' => 7000,
            'localidad_id' => 2
        ]);
        Sector::create([
            'nombre' => "Butacas",
            'capacidad' => 14300,
            'localidad_id' => 2
        ]);
        Sector::create([
            'nombre' => "Graderias",
            'capacidad' => 9700,
            'localidad_id' => 2
        ]);
    }
}
