<?php

namespace App\Http\Controllers;

use App\Services\ProductoService;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    protected ProductoService $productoService;

    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    public function index()
    {
        $productos = $this->productoService->getAll();
        return response()->json($productos, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $producto = $this->productoService->create($data);
        return response()->json($producto, 201);
    }

    public function show(int $id)
    {
        $producto = $this->productoService->getById($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $producto = $this->productoService->update($id, $data);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->productoService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json(['message' => 'Producto eliminado correctamente'], 200);
    }

    public function porCategoria(int $categoriaId)
    {
        $productos = $this->productoService->findByCategoria($categoriaId);
        return response()->json($productos, 200);
    }
}
