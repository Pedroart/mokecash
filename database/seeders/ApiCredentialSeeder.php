<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiCredential;

class ApiCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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
            ApiCredential::updateOrCreate(
                ['usuario' => $data['usuario']],
                ['password' => $data['password']]
            );
        }
    }
}
