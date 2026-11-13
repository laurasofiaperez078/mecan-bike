<?php

namespace App\Services;

use App\Interfaces\DetalleVentaInterface;

class DetalleVentaService
{
    protected DetalleVentaInterface $detalleVentaRepository;

    public function __construct(DetalleVentaInterface $detalleVentaRepository)
    {
        $this->detalleVentaRepository = $detalleVentaRepository;
    }

    public function getAll()
    {
        return $this->detalleVentaRepository->all();
    }

    public function getById(int $id)
    {
        return $this->detalleVentaRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->detalleVentaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->detalleVentaRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->detalleVentaRepository->delete($id);
    }

    public function findByVenta(int $ventaId)
    {
        return $this->detalleVentaRepository->findByVenta($ventaId);
    }

    public function findByProducto(int $productoId)
    {
        return $this->detalleVentaRepository->findByProducto($productoId);
    }
}