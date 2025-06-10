<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoletaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'serie' => 'required|string',
			'numero' => 'required',
			'numero_boleta_completo' => 'required|string',
			'fecha_emision' => 'required',
			'moneda' => 'required|string',
			'tipo_operacion' => 'required|string',
			'cajero' => 'string',
			'empresa_nombre' => 'required|string',
			'empresa_ruc' => 'required|string',
			'empresa_direccion' => 'string',
			'cliente_tipo_documento' => 'required|string',
			'cliente_numero_documento' => 'string',
			'cliente_denominacion' => 'required|string',
			'cliente_direccion' => 'string',
			'total_gravada' => 'required',
			'total_igv' => 'required',
			'importe_total' => 'required',
			'importe_letras' => 'string',
			'metodo_pago' => 'string',
			'api_hash' => 'string',
			'xml_url' => 'string',
			'cdr_url' => 'string',
			'qr_code_path' => 'string',
			'sunat_resolucion' => 'string',
        ];
    }
}
