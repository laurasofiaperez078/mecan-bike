<?php

namespace App\Http\Controllers;

use App\Services\MovimientoInventarioService;
use Illuminate\Http\Request;

class MovimientoInventarioController extends Controller
{
    protected MovimientoInventarioService $movimientoInventarioService;

    public function __construct(MovimientoInventarioService $movimientoInventarioService)
    {
        $this->movimientoInventarioService = $movimientoInventarioService;
    }

    public function index()
    {
        $movimientos = $this->movimientoInventarioService->getAll();
        return response()->json($movimientos, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $movimiento = $this->movimientoInventarioService->create($data);
        return response()->json($movimiento, 201);
    }

    public function show(int $id)
    {
        $movimiento = $this->movimientoInventarioService->getById($id);

        if (!$movimiento) {
            return response()->json(['message' => 'Movimiento de inventario no encontrado'], 404);
        }

        return response()->json($movimiento, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $movimiento = $this->movimientoInventarioService->update($id, $data);

        if (!$movimiento) {
            return response()->json(['message' => 'Movimiento de inventario no encontrado'], 404);
        }

        return response()->json($movimiento, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->movimientoInventarioService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Movimiento de inventario no encontrado'], 404);
        }

        return response()->json(['message' => 'Movimiento de inventario eliminado correctamente'], 200);
    }

    public function porProducto(int $productoId)
    {
        $movimientos = $this->movimientoInventarioService->findByProducto($productoId);
        return response()->json($movimientos, 200);
    }
}