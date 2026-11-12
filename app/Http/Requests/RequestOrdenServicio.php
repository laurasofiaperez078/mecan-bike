<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestOrdenServicio extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'id_bicicleta' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:bicicletas,id_bicicleta'
            ],
            'id_usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,id_usuario'
            ],
            'fecha_ingreso' => [
                $isUpdate ? 'sometimes' : 'required',
                'date'
            ],
            'fecha_entrega' => [
                'nullable',
                'date',
                'after_or_equal:fecha_ingreso'
            ],
            'estado' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'diagnostico' => [
                'nullable',
                'string'
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
            'id_bicicleta.required' => 'La bicicleta es obligatoria.',
            'id_bicicleta.integer' => 'El identificador de la bicicleta debe ser un número entero.',
            'id_bicicleta.exists' => 'La bicicleta seleccionada no existe en el sistema.',

            'id_usuario.required' => 'El usuario es obligatorio.',
            'id_usuario.integer' => 'El identificador del usuario debe ser un número entero.',
            'id_usuario.exists' => 'El usuario seleccionado no existe en el sistema.',

            'fecha_ingreso.required' => 'La fecha de ingreso es obligatoria.',
            'fecha_ingreso.date' => 'La fecha de ingreso debe tener un formato de fecha válido.',

            'fecha_entrega.date' => 'La fecha de entrega debe tener un formato de fecha válido.',
            'fecha_entrega.after_or_equal' => 'La fecha de entrega debe ser posterior o igual a la fecha de ingreso.',

            'estado.required' => 'El estado de la orden es obligatorio.',
            'estado.string' => 'El estado debe ser texto.',
            'estado.max' => 'El estado no puede exceder los 50 caracteres.',

            'diagnostico.string' => 'El diagnóstico debe ser texto.',

            'total.required' => 'El total es obligatorio.',
            'total.numeric' => 'El total debe ser un valor numérico.',
            'total.min' => 'El total no puede ser un valor negativo.'
        ];
    }
}