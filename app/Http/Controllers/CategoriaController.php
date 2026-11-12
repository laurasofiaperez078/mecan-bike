<?php

namespace App\Http\Controllers;

use App\Services\CategoriaService;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    protected CategoriaService $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index()
    {
        $categorias = $this->categoriaService->getAll();
        return response()->json($categorias, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $categoria = $this->categoriaService->create($data);
        return response()->json($categoria, 201);
    }

    public function show(int $id)
    {
        $categoria = $this->categoriaService->getById($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        return response()->json($categoria, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $categoria = $this->categoriaService->update($id, $data);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        return response()->json($categoria, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->categoriaService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        return response()->json(['message' => 'Categoría eliminada correctamente'], 200);
    }
}
