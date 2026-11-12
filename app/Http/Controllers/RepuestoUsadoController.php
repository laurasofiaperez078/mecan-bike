<?php

namespace App\Http\Controllers;

use App\Services\RepuestoUsadoService;
use Illuminate\Http\Request;

class RepuestoUsadoController extends Controller
{
    protected RepuestoUsadoService $repuestoUsadoService;

    public function __construct(RepuestoUsadoService $repuestoUsadoService)
    {
        $this->repuestoUsadoService = $repuestoUsadoService;
    }

    public function index()
    {
        $repuestos = $this->repuestoUsadoService->getAll();
        return response()->json($repuestos, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $repuesto = $this->repuestoUsadoService->create($data);
        return response()->json($repuesto, 201);
    }

    public function show(int $id)
    {
        $repuesto = $this->repuestoUsadoService->getById($id);

        if (!$repuesto) {
            return response()->json(['message' => 'Repuesto usado no encontrado'], 404);
        }

        return response()->json($repuesto, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $repuesto = $this->repuestoUsadoService->update($id, $data);

        if (!$repuesto) {
            return response()->json(['message' => 'Repuesto usado no encontrado'], 404);
        }

        return response()->json($repuesto, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->repuestoUsadoService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Repuesto usado no encontrado'], 404);
        }

        return response()->json(['message' => 'Repuesto usado eliminado correctamente'], 200);
    }

    public function porOrdenServicio(int $ordenServicioId)
    {
        $repuestos = $this->repuestoUsadoService->findByOrdenServicio($ordenServicioId);
        return response()->json($repuestos, 200);
    }
}
