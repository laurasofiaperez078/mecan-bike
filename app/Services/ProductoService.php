<?php

namespace App\Services;

use App\Interfaces\ProductoInterface;

class ProductoService
{
    protected ProductoInterface $productoRepository;

    public function __construct(ProductoInterface $productoRepository)
    {
        $this->productoRepository = $productoRepository;
    }

    public function getAll()
    {
        return $this->productoRepository->all();
    }

    public function getById(int $id)
    {
        return $this->productoRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->productoRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->productoRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->productoRepository->delete($id);
    }

    public function findByCategoria(int $categoriaId)
    {
        return $this->productoRepository->findByCategoria($categoriaId);
    }

    public function findByCodigo(string $codigo)
    {
        return $this->productoRepository->findByCodigo($codigo);
    }
}