<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolSuperAdmin = Role::create(['name' => 'super admin']);
        $rolAdmin = Role::create(['name' => 'admin']);
        $rolCliente = Role::create(['name' => 'cliente']);
        $rolArrendador = Role::create(['name' => 'arredador']);
        $rolVendedor = Role::create(['name' => 'vendedor']);

        $usuarios = [
            [
                'name' => 'Usuario 1',
                'email' => 'sadmin@admin.com',
                'password' => bcrypt('123456789'),
                'point' => 0,
                'rol' => $rolSuperAdmin->name,
            ],
            [
                'name' => 'Usuario 2',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456789'),
                                'point' => 0,

                'rol' => $rolAdmin->name,
            ],
            [
                'name' => 'Usuario 3',
                'email' => 'cliente@admin.com',
                'password' => bcrypt('123456789'),
                                'point' => 0,

                'rol' => $rolCliente->name,
            ],
            [
                'name' => 'Usuario 4',
                'email' => 'arrendador@admin.com',
                'password' => bcrypt('123456789'),
                'point' => 0,

                'rol' => $rolArrendador->name,
            ],
            [
                'name' => 'Usuario 5',
                'email' => 'vendedor@admin.com',
                'password' => bcrypt('123456789'),
                'point' => 0,

                'rol' => $rolVendedor->name,
            ],
            // Agrega más usuarios y roles según tus necesidades
        ];

        foreach ($usuarios as $usuarioData) {
            $usuario = User::create($usuarioData);
            $usuario->assignRole($usuarioData['rol']);
        }
    }
}