<?php

namespace Database\Seeders;

use App\Models\Monedas;
use Illuminate\Database\Seeder;

class MonedasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monedas = [
            ['tipo' => 'Peso argenitino', 'denominacion' => '$ ARS'],
            ['tipo' => 'Boliviano', 'denominacion' => 'Bs BOB'],
            ['tipo' => 'Real', 'denominacion' => 'R$ BRL'],
            ['tipo' => 'Unidad de fomento', 'denominacion' => 'UF CLF'],
            ['tipo' => 'Peso chileno', 'denominacion' => '$ CLP'],
            ['tipo' => 'Peso colombiano', 'denominacion' => '$ COP'],
            ['tipo' => 'Colones', 'denominacion' => '₡ CRC'],
            ['tipo' => 'Peso cubano convertible', 'denominacion' => 'CUC'],
            ['tipo' => 'Peso cubano', 'denominacion' => '$ CUP'],
            ['tipo' => 'Peso dominicano', 'denominacion' => '$ DOP'],
            ['tipo' => 'Euro', 'denominacion' => '€ EUR'],
            ['tipo' => 'Quetzal guatemalteco', 'denominacion' => 'Q GTQ'],
            ['tipo' => 'Lempira', 'denominacion' => 'L HNL'],
            ['tipo' => 'Peso mexicano', 'denominacion' => '$ MXN'],
            ['tipo' => 'Cordoba', 'denominacion' => 'C$ NIO'],
            ['tipo' => 'Balboa', 'denominacion' => 'B/ PAB'],
            ['tipo' => 'Soles', 'denominacion' => 'S/ PEN'],
            ['tipo' => 'Guarani', 'denominacion' => '₲ PYG'],
            ['tipo' => 'Dolar', 'denominacion' => 'U$S USD'],
            ['tipo' => 'Peso uruguayo', 'denominacion' => '$ UYU'],
            ['tipo' => 'Bolivar', 'denominacion' => 'Bs. VES'],
        ];

        foreach ($monedas as $monedasData) {
            Monedas::create($monedasData);
        }
    }
}
