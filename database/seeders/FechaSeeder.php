<?php

namespace Database\Seeders;

use App\Models\Fecha;
use Illuminate\Database\Seeder;

class FechaSeeder extends Seeder
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
                'fecha_evento' => '2022-05-02', //date
                'hora' => '18:45', //time
                'evento_localidad_id' => '1',
            ],
            [
                'fecha_evento' => '2022-06-12', //date
                'hora' => '20:45', //time
                'evento_localidad_id' => '1',
            ],
            [
                'fecha_evento' => '2022-07-11', //date
                'hora' => '21:30', //time
                'evento_localidad_id' => '1',
            ],
        ];
        foreach ($data as $d) {
            Fecha::create($d);
        }
    }
}
