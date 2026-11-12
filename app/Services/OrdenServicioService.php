<?php

namespace App\Services;

use App\Interfaces\OrdenServicioInterface;

class OrdenServicioService
{
    protected OrdenServicioInterface $ordenServicioRepository;

    public function __construct(OrdenServicioInterface $ordenServicioRepository)
    {
        $this->ordenServicioRepository = $ordenServicioRepository;
    }

    public function getAll()
    {
        return $this->ordenServicioRepository->all();
    }

    public function getById(int $id)
    {
        return $this->ordenServicioRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->ordenServicioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->ordenServicioRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->ordenServicioRepository->delete($id);
    }

    public function findByCliente(int $clienteId)
    {
        return $this->ordenServicioRepository->findByCliente($clienteId);
    }

    public function findByBicicleta(int $bicicletaId)
    {
        return $this->ordenServicioRepository->findByBicicleta($bicicletaId);
    }

    public function findByEstado(string $estado)
    {
        return $this->ordenServicioRepository->findByEstado($estado);
    }
}