<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CalidaCredential;

class CalidaCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $usuarios = [
            [
                'usuario' => 'cbernardob',
                'password' => '81r2Wp52Wh',
            ],
        ];

        foreach ($usuarios as $data) {
            CalidaCredential::updateOrCreate(
                ['usuario' => $data['usuario']],
                ['tokencontra' => $data['password']]
            );
        }
    }
}
