<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestBicicleta extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $bicicletaId = $this->route('bicicleta') ?? $this->route('id');

        return [
            'id_cliente' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:clientes,id_cliente'
            ],
            'marca' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:100'
            ],
            'modelo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:100'
            ],
            'tipo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'color' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'id_cliente.required' => 'El cliente es obligatorio.',
            'id_cliente.integer' => 'El identificador del cliente debe ser un número entero.',
            'id_cliente.exists' => 'El cliente seleccionado no existe en el sistema.',

            'marca.required' => 'La marca de la bicicleta es obligatoria.',
            'marca.string' => 'La marca debe ser texto.',
            'marca.max' => 'La marca no puede exceder los 100 caracteres.',

            'modelo.required' => 'El modelo de la bicicleta es obligatorio.',
            'modelo.string' => 'El modelo debe ser texto.',
            'modelo.max' => 'El modelo no puede exceder los 100 caracteres.',

            'tipo.required' => 'El tipo de bicicleta es obligatorio.',
            'tipo.string' => 'El tipo debe ser texto.',
            'tipo.max' => 'El tipo no puede exceder los 50 caracteres.',

            'color.required' => 'El color de la bicicleta es obligatorio.',
            'color.string' => 'El color debe ser texto.',
            'color.max' => 'El color no puede exceder los 50 caracteres.'
        ];
    }
}