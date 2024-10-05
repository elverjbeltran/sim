<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {

        // Crear permisos para productos
        Permission::create(['name' => 'create productos']);
        Permission::create(['name' => 'edit productos']);
        Permission::create(['name' => 'delete productos']);
        Permission::create(['name' => 'view productos']);

        // Crear rol "admin de almacen" y asignarle todos los permisos
        $adminAlmacenRole = Role::create(['name' => 'admin de almacen']);
        $adminAlmacenRole->givePermissionTo([
            'create productos',
            'edit productos',
            'delete productos',
            'view productos'
        ]);

        // Crear rol "gestor de almacen" sin el permiso de eliminar productos
        $gestorAlmacenRole = Role::create(['name' => 'gestor de almacen']);
        $gestorAlmacenRole->givePermissionTo([
            'create productos',
            'edit productos',
            'view productos'
        ]);
    }
}