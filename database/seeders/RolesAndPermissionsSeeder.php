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
            'crear_cotizacion' => ['admin', 'validador', 'finanzas', 'promotor', 'admin_tienda', 'vendedor'],
            'ver_cotizaciones' => ['admin', 'validador', 'finanzas', 'promotor', 'admin_tienda', 'vendedor'],
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
