<?php

namespace App\Http\Controllers;

use App\Services\BicicletaService;
use Illuminate\Http\Request;

class BicicletaController extends Controller
{
    protected BicicletaService $bicicletaService;

    public function __construct(BicicletaService $bicicletaService)
    {
        $this->bicicletaService = $bicicletaService;
    }

    public function index()
    {
        $bicicletas = $this->bicicletaService->getAll();
        return response()->json($bicicletas, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $bicicleta = $this->bicicletaService->create($data);
        return response()->json($bicicleta, 201);
    }

    public function show(int $id)
    {
        $bicicleta = $this->bicicletaService->getById($id);

        if (!$bicicleta) {
            return response()->json(['message' => 'Bicicleta no encontrada'], 404);
        }

        return response()->json($bicicleta, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $bicicleta = $this->bicicletaService->update($id, $data);

        if (!$bicicleta) {
            return response()->json(['message' => 'Bicicleta no encontrada'], 404);
        }

        return response()->json($bicicleta, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->bicicletaService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Bicicleta no encontrada'], 404);
        }

        return response()->json(['message' => 'Bicicleta eliminada correctamente'], 200);
    }

    public function porCliente(int $clienteId)
    {
        $bicicletas = $this->bicicletaService->findByCliente($clienteId);
        return response()->json($bicicletas, 200);
    }
}
