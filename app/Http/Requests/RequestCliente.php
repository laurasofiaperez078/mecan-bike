<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestCliente extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $clienteId = $this->route('cliente') ?? $this->route('id');

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
                Rule::unique('clientes', 'documento')->ignore($clienteId, 'id_cliente')
            ],
            'telefono' => [
                'nullable',
                'string',
                'max:20'
            ],
            'correo' => [
                $isUpdate ? 'sometimes' : 'required',
                'email',
                'max:255',
                Rule::unique('clientes', 'correo')->ignore($clienteId, 'id_cliente')
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

            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no puede exceder los 20 caracteres.',

            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Debe proporcionar un correo electrónico válido.',
            'correo.max' => 'El correo electrónico no puede exceder los 255 caracteres.',
            'correo.unique' => 'Este correo electrónico ya está registrado.'
        ];
    }
}