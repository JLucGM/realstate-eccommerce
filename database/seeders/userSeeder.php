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
        $rolSuperAdmin = Role::create(['name' => 'super Admin']);
        $rolAdmin = Role::create(['name' => 'admin']);
        $rolCliente = Role::create(['name' => 'cliente']);
        $rolArrendador = Role::create(['name' => 'arredador']);
        $rolVendedor = Role::create(['name' => 'vendedor']);

        
            User::create([
                'name' => 'Usuario 1',
                'email' => 'sadmin@admin.com',
                'password' => bcrypt('123456789'),
                'points' => 0,
                'whatsapp' => 0,
                'avatar' => 'default.jpg',
            ])->assignRole($rolSuperAdmin);
            
            User::create([
                'name' => 'Usuario 2',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456789'),
                'points' => 0,
                'whatsapp' => 0,
                'avatar' => 'default.jpg',
            ])->assignRole($rolAdmin);
            
            User::create([
                'name' => 'Usuario 3',
                'email' => 'cliente@admin.com',
                'password' => bcrypt('123456789'),
                'points' => 0,
                'whatsapp' => 0,
                'avatar' => 'default.jpg',
            ])->assignRole($rolCliente);

            User::create([
                'name' => 'Usuario 4',
                'email' => 'arrendador@admin.com',
                'password' => bcrypt('123456789'),
                'points' => 0,
                'whatsapp' => 0,
                'avatar' => 'default.jpg',
            ])->assignRole($rolArrendador);

            User::create([
                'name' => 'Usuario 5',
                'email' => 'vendedor@admin.com',
                'password' => bcrypt('123456789'),
                'points' => 0,
                'whatsapp' => 0,
                'avatar' => 'default.jpg',
            ])->assignRole($rolVendedor);
        

    }
}
