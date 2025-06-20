<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CotizacionRequest extends FormRequest
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
			'tienda_id' => 'required',
			'vendedor_id' => 'required',
			'producto_id' => 'required',
			'dni_cliente' => 'required|string',
			'nombre_cliente' => 'required|string',
			'direccion' => 'required|string',
			'cuotas' => 'required',
			'monto' => 'required',
			'monto_financiado' => 'required',
			'estatus' => 'required',
			'ip_origen' => 'string',
        ];
    }
}
