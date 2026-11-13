<?php

namespace App\Http\Controllers;

use App\Services\OrdenServicioService;
use Illuminate\Http\Request;

class OrdenServicioController extends Controller
{
    protected OrdenServicioService $ordenServicioService;

    public function __construct(OrdenServicioService $ordenServicioService)
    {
        $this->ordenServicioService = $ordenServicioService;
    }

    public function index()
    {
        $ordenes = $this->ordenServicioService->getAll();
        return response()->json($ordenes, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $orden = $this->ordenServicioService->create($data);
        return response()->json($orden, 201);
    }

    public function show(int $id)
    {
        $orden = $this->ordenServicioService->getById($id);

        if (!$orden) {
            return response()->json(['message' => 'Orden de servicio no encontrada'], 404);
        }

        return response()->json($orden, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $orden = $this->ordenServicioService->update($id, $data);

        if (!$orden) {
            return response()->json(['message' => 'Orden de servicio no encontrada'], 404);
        }

        return response()->json($orden, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->ordenServicioService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Orden de servicio no encontrada'], 404);
        }

        return response()->json(['message' => 'Orden de servicio eliminada correctamente'], 200);
    }

    public function porCliente(int $clienteId)
    {
        $ordenes = $this->ordenServicioService->findByCliente($clienteId);
        return response()->json($ordenes, 200);
    }

    public function porBicicleta(int $bicicletaId)
    {
        $ordenes = $this->ordenServicioService->findByBicicleta($bicicletaId);
        return response()->json($ordenes, 200);
    }

    public function porEstado(string $estado)
    {
        $ordenes = $this->ordenServicioService->findByEstado($estado);
        return response()->json($ordenes, 200);
    }
}
