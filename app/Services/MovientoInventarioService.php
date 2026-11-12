<?php

namespace App\Services;

use App\Interfaces\MovimientoInventarioInterface;

class MovimientoInventarioService
{
    protected MovimientoInventarioInterface $movimientoInventarioRepository;

    public function __construct(MovimientoInventarioInterface $movimientoInventarioRepository)
    {
        $this->movimientoInventarioRepository = $movimientoInventarioRepository;
    }

    public function getAll()
    {
        return $this->movimientoInventarioRepository->all();
    }

    public function getById(int $id)
    {
        return $this->movimientoInventarioRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->movimientoInventarioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->movimientoInventarioRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->movimientoInventarioRepository->delete($id);
    }

    public function findByProducto(int $productoId)
    {
        return $this->movimientoInventarioRepository->findByProducto($productoId);
    }

    public function findByTipo(string $tipo)
    {
        return $this->movimientoInventarioRepository->findByTipo($tipo);
    }
}