<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestMovimientoInventario extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'id_producto' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:productos,id_producto'
            ],
            'id_usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,id_usuario'
            ],
            'tipo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'cantidad' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1'
            ],
            'fecha' => [
                $isUpdate ? 'sometimes' : 'required',
                'date'
            ],
            'origen' => [
                'nullable',
                'string',
                'max:100'
            ],
            'motivo' => [
                'nullable',
                'string',
                'max:255'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'id_producto.required' => 'El producto es obligatorio.',
            'id_producto.integer' => 'El identificador del producto debe ser un número entero.',
            'id_producto.exists' => 'El producto seleccionado no existe en el sistema.',

            'id_usuario.required' => 'El usuario es obligatorio.',
            'id_usuario.integer' => 'El identificador del usuario debe ser un número entero.',
            'id_usuario.exists' => 'El usuario seleccionado no existe en el sistema.',

            'tipo.required' => 'El tipo de movimiento es obligatorio.',
            'tipo.string' => 'El tipo debe ser texto.',
            'tipo.max' => 'El tipo no puede exceder los 50 caracteres.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser al menos 1.',

            'fecha.required' => 'La fecha del movimiento es obligatoria.',
            'fecha.date' => 'La fecha debe tener un formato válido.',

            'origen.string' => 'El origen debe ser texto.',
            'origen.max' => 'El origen no puede exceder los 100 caracteres.',

            'motivo.string' => 'El motivo debe ser texto.',
            'motivo.max' => 'El motivo no puede exceder los 255 caracteres.'
        ];
    }
}