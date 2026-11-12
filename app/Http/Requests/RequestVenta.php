<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestVenta extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'id_cliente' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:clientes,id_cliente'
            ],
            'id_usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,id_usuario'
            ],
            'fecha' => [
                $isUpdate ? 'sometimes' : 'required',
                'date'
            ],
            'metodo_pago' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'total' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'id_cliente.required' => 'El cliente es obligatorio.',
            'id_cliente.integer' => 'El identificador del cliente debe ser un número entero.',
            'id_cliente.exists' => 'El cliente seleccionado no existe en el sistema.',

            'id_usuario.required' => 'El usuario es obligatorio.',
            'id_usuario.integer' => 'El identificador del usuario debe ser un número entero.',
            'id_usuario.exists' => 'El usuario seleccionado no existe en el sistema.',

            'fecha.required' => 'La fecha de la venta es obligatoria.',
            'fecha.date' => 'La fecha debe tener un formato válido.',

            'metodo_pago.required' => 'El método de pago es obligatorio.',
            'metodo_pago.string' => 'El método de pago debe ser texto.',
            'metodo_pago.max' => 'El método de pago no puede exceder los 50 caracteres.',

            'total.required' => 'El total de la venta es obligatorio.',
            'total.numeric' => 'El total debe ser un valor numérico.',
            'total.min' => 'El total no puede ser un valor negativo.'
        ];
    }
}