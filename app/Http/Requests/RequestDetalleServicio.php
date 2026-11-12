<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestDetalleServicio extends FormRequest
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
            'id_servicio' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:servicios,id_servicio'
            ],
            'precio' => [
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

            'id_servicio.required' => 'El servicio es obligatorio.',
            'id_servicio.integer' => 'El identificador del servicio debe ser un número entero.',
            'id_servicio.exists' => 'El servicio seleccionado no existe en el sistema.',

            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un valor numérico.',
            'precio.min' => 'El precio no puede ser un valor negativo.'
        ];
    }
}