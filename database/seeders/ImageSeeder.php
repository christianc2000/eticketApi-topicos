<?php

namespace Database\Seeders;

use App\Models\Image;
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
        Image::create([
            'url'=>'image/Daddy-Yankee1.jpg',
            'imageable_type'=>Evento::class,
            'imageable_id'=>1
        ]);
        Image::create([
            'url'=>'image/thor-love-and-thunder1.jpg',
            'imageable_type'=>Evento::class,
            'imageable_id'=>2
        ]);
    }
}
