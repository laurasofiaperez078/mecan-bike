<?php

namespace App\Services;

use App\Interfaces\BicicletaInterface;

class BicicletaService
{
    protected BicicletaInterface $bicicletaRepository;

    public function __construct(BicicletaInterface $bicicletaRepository)
    {
        $this->bicicletaRepository = $bicicletaRepository;
    }

    public function getAll()
    {
        return $this->bicicletaRepository->all();
    }

    public function getById(int $id)
    {
        return $this->bicicletaRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->bicicletaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->bicicletaRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->bicicletaRepository->delete($id);
    }

    public function findByCliente(int $clienteId)
    {
        return $this->bicicletaRepository->findByCliente($clienteId);
    }
}