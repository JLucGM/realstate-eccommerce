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
        // $rolSuperAdmin = Role::create(['name' => 'super Admin']);
        // $rolAdmin = Role::create(['name' => 'admin']);
        // $rolCliente = Role::create(['name' => 'cliente']);
        // $rolArrendador = Role::create(['name' => 'arredador']);
        // $rolVendedor = Role::create(['name' => 'vendedor']);

        
            User::create([
                'name' => 'Super Admin',
                'email' => 'sadmin@admin.com',
                'password' => bcrypt('123456789'),
                'points' => 0,
                'whatsapp' => 0,
                'status' => 1,
                'avatar' => 'default.jpg',
            ])->assignRole('super Admin');
            
            User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456789'),
                'points' => 0,
                'whatsapp' => 0,
                'status' => 1,
                'avatar' => 'default.jpg',
            ])->assignRole('admin');
            
            User::create([
                'name' => 'Cliente',
                'email' => 'cliente@admin.com',
                'password' => bcrypt('123456789'),
                'points' => 0,
                'whatsapp' => 0,
                'status' => 1,
                'avatar' => 'default.jpg',
            ])->assignRole('cliente');

            // User::create([
            //     'name' => 'Usuario 4',
            //     'email' => 'arrendador@admin.com',
            //     'password' => bcrypt('123456789'),
            //     'points' => 0,
            //     'whatsapp' => 0,
            //     'status' => 1,
            //     'avatar' => 'default.jpg',
            // ])->assignRole('arrendador');

            User::create([
                'name' => 'Vendedor',
                'email' => 'vendedor@admin.com',
                'password' => bcrypt('123456789'),
                'points' => 0,
                'whatsapp' => 0,
                'status' => 1,
                'avatar' => 'default.jpg',
            ])->assignRole('Vendedor');
        

    }
}
