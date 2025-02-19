<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
          'email.required' => 'El campo correo electrónico es obligatorio.',
          'email.string' => 'El correo electrónico debe ser una cadena de texto.',
          'email.email' => 'El correo electrónico debe ser una dirección válida.',
  
          'password.required' => 'El campo contraseña es obligatorio.',
          'password.string' => 'La contraseña debe ser una cadena de texto.',
        ];
    }

}
