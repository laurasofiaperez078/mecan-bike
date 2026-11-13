<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected UsuarioService $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function index()
    {
        $usuarios = $this->usuarioService->getAll();
        return response()->json($usuarios, 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $usuario = $this->usuarioService->create($data);
        return response()->json($usuario, 201);
    }

    public function show(int $id)
    {
        $usuario = $this->usuarioService->getById($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario, 200);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        $usuario = $this->usuarioService->update($id, $data);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario, 200);
    }

    public function destroy(int $id)
    {
        $deleted = $this->usuarioService->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }
}
