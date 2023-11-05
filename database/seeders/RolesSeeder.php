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

        // Permission::create(['name' => 'dashboard','description' => 'Ver dashboard']);
        
        Permission::create(['name' => 'admin.user.index','description' => 'Ver lista de usuarios'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.user.create','description' => 'Crear usuarios'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.user.edit','description' => 'Editar usuarios'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.user.delete','description' => 'Eliminar usuarios'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        
        Permission::create(['name' => 'admin.role.index','description' => 'Ver lista de roles'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.role.create','description' => 'Crear roles'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.role.edit','description' => 'Editar roles'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.role.delete','description' => 'Eliminar roles'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        
        Permission::create(['name' => 'admin.products.index','description' => 'Ver lista de propiedades'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.products.create','description' => 'Crear propiedades'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.products.edit','description' => 'Editar propiedades'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.products.delete','description' => 'Eliminnar propiedades'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        
        Permission::create(['name' => 'admin.categorias.index','description' => 'Ver lista de categorias'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.categorias.create','description' => 'Crear categorias'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.categorias.edit','description' => 'Editar categorias'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.categorias.delete','description' => 'Eliminar categorias'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        
        Permission::create(['name' => 'admin.paises.index','description' => 'Ver lista de paises'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.paises.create','description' => 'Crear paises'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.paises.edit','description' => 'Editar paises'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.paises.delete','description' => 'Eliminar paises'])->syncRoles([$rolSuperAdmin, $rolAdmin]);

        Permission::create(['name' => 'admin.estados.index','description' => 'Ver lista de estados'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.estados.create','description' => 'Crear estados'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.estados.edit','description' => 'Editar estados'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.estados.delete','description' => 'Eliminar estados'])->syncRoles([$rolSuperAdmin, $rolAdmin]);

        Permission::create(['name' => 'admin.ciudades.index','description' => 'Ver lista de ciudades'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.ciudades.create','description' => 'Crear estados'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.ciudades.edit','description' => 'Editar estados'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.ciudades.delete','description' => 'Eliminar estados'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        
        Permission::create(['name' => 'admin.contactos.index','description' => 'Ver lista de contactos'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.contactos.create','description' => 'Crear contactos'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.contactos.edit','description' => 'Editar contactos'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.contactos.delete','description' => 'Eliminar contactos'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        
        Permission::create(['name' => 'admin.tasks.index','description' => 'Ver lista de tareas'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor, $rolEditor]);
        Permission::create(['name' => 'admin.tasks.create','description' => 'Crear tareas'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor, $rolEditor]);
        Permission::create(['name' => 'admin.tasks.edit','description' => 'Editar tareas'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor, $rolEditor]);
        Permission::create(['name' => 'admin.tasks.delete','description' => 'Eliminar tareas'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor, $rolEditor]);
        
        Permission::create(['name' => 'admin.slides.index','description' => 'Ver lista de slides'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.slides.create','description' => 'Crear slides'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.slides.edit','description' => 'Editar slides'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        Permission::create(['name' => 'admin.slides.delete','description' => 'Eliminar slides'])->syncRoles([$rolSuperAdmin, $rolAdmin]);
        
        Permission::create(['name' => 'admin.info-webs.index','description' => 'Ver lista de información principal'])->syncRoles([$rolSuperAdmin]);
        // Permission::create(['name' => 'admin.info-webs.create','description' => 'Crear informacion'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.info-webs.edit','description' => 'Editar información principal'])->syncRoles([$rolSuperAdmin]);
        // Permission::create(['name' => 'admin.info-webs.delete','description' => ''])->syncRoles([$rolSuperAdmin]);
        
        Permission::create(['name' => 'admin.testimonios.index','description' => 'Ver lista de testimonios'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.testimonios.create','description' => 'Crear testimonios'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.testimonios.edit','description' => 'Editar testimonios'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.testimonios.delete','description' => 'Eliminar testimonios'])->syncRoles([$rolSuperAdmin]);
        
        // Permission::create(['name' => 'admin.setting-generals.index','description' => 'Ver lista de configuración general'])->syncRoles([$rolSuperAdmin]);
        // Permission::create(['name' => 'admin.setting-generals.create','description' => 'Crear configuración general'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.setting-generals.edit','description' => 'Editar configuración general'])->syncRoles([$rolSuperAdmin]);
        // Permission::create(['name' => 'admin.setting-generals.delete','description' => 'Eliminar configuración general'])->syncRoles([$rolSuperAdmin]);
        
        Permission::create(['name' => 'admin.amenities-checks.index','description' => 'Ver lista de comididades'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.amenities-checks.create','description' => 'Crear comodidades'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.amenities-checks.edit','description' => 'Editar comodidades'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.amenities-checks.delete','description' => 'Eliminar comodidades'])->syncRoles([$rolSuperAdmin]);
        
        Permission::create(['name' => 'admin.negocios.index','description' => 'Ver lista de negocios'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.negocios.create','description' => 'Crear negocios'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.negocios.edit','description' => 'Editar negocios'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        Permission::create(['name' => 'admin.negocios.delete','description' => 'Eliminar negocios'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolVendedor]);
        
        Permission::create(['name' => 'admin.posts.index','description' => 'Ver lista de posts'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.posts.create','description' => 'Crear posts'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.posts.edit','description' => 'Editar posts'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.posts.delete','description' => 'Eliminar posts'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        
        Permission::create(['name' => 'admin.tags.index','description' => 'Ver lista de tags'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.tags.create','description' => 'Crear tags'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.tags.edit','description' => 'Editar tags'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        Permission::create(['name' => 'admin.tags.delete','description' => 'Eliminar tags'])->syncRoles([$rolSuperAdmin, $rolAdmin, $rolEditor]);
        
        Permission::create(['name' => 'admin.faqs.index','description' => 'Ver lista de faqs'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.faqs.create','description' => 'Crear faqs'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.faqs.edit','description' => 'Editar faqs'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.faqs.delete','description' => 'Eliminar faqs'])->syncRoles([$rolSuperAdmin]);
        
        Permission::create(['name' => 'admin.pages.index','description' => 'Ver lista de páginas'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.pages.create','description' => 'Crear páginas'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.pages.edit','description' => 'Editar páginas'])->syncRoles([$rolSuperAdmin]);
        Permission::create(['name' => 'admin.pages.delete','description' => 'Eliminar páginas'])->syncRoles([$rolSuperAdmin]);
    }
}
