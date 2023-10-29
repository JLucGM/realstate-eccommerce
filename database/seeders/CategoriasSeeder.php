<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'name' => 'Sin categoria',
                'status' => 1,
            ],            
        ];

        foreach ($categorias as $categoriasData) {
            Categorias::create($categoriasData);
        }
    }
}
