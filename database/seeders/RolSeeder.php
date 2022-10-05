<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'admin.home', 
                'description' => 'Ver el Dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index', 
                'description' => 'Ver lista de Usuarios'])->syncRoles([$role1]);
       /*  Permission::create(['name' => 'admin.users.update', 
                'descriprion' => ''])->syncRoles([$role1]); */
        Permission::create(['name' => 'admin.users.edit', 
                'description' => 'Asignar un Rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categories.index', 
                'description' => 'Lista de Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.create', 
                'description' => 'Crear Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit', 
                'description' => 'Editar Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy', 
                'description' => 'Eliminar Categorias'])->syncRoles([$role1]);

        
        Permission::create(['name' => 'admin.products.index', 
                'description' => 'Lista de productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.products.create', 
                'description' => 'Crear Productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.products.edit', 
                'description' => 'Editar Productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.products.destroy', 
                'description' => 'Eliminar productos'])->syncRoles([$role1, $role2]);


    }
}
