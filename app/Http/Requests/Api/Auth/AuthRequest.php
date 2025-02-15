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
            'email.required' => 'The EMAIL field is required.',
            'email.string' => 'The EMAIL field must be a string.',
            'email.email' => 'The EMAIL field must be a valid email address.',

            'password.required' => 'The PASSWORD field is required.',
            'password.string' => 'The PASSWORD field must be a string.'
        ];
    }

}
