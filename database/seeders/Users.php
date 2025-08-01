<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@moke.pe'],
            ['name' => 'Admin', 'password' => Hash::make('moke*')]
        );

        $user->assignRole('admin');

        // DataDummy

        $roles = [
            'admin',
            'validador',
            'finanzas',
            'promotor',
            'admin_tienda',
            'vendedor',
        ];

        foreach ($roles as $rol) {
            $user = User::firstOrCreate(
                ['email' => "$rol@testienda.com"],
                [
                    'name' => ucfirst($rol) . 'Tiendas',
                    'password' => Hash::make('moke*'),
                ]
            );

            $user->assignRole($rol);
        }
    }
}
