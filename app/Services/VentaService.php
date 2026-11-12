<?php

namespace App\Services;

use App\Interfaces\VentaInterface;

class VentaService
{
    protected VentaInterface $ventaRepository;

    public function __construct(VentaInterface $ventaRepository)
    {
        $this->ventaRepository = $ventaRepository;
    }

    public function getAll()
    {
        return $this->ventaRepository->all();
    }

    public function getById(int $id)
    {
        return $this->ventaRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->ventaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->ventaRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->ventaRepository->delete($id);
    }

    public function findByCliente(int $clienteId)
    {
        return $this->ventaRepository->findByCliente($clienteId);
    }

    public function findByUsuario(int $usuarioId)
    {
        return $this->ventaRepository->findByUsuario($usuarioId);
    }
}