<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Producto;
use App\Models\Tienda;
use App\Models\Personaltienda;

class TiendaTest extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear tiendas
        $tiendaMoke = Tienda::firstOrCreate([
            'nombre' => 'Moke',
            'direccion' => 'Av. Moke 123',
            'telefono' => '999111222',
        ]);

        $tiendaAjipijay = Tienda::firstOrCreate([
            'nombre' => 'Ajipijay',
            'direccion' => 'Av. Ajipijay 456',
            'telefono' => '988777666',
        ]);

        // Crear promotor compartido
        $promotor = User::firstOrCreate(
            ['email' => 'promotor@testienda.com'],
            [
                'name' => 'Promotor Tiendas',
                'password' => Hash::make('moke*'),
            ]
        );
        $promotor->assignRole('promotor');

        // Asociar promotor a ambas tiendas
        foreach ([$tiendaMoke, $tiendaAjipijay] as $tienda) {
            PersonalTienda::firstOrCreate([
                'user_id' => $promotor->id,
                'tienda_id' => $tienda->id,
            ]);
        }

        // Crear admin_tienda y vendedor para cada tienda
        foreach ([['tienda' => $tiendaMoke, 'prefijo' => 'moke'], ['tienda' => $tiendaAjipijay, 'prefijo' => 'ajipijay']] as $data) {
            foreach (['admin_tienda', 'vendedor'] as $rol) {
                $user = User::firstOrCreate(
                    ['email' => "{$rol}_{$data['prefijo']}@testienda.com"],
                    [
                        'name' => ucfirst($rol) . ' ' . ucfirst($data['prefijo']),
                        'password' => Hash::make('moke*'),
                    ]
                );
                $user->assignRole($rol);

                PersonalTienda::firstOrCreate([
                    'user_id' => $user->id,
                    'tienda_id' => $data['tienda']->id,
                ]);
            }
        }

        // Crear productos de ejemplo para cada tienda
        $productos = [
            ['nombre' => 'Laptop XPTO', 'descripcion' => 'Laptop de prueba', 'precio' => 1999.99],
            ['nombre' => 'Mouse Pro', 'descripcion' => 'Mouse ergonómico', 'precio' => 49.90],
        ];

        foreach ([$tiendaMoke, $tiendaAjipijay] as $tienda) {
            foreach ($productos as $p) {
                Producto::firstOrCreate([
                    'tienda_id' => $tienda->id,
                    'nombre' => $p['nombre'],
                    'descripcion' => $p['descripcion'],
                    'precio' => $p['precio'],
                ]);
            }
        }
    }
}
