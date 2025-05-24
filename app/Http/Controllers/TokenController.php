<?php

namespace App\Http\Controllers;

use App\Models\ApiCredential;
use App\Models\ApiToken;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TokenController extends Controller
{

    public function generarTokens()
    {
        $credenciales = ApiCredential::all();
        $resultados = [];

        foreach ($credenciales as $credencial) {
            $lockKey = 'token_lock_' . $credencial->id;

            // Intentar adquirir el candado por 10 segundos
            $lock = Cache::lock($lockKey, 10);

            if ($lock->get()) {
                try {
                    // Verificar si ya hay un token vigente
                    $yaExiste = ApiToken::where('api_credential_id', $credencial->id)
                        ->where('expires_at', '>', now())
                        ->exists();

                    if ($yaExiste) {
                        $resultados[] = [
                            'usuario' => $credencial->usuario,
                            'estado' => 'Token ya existente y vigente'
                        ];
                        continue;
                    }

                    // Llamar a la API externa para generar un nuevo token
                    $response = Http::post('https://appweb.calidda.com.pe/FNB_Services/api/Seguridad/autenticar', [
                        'usuario' => $credencial->usuario,
                        'password' => $credencial->password,
                        'captcha' => 'exitoso',
                        'Latitud' => '',
                        'Longitud' => ''
                    ]);

                    if ($response->successful() && $response->json('valid')) {
                        $data = $response->json('data');

                        ApiToken::create([
                            'api_credential_id' => $credencial->id,
                            'auth_token' => $data['authToken'],
                            'aliado_id' => obtenerAliadoIdDesdeToken($data['authToken']),
                            'expires_at' => Carbon::now()->addSeconds($data['expireIn']),
                        ]);

                        $resultados[] = [
                            'usuario' => $credencial->usuario,
                            'estado' => 'Token creado correctamente'
                        ];
                    } else {
                        $resultados[] = [
                            'usuario' => $credencial->usuario,
                            'estado' => 'Error al autenticar'
                        ];
                    }
                } finally {
                    $lock->release();
                }
            } else {
                $resultados[] = [
                    'usuario' => $credencial->usuario,
                    'estado' => 'Ya se está generando token (bloqueado)'
                ];
            }
        }

        return response()->json($resultados);
    }

    function obtenerAliadoIdDesdeToken(string $token): ?string
    {
        $partes = explode('.', $token);

        if (count($partes) !== 3) {
            return null; // no es un JWT válido
        }

        $payload = $partes[1];

        // Añadir padding si falta
        $padding = strlen($payload) % 4;
        if ($padding !== 0) {
            $payload .= str_repeat('=', 4 - $padding);
        }

        $json = base64_decode($payload);
        $datos = json_decode($json, true);

        return $datos['id'] ?? null;
    }
}
