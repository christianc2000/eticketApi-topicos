<?php

namespace Database\Seeders;

use App\Models\CantidadArea;
use Illuminate\Database\Seeder;

class CantidadAreaSeeder extends Seeder
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
                'cantidad' => 15,//15*2
                'stock' => 15,
                'precio' => 900, // precio unitario: 450*2
                'cantidad_individual' => 30,//15*2=30
                'prefijo' => 'SPMESP',
                'id_padre' => 1, //SUPER-VIP capacidad=100
                'id_hijo' => 4, //MESA PAREJA capacidad=2
                'fecha_id' => 1
            ],
            [
                'cantidad' => 8,//8*6
                'stock' => 8,
                'precio' => 2700, // precio unitario: 450*6
                'cantidad_individual' => 48,//8*6=48
                'prefijo' => 'SPMESGR',
                'id_padre' => 1, //SUPER-VIP capacidad=100
                'id_hijo' => 5, //MESA GRUPAL capacidad=6
                'fecha_id' => 1
            ],
            [
                'cantidad' => 22,//22*1
                'stock' => 22,
                'precio' => 450, // precio unitario: 450*1
                'cantidad_individual' => 22,//22*1=22
                'prefijo' => 'SPSILLAI',
                'id_padre' => 1, //SUPER-VIP capacidad=22
                'id_hijo' => 7, //SILLA INDIVIDUAL capacidad=1
                'fecha_id' => 1
            ],
            [
                'cantidad' => 150,//150*1
                'stock' => 150,
                'precio' => 250, // precio unitario: 250*1
                'cantidad_individual' => 150,//22*1=22
                'prefijo' => 'VSILLAI',
                'id_padre' => 2, //VIP capacidad=150
                'id_hijo' => 7, //SILLA INDIVIDUAL capacidad=1
                'fecha_id' => 1
            ],
            [
                'cantidad' => 200,//150*1
                'stock' => 200,
                'precio' => 150, // precio unitario: 150*1
                'cantidad_individual' => 200,//22*1=22
                'prefijo' => 'VNIND',
                'id_padre' => 3, //VIP capacidad=150
                'id_hijo' => 8, //SILLA INDIVIDUAL capacidad=1
                'fecha_id' => 1
            ],
        ];
        foreach ($data as $d) {
            CantidadArea::create($d);
        }
    }
}
