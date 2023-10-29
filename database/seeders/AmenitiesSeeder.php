<?php

namespace Database\Seeders;

use App\Models\Amenities;
use Illuminate\Database\Seeder;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
            ['name' => 'Generales'],
            ['name' => 'Servicios'],
            ['name' => 'Ambientes'],
            ['name' => 'Comodidades y equipamiento'],
            ['name' => 'Espacios comunes'],
            ['name' => 'Seguridad'],
            ['name' => 'Personalizadas'],
        ];

        foreach ($amenities as $amenitiesData) {
            Amenities::create($amenitiesData);
        }
    }
}
