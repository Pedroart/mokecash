<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalidaTokenRequest extends FormRequest
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
			'calida_credential_id' => 'required',
			'auth_token' => 'required|string',
			'aliado_id' => 'required|string',
			'expires_at' => 'required',
        ];
    }
}
