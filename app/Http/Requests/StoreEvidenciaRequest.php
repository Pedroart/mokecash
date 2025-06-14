<?php


namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreEvidenciaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => [
                'required',
                File::types(['jpg', 'png', 'pdf', 'docx'])->max(10 * 1024),
            ],
            'nombre' => ['required', 'string'],
            'carpeta' => ['nullable', 'string'],
            'cotizacion_id' => ['required', 'string'],
            'clave' => ['required', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
