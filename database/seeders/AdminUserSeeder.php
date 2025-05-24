<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@moke.pe'],
            ['name' => 'Admin', 'password' => Hash::make('moke*')]
        );

        $user->assignRole('admin');

        for ($i = 1; $i <= 50; $i++) {
            $nombre = "PuntoVenta{$i}";
            $email = "pventa{$i}@moke.pe";
            $password = "moP{$i}Vke"; // contraseña aleatoria de 10 caracteres

            $user = User::firstOrCreate(
                ['email' => $email],
                ['name' => $nombre, 'password' => Hash::make($password)]
            );

            $user->assignRole('puntoventa');

            // opcional: mostrar en consola las credenciales
            echo "Usuario creado: {$email} | Password: {$password}" . PHP_EOL;
        }
    }
}
