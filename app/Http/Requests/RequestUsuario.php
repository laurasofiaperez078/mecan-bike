<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestUsuario extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $usuarioId = $this->route('usuario') ?? $this->route('id');

        return [
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:255'
            ],
            'documento' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50',
                Rule::unique('usuarios', 'documento')->ignore($usuarioId, 'id_usuario')
            ],
            'usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50',
                Rule::unique('usuarios', 'usuario')->ignore($usuarioId, 'id_usuario')
            ],
            'clave' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'min:6'
            ],
            'rol' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'activo' => [
                $isUpdate ? 'sometimes' : 'required',
                'boolean'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',

            'documento.required' => 'El documento es obligatorio.',
            'documento.string' => 'El documento debe ser texto.',
            'documento.max' => 'El documento no puede exceder los 50 caracteres.',
            'documento.unique' => 'Este número de documento ya está registrado.',

            'usuario.required' => 'El nombre de usuario es obligatorio.',
            'usuario.string' => 'El usuario debe ser texto.',
            'usuario.max' => 'El usuario no puede exceder los 50 caracteres.',
            'usuario.unique' => 'Este nombre de usuario ya está en uso.',

            'clave.required' => 'La contraseña es obligatoria.',
            'clave.string' => 'La contraseña debe ser texto.',
            'clave.min' => 'La contraseña debe tener al menos 6 caracteres.',

            'rol.required' => 'El rol es obligatorio.',
            'rol.string' => 'El rol debe ser texto.',
            'rol.max' => 'El rol no puede exceder los 50 caracteres.',

            'activo.required' => 'El estado activo es obligatorio.',
            'activo.boolean' => 'El campo activo debe ser verdadero o falso.'
        ];
    }
}