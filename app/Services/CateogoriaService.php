<?php

namespace App\Services;

use App\Interfaces\CategoriaInterface;

class CategoriaService
{
    protected CategoriaInterface $categoriaRepository;

    public function __construct(CategoriaInterface $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    public function getAll()
    {
        return $this->categoriaRepository->all();
    }

    public function getById(int $id)
    {
        return $this->categoriaRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->categoriaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->categoriaRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->categoriaRepository->delete($id);
    }
}