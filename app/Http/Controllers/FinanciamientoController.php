<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiCredential;
use App\Models\ApiToken;
use Illuminate\Support\Facades\Http;

class FinanciamientoController extends Controller
{
    public function consultarLineaCredito(Request $request)
    {
        $dni = $request->input('numeroDocumento');
        $tipo = $request->input('tipoDocumento', 'PE2');

        $token = $this->obtenerTokenValido();

        for ($intento = 1; $intento <= 2; $intento++) {
            if (!$token && $intento === 2) {
                return response()->json(['error' => 'No hay token disponible ni se pudo generar uno'], 500);
            }

            if (!$token) {
                $token = $this->generarNuevoToken();
                continue;
            }

            $url = "https://appweb.calidda.com.pe/FNB_Services/api/financiamiento/lineaCredito?numeroDocumento=$dni&tipoDocumento=$tipo&idAliado={$token->aliado_id}";

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token->auth_token,
            ])->get($url);

            if ($response->successful()) {
                return response()->json($response->json());
            }

            // Si token falló (por expiración, etc.), volver a generar y reintentar
            $token = null;
        }

        return response()->json(['error' => 'Error al consultar línea de crédito después de 2 intentos'], 500);
    }

    private function obtenerTokenValido(): ?ApiToken
    {
        return ApiToken::where('expires_at', '>', now())
            ->orderBy('expires_at', 'desc')
            ->first();
    }

    private function generarNuevoToken(): ?ApiToken
    {
        $credencial = ApiCredential::inRandomOrder()->first(); // o aplica tu lógica de prioridad

        $response = Http::post('https://appweb.calidda.com.pe/FNB_Services/api/Seguridad/autenticar', [
            'usuario' => $credencial->usuario,
            'password' => $credencial->password,
            'captcha' => 'exitoso',
            'Latitud' => '',
            'Longitud' => ''
        ]);

        if ($response->successful() && $response->json('valid')) {
            $data = $response->json('data');

            return ApiToken::create([
                'api_credential_id' => $credencial->id,
                'auth_token' => $data['authToken'],
                'aliado_id' => $this->extraerAliadoId($data['authToken']),
                'expires_at' => now()->addSeconds($data['expireIn']),
            ]);
        }

        return null;
    }

    private function extraerAliadoId(string $token): ?string
    {
        $partes = explode('.', $token);
        if (count($partes) !== 3) return null;

        $payload = $partes[1];
        $payload .= str_repeat('=', 4 - (strlen($payload) % 4)); // padding base64
        $datos = json_decode(base64_decode($payload), true);

        return $datos['id'] ?? null;
    }
}
