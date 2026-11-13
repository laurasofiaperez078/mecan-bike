<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected ClienteService $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function index()
    {
        $clientes = $this->clienteService->getAll();
        return response()->json($clientes, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $cliente = $this->clienteService->create($data);
        return response()->json($cliente, 201);
    }

    public function show(int $id)
    {
        $cliente = $this->clienteService->getById($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        return response()->json($cliente, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $cliente = $this->clienteService->update($id, $data);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        return response()->json($cliente, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->clienteService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        return response()->json(['message' => 'Cliente eliminado correctamente'], 200);
    }
}
