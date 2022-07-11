<?php

namespace Database\Seeders;

use App\Models\AreaSector;
use Illuminate\Database\Seeder;

class AreaSectorSeeder extends Seeder
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
                'precio' => 450,
                'color' => '#E74C3C',
                'sector_id' => 1,
                'area_id' => 1,
                'evento_localidad_id' => 1
            ],
            [
                'precio' => 250,
                'color' => '#F4D03F',
                'sector_id' => 1,
                'area_id' => 2,
                'evento_localidad_id' => 1
            ],
            [
                'precio' => 150,
                'color' => '#85C1E9',
                'sector_id' => 1,
                'area_id' => 3,
                'evento_localidad_id' => 1
            ],
        ];
        foreach ($data as $d) {
            AreaSector::create($d);
        }
    }
}
