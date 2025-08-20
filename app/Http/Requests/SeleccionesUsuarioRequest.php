<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeleccionesUsuarioRequest extends FormRequest
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
			'dni_cliente' => 'required|string',
			'nombre_cliente' => 'required|string',
			'linea_credito' => 'required',
			'producto_id' => 'required',
			'precio' => 'required',
        ];
    }
}
