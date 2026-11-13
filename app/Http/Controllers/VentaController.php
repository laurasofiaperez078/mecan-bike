<?php

namespace App\Http\Controllers;

use App\Services\VentaService;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    protected VentaService $ventaService;

    public function __construct(VentaService $ventaService)
    {
        $this->ventaService = $ventaService;
    }

    public function index()
    {
        $ventas = $this->ventaService->getAll();
        return response()->json($ventas, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $venta = $this->ventaService->create($data);
        return response()->json($venta, 201);
    }

    public function show(int $id)
    {
        $venta = $this->ventaService->getById($id);

        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        return response()->json($venta, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $venta = $this->ventaService->update($id, $data);

        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        return response()->json($venta, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->ventaService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        return response()->json(['message' => 'Venta eliminada correctamente'], 200);
    }

    public function porCliente(int $clienteId)
    {
        $ventas = $this->ventaService->findByCliente($clienteId);
        return response()->json($ventas, 200);
    }
}
