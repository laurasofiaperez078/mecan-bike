<?php

namespace App\Http\Controllers;

use App\Services\ServicioService;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    protected ServicioService $servicioService;

    public function __construct(ServicioService $servicioService)
    {
        $this->servicioService = $servicioService;
    }

    public function index()
    {
        $servicios = $this->servicioService->getAll();
        return response()->json($servicios, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $servicio = $this->servicioService->create($data);
        return response()->json($servicio, 201);
    }

    public function show(int $id)
    {
        $servicio = $this->servicioService->getById($id);

        if (!$servicio) {
            return response()->json(['message' => 'Servicio no encontrado'], 404);
        }

        return response()->json($servicio, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $servicio = $this->servicioService->update($id, $data);

        if (!$servicio) {
            return response()->json(['message' => 'Servicio no encontrado'], 404);
        }

        return response()->json($servicio, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->servicioService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Servicio no encontrado'], 404);
        }

        return response()->json(['message' => 'Servicio eliminado correctamente'], 200);
    }
}
