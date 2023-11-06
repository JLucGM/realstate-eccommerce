<?php

namespace Database\Seeders;

use App\Models\AmenitiesCheck;
use Illuminate\Database\Seeder;

class AmenitiesCheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenitiesChecks = [
            ['name' =>'Acepta mascotas', 'amenities_id' => 1],
            ['name' =>'Piscina', 'amenities_id' => 1],
            ['name' =>'Garaje', 'amenities_id' => 1],
            ['name' =>'Gimnasio', 'amenities_id' => 1],
            ['name' => 'Parrilla', 'amenities_id' => 1],
            ['name' => 'Luminoso', 'amenities_id' => 1],
            ['name' => 'Muros Perimetrales', 'amenities_id' => 1],
            ['name' => 'Medidor Eléctrico Individual', 'amenities_id' => 1],
            ['name' => 'Garita de Seguridad', 'amenities_id' => 1],
            ['name' => 'Piscina Cerrada', 'amenities_id' => 1],
            ['name' => 'Agua Corriente', 'amenities_id' => 2],
            ['name' => 'Claocas', 'amenities_id' => 2],
            ['name' => 'Electricidad', 'amenities_id' => 2],
            ['name' => 'Red de Gas Natural', 'amenities_id' => 2],
            ['name' => 'Internet / Wifi', 'amenities_id' => 2],
            ['name' => 'Televisión', 'amenities_id' => 2],
            ['name' => 'Balcón', 'amenities_id' => 3],
            ['name' => 'Patio', 'amenities_id' => 3],
            ['name' => 'Comedor', 'amenities_id' => 3],
            ['name' => 'Terraza', 'amenities_id' => 3],
            ['name' => 'Aire Acondicionado', 'amenities_id' => 4],
            ['name' => 'Amoblado', 'amenities_id' => 4],
            ['name' => 'Alarma', 'amenities_id' => 4],
            ['name' => 'Calefacción', 'amenities_id' => 4],
            ['name' => 'Alumbrado Público', 'amenities_id' => 4],
            ['name' => 'Asfalto', 'amenities_id' => 4],
            ['name' => 'Microondas', 'amenities_id' => 4],
            ['name' => 'Lavavajillas', 'amenities_id' => 4],
            ['name' => 'Lavaropas', 'amenities_id' => 4],
            ['name' => 'Secarropa', 'amenities_id' => 4],
            ['name' => 'Servicios Compratidos', 'amenities_id' => 5],
            ['name' => 'Portones eléctricos', 'amenities_id' => 6],
            ['name' => 'Seguridad 24hs.', 'amenities_id' => 6],
            ['name' => 'Piscina', 'amenities_id' => 7],
            ['name' => 'Sauna', 'amenities_id' => 7],
            ['name' => 'Bosque', 'amenities_id' => 7],
        ];

        foreach ($amenitiesChecks as $amenitiesChecksData) {
            AmenitiesCheck::create($amenitiesChecksData);
        }
    }
}
