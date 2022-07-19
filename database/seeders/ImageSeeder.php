<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Images;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Images::create([
            'url'=>'image/Daddy-Yankee1.jpg',
            'imageable_type'=>Evento::class,
            'imageable_id'=>1
        ]);
        Images::create([
            'url'=>'image/thor-love-and-thunder1.jpg',
            'imageable_type'=>Evento::class,
            'imageable_id'=>2
        ]);
    }
}
