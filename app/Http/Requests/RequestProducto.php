<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestProducto extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $productoId = $this->route('producto') ?? $this->route('id');

        return [
            'id_categoria' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:categorias,id_categoria'
            ],
            'codigo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50',
                Rule::unique('productos', 'codigo')->ignore($productoId, 'id_producto')
            ],
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:255'
            ],
            'marca' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:100'
            ],
            'precio_compra' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0'
            ],
            'precio_venta' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0'
            ],
            'stock_actual' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:0'
            ],
            'stock_minimo' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:0'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'id_categoria.required' => 'La categoría es obligatoria.',
            'id_categoria.integer' => 'El identificador de la categoría debe ser un número entero.',
            'id_categoria.exists' => 'La categoría seleccionada no existe en el sistema.',

            'codigo.required' => 'El código del producto es obligatorio.',
            'codigo.string' => 'El código debe ser texto.',
            'codigo.max' => 'El código no puede exceder los 50 caracteres.',
            'codigo.unique' => 'Este código de producto ya está registrado.',

            'nombre.required' => 'El nombre del producto es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres.',

            'marca.required' => 'La marca es obligatoria.',
            'marca.string' => 'La marca debe ser texto.',
            'marca.max' => 'La marca no puede exceder los 100 caracteres.',

            'precio_compra.required' => 'El precio de compra es obligatorio.',
            'precio_compra.numeric' => 'El precio de compra debe ser un valor numérico.',
            'precio_compra.min' => 'El precio de compra no puede ser un valor negativo.',

            'precio_venta.required' => 'El precio de venta es obligatorio.',
            'precio_venta.numeric' => 'El precio de venta debe ser un valor numérico.',
            'precio_venta.min' => 'El precio de venta no puede ser un valor negativo.',

            'stock_actual.required' => 'El stock actual es obligatorio.',
            'stock_actual.integer' => 'El stock actual debe ser un número entero.',
            'stock_actual.min' => 'El stock actual no puede ser un valor negativo.',

            'stock_minimo.required' => 'El stock mínimo es obligatorio.',
            'stock_minimo.integer' => 'El stock mínimo debe ser un número entero.',
            'stock_minimo.min' => 'El stock mínimo no puede ser un valor negativo.'
        ];
    }
}