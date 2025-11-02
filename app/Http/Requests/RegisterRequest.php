<?php

namespace App\Http\Requests;

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

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:4|max:15|unique:users,name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Este campo es obligatorio.',
            'name.min' => 'El nombre debe tener al menos 4 caracteres.',
            'name.max' => 'El nombre no puede tener más de 15 caracteres.',
            'name.unique' => 'Este nombre de usuario ya está en uso.',
            'email.required' => 'Este campo es obligatorio.',
            'email.email' => 'Debe ser un email válido.',
            'email.unique' => 'Este email ya está registrado.',
            'password.required' => 'Este campo es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        ];
    }
}
