<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:90',
            'last_name' => 'nullable|string|max:90',
            'email' => 'required|string|email|max:250|unique:users',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/',
            'phone' => 'nullable|digits:10', 
            'gender' => 'nullable|in:Masculino,Femenino,Otro', 
            'birthday' => 'nullable|date|before:today|after:1900-01-01', 
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 90 caracteres.',

            'last_name.string' => 'El apellido debe ser una cadena de texto.',
            'last_name.max' => 'El apellido no puede tener más de 90 caracteres.',

            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.email' => 'Debe ser una dirección de correo electrónico válida.',
            'email.max' => 'El correo electrónico no puede tener más de 250 caracteres.',
            'email.unique' => 'Este correo electrónico ya está en uso.',

            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.regex' => 'La contraseña debe contener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial.',

            'phone.digits' => 'El número de teléfono debe tener exactamente 10 dígitos.',

            'gender.in' => 'El género debe ser Masculino, Femenino o Otro.',
            
            'birthday.required' => 'El campo fecha de nacimiento es obligatorio.',
            'birthday.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'birthday.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            'birthday.after' => 'La fecha de nacimiento debe ser posterior al 1 de enero de 1900.',
        ];
    }
}