<?php

namespace App\Http\Controllers;

use App\Services\DetalleServicioService;
use Illuminate\Http\Request;

class DetalleServicioController extends Controller
{
    protected DetalleServicioService $detalleServicioService;

    public function __construct(DetalleServicioService $detalleServicioService)
    {
        $this->detalleServicioService = $detalleServicioService;
    }

    public function index()
    {
        $detalles = $this->detalleServicioService->getAll();
        return response()->json($detalles, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $detalle = $this->detalleServicioService->create($data);
        return response()->json($detalle, 201);
    }

    public function show(int $id)
    {
        $detalle = $this->detalleServicioService->getById($id);

        if (!$detalle) {
            return response()->json(['message' => 'Detalle de servicio no encontrado'], 404);
        }

        return response()->json($detalle, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $detalle = $this->detalleServicioService->update($id, $data);

        if (!$detalle) {
            return response()->json(['message' => 'Detalle de servicio no encontrado'], 404);
        }

        return response()->json($detalle, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->detalleServicioService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Detalle de servicio no encontrado'], 404);
        }

        return response()->json(['message' => 'Detalle de servicio eliminado correctamente'], 200);
    }

    public function porOrdenServicio(int $ordenServicioId)
    {
        $detalles = $this->detalleServicioService->findByOrdenServicio($ordenServicioId);
        return response()->json($detalles, 200);
    }
}
