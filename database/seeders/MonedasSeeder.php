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
            ['Peso argenitino' => '$ ARS'],
            ['Boliviano' => 'Bs BOB'],
            ['Real' => 'R$ BRL'],
            ['Unidad de fomento' => 'UF CLF'],
            ['Peso chileno' => '$ CLP'],
            ['Peso colombiano' => '$ COP'],
            ['Colones' => '₡ CRC'],
            ['Peso cubano convertible' => 'CUC'],
            ['Peso cubano' => '$ CUP'],
            ['Peso dominicano' => '$ DOP'],
            ['Euro' => '€ EUR'],
            ['Quetzal guatemalteco' => 'Q GTQ'],
            ['Lempira' => 'L HNL'],
            ['Peso mexicano' => '$ MXN'],
            ['Cordoba' => 'C$ NIO'],
            ['Balboa' => 'B/ PAB'],
            ['Soles' => 'S/ PEN'],
            ['Guarani' => '₲ PYG'],
            ['Dolar' => 'U$S USD'],
            ['Peso uruguayo' => '$ UYU'],
            ['Bolivar' => 'Bs. VES'],
        ];

        foreach ($monedas as $monedasData) {
            Monedas::create($monedasData);
        }
    }
}
