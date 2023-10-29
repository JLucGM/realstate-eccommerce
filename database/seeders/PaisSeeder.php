<?php

namespace Database\Seeders;

use App\Models\Paises;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = [
            [
                'name' => 'Venezuela',
            ],            
        ];

        foreach ($paises as $paisesData) {
            Paises::create($paisesData);
        }
    }
}
