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
        $this->call(RolesSeeder::class);
        $this->call(userSeeder::class);
        $this->call(SettingGeneralSeeder::class);
        $this->call(MonedasSeeder::class);
        $this->call(InfoWebSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(CiudadesSeeder::class);
        $this->call(TipoPropiedadSeeder::class);
        $this->call(AmenitiesSeeder::class);
        $this->call(AmenitiesCheckSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(PagesSeeder::class);
    }
}
