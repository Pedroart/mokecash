<?php

namespace App\Http\Controllers;
use App\Models\CalidaCredential;
use App\Models\CalidaToken;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CalidaLineaCreditoController extends Controller
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

    public function consultarTasaMensual()
    {
        $token = $this->obtenerTokenValido();

        for ($intento = 1; $intento <= 2; $intento++) {
            if (!$token && $intento === 2) {
                return response()->json(['error' => 'No hay token disponible ni se pudo generar uno'], 500);
            }

            if (!$token) {
                $token = $this->generarNuevoToken();
                continue;
            }

            $url = "https://appweb.calidda.com.pe/FNB_Services/api/Financiamiento/tasaMensualFinanciamiento";

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token->auth_token,
            ])->get($url);

            if ($response->successful()) {
                return response()->json([
                    'tasa' => floatval($response->body()),
                ]);
            }

            // Si token falló (por expiración, etc.), volver a generar y reintentar
            $token = null;
        }

        return response()->json(['error' => 'Error al consultar tasa mensual después de 2 intentos'], 500);
    }

    public function consultarConfigDegravamen()
    {
        $token = $this->obtenerTokenValido();

        for ($intento = 1; $intento <= 2; $intento++) {
            if (!$token && $intento === 2) {
                return response()->json(['error' => 'No hay token disponible ni se pudo generar uno'], 500);
            }

            if (!$token) {
                $token = $this->generarNuevoToken();
                continue;
            }

            $url = "https://appweb.calidda.com.pe/FNB_Services/api/Financiamiento/ObtenerConfigDegravamen";

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token->auth_token,
            ])->get($url);

            if ($response->successful()) {
                return response()->json($response->json());
            }

            $token = null; // Fuerza reintento con nuevo token
        }

        return response()->json(['error' => 'Error al consultar configuración de desgravamen después de 2 intentos'], 500);
    }

    private function obtenerTokenValido(): ?CalidaToken
    {
        return CalidaToken::where('expires_at', '>', now())
            ->orderBy('expires_at', 'desc')
            ->first();
    }

    private function generarNuevoToken(): ?CalidaToken
    {
        $credencial = CalidaCredential::inRandomOrder()->first(); // o aplica tu lógica de prioridad

        $response = Http::post('https://appweb.calidda.com.pe/FNB_Services/api/Seguridad/autenticar', [
            'usuario' => $credencial->usuario,
            'password' => $credencial->tokencontra,
            'captcha' => 'exitoso',
            'Latitud' => '',
            'Longitud' => ''
        ]);

        if ($response->successful() && $response->json('valid')) {
            $data = $response->json('data');

            return CalidaToken::create([
                'calida_credential_id' => $credencial->id,
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
