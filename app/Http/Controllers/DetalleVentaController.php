<?php

namespace App\Http\Controllers;

use App\Services\DetalleVentaService;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    protected DetalleVentaService $detalleVentaService;

    public function __construct(DetalleVentaService $detalleVentaService)
    {
        $this->detalleVentaService = $detalleVentaService;
    }

    public function index()
    {
        $detalles = $this->detalleVentaService->getAll();
        return response()->json($detalles, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $detalle = $this->detalleVentaService->create($data);
        return response()->json($detalle, 201);
    }

    public function show(int $id)
    {
        $detalle = $this->detalleVentaService->getById($id);

        if (!$detalle) {
            return response()->json(['message' => 'Detalle de venta no encontrado'], 404);
        }

        return response()->json($detalle, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $detalle = $this->detalleVentaService->update($id, $data);

        if (!$detalle) {
            return response()->json(['message' => 'Detalle de venta no encontrado'], 404);
        }

        return response()->json($detalle, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->detalleVentaService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Detalle de venta no encontrado'], 404);
        }

        return response()->json(['message' => 'Detalle de venta eliminado correctamente'], 200);
    }

    public function porVenta(int $ventaId)
    {
        $detalles = $this->detalleVentaService->findByVenta($ventaId);
        return response()->json($detalles, 200);
    }
}