<?php

namespace App\Services;

use App\Interfaces\ClienteInterface;

class ClienteService
{
    protected ClienteInterface $clienteRepository;

    public function __construct(ClienteInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function getAll()
    {
        return $this->clienteRepository->all();
    }

    public function getById(int $id)
    {
        return $this->clienteRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->clienteRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->clienteRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->clienteRepository->delete($id);
    }
}