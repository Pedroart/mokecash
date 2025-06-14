<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreArchivoRequest extends FormRequest
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
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
