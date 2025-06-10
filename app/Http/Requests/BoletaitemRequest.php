<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoletaitemRequest extends FormRequest
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
			'boleta_id' => 'required',
			'sku' => 'string',
			'descripcion' => 'required|string',
			'unidad_de_medida' => 'string',
			'cantidad' => 'required',
			'valor_unitario' => 'required',
			'codigo_tipo_afectacion_igv' => 'required|string',
			'porcentaje_igv' => 'required',
			'descuento_item' => 'required',
			'total_item' => 'required',
        ];
    }
}
