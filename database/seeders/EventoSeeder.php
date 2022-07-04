<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventos = [
            [
                'title' => 'Daddy Yankee último tours',
                'description' => 'El último tour que realizará el padre del reguetton',
                'categoria_id' => 1
            ],
            [
                'title' => 'Thor-Amor y trueno',
                'description' => 'Una de las nuevas películas que ofrece Marvel sobre el dios del trueno',
                'categoria_id' => 4
            ]
        ];
        foreach ($eventos as $e) {
            Evento::create($e);
        }
    }
}
