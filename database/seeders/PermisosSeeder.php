<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
