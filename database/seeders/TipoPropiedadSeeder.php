<?php

namespace Database\Seeders;

use App\Models\TipoPropiedad;
use Illuminate\Database\Seeder;

class TipoPropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'Casa'],
            ['nombre' => 'Apartamento'],
            ['nombre' => 'Oficina'],
            ['nombre' => 'Galpones'],
            ['nombre' => 'Locales'],
            ['nombre' => 'Townhouse'],
        ];

        foreach ($data as $TipoPropiedadData) {
            TipoPropiedad::create($TipoPropiedadData);
        }
    }
}
