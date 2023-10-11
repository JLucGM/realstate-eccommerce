<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            'Amazonas',
            'Anzoátegui',
            'Apure',
            'Aragua',
            'Barinas',
            'Bolívar',
            'Carabobo',
            'Cojedes',
            'Delta Amacuro',
            'Falcón',
            'Guárico',
            'Lara',
            'Mérida',
            'Miranda',
            'Monagas',
            'Nueva Esparta',
            'Portuguesa',
            'Sucre',
            'Táchira',
            'Trujillo',
            'Vargas',
            'Yaracuy',
            'Zulia',
            'Distrito Capital',
            'Dependencias Federales'
        ];

        // ID del país
        $paisId = 1;

        // Recorrer el array de estados y crear un registro en la base de datos para cada uno
        foreach ($estados as $estado) {
            Estado::create([
                'name' => $estado,
                'pais_id' => $paisId
            ]);
        }
    
    }
}
