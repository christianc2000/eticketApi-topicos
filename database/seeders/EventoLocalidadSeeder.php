<?php

namespace Database\Seeders;

use App\Models\EventoLocalidad;
use Illuminate\Database\Seeder;

class EventoLocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'evento_id'=>1,
                'localidad_id'=>1
            ],
            [
                'evento_id'=>1,
                'localidad_id'=>2,
            ],
            [
                'evento_id'=>2,
                'localidad_id'=>1
            ],
            [
                'evento_id'=>2,
                'localidad_id'=>2,
            ],
        ];
        foreach ($data as $d) {
            EventoLocalidad::create($d);
        }
    }
}
