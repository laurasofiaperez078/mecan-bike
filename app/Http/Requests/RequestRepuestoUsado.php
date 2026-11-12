<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRepuestoUsado extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'id_orden' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:orden_servicios,id_orden'
            ],
            'id_producto' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:productos,id_producto'
            ],
            'cantidad' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1'
            ],
            'precio_unitario' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'id_orden.required' => 'La orden de servicio es obligatoria.',
            'id_orden.integer' => 'El identificador de la orden debe ser un número entero.',
            'id_orden.exists' => 'La orden de servicio seleccionada no existe en el sistema.',

            'id_producto.required' => 'El producto/repuesto es obligatorio.',
            'id_producto.integer' => 'El identificador del producto debe ser un número entero.',
            'id_producto.exists' => 'El producto seleccionado no existe en el sistema.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser al menos 1.',

            'precio_unitario.required' => 'El precio unitario es obligatorio.',
            'precio_unitario.numeric' => 'El precio unitario debe ser un valor numérico.',
            'precio_unitario.min' => 'El precio unitario no puede ser negativo.'
        ];
    }
}