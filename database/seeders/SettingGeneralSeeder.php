<?php

namespace Database\Seeders;

use App\Models\SettingGeneral;
use Illuminate\Database\Seeder;

class SettingGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settingGeneral = [
            [
                'name' => 'Properties Shop',
                'moneda' => 1,
                'logo_empresa' => 'default.png',
                'telefono' => '+58 424-290-9870',
                'direccion' => 'Av. Américo Vespucio, CC Caribean Mall C3-105',
                'email' => 'soporte@softandnet.com',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec condimentum bibendum augue, maximus lacinia nisl tempus non.',
            ],            
        ];

        foreach ($settingGeneral as $settingGeneralData) {
            SettingGeneral::create($settingGeneralData);
        }
    }
}
