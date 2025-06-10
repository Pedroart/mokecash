<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin',
            'validador',
            'finanzas',
            'promotor',
            'admin_tienda',
            'vendedor',
        ];

        foreach ($roles as $rol) {
            Role::firstOrCreate(['name' => $rol]);
        }

        // Mapa de permisos → roles
        $permisos = [
            // USERS
            'users.index'   => ['admin'],
            'users.create'  => ['admin'],
            'users.edit'    => ['admin'],
            'users.destroy' => ['admin'],
            'users.show'    => ['admin'],

            // TIENDAS
            'tiendas.index'   => ['admin', 'admin_tienda'],
            'tiendas.create'  => ['admin'],
            'tiendas.edit'    => ['admin'],
            'tiendas.destroy' => ['admin'],
            'tiendas.show'    => ['admin', 'admin_tienda'],

            // PERSONALTIENDAS
            'personaltiendas.index'   => ['admin', 'admin_tienda'],
            'personaltiendas.create'  => ['admin'],
            'personaltiendas.edit'    => ['admin'],
            'personaltiendas.destroy' => ['admin'],
            'personaltiendas.show'    => ['admin', 'admin_tienda'],

            // PRODUCTOS
            'productos.index'   => ['admin', 'admin_tienda', 'vendedor'],
            'productos.create'  => ['admin', 'admin_tienda'],
            'productos.edit'    => ['admin', 'admin_tienda'],
            'productos.destroy' => ['admin'],
            'productos.show'    => ['admin', 'admin_tienda', 'vendedor'],

            // COTIZACIONES
            'cotizacions.index'   => ['admin', 'validador', 'finanzas', 'promotor', 'admin_tienda', 'vendedor'],
            'cotizacions.create'  => ['admin', 'validador', 'finanzas', 'promotor', 'admin_tienda', 'vendedor'],
            'cotizacions.edit'    => ['admin', 'validador'],
            'cotizacions.destroy' => ['admin'],
            'cotizacions.show'    => ['admin', 'validador', 'finanzas', 'promotor', 'admin_tienda', 'vendedor'],

            // CALIDA CREDENTIALS
            'calida-credentials.index'   => ['admin'],
            'calida-credentials.create'  => ['admin'],
            'calida-credentials.edit'    => ['admin'],
            'calida-credentials.destroy' => ['admin'],
            'calida-credentials.show'    => ['admin'],

            // CALIDA TOKENS
            'calida-tokens.index'   => ['admin'],
            'calida-tokens.create'  => ['admin'],
            'calida-tokens.edit'    => ['admin'],
            'calida-tokens.destroy' => ['admin'],
            'calida-tokens.show'    => ['admin'],
        ];

        foreach ($permisos as $permiso => $roles) {
            $perm = Permission::firstOrCreate(['name' => $permiso]);

            foreach ($roles as $rolNombre) {
                $rol = Role::where('name', $rolNombre)->first();

                if ($rol) {
                    $rol->givePermissionTo($perm);
                }
            }
        }
    }
}
