<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CategoriaSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(LocalidadSeeder::class);
        $this->call(TelefonoSeeder::class);
        $this->call(SectorSeeder::class);
    }
}
