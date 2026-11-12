<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestServicio extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:255'
            ],
            'descripcion' => [
                'nullable',
                'string'
            ],
            'precio_base' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del servicio es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',

            'descripcion.string' => 'La descripción debe ser texto.',

            'precio_base.required' => 'El precio base es obligatorio.',
            'precio_base.numeric' => 'El precio base debe ser un valor numérico.',
            'precio_base.min' => 'El precio base no puede ser un valor negativo.'
        ];
    }
}