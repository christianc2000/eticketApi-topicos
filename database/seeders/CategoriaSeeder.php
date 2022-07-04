<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = [
            ['nombre'=>'Música'],
            ['nombre'=>'Teatro'],
            ['nombre'=>'Deporte'],
            ['nombre'=>'Cine'],
            ['nombre'=>'Anime']
        ];
        foreach ($cat as $c) {
            Categoria::create($c);
        }
    }
}
