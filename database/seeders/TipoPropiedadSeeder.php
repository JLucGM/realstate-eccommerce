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
            ['nombre' => 'Apart Hotel'],
            ['nombre' => 'Apartaestudio'],
            ['nombre' => 'Apartamento'],
            ['nombre' => 'Apartamento Duplex'],
            ['nombre' => 'Arrendamiento'],
            ['nombre' => 'Atico'],
            ['nombre' => 'Balneario'],
            ['nombre' => 'Barrio Cerrado'],
            ['nombre' => 'Barrio de Chacras'],
            ['nombre' => 'Baulera'],
            ['nombre' => 'Bodega'],
            ['nombre' => 'Buardilla'],
            ['nombre' => 'Cabaña'],
            ['nombre' => 'Camping'],
            ['nombre' => 'Campo'],
            ['nombre' => 'Casa'],
            ['nombre' => 'Casa Campestre'],
            ['nombre' => 'Casa Colonial'],
            ['nombre' => 'Casa con Terreno'],
            ['nombre' => 'Casa con Local'],
            ['nombre' => 'Casa con Subsidio'],
            ['nombre' => 'Casa de Campo'],
            ['nombre' => 'Casa de Playa'],
            ['nombre' => 'Casa Finca'],
            ['nombre' => 'Casa Prefabricada'],
        ];

        foreach ($data as $TipoPropiedadData) {
            TipoPropiedad::create($TipoPropiedadData);
        }
    }
}
