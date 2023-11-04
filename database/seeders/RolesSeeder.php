<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
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
        $rolVendedor = Role::create(['name' => 'vendedor']);
        $rolEditor = Role::create(['name' => 'editor']);
        $rolCliente = Role::create(['name' => 'cliente']);
        // $rolArrendador = Role::create(['name' => 'arredador']);

        Permission::create(['name' => 'dashboard']);
        
        Permission::create(['name' => 'admin.user.index'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.user.create'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.user.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.user.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        
        Permission::create(['name' => 'admin.role.index'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.role.create'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.role.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.role.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        
        Permission::create(['name' => 'admin.products.index'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.products.create'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.products.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.products.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        
        Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.categorias.create'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.categorias.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.categorias.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        
        Permission::create(['name' => 'admin.paises.index'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.paises.create'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.paises.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.paises.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin]);

        Permission::create(['name' => 'admin.estados.index'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.estados.create'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.estados.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.estados.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin]);

        Permission::create(['name' => 'admin.ciudades.index'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.ciudades.create'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.ciudades.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.ciudades.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        
        Permission::create(['name' => 'admin.contactos.index'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.contactos.create'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.contactos.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.contactos.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        
        Permission::create(['name' => 'admin.tasks.index'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor, $rolEditor]);
        Permission::create(['name' => 'admin.tasks.create'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor, $rolEditor]);
        Permission::create(['name' => 'admin.tasks.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor, $rolEditor]);
        Permission::create(['name' => 'admin.tasks.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor, $rolEditor]);
        
        Permission::create(['name' => 'admin.slides.index'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.slides.create'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.slides.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.slides.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        
        Permission::create(['name' => 'admin.info-webs.index'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.info-webs.create'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.info-webs.edit'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.info-webs.delete'])->syncRoles([$rolSuperAdmin]);
        
        Permission::create(['name' => 'admin.testimonios.index'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.testimonios.create'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.testimonios.edit'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.testimonios.delete'])->syncRoles([$rolSuperAdmin]);
        
        Permission::create(['name' => 'admin.setting-generals.index'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.setting-generals.create'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.setting-generals.edit'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.setting-generals.delete'])->syncRoles([$rolSuperAdmin]);
        
        Permission::create(['name' => 'admin.amenities-checks.index'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.amenities-checks.create'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.amenities-checks.edit'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.amenities-checks.delete'])->syncRoles([$rolSuperAdmin]);
        
        Permission::create(['name' => 'admin.negocios.index'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.negocios.create'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.negocios.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.negocios.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        
        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.posts.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        
        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.tags.delete'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        
        Permission::create(['name' => 'admin.faqs.index'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.faqs.create'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.faqs.edit'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.faqs.delete'])->syncRoles([$rolSuperAdmin]);
        
        Permission::create(['name' => 'admin.pages.index'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.pages.create'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.pages.edit'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.pages.delete'])->syncRoles([$rolSuperAdmin]);
    }
}
