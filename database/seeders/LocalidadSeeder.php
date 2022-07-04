<?php

namespace Database\Seeders;

use App\Models\Localidad;
use Illuminate\Database\Seeder;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Localidad::create([
            'nombre' => 'Paraninfo Universitario “Dr. Humberto Parado Caro"',
            'gps' => "-17.782923,-63.182954",
            'direccion' => "Calle Junín, diagonal al excorreo postal, Santa Cruz de la Sierra",
            'capacidad' => 450,
        ]);
        Localidad::create([
            'nombre' => "Estadio Ramón 'Tahuichi' Aguilera",
            'gps' => "-17.796067, -63.183873",
            'direccion' => "Entre el primer y segundo anillo, entre las avenidas del Ejército Nacional, Ana Bárbara y Chóferes del Chaco en el centro, Santa Cruz de la Sierra",
            'capacidad' => 38000,
        ]);
    }
}
